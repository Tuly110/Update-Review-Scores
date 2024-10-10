<?php

namespace App\Http\Controllers;

use App\Models\SubjectModel;

class SubjectController extends Controller
{
    public function list()
    {
        $data['getRecord'] = SubjectModel::getSubject();
        // $data['getRecord'] = SubjectModel::getSearchSubject();
        $data['header_title'] = "Danh sách học phần";
        return view('admin/admin/subject', $data);

    }
}
