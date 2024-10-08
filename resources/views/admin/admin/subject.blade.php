@extends('layouts.app')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Danh sách các lớp học phần </h3>
        </div>
        <form action="">
          <div class="title_right">
            <div class="col-md-5 col-sm-5   form-group pull-right top_search">
              <div class="input-group">
                <input class="form-control me-2" value="{{ Request::get('name') }}" type="search" placeholder="Search for..." aria-label="Search" name="name">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
                <a href="{{ url('admin/admin/subject/') }}" class="btn btn-primary" style="margin-left: 30px">Reset</a>
              </div>
            </div>
          </div>
        </form>
      </div>
      
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_content">
              @include('_message')
              <!-- start project list -->
              <table class="table table-striped projects" >
                <thead>
                  <tr  style="background-color: #2A3F54; color: white">
                    <th style="">#</th>
                    <th style="">Tên lớp học phần</th>
                    <th>Giảng viên</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getRecord as $value )
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>
                        {{ $value->name}}
                      </td>
                      <td class="project_progress">
                        {{ $value->teacher_name}}
                      </td>
                      <td>
                        <a href="{{ url('admin/admin/mark/'.$value->id) }}" class="btn btn-primary btn-sm"> Xem điểm </a>
                        <a href="{{ url('admin/admin/view_update_score/'.$value->id) }}" class="btn btn-success btn-sm"> Xem điểm đã phúc khảo </a> 
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