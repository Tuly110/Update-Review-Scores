@extends('layouts.app')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
            <h4>Danh sách học phần {{ $getSubject->name }}</h4>
        </div>
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
          <div class="input-group">
            <a href="{{ url('admin/admin/update_score/'.$getSubject->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-sign-in"></i> Nhập điểm </a> 
          </div>
        </div>
        </div>
      </div>
      
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_content">
              <!-- start project list -->
              <table class="table table-striped projects">
                <thead>
                  <tr class="text-center">
                    <th style="">STT</th>
                    <th style="">MSV</th>
                    <th>Họ và tên</th>
                    <th>Lớp sinh hoạt</th>
                    <th>Điểm chuyên cần</th>
                    <th>Điểm bài tập</th>
                    <th>Điểm giữa kì</th>
                    <th>Điểm cuối kì</th>
                    <th>Điểm T10</th>
                    <th>Điểm chữ</th>
                    <th>Phúc khảo</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getRecord as $value )
                    <tr class="text-center">
                      <td>{{ $value->ID }}</td>
                      <td>{{ $value->MSV }}</td>
                      <td>
                        {{ $value->First_Name}} {{ $value->Last_Name}}
                      </td>
                      <td class="project_progress">
                        {{ $value->Class}}
                      </td> 
                      {{-- <td class="project_progress">
                        {{ $value->ID_subject}}
                      </td>  --}}
                      <td class="project_progress">
                        {{ $value->Dilligence_score}}
                      </td> 
                      </td> <td class="project_progress">
                        {{ $value->Exercise_score}}
                      </td> 
                      <td class="project_progress">
                        {{ $value->Midterm_score}}
                      </td>
                      <td>
                        {{ $value->Final_score}}
                      </td>
                      <td class="project_progress">
                        {{ $result = ($value->Midterm_score * 0.2)+
                        ($value->Final_score *0.6)+
                        ($value->Dilligence_score*0.1)+
                        ($value->Exercise_score*0.1) }} 
                      </td>
                      <td>
                        {{-- {{ $getUpdateScore->MSV }} --}}
                      </td>
                      <td></td>
                      
                    </tr>
                  @endforeach
                 
                </tbody>
              </table>
              
              <!-- end project list -->

            </div>
          </div>
        </div>
      </div>
      <div style="padding: 10px;" class="d-flex justify-content-center">
        {!! $getRecord->appends(Request::except('page'))->links() !!}
      </div>
    </div>
  </div>
  <!-- /page content -->
@endsection