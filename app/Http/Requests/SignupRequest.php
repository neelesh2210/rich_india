<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $rule = [
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|min:10|max:10|unique:users,phone',
            'password' =>'required|string|min:8',
            'state' => 'required',
        ];
        if($request->has('name')){
            $rule['name']='required|string|min:3';
        }
        if($request->has('first_name')){
            $rule['first_name']='required|string|min:3';
            $rule['last_name']='required|string|min:3';
        }
        if($request->referral_code){
            $rule['referral_code'] = [Rule::exists('users','referrer_code')->where('delete_status','0')->where('status','1'),];
        }

        return $rule;
    }
}
