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
use \Datetime;

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
        $member_id = DB::table('member')->where('username', $username)->where('password', $password)->pluck('member_id');
        if($count == 1){
            Session::flash('loginSuccess', $username);
            Cookie::queue('loginSuccess', $username, '3600');
            // var_dump($member);
            Cookie::queue('member_id', $member_id, '3600');
            // echo Cookie::get('member_id');
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
        $time = new DateTime();
        $now = $time->format('Y-m-d H:i:s');
        $nextRaceTime1 = DB::table("race")->whereDate('time', '>', $now)->orderBy('time', 'ASC')->first();
        $nextRaceTime = $nextRaceTime1->time;
        $incompletedRace = DB::table("race")->whereDate('time', '>', $now)->take(2)->get();
        return view('home', ['nextRaceTime' => $nextRaceTime, 'incompletedRace' => $incompletedRace]);
    }

    function getDetail($id){
        $race = DB::table("race")->where("race_id", $id)->first();
        // var_dump($race);
        return view("detail", ["race" => $race]);
    }

    function getContact(){
        return view('contact');
    }

    function getRace(){
        $time = new DateTime();
        $now = $time->format('Y-m-d H:i:s');
        $completedRace = DB::table("race")->whereDate('time', '<', $now)->orderBy('time', 'ASC')->paginate(5);
        $incompletedRace = DB::table("race")->whereDate('time', '>', $now)->orderBy('time', 'ASC')->paginate(5);
        return view('race' , ['completedRace' => $completedRace, 'incompletedRace' => $incompletedRace]);
    }

    function getAchievements(){
        $time = new DateTime();
        $now = $time->format('Y-m-d H:i:s');
        $completedRace = DB::table("race")->whereDate('time', '<', $now)->paginate(5);
        return view('achievements', ['completedRace' => $completedRace]);
    }

    function getJoin(){
        $races = DB::table("race")->get();
        if (Cookie::get('loginSuccess') != false){
            return view('join', ["races" => $races]);
        }else{
            return redirect('/login');
        }
    }

    function postJoin(Request $request){
        // $email = $request->get('email');
        $phone = $request->get('phone');
        $address = $request->get('address');
        $race_id = $request->get('race_id');
        $member_id = Cookie::get('member_id')[1];
        DB::table('member_race')->insert(
            ['member_id' => $member_id, 'race_id' => $race_id, 'run_time' => null, 'rank' => null]
        );
        Session::flash('success', 'Đăng Ký thành công');
        return redirect('/race');
    }
}
