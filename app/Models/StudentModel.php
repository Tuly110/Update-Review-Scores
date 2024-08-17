<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    use HasFactory;
    protected $table= 'students';
    static public function getStudent($subject_id)
    {
        return self::select('students.*', 'subject.name as subject_name')
       ->join('subject', 'subject.id', '=', 'students.ID_subject')
       ->where('students.ID_subject', '=', $subject_id)
       ->paginate(5);
    }

    static public function getUpdateScore($subject_id)
    {
        return self::select('students.*', 'subject.name as subject_name', 'update_score.*')
        ->join('subject', 'subject.id', '=', 'students.ID_subject')
        ->join('update_score', 'update_score.msv', '=', 'students.MSV')
        // ->join('updated', 'updated.msv', '=', 'students.MSV')
        ->where('students.ID_subject', '=', $subject_id)
        // ->where('students.MSV', '=', 'updated.msv')
        ->paginate(5);
    }

    // static public function getUpdateScore($subject_id)
    // {
    //     return self::select('students.*', 'subject.name as subject_name', 'update_score.*')
    //     ->join('subject', 'subject.id', '=', 'students.ID_subject')
    //     ->join('update_score', 'update_score.msv', '=', 'students.MSV')
    //     ->where('students.ID_subject', '=', $subject_id)
    //     ->paginate(5);
    // }



    static public function getSingle($id)
    {
        return self::find($id);
    }
}
