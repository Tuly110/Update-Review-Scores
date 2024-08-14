<?php

namespace App\Exports;

use App\Http\Controllers\StudentController;
use App\Models\StudentModel;
use App\Models\SubjectModel;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;



class UserExport implements FromView
{
   public $subject_id;
   function __construct($subject_id)
   {
      $this->subject_id = $subject_id;
   }

   public function view():View
   {
      $subject_id = $this->subject_id;
      return view('admin.admin.subject', compact('subject_id'));
   }
   // public function collection()
   // {
   //      return StudentModel::all();
   // }
    
    
}
