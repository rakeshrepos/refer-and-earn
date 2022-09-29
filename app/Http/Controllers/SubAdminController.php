<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class SubAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('isSubAdmin');
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('subAdmin.home');
    }

    public function users()
    {
        $users = DB::table('users')->get();

        return view('subAdmin.users');
    }

    public function getUsers($id){
        $users = DB::table('users')->where('referrer_id', '=', $id)->get();
        foreach($users as $user){
            $user->refer_name=$this->getNameById($user->referrer_id);
            $user->referal_type="direct";
            $collection = collect($users);
            $users = $collection->merge($this->getRefferedUsers($user->id));
        }
        return $users;
    }

    public function getRefferedUsers($id){
        $users = DB::table('users')->where('referrer_id', '=', $id)->get();

        foreach($users as $user){
            $user->referal_type="indirect";
            $user->refer_name=$this->getNameById($user->referrer_id);
        }
        return $users;
    }

    public function getNameById($id){
        $users = DB::table('users')->select('name')->where('id', '=', $id)->get();
        foreach($users as $user){
            $name = $user->name;
        }
        return $name;
    }

    public function validation($data){
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => '',
            'message' => '',
            'address' => '',
        ]);
    }

    protected function createUser($data){
        $referrer = Auth::user()->id;
        return User::create([
            'referrer_id' => $referrer,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role'=>'user',
            'gender' => $data['gender'],
            'message' => $data['message'],
            'address' => $data['address'],
        ]);
    }

    public function addUserView(){
        return view('subadmin.addUser');
    }

    public function addUser(Request $request){
        
        $data = $request->all();
        $validation = $this->validation($data);

        if ($validation->fails()) {
            return view('subadmin.addUser')->withErrors($validation);
        } else {
            $user = $this->createUser($data);
           return view('subadmin.addUser',[
            'status' => 'User Created Sucessfully!',
           ]);
        }
    }
}
