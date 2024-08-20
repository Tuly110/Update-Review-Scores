<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;

class UserController extends Controller
{
    public function export_excel()
    {
        $filename = "Diem.xlsx";
        return Excel::download(new UserExport, $filename);
    }
}
