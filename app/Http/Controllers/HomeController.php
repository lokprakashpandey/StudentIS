<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Program;
use App\Semester;
use App\Section;
use App\Profile;
use App\Picture;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
            $user = User::where('id',Auth::user()->id)->first();

            if ($user->name === "admin") {
                
                return view('master/home'); 
                //Redirects into Admin Route
                }            
            
            else {
                $profile = Profile::where('fk_userid',$user->id)->first();

                return view('home')->with('user',$user)->with('profile',$profile);
            }
    }

    public function add(Request $request){

        $id = $request['id'];
        $programs = Program::all();
        $semesters = Semester::all();
        $sections = Section::all();
        return view('add')->with('id',$id)->with('programs',$programs)->with('semesters',$semesters)->with('sections',$sections);
    }

    public function store(Request $request){

        $profile = new Profile;
        $profile->fullname = $request['fullname'];
        $profile->gender = $request['gender']; 
        $profile->fk_userid = $request['id'];
        $profile->fk_programid = $request['programid'];
        $profile->fk_semesterid = $request['semesterid'];
        $profile->fk_sectionid = $request['sectionid'];
        $profile->ip= $request->ip();
        $profile->save();

        $picture = new Picture;

        $name = time().$request->file('pic')->getClientOriginalName();
        $dest = base_path()."/public/uploads";
        $request->file('pic')->move($dest,$name);
        
        $picture->path = $name;
        $picture->fk_userid = $request['id'];
        $picture->save();


        $programs = Program::all();
        $semesters = Semester::all();
        $sections = Section::all();
        return view('edit')->with('id',$request['id'])->with('profile',$profile)->with('picture',$picture)->with('programs',$programs)->with('semesters',$semesters)->with('sections',$sections);
 
    }

    public function edit(Request $request) {

        $id = $request['id'];

        $profile = Profile::where('fk_userid',$id)->first();
        //get the first profile object where fk_userid matches id
        $picture = Picture::where('fk_userid',$id)->first();

        $programs = Program::all();
        $semesters = Semester::all();
        $sections = Section::all();

        return view('edit')->with('id',$id)->with('profile',$profile)->with('picture',$picture)->with('programs',$programs)->with('semesters',$semesters)->with('sections',$sections);        
    }

    public function update(Request $request){

        //request ma id ayeko chha

        $id = $request['id'];

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

        $user = User::find($id);

        \Session::flash('status','! Updation Successful !');
       return view('home')->with('user',$user); 
    }

}
