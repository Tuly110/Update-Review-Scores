<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Request;

class SubjectModel extends Model
{
    use HasFactory;
    // Database
    protected $table = 'subject';
    static public function getSubject()
    {
        $return = self::select('subject.*')
        ->where('is_deleted', '=', 0);
        if(!empty(Request::get('name')))
        {
            $return = $return->where('name', 'like','%'.Request::get('name').'%');
        }
        $return = $return->orderBy('subject.id', 'asc')
        // Phan trang
        ->paginate(50);

        // dd($return);
        return $return;
    }

    // static public function getSearchSubject()
    // {
    //     $return = self::select('subject.*')
    //     ->where('is_deleted', '=', 0);
    //     if(!empty(Request::get('name')))
    //     {
    //         $return = $return->where('name', 'like','%'.Request::get('name').'%');
    //     }
    //     return $return;
        
    // }

    static public function getSingle($id)
    {
        return self::find($id);
    }
}
