<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Admin\Target;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TargetController extends Controller
{

    public function index(Request $request){
        $targets = Target::latest()->paginate(10);

        return view('admin.target.index',compact('targets'),['page_title'=>'Target List']);
    }

    public function create(){
        return view('admin.target.create',['page_title'=>'Add Target']);
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'          =>  'required',
            'image'         =>  'nullable|mimes:jpeg,png,jpg,webp',
            'date_range'    =>  'required',
            'amount'        =>  'required',
            'no_of_referral'=>  'required|integer'
        ]);
        $start_date =  date('Y-m-d',strtotime(explode('-',$request->date_range)[0]));
        $end_date =  date('Y-m-d',strtotime(explode('-',$request->date_range)[1]));
        $target = new Target;
        $target->slug = Str::slug($request->name).rand(111,999);
        $target->name = $request->name;
        $target->image = imageUpload($request->file('image'),'backend/img/target');
        $target->start_date = $start_date;
        $target->end_date = $end_date;
        $target->amount = $request->amount;
        $target->description_one = $request->description_one;
        $target->description_two = $request->description_two;
        $target->description_three = $request->description_three;
        $target->no_of_referral = $request->no_of_referral;
        $target->save();

        return redirect()->route('admin.target.index')->with('success','Target Added Successfuly!');
    }

    public function show(Request $request,$id){
        $status = decrypt($request->status);
        $target = Target::find(decrypt($id));
        $target->is_active = $status;
        $target->save();

        if($status == '1'){
            return back()->with('success','Target Actived Successfully!');
        }else{
            return back()->with('error','Target Deactived Successfully!');
        }

    }

    public function edit($id){
        $target = Target::find(decrypt($id));
        $target->duration = date('m/d/Y',strtotime($target->start_date)).' - '.date('m/d/Y',strtotime($target->end_date));
        return view('admin.target.edit',compact('target'),['page_title'=>'Edit Target']);
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'name'          =>'required',
            'image'         =>'nullable|mimes:jpeg,png,jpg,webp',
            'date_range'    =>'required',
            'amount'        =>'required',
            'no_of_referral'=>  'required|integer'
        ]);
        $start_date =  date('Y-m-d',strtotime(explode('-',$request->date_range)[0]));
        $end_date =  date('Y-m-d',strtotime(explode('-',$request->date_range)[1]));

        $target = Target::find(decrypt($id));
        $target->name = $request->name;
        if($request->has('image')){
            $target->image = imageUpload($request->file('image'),'backend/img/target');
        }
        $target->start_date = $start_date;
        $target->end_date = $end_date;
        $target->amount = $request->amount;
        $target->description_one = $request->description_one;
        $target->description_two = $request->description_two;
        $target->description_three = $request->description_three;
        $target->no_of_referral = $request->no_of_referral;
        $target->save();

        return redirect()->route('admin.target.index')->with('success','Target Updated Successfuly!');
    }

    public function destroy($id){
        Target::destroy(decrypt($id));

        return back()->with('success','Target Deleted Successfully!');
    }

    public function achievedUsers($target_id){
        $target = Target::findOrFail($target_id);

        $users = User::whereHas('commission',function($q) use ($target){
            $q->whereBetween('created_at', [$target->start_date, $target->end_date])->where('level', 1);
        })->withSum(
            ['commission' => function($query) use ($target) {
                $query->whereBetween('created_at', [$target->start_date, $target->end_date])->where('level', 1);
            }],
            'commission'
        )->having('commission_sum_commission','>=',$target->amount)->whereHas('associates',function($q) use ($target){
            $q->whereBetween('created_at', [$target->start_date, $target->end_date]);
        })->withCount(
            ['associates' => function($query) use ($target) {
                $query->whereBetween('created_at', [$target->start_date, $target->end_date]);
            }])->having('associates_count','>=',$target->no_of_referral)->paginate(10);

        return view('admin.target.achieved_user',compact('target','users'),['page_title'=>'Achieved User']);
    }

}
