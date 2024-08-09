<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    use HasFactory;
    // Database
    protected $table = 'subject';
    static public function getSubject()
    {
        $return = self::select('subject.*')
                ->where('is_deleted', '=', 0)
                ->paginate(3);
        return $return;
    }
}
