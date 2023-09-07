<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VerifyUsers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    function create(Request $request){
          //Validate Inputs
          $request->validate([
              'name'=>'required',
              'email'=>'required|email|unique:users,email',
              'password'=>'required|min:5|max:30',
              'cpassword'=>'required|min:5|max:30|same:password'
          ]);

          $user = new User();
          $user->name = $request->name;
          $user->email = $request->email;
          $user->password = \Hash::make($request->password);
          $save = $user->save();
          $last_id = $user->id;

          $token = $last_id.hash('sha256', \Str::random(120));
          $verifyUrl = route('user.verify',['token'=>$token,'service'=>'Email_verification']);
  
          VerifyUsers::create([
              'user_id'=>$last_id,
              'token'=>$token,
          ]);
  
          $message = 'Dear <br>'.$request->name.'</br>';
          $message = "terimkasih telah mendaftar, Silahkan verifikasi  ";
  
          $mail_data = [
              'recipient'=>$request->email,
              'fromEmail'=>$request->email,
              'fromName'=>$request->name,
              'subject'=>'Email verification ',
              'body'=>$message,
              'actionLink'=>$verifyUrl,
  
          ];
  
          \Mail::send('email-template', $mail_data, function($message) use ($mail_data){
              $message->to($mail_data['recipient'])
                      ->from($mail_data['fromEmail'], $mail_data['fromName'])
                      ->subject($mail_data['subject']);
          });
  
          if($save){
              return redirect()->back()->with('success', 'Berhasil Silahkan verifikasi email!');
          }else{
              return redirect()->back()->with('fail', 'Gagal Mendaftarkan');
          }
    }

    public function verify(Request $request){
        $token = $request->token;
        $verifyUser = VerifyUsers::where('token',$token)->first();
        if(!is_null($verifyUser)){

            $user = $verifyUser->user;

            if(!$user->email_verified){
                $verifyUser->user->email_verified = 1;
                $verifyUser->user->save();

                return redirect()->route('user.login')->with('success','Verifikasi Email Berhasil')
                ->with('VerifiedEmail', $user->email);
            }else{
                return redirect()->route('user.login')->with('success','Email Sudah Terverifikasi, Sekarang bisa Masuk')
                ->with('VerifiedEmail', $user->email);
            }
        }
    }

    function check(Request $request){
        //Validate inputs
        $request->validate([
           'email'=>'required|email|exists:users,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists on users table'
        ]);

        $creds = $request->only('email','password');
        if( Auth::guard('web')->attempt($creds) ){
            return redirect()->route('user.home.index');
        }else{
            return redirect()->route('user.login')->with('fail','Incorrect credentials');
        }
    }

    public function ForgetForm(){
        return view('dashboard.user.forget');
    }

    public function Sendlink(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email',
         ],[
             'email.exists'=>'Email anda belum terdaftar'
         ]);

        $token = \Str::random(64);
        \DB::table('password_resets')->insert([
                'email'=>$request->email,
                'token'=>$token,
                'created_at'=>Carbon::now(),
        ]);

        $action_link = route('user.reset.password.form',['token'=>$token,'email'=>$request->email]);
        $body =  "ini adalah link password untuk reset password <b>PPDB SMP Al-Ikhlas</b> akun " .$request->email.
        ". kamu dapat akses link di bawah ini untuk reset password"; 

        \Mail::send('email_forget',['action_link'=>$action_link,'body'=>$body], function($message) use ($request){
                $message->from('noreplay@example.com','PPDB SMP Al-Ikhlas');
                $message->to($request->email,'your name')->subject('reset password');
        });

        return back()->with('success', 'link berhasil di kirim ke email ');
    }

    public function Resetform(Request $request, $token = null){
        return view ('dashboard.user.reset')->with(['token'=>$token,'email'=>$request->email]);
    }
    

    public function Resetpassword(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password' => 'required|min:8|max:20',
            'confirm_password' => 'required',
        ]);

        $check_token = \DB::table('password_resets')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();
        // dd($request->all());
        if(!$check_token){
            return back()->withInput()->with('erorr','token invalid');
        }else{
            User::where('email', $request->email)->update([
                'password'=>\Hash::make($request->password)
            ]);

            \DB::table('password_resets')->where([
                'email'=>($request->email)
            ])->delete();
        }

        return redirect()->route('user.login')->with('success', 'Password anda berhasil di ubah')
        ->with('verifiedEmail',$request->email);
    }
    
  

    
    function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
