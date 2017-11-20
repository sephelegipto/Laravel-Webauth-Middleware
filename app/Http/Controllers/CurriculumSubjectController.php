<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\CurriculumSubject;

class CurriculumSubjectController extends Controller
{
     public function getData(Request $request)
	{
		return DB::table('curriculumsubjects')
            ->join('subjects', 'curriculumsubjects.subject_id', '=', 'subjects.subject_id')

            ->select('curriculumsubjects.*', 'subjects.*')
            ->where('curriculumsubjects.curriculum_id', $request->id)
            ->get();
	}
    public function getDataSubjects(Request $request)
    {
        return DB::table('subjects')
            ->leftJoin('curriculumsubjects', 'curriculumsubjects.subject_id', '=', 'subjects.subject_id')
            ->select('subjects.*', 'curriculumsubjects.*','subjects.subject_id')
            ->where('subjects.course_id', $request->id)
            ->where('curriculumsubjects.subject_id', null)
            ->get();
    }

	public function store(Request $request)
	{

		$id = DB::table('curriculumsubjects')->insertGetId(
			['curriculum_id' => $request->course_id, 'year' => $request->year,
			'sem' => $request->sem, 'subject_id' => $request->subject_id]
		);

		return DB::table('curriculumsubjects')
            ->join('subjects', 'curriculumsubjects.subject_id', '=', 'subjects.subject_id')
            ->select('curriculumsubjects.*', 'subjects.*')
            ->where('curriculumsubjects.curriculumsubject_id', $id)
            ->get();

	}

	public function destroy(CurriculumSubject $curriculumsubject)
    {
        
    	return DB::table('curriculumsubjects')->where('curriculumsubject_id', $curriculumsubject->curriculumsubject_id)->delete();


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
