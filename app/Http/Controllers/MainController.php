<?php

namespace App\Http\Controllers;

use App\Models\Ugroup;
use App\Models\Ustudent;
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

}
