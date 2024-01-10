<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class EmployeeAuthController extends Controller

{
   public function showregister(){
    return view('employee.register.employee-register');
   }

   public function register(Request $request)
{
    // Validation rules
    $rules = [

        'username' => 'required|string|unique:employees|max:255',
        'email' => 'required|email|unique:employees|max:255',
        'password' => 'required|string|max:4',
    ];


    // Validate the request
    $validator = Validator::make($request->all(), $rules);

    // If validation fails, redirect back with errors
    if ($validator->fails()) {
       // Inside your controller method
       return redirect()->back()
       ->withErrors(['message' => 'Invalid username or password.'])
       ->withInput();
    }

    // If validation passes, create the user and do other necessary actions
    // Create the user
    $employee = Employee::create([

        'username' => $request->input('username'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
    ]);

    return redirect()->route('employee.login')->with('success', 'Registration successful!');
}


    public function showloginform(){
        return view('employee.login.employee-login');
    }

    public function handlelogin(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        // Hash the password using bcrypt
        // $credentials['password'] = bcrypt($credentials['password']);
        if (Auth::guard('webemployee')->attempt($credentials))

        {
               return redirect()->route('employee.dashboard');
        }else{
            // Inside your controller method
            return back()->withErrors(['message' => 'Invalid username or password.']);

        }

    }

    public function logout(){
        Auth::guard('webemployee')->logout();
        return redirect()->route('employee.login');
    }

    public function dashboard(){
        $admin=Auth::guard('webemployee')->user();
        return view('employee.dashboard.index')->with(['webemployee'=>$admin]);
    }

    // public function showForgotPasswordForm(){
    //      return view('employee.forgetpassword');
    // }
    // public function submitForgotPasswordForm(Request $request){
    //     $request->validate([
    //         // 'username' => 'required|exists:employees',
    //         'email' => 'required|email|exists:employees',
    //     ]);

    //     $token = Str::random(64);

    //     DB::table('password_reset_tokens')->insert([
    //         'email' =>$request->input('email'),
    //         'token' =>$token,
    //         'created_at' =>Carbon::now(),
    //     ]);

    //     // // Send reset password email
    //     // Mail::send('email.employee-forgotpassword', ['token' => $token], function ($message) use ($request) {
    //     //     $message->to($this->findEmailByUsername($request->input('username')));
    //     //     $message->subject('Password Reset');
    //     // });

    //     Mail::send('email.employee-forgotpassword', ['token'=>$token], function ($message) use($request){
    //         // $message->from('meenatchipkr.com', 'John Doe');
    //         // $message->sender('john@johndoe.com', 'John Doe');
    //         $message->to($request->input('email'));
    //         // $message->cc('john@johndoe.com', 'John Doe');
    //         // $message->bcc('john@johndoe.com', 'John Doe');
    //         // $message->replyTo('john@johndoe.com', 'John Doe');
    //         $message->subject('Reset Password');
    //         // $message->priority(3);
    //         // $message->attach('pathToFile');
    //     });
    //      return back()->with('message','we have emailed you reset password link');
    // }
    // public function showRestPassword($token){
    //      return view('employee.password-reset',['token' =>$token]);
    // }
    // public function submitresetPasswordForm(Request $request){
    //     $request->validate([
    //         // 'email'=>'required|email|exists:employees',
    //         'email'=>'required|email',
    //         'password'=>'required|min:6|confirmed',
    //         'password_confirmation'=>'required',
    //     ]);

    //     DB::table('password_reset_tokens')
    //         ->where('email',$request->input('email'))
    //         ->where('token',$request->token)
    //         ->first();

    //         if(!password_reset_tokens){
    //             return back()->with('error','Invalid Token!');
    //         }
    //         Employee::where('email',$request->input('email'))
    //         ->update(['password' => Hash::make($request->input('password'))]);

    //         DB::table('password_reset_tokens')
    //         ->where('email',$request->input('email'))
    //         ->delete();

    //         return redirect('employee/login')->with('message','Your Password has been chenged!');

    // }
}
