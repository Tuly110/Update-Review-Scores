<?php

namespace App\Http\Controllers;

use App\Models\StudentModel;;
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
        $data['studentGetUpdated']= updatedModel::studentGetUpdated();
        $data['header_title'] = "Danh sách điểm";
        return view('admin/admin/mark', $data);
    }

    // Danh sách điểm phúc khảo
    public function update_score( $id)
    {
        $data['getSubject'] = SubjectModel::getSingle($id);
        $data['subject_id'] = $id;
        $data['getRecord'] = StudentModel::getUpdateScore($id);
        $data['countStudent']= StudentModel::getCountStudent($id);
        $data['getStudent'] = StudentModel::getSingle($id);
        $data['getOnlyUpdate'] = updatedModel::getOnlyUpdate($id);
        $data['header_title'] = "Nhập điểm";
        return view('admin/admin/update_score', $data);
    }

    public function save_score(Request $request, $id)
    {
        $scores = $request->all(); //Lấy tất cả data từ request
        $data = []; //Mảng để chứa dữ liệu các bảng ghi
        //Lặp qua từng bảng ghi trong form
        foreach ($request->MSV as $key => $msv) {
            $data[] = [
                'MSV' => $msv,
                'Class' => $request->Class[$key],
                'First_Name' => $request->First_Name[$key],
                'Last_Name' => $request->Last_Name[$key],
                'ID_subject' => $request->ID_subject[$key],
                'Final_score' => $request->final_score[$key],
                'update_score' => $request->update_score[$key],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        // Dùng phương thức insert để lưu tất cả bản ghi trong 1 câu query
        updatedModel::insert($data);
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
