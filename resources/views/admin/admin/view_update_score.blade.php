@extends('layouts.app')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
            <h4> Danh sách điểm phúc khảo môn {{ $getSubject->name }}</h4>
        </div>
        <div class="title_right">
          <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <div class="input-group">
              <a href="" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> In điểm </a>        
              <a style="background-color: rgb(26, 236, 23); border: 0; color: black" href="" class="btn btn-primary btn-sm"><i class="fa fa-list"></i> Xuất excel </a>  
            </div>
          </div>
        </div>
        <div class="title_right">
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
                    <th>Điểm cuối kì</th>
                    <th>Điểm phúc khảo</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getRecord as $value )
                    <tr class="text-center">
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->msv }}</td>
                      <td>
                        {{ $value->First_Name}} {{ $value->Last_Name}}
                      </td>
                      <td class="project_progress">
                        {{ $value->Class}}
                      </td> 
                      <td>
                        {{ $value->Final_score }}
                      </td>
                      <td class="project_progress">
                        {{ $value->update_score }}
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      {{-- <div style="padding: 10px;" class="d-flex justify-content-center">
        {!! $getRecord->appends(Request::except('page'))->links() !!}
      </div> --}}
    </div>
  </div>
  <!-- /page content -->
@endsection