<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class SearchController extends Controller
{
    
    public function count(Request $request)
    {
        $gender = $request['gender'];
        $programid = $request['programid'];
        $semesterid = $request['semesterid'];
        $sectionid = $request['sectionid'];

        
        $builder = Profile::query();

        if($gender === "M" || $gender === "F") {
        	$builder->where('gender', '=', $gender);
        }

        else {

            $builder->where(function($q) {
                                 $q->where('gender', 'M')
                                   ->orWhere('gender', 'F');
                             }
                         );

        	//this does not work.......beware
            //$builder->where('(gender', '=', 'M')->orWhere('gender', '=', 'F');
        }

        if ($programid == 1 || $programid == 2) {
            $builder->where('fk_programid', '=', $programid);
        }
        else {
            $builder->where(function($q) {
                                 $q->where('fk_programid', '1')
                                   ->orWhere('fk_programid', '2');
                             }
                         );            
        }

        if ($semesterid == 1 || $semesterid == 2 || $semesterid == 3 || $semesterid == 4 || $semesterid == 5 || $semesterid == 6 || $semesterid == 7 || $semesterid == 8) {
            $builder->where('fk_semesterid', '=', $semesterid);
        }
        else {
            $builder->where(function($q) {
                                 $q->where('fk_semesterid', '1')
                                   ->orWhere('fk_semesterid', '2')
                                   ->orWhere('fk_semesterid', '3')
                                   ->orWhere('fk_semesterid', '4')
                                   ->orWhere('fk_semesterid', '5')
                                   ->orWhere('fk_semesterid', '6')
                                   ->orWhere('fk_semesterid', '7')
                                   ->orWhere('fk_semesterid', '8');
                             }
                         );            
        }

        if ($sectionid == 1 || $sectionid == 2) {
            $builder->where('fk_sectionid', '=', $sectionid);
        }
        else {
            $builder->where(function($q) {
                                 $q->where('fk_sectionid', '1')
                                   ->orWhere('fk_sectionid', '2');
                             }
                         );            
        }

        $result = $builder->count();

         // echo $builder->toSql();
         // exit();
        

        //one way without all option
        // $result = $builder->where('gender', '=', $gender)
        // 		->where('fk_programid', '=', $programid)
        // 		->where('fk_semesterid', '=', $semesterid)
        // 		->where('fk_sectionid', '=', $sectionid)
        // 		->count();


        //other way without all option
        // $result = \DB::table('profiles')
        // 		->where('gender', '=', $gender)
        // 		->where('fk_programid', '=', $programid)
        // 		->where('fk_semesterid', '=', $semesterid)
        // 		->where('fk_sectionid', '=', $sectionid)
        // 		->count();

        \Session::flash('status','Records found : '.$result);
       return redirect('listStudent'); 

    }
}
