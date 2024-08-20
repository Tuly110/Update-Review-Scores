<?php

namespace App\Exports;

use App\Models\updatedModel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UserExport implements FromCollection
{
   // use Exportable;
   // private $updated;
   // public function __construct()
   // {
   //    $this->updated = updatedModel::all();
   // }

   // public function view():View
   // {
   //    return view('admin/admin/view_update_score', [
   //       'updated' => $this->updated
   //    ]);
   // }

   public function collection()
   {
      return updatedModel::all();
   }
    
}
