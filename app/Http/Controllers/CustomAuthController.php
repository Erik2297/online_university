<?php

namespace App\Http\Controllers;

use App\Mail\EmailConfirmation;
use App\Models\Ustudent;
use App\Models\Ugroup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function Groups(){
        $data = Ugroup::all();
        return response()->json([
            'status' => '200',
            'groups' => $data,
        ]);
    }
    public function Registration($data){
        $data = json_decode($data,true);
        if(!empty($data['born'])){
            $data['born'] = date('Y-m-d', strtotime($data['born'])+86400);
        }
        $validate = validator()->make(
            $data,
            [
                'name' => 'required',
                'surname' => 'required',
                'born' => 'required|date_format:Y-m-d',
                'group_id' => 'required|numeric',
                'gender' => 'required',
                'email' => 'required|email|unique:ustudents',
                'password' => 'required',
                'cpassword' => 'required|same:password',
            ],
            [
                'required' => 'Դաշտը չի կարող դատարկ լինել',
                'numeric' => 'Միայն թվեր',
                'email' => 'Սխալ էլ․ հասցե',
                'unique' => 'Այս էլ․ հասցեն օգտագործվում է',
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
            $user = new Ustudent();
            $user->name = $data['name'];
            $user->surname = $data['surname'];
            $user->born = $data['born'];
            $user->gender = $data['gender'];
            $user->group_id = $data['group_id'];
            $user->email = $data['email'];
            $gender_avatar = $user->gender == 'male' ? 'm' : 'w' ;
            $user->avatar = 'images/default_avatars/'.$gender_avatar.rand(1,4).'.png';
            $user->password = Hash::make($data['password']);
            $user->email_verified_at = Carbon::now();
            $user->save();
            $details = [
                'id' => $user->id,
                'name' => $user->name,
                'surname' => $user->surname,
                'url' => md5($user->id.$user->email),
            ];
            Mail::to($user->email)->send(new EmailConfirmation($details));
            return response()->json([
                'status' => '200',
                'request-status' => 'registered'
            ]);
        }
    }

    public function ConfirmEmail($id, $url){
        $user = Ustudent::where('id',$id)->first();
        if(!is_null($user)){
            if( md5($user->id.$user->email) == $url ){
                Session::flash('verified','true');
                return redirect('/');
            }
        }
    }


    public function Login( $data ){
        $data = json_decode($data,true);
        $validate = validator()->make(
            $data,
            [
                'email' => 'required|email|exists:ustudents',
                'password' => 'required',
            ]
        );
        if($validate->fails()){
            return response()->json([
                'status' => '200',
                'errors' => 'Տվյալները սխալ են , փորձեք կրկին !'
            ]);
        }
        else{
            $user = Ustudent::where('email', $data['email'])->first();
            if( Auth::attempt(['email' => $data['email'],'password' => $data['password']] )) {
                // dd(Auth::user());
                // return response()->json([
                //     'status' => '200',
                //     'message' => 'loggedin'
                // ]);
                return response()->json(Auth::user(), 200);
            }
            else{
                return response()->json([
                    'status' => '200',
                    'errors' => 'Տվյալները սխալ են , փորձեք կրկին !'
                ]);
            }
        }
    }


    public function Logout(){
        Auth::logout();
        return response()->json(['ok'=>'ok']);
    }


    public function  Userget() {
        $data = Auth::user();
        return response()->json();
    }

}
