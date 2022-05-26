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

    public function EditUser(Request $request){
        $validate = validator()->make(
            $request->all(),
            [
                'name' => 'required',
                'surname' => 'required',
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'required' => 'Դաշտը չի կարող դատարկ լինել',
                'numeric' => 'Միայն թվեր',
                'email' => 'Սխալ էլ․ հասցե',
                'same' => 'Գաղտնաբառերը պետք է համապատասխանեն',
            ],
        );
        if($validate->fails()){
            return response()->json([
                'status' => '200',
                'errors' => $validate->errors()
            ]);
        }
        else{
            $user = Ustudent::find($request->input('id'));
            $user->name = $request->input('name');
            $user->surname = $request->input('surname');
            $user->email = $request->input('email');
            if($request->input('newPassword') && $request->input('newPassword') === $request->input('confirmPassword') && !empty($request->input('newPassword')) && !empty($request->input('confirmPassword'))){
                $user->password = Hash::make($request->input('newPassword'));
            }
            $user->save();
            return response()->json($user, 200);
        }
    }

    public function MOG($id){
        $data = Uzachot::where('student_id', $id )->get(['mark']);
        return response()->json([
            'status' => 200,
            'mog' => $data,
        ]);
    }


}
