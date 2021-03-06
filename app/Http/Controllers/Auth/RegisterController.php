<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Mail\ActiveAcount;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    //
    public function showRegister()
    {
        return view('pages.auth', ['register' => '#tab2']);
    }
    public function sendEmail(Request $request,User $user){
        $key = openssl_random_pseudo_bytes(200);
        $time = now();
        $hash = md5($key . $time);
        echo ($request->input('r_email') . "           " . $hash . "     " . $request->input('r_firstname'));

        Mail::to($request->input('r_email'))->send(new ActiveAcount($request->input('r_email'), $hash, $request->input('r_lastname').$request->input('r_firstname')));

        $user->random_key = $hash;
        $user->key_time = Carbon::now();
    }
    public function doRegister(Request $request)
    {

        $request->validate([
            'r_firstname' => 'required|min:3|max:50',
            'r_lastname' => 'required|min:3|max:50',
            'r_email' => 'required|email',
            'r_pass' => 'required|min:8',
            'r_repass' => 'required|same:r_pass',
        ], $this->messages());
        $user =User::where('email', '=',$request->r_email)->first();
        // email không tồn tại gửi email mơi
        if($user==null){
            $user = User::create([
                'first_name' =>$request->r_firstname,
                'last_name' => $request->r_lastname,
                'email' => $request->r_email,
                'password'=>Hash::make($request->input('r_pass')),
            ]);
            $this->sendEmail($request,$user);
            $user->save();
            return redirect('login')->with('ok', 'Bạn đăng ký thành công vui lòng check Email để kích hoạt tài khoản');
        }else{
            // đã tồn tại active 1 thông báo lỗi
            if($user->active==1){
                return redirect()->back()->withErrors(['r_email'=>'Email đã tồn tại!']);
            }else{
                // email tồn tại active =0 gửi lại email
                $this->sendEmail($request,$user);
                $user->update();
                return redirect('login')->with('ok', 'Bạn đăng ký thành công vui lòng check Email để kích hoạt tài khoản');
            }
        }

    }

    public function register()
    {
        Session::put('signup', true);
        return redirect('login');
    }

    public function confirmEmail($email, $key)
    {
        //		Session::forget( 'signup' );
        $u = User::select('id', 'email', 'random_key', 'active')
            ->where('email', '=', $email)
            ->where('active', '=', '0')->get();

        if (count($u) == 1 && $u[0]->email == $email && $u[0]->random_key == $key) {
            //			$kt = Carbon::createFromFormat( 'Y-m-d H:i:s', $u[0]->key_time );
            //			$kt->addHours( 24 );
            //			$now = Carbon::now();
            //			if ( $now->lt( $kt ) == true ) {
            $u[0]->active = 1;
            $u[0]->random_key = '';
            $u[0]->groups()->attach(4);
            $u[0]->save();
            //			Session::put( 'ok', 123 );

            return redirect('login')->with('ok', 'Xác nhận email thành công! Bạn có thể đăng nhập.');
            //			} else {
            //				return \view('auth.login')->with( 'ok', 'Xác nhận email không thành công! Thời gian xác thực quá hạn.' );
            //			}
        } else {
            return redirect('login')->withErrors(['mes' => 'Xác nhận email không thành công! Email hoặc mã xác thực không đúng. ']);
        }
    }

    private function messages()
    {
        return [
            'r_firstname.required' => 'Bạn cần nhập họ tên',
            'r_firstname.min' => 'Họ tên cần lớn hơn 3 kí tự',
            'r_firstname.max' => 'Họ tên cần bé hơn 50 kí tự',
            'r_lastname.required' => 'Bạn cần nhập họ tên',
            'r_lastname.min' => 'Họ tên cần lớn hơn 3 kí tự',
            'r_lastname.max' => 'Họ tên cần bé hơn 50 kí tự',
            'r_email.required' => 'Bạn cần phải nhập Email.',
            'r_email.email' => 'Định dạng Email bị sai.',
            'r_email.unique' => 'Email đã tồn tại',
            'r_pass.required' => 'Bạn cần phải nhập Password.',
            'r_pass.min' => 'Password phải nhiều hơn 8 ký tự.',
            'r_repass.same' => 'RePassword không trùng với password',
            'r_pass.required' => 'Bạn cần nhập Repassword',
        ];
    }
}
