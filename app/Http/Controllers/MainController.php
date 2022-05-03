<?php

namespace App\Http\Controllers;

use App\Models\Ugroup;
use App\Models\Ustudent;
use App\Models\Ulecturer;
use App\Models\UlecturerUsubject;
use App\Models\Uzachot;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function GroupMembers($group_id){
        $data = Ustudent::where('group_id' , $group_id)->get();
        return response()->json($data);
    }

    public function GroupName($group_id){
        $data = Ugroup::where('id' , $group_id)->get();
        return response()->json($data);
    }

    public function LecturerGroups($lecturer_id){
        $leaders = Ustudent::where('role_in_group' , 'leader')->get();
        return response()->json($leaders);
    }

    public function studentschedule(){
        $user = auth()->user();
        $data = Uzachot::where('student_id' , $user->id)->with('subject')->get()->groupBy('semester')->toArray();
        return response()->json($data);
    }

    public function studentget($id){
        $auth_user = auth()->guard('lecturer')->user();
        $user = Ustudent::where('id' , $id)->get();
        $data = Uzachot::where('student_id' , $id)->with('subject')->get()->groupBy('semester')->toArray();
        $available = UlecturerUsubject::where('lecturer_id', $auth_user->id)->get();
        return response()->json([
            'student' => $user,
            'data' => $data,
            'available' => $available,
        ]);
    }


}
