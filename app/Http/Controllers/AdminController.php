<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Profile;
use App\Picture;
use App\Program;
use App\Semester;
use App\Section;

class AdminController extends Controller
{
    
    //logout
    public function loggedout(Request $request) {
          Auth::logout();
          return redirect('/');
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        //add student
        $user = new User;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save(); //added in user table

        $profile = new Profile;
        $profile->fullname = $request['fullname'];
        $profile->gender = $request['gender']; 
        $profile->fk_userid = $user->id;
        $profile->fk_programid = $request['programid'];
        $profile->fk_semesterid = $request['semesterid'];
        $profile->fk_sectionid = $request['sectionid'];
        $profile->ip= $request->ip();
        $profile->save(); //added in profile table

        $picture = new Picture;
        $name = time().$request->file('pic')->getClientOriginalName();
        $dest = base_path()."/public/uploads";
        $request->file('pic')->move($dest,$name);
        
        $picture->path = $name;
        $picture->fk_userid = $user->id;
        $picture->save(); //added in picture table


        //put addition info in session
        \Session::flash('status','! Student Added !');
        return view('master/home');
    }


    public function list() {

        //$users = User::where('name','!=','admin')->get();


        //left join users with join of profiles and pictures because all users cannot have profiles and pictures like admin and other users who have not filled up their information. 
        
        $joinedusers = \DB::table('users')->leftJoin('profiles', 'profiles.fk_userid', '=', 'users.id')->join('pictures','profiles.fk_userid','=','pictures.fk_userid')->select('users.id','users.name','users.email','profiles.fullname','profiles.gender','profiles.fk_programid','profiles.fk_semesterid','profiles.fk_sectionid','pictures.path')->get();

        return view('master/list')->with('joinedusers',$joinedusers);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        $profile = Profile::where('fk_userid',$id)->first();
        $picture = Picture::where('fk_userid',$id)->first();

        $programs = Program::all();
        $semesters = Semester::all();
        $sections = Section::all();
        
        return view('master/edit')->with('user',$user)->with('profile',$profile)->with('picture',$picture)->with('programs',$programs)->with('semesters',$semesters)->with('sections',$sections);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where('id',$id)->first();
        $user->name = $request['username'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();
        
        $profile = Profile::where('fk_userid',$id)->first();
        $profile->fullname = $request['fullname'];
        $profile->gender = $request['gender'];

        $profile->fk_programid = $request['programid'];
        $profile->fk_semesterid = $request['semesterid'];
        $profile->fk_sectionid = $request['sectionid'];
        $profile->ip = $request->ip();
        $profile->save();
                
        if ($request['pic']) {
            $picture = Picture::where('fk_userid',$id)->first();
            $filepath = base_path()."/public/uploads/".$picture->path;
            is_file($filepath)? file_exists($filepath)? unlink($filepath): " ": " ";
            
            $name = time().$request->file('pic')->getClientOriginalName();
            $dest = base_path()."/public/uploads";
            $request->file('pic')->move($dest,$name);
            $picture->path = $name;
            $picture->save();
        }

        
        \Session::flash('status','! Updation Successful !');
       return redirect('listStudent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $picture = Picture::where('fk_userid',$id)->first();
        $user->delete(); //all related info will be deleted cascadingly

        //to delete associated picture if it exists
        if(!is_null($picture)) {
        $filepath = base_path()."/public/uploads/".$picture->path;
        unlink($filepath);
        }
        \Session::flash('status','! Deletion Successful !');
        return redirect('listStudent');
    }
}
