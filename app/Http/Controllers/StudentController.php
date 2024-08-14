<?php

namespace App\Http\Controllers;

use App\Models\StudentModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function list($id)
    {
        $data['getSubject'] = SubjectModel::getSingle($id);
        $data['subject_id'] = $id;
        $data['getRecord'] = StudentModel::getStudent($id);
        $data['header_title'] = "Danh sách điểm";
        return view('admin/admin/mark', $data);
    }

    public function update_score( $id)
    {
        $data['getSubject'] = SubjectModel::getSingle($id);
        $data['subject_id'] = $id;
        $data['getUpdateScore'] = StudentModel::getUpdateScore($id);
        $data['header_title'] = "Nhập điểm";
        return view('admin/admin/update_score', $data);
    }

    
}
