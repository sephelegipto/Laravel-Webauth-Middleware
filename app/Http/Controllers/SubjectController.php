<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Subject;

class SubjectController extends Controller
{
    public function getData(Request $request)
	{
		return DB::table('subjects')
            ->leftJoin('courses', 'courses.course_id', '=', 'subjects.course_id')
            ->select('subjects.*', 'courses.name as course_name')
            ->orderby('subject_id')
            ->where('subjects.course_id', $request->id)
            ->get();
	}

	public function store(Request $request)
	{

		$id = DB::table('subjects')->insertGetId(
			['subject_code' => $request->subject_code, 'descriptive_title' => $request->descriptive_title,
			'prerequisite' => $request->prerequisite, 'units' => $request->units,
			'lec_hours' => $request->lec_hours, 'lab_hours' => $request->lab_hours,
			'contact_hours' => $request->contact_hours, 'course_id' => $request->course_id]
		);

		return DB::table('subjects')
            ->leftJoin('courses', 'courses.course_id', '=', 'subjects.course_id')
            ->select('subjects.*', 'courses.name as course_name')
            ->where('subject_id', $id)
            ->get();

	}

	public function destroy(Subject $subject)
    {

    	
    	Subject::where('subject_id', $subject->subject_id)->delete();
    }

    public function update(Request $request)
    {
    	$course_id = DB::table('courses')->where('name', $request->course_name)->value('course_id');

    	$sub = Subject::find($request->subject_id);
    	$sub->subject_code = $request->subject_code; 
    	$sub->descriptive_title = $request->descriptive_title;  
    	$sub->prerequisite = $request->prerequisite;
    	$sub->units = $request->units;
    	$sub->lec_hours = $request->lec_hours;
    	$sub->lab_hours = $request->lab_hours;
    	$sub->contact_hours = $request->contact_hours; 	
    	$sub->course_id = $course_id;
    	$sub->save();

    }
}
