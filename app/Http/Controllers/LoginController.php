<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\Websitemail;
use Illuminate\Http\Request;
use App\Mail\VerifyAccountMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail as FacadesMail;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    // public function dashboard()
    // {
    //     return view('auth.dashboard');
    // }

    // public function register()
    // {
    //     return view('auth.register');
    // }

    // public function register_submit(Request $request)
    // {

    //     $request->validate([
    //         'first_name' => ['required'],
    //         'last_name' => ['required'],
    //         'username' => ['required'],
    //         'email' => ['required', 'email'],
    //         'password' => ['required', Password::min(6), 'confirmed'],

    //     ]);


    //     $user = new User();
    //     $user->first_name = $request->first_name;
    //     $user->last_name = $request->last_name;
    //     $user->username = $request->username;
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);

    //     $token = hash('sha256', time());
    //     $user->token = $token;
    //     $user->save();

    //     $mailData = [
    //         'title' => 'Registration Verification',
    //         'verif_link' => url('register_verify/' . $token . '/' . $request->email),
    //     ];

    //     FacadesMail::to($request->email)->send(new VerifyAccountMail($mailData));

    //     return redirect()->back()->with('success', 'Your registration is completed. Please check your email for verification. If you do not find the email in your inbox, please check your spam folder.');
    // }
    // public function register_verify($token, $email)
    // {
    //     $user = User::where('token', $token)->where('email', $email)->first();
    //     if (!$user) {
    //         return redirect()->route('login');
    //     }
    //     $user->token = '';
    //     $user->status = 1;
    //     $user->email_verified_at = now();
    //     $user->update();

    //     return redirect()->route('login')->with('success', 'Your email is verified. You can login now.');
    // }

    public function login()
    {
        return view('auth.login');
    }

    public function login_submit(Request $request): RedirectResponse
    {
        //validate
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $check = $request->all();
        $remember = $request->has('remember');
        $attributes =
            [
                'email' => $check['email'],
                'password' => $check['password'],
                'status' => 1
            ];


        if (Auth::attempt(array('email' => $check['email'], 'password' => $check['password']))) {
            if (Auth::user()->type == 'admin') {
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

    public function forgot_password()
    {
        return view('auth.forgot-password');
    }

    public function forgot_password_submit(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);
        $user = User::where('email', $request->email)->where('status', 1)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak sesuai');
        }

        $token = hash('sha256', time());
        $user->token = $token;
        $user->update();

        $reset_link = url('reset-password/' . $token . '/' . $request->email);
        $subject = "Password Reset";

        $mailData = [
            'title' => 'Reset Password',
            'reset_link' => url('reset-password/' . $token . '/' . $request->email),
        ];
        FacadesMail::to($request->email)->send(new Websitemail($mailData));

        return redirect()->back()->with('success', 'Kami sudah mengirimkan link untuk melakukan reset password ke email Anda. Silahkan periksa email Anda. Jika tidak menemukan email di kotak masuk, mohon periksa di folder spam.');
    }

    public function reset_password($token, $email)
    {
        $user = User::where('email', $email)->where('token', $token)->first();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Token atau email tidak sesuai');
        }
        return view('auth.reset-password', compact('token', 'email'));
    }

    public function reset_password_submit(Request $request, $token, $email)
    {
        $request->validate([
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password'],
        ]);

        $user = User::where('email', $request->email)->where('token', $request->token)->first();
        $user->password = Hash::make($request->password);
        $user->token = "";
        $user->update();

        return redirect()->route('login')->with('success', 'Password berhasil direset. Anda bisa login sekarang.');
    }
}
