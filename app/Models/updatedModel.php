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
                ->paginate(5);
        // dd($return);
        return $return;
    }
    static public function getSingle($id)
    {
        return self::find($id);
    }
}
