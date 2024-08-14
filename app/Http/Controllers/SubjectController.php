<?php

namespace App\Http\Controllers;

use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;

class SubjectController extends Controller
{
    public function list()
    {
        $data['getRecord'] = SubjectModel::getSubject();
        $data['header_title'] = "Danh sách học phần";
        return view('admin/admin/subject', $data);

    }
}
