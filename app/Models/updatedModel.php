<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class updatedModel extends Model
{
    use HasFactory;
    protected $table = 'updated';

    static public function getOnlyUpdate($subject_id)
    {
        $return = self::select('updated.*')
                ->where('updated.ID_subject', '=', $subject_id)
                ->paginate(50);
        // dd($return);
        return $return;
    }

    static public function studentGetUpdated()
    {
        return self::select('updated.update_score')
        ->join('students', 'updated.msv', '=', 'students.MSV')
        ->whereColumn('students.MSV', '=','updated.msv')
        ->get();
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }
}
