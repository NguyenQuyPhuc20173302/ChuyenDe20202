<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Cookie;

class FrontEndController extends BaseController
{
    function getLogout(){
        Cookie::queue(
            Cookie::forget('loginSuccess')
        );
        return redirect('/');
    }
    function getLogin(){
        
            return view('login');
        
    }

    public function postLogin(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $count = DB::table('member')->where('username', $username)->where('password', $password)->count();
        if($count == 1){
            Session::flash('loginSuccess', $username);
            Cookie::queue('loginSuccess', $username, '3600');
            return redirect('');
        }else{
            Session::flash('error', 'Tên tài khoản hoặc mật khẩu không chính xác');
            return redirect('/login');
        }
    }
    function getRegister(){
        return view('register');
    }
    function postRegister(Request $request){
        $username = $request->get('username');
        $password = $request->get('password');
        $name = $request->get('name');
        $age = $request->get('age');
        $gender = $request->get('gender');
        if($gender == 'male'){
            $gender_db = 1;
        }else{
            $gender_db = 0;
        }
        $email = $request->get('email');
        $count = DB::table('member')->where('username', $username)->count();
        if($count == 0){
            DB::table('member')->insert(
                ['name' => $name, 'age' => $age, 'gender' => $gender_db, 'email' => $email, 'username' => $username, 'password' => $password]
            );
            Session::flash('success', 'Tạo tài khoản thành công, mời đăng nhập');
            return redirect('/login');
        }else{
            Session::flash('error', 'Tài khoản đã tồn tại');
            return redirect('/register');
        }
    }
    function postFeedback(Request $request){
        $name = $request->get('name');
        $email = $request->get('email');
        $content = $request->get('content');
        DB::table('feedback')->insert(
            ['name' => $name, 'email' => $email, 'content' => $content]
        );
        Session::flash('success', 'Cảm ơn bạn đã gửi thông tin phản hồi');
        return redirect('/contact');
    }
    function getHome(){
        return view('home');
    }

    function getAbout(){
        return view('about');
    }

    function getContact(){
        return view('contact');
    }

    function getRace(){
        $results = DB::select('select * from race');
        return view('race' , ['results' => $results]);
    }

    function getMember(){
        return view('member');
    }

    function getJoin(){
        return view('join');
    }

    function postJoin(Request $request){
        // $email = $request->get('email');
        $phone = $request->get('phone');
        $address = $request->get('address');
        $race_id = $request->get('race_id');
        DB::table('member_race')->insert(
            ['member_id' => 1, 'race_id' => $race_id, 'run_time' => '0', 'rank' => 2]
        );
        Session::flash('success', 'Đăng Ký thành công');
        return redirect('/race');
    }
}
