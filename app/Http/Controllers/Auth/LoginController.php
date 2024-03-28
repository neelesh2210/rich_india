<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);
        $user = User::where('email',$request->email)->first();
        if($user){
            if($user->delete_status == '0'){
                if($user->status == '1'){
                    if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password]))
                    {
                        return route('user.dashboard');
                    }
                }elseif($user->status == '0'){
                    return back()->withErrors(['error' => ['Your Id is Blocked, Please Contact Admin!']]);;
                }
            }else{
                return back()->withInput($request->only('email', 'remember'))->withErrors(['error' => ['These credentials don\'t match our records.']]);
            }
        }

        return back()->withInput($request->only('email', 'remember'))->withErrors(['error' => ['These credentials don\'t match our records.']]);
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('signin')->with('success','You Have Logged out Successfully!');
    }
}
