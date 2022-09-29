<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('isAdmin');
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function users()
    {
        $users = DB::table('users')->get();

        return view('admin.users',['users'=>$users]);
    }

    public function updateDetails(Request $request){
        $id = Auth::user()->id;
        $password = Hash::make($request->password);
        DB::table('users')->where('id', $id)->update(['name' => $request->name,'email'=>$request->email,'password'=>$password]);
        return view('admin.update',['status'=>'Details Updated sucessfully!!']);
    }

    public function update()
    {
        $user = Auth::user();
        return view('admin.update',[
            'user'=>$user,
            'status'=>'',
        ]);
    }

    public function validation($data){
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function createUser($data,$role){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role'=>$role,
        ]);
    }

    public function createAdminView(){
        return view('admin.createAdmin');
    }

    public function createAdmin(Request $request){
        
        $data = $request->all();
        $validation = $this->validation($data);

        if ($validation->fails()) {
            return view('admin.createAdmin')->withErrors($validation);
        } else {
            $user = $this->createUser($data,'admin');
           return view('admin.createAdmin',[
            'status' => 'Admin Created Sucessfully!',
           ]);
        }
    }

    public function createSubAdminView(){
        return view('admin.createSubAdmin');
    }

    public function createSubAdmin(Request $request){
        $data = $request->all();
        $validation = $this->validation($data);
        if($validation->fails()){
            return view('admin.createSubAdmin')->withErrors($validation);
        }else{
            $user = $this->createUser($data,'subadmin');
            return view('admin.createSubAdmin',[
                'status' => 'SubAdmin Created Sucessfully!',
               ]);
        }
    }
}
