<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Cookie;
use \Datetime;
use Illuminate\Routing\Controller as BaseController;

class BackEndController extends BaseController
{

    function editRace($id){
        $race = DB::table("race")->where("race_id", $id)->first();
        return view('backend.editRace', ['race' => $race]);
    }

    function postEditRace(Request $request, $id){
        $name = $request->get('name');
        $prize = $request->get('prize');
        $time = $request->get('time');
        $track_id = (int)$request->get('track_id');
        $winner = $request->get('winner');
        // var_dump($id);
        DB::table('race')->where('race_id', $id)
        ->update(['name' => $name, 'prize' => $prize, 'time' => $time, 'track_id' => $track_id, 'winner' => $winner]);
        Session::flash('success', 'Cập nhật giải đua thành công');
        return redirect('admin/get-race');
    }

    function getRace(){
        $races = DB::table("race")->orderBy("time", "DESC")->paginate(5);
        return view('backend.listRace', ["races"=>$races]);
    }

    function getTrack(){
        $tracks = DB::table("track")->paginate(5);
        return view('backend.listTrack', ["tracks"=>$tracks]);
    }

    function addRace(){
        return view('backend.addRace');
    }

    function postAddRace(Request $request){
        $name = $request->get('name');
        $prize = $request->get('prize');
        $time = $request->get('time');
        $track_id = (int)$request->get('track_id');
        $winner = null;
        DB::table('race')->insert(
            ['name' => $name, 'prize' => $prize, 'time' => $time, 'track_id' => $track_id, 'winner' => $winner]
        );
        Session::flash('success', 'Thêm giải đua thành công');
        return redirect('admin/get-race');
    }

    function addTrack(){
        return view('backend.addTrack');
    }

    function postAddTrack(Request $request){
        $name = $request->get('name');
        $location = $request->get('location');
        $long = (int)$request->get('long');
        DB::table('track')->insert(
            ['name' => $name, 'location' => $location, 'long' => $long]
        );
        Session::flash('success', 'Thêm đường đua thành công');
        return redirect('admin/get-track');
    }

    function editTrack($id){
        $track = DB::table("track")->where("track_id", $id)->first();
        return view('backend.editTrack', ['track' => $track]);
    }

    function postEditTrack(Request $request, $id){
        $name = $request->get('name');
        $location = $request->get('location');
        $long = $request->get('long');
        DB::table('track')->where('track_id', $id)
        ->update(['name' => $name, 'location' => $location, 'long' => $long]);
        Session::flash('success', 'Cập nhật đường đua thành công');
        return redirect('admin/get-track');
    }

    function deleteRace($id){
        DB::table('race')->where('race_id', $id)->delete();
        Session::flash('success', 'Xóa giải đua thành công');
        return redirect('admin/get-race');
    }

    function deleteTrack($id){
        DB::table('track')->where('track_id', $id)->delete();
        Session::flash('success', 'Xóa đường đua thành công');
        return redirect('admin/get-track');
    }

    function getMember(){
        $members = DB::table('member_race')
            ->join('member', 'member_race.member_id', '=', 'member.member_id')
            ->join('race', 'member_race.race_id', '=', 'race.race_id')->orderBy('time', "DESC")->get();
        // var_dump($members[0]);
        return view('backend.listMember', ["members" => $members]);
    }
    function getFeedBack(){
        return view('backend.listFeedBack');
    }
    function getData(){
        $members = DB::table('member_race')
            ->join('member', 'member_race.member_id', '=', 'member.member_id')
            ->join('race', 'member_race.race_id', '=', 'race.race_id')->orderBy('time', "DESC")->get();
        return $members;
    }

    function editMember($member_id, $race_id, $id){
        $member = DB::table('member_race')
            ->join('member', 'member_race.member_id', '=', 'member.member_id')
            ->join('race', 'member_race.race_id', '=', 'race.race_id')->where('member.member_id', $member_id)
            ->where('race.race_id', $race_id)->first();
            return view('backend.editMember', ['member' => $member]);
    }
    function postEditMember(Request $request, $member_id, $race_id, $id){
        $member_id = $member_id;
        $race_id = $race_id;
        $run_time = $request->get('run_time');
        $rank = $request->get('rank');
        DB::table('member_race')->where('member_race_id', $id)
        ->update(['member_id' => $member_id, 'race_id' => $race_id, 'run_time' => $run_time, 'rank' => $rank]);
        Session::flash('success', 'Cập nhật thành công');
        return redirect('admin/get-member');
    }
}
