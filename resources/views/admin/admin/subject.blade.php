@extends('layouts.app')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Danh sách các lớp học phần </h3>
        </div>
        <div class="title_right">
          <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
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
                  <tr>
                    <th style="">STT</th>
                    <th style="">Tên lớp học phần</th>
                    <th>Giảng viên</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getRecord as $value )
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>
                        {{ $value->name}}
                      </td>
                      <td class="project_progress">
                        {{ $value->teacher_name}}
                      </td>
                      <td>
                        <a href="{{ url('admin/admin/mark/'.$value->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-folder"></i> Xem điểm </a>
                        <a href="#" class="btn btn-info btn-sm"><i class="fa fa-th-list"></i> Xem điểm phúc khảo </a>
                        <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-sign-in"></i> Excel </a>
                        
                      </td>
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