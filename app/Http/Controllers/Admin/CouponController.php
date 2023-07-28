<?php

namespace App\Http\Controllers\Admin;

use App\CPU\PlanManager;
use App\CPU\CouponManager;
use App\Models\Admin\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{

    public function index(){
        $coupons = CouponManager::withoutTrash()->orderBy('created_at','desc')->paginate(15);

        return view('admin.coupon.index',compact('coupons'),['page_title'=>'Coupons']);
    }

    public function create(){

        $plans = PlanManager::withoutTrash()->orderBy('priority','asc')->get();

        $arr = [];
        foreach($plans as $key=>$plan){
            foreach(PlanManager::withoutTrash()->orderBy('priority','asc')->get() as $p){
                if($plan->priority < $p->priority){
                    $arr[] = ['id'=>$plan->id .'-'. $p->id,'name'=>$plan->title .' to '. $p->title];
                }
            }
        }

        return view('admin.coupon.create',['page_title'=>'Add Coupon','upgrade_plans'=>$arr]);
    }

    public function store(Request $request){
        $coupon = new Coupon;
        $coupon->name = $request->name;
        $coupon->plan_ids = $request->plan_ids;
        $coupon->start = $request->start;
        $coupon->end = $request->end;
        $coupon->amount = $request->amount;
        $coupon->type = $request->type;
        $coupon->save();

        return redirect()->route('admin.coupons.index')->with('success','Coupon Created Successfully!');
    }

    public function show(Request $request,$id){
        if($request->status == 1){
            $status = '1';
            $type = 'success';
            $msg = 'Coupon Activeted!';
        }else{
            $status = '0';
            $type = 'error';
            $msg = 'Coupon Deactiveted!';
        }
        $coupon = Coupon::find(decrypt($id));
        $coupon->is_active = $request->status;
        $coupon->save();

        return back()->with($type,$msg);
    }


    public function edit($id){
        $coupon = Coupon::find(decrypt($id));
        $plans = PlanManager::withoutTrash()->orderBy('priority','asc')->get();

        $arr = [];
        foreach($plans as $key=>$plan){
            foreach(PlanManager::withoutTrash()->orderBy('priority','asc')->get() as $p){
                if($plan->priority < $p->priority){
                    $arr[] = ['id'=>$plan->id .'-'. $p->id,'name'=>$plan->title .' to '. $p->title];
                }
            }
        }

        return view('admin.coupon.edit',compact('coupon'),['page_title'=>'Edit Coupon','upgrade_plans'=>$arr]);
    }

    public function update(Request $request,$id){
        $coupon = Coupon::find(decrypt($id));
        $coupon->name = $request->name;
        $coupon->plan_ids = $request->plan_ids;
        $coupon->start = $request->start;
        $coupon->end = $request->end;
        $coupon->amount = $request->amount;
        $coupon->type = $request->type;
        $coupon->save();

        return redirect()->route('admin.coupons.index')->with('success','Coupon Updated Successfully!');
    }

    public function destroy($id){
        $coupon = Coupon::find(decrypt($id));
        $coupon->is_delete = '1';
        $coupon->save();

        return back()->with('error','Coupon Deleted Successfully!');
    }

}
