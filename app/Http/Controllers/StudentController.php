<?php

namespace App\Http\Controllers;

use App\Models\StudentModel;
use App\Models\SubjectModel;
use App\Models\updatedModel;
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
        $data['getRecord'] = StudentModel::getUpdateScore($id);
        $data['getStudent'] = StudentModel::getSingle($id);
        $data['getOnlyUpdate'] = updatedModel::getOnlyUpdate($id);
        $data['header_title'] = "Nhập điểm";
        return view('admin/admin/update_score', $data);
    }

    public function save_score(Request $request, $id)
    {
        $save = new updatedModel();
        $save->MSV = $request->MSV;
        $save->Class = $request->Class;
        $save->First_Name = $request->First_Name;
        $save->Last_Name = $request->Last_Name;
        $save->ID_subject = $request->ID_subject;
        $save->Final_score =$request->final_score;
        $save->update_score = $request->update_score;
        $save->save();
        return redirect('admin/admin/mark/'.$id)->with('success', "Lưu điểm phúc khảo thành công");
    }

    public function view_update_score($id)
    {
        $data['getSubject'] = SubjectModel::getSingle($id);
        $data['subject_id'] = $id;
        $data['getRecord'] = updatedModel::getOnlyUpdate($id);
        $data['header_title'] = "Danh sách sinh viên đã phúc khảo điểm";
        return view('admin/admin/view_update_score', $data);
    }

    public function print($id)
    {
        $data['getSubject'] = SubjectModel::getSingle($id);
        $data['subject_id'] = $id;
        $data['getRecord'] = updatedModel::getOnlyUpdate($id);
        $data['header_title'] ="In danh sách điểm";
        return view('admin/admin/print', $data);
    }

    
}
