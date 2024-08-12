@extends('layouts.app')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          {{-- <h3>Điểm lớp học phần  ({{$getSubject}}) </h3> --}}
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
                    <th style="">MSV</th>
                    <th>Họ và tên</th>
                    <th>Lớp sinh hoạt</th>
                    <th>Điểm chuyên cần</th>
                    <th>Điểm bài tập</th>
                    <th>Điểm giữa kì</th>
                    <th>Điểm cuối kì</th>
                    <th>Điểm T10</th>
                    <th>Điểm chữ</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getRecord as $value )
                    <tr >
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
                      <td></td>
                      <td></td>
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