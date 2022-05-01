<?php

namespace App\Http\Controllers;

use App\Models\Ugroup;
use App\Models\Ustudent;
use App\Models\Ulecturer;
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

}
