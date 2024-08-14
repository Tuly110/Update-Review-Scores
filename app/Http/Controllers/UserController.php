<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;
use App\Models\SubjectModel;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function export_excel(Request $request, $id, $subject_id)
    {
       
        $subject = SubjectModel::getSingle($subject_id);
        $subject->ID_subject= $subject_id;
        $score = DB::table('students')
                ->join('subject', 'subject.id', '=', 'students.ID_subject')
                ->select('students.*', 'subject.name as subject_name')
                ->where('students.ID_subject', '=', $subject_id)
                ->first();
        dd($request->$subject);
       

        return Excel::download(new UserExport($score), 'score'.'xlsx');
    }
}
