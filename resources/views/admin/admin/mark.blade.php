@extends('layouts.app')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
            <h4>Danh sách học phần {{ $getSubject->name }}</h4>
        </div>
        <div class="title_right">
          <a href="{{ url('admin/admin/update_score/'.$getSubject->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-unlock"></i> Nhập điểm </a>        
        </div>
      </div>
      <div class="clearfix"></div>
      @include('_message')
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_content">
              <!-- start project list -->
              <table class="table table-striped projects" >
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
                    <th>Điểm trung bình</th>
                    <th>Điểm chữ</th>
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
                      <td class="project_progress">
                        {{ $value->Dilligence_score}}
                      </td> 
                      </td> <td class="project_progress">
                        {{ $value->Exercise_score}}
                      </td> 
                      <td class="project_progress">
                        {{ $value->Midterm_score}}
                      </td>
                      <td class="project_progress">
                        {{ $value->Final_score}}
                      </td>
                      <td>
                        {{ $result = ($value->Midterm_score * 0.2)+
                          ($value->Final_score *0.6)+
                          ($value->Dilligence_score*0.1)+
                          ($value->Exercise_score*0.1) }} 
                      </td>
                      <td>
                        @if ((0 <= 
                          ($value->Midterm_score * 0.2)+
                          ($value->Final_score *0.6)+
                          ($value->Dilligence_score*0.1)+
                          ($value->Exercise_score*0.1)) 
                          && 
                          (($value->Midterm_score * 0.2)+
                          ($value->Final_score *0.6)+
                          ($value->Dilligence_score*0.1)+
                          ($value->Exercise_score*0.1) <=3.5) )
                          <span class="text-danger font-weight-bold">F</span>  
                        @elseif ((3.6 <= 
                          ($value->Midterm_score * 0.2)+
                          ($value->Final_score *0.6)+
                          ($value->Dilligence_score*0.1)+
                          ($value->Exercise_score*0.1))
                          &&
                          (($value->Midterm_score * 0.2)+
                          ($value->Final_score *0.6)+
                          ($value->Dilligence_score*0.1)+
                          ($value->Exercise_score*0.1) <=4.9) )
                          <span class="text-warning font-weight-bold">D</span> 
                        @elseif ((5 <= 
                          ($value->Midterm_score * 0.2)+
                          ($value->Final_score *0.6)+
                          ($value->Dilligence_score*0.1)+
                          ($value->Exercise_score*0.1)) 
                          &&
                          (($value->Midterm_score * 0.2)+
                          ($value->Final_score *0.6)+
                          ($value->Dilligence_score*0.1)+
                          ($value->Exercise_score*0.1) <=6.9) )
                          <span class="text-info font-weight-bold">C</span> 
                        @elseif ((7 <= 
                          ($value->Midterm_score * 0.2)+
                          ($value->Final_score *0.6)+
                          ($value->Dilligence_score*0.1)+
                          ($value->Exercise_score*0.1)) 
                          && 
                          (($value->Midterm_score * 0.2)+
                          ($value->Final_score *0.6)+
                          ($value->Dilligence_score*0.1)+
                          ($value->Exercise_score*0.1) <=8.4) )
                          <span class="text-primary font-weight-bold">B</span> 
                        @else 
                          <span class="text-success font-weight-bold">A</span> 
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
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