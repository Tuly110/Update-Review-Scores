<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    use HasFactory;
    protected $table= 'students';
    static public function getStudent($subject_id)
    {
        // return self::select('students.*', 'subject.name as subject_name')
        //         ->join('subject', 'subject.id', '=', 'students.ID_subject')
        //         -> where('students.ID_subject', '=', $subject_id)
        //         ->get();
        // return self::get();
        return self::select('students.*', 'subject.name as subject_name')
       ->join('subject', 'subject.id', '=', 'students.ID_subject')
       ->where('students.ID_subject', '=', $subject_id)
       ->paginate(5);
    }
}
