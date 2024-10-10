@extends('layouts.app')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
            <h5>Danh sách học phần <b>{{ $getSubject->name }}</b></h5>
        </div>
        <div class="title_right">
          <a href="{{ url('admin/admin/update_score/'.$getSubject->id) }}" class="btn btn-primary btn-sm">Nhập điểm </a>        
        </div>
      </div>
      <div class="clearfix"></div>
      @include('_message')
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_content">
              <table class="table table-striped projects" >
                <thead>
                  <tr class="text-center" style="background-color: #2A3F54; color: white">
                    <th style="">#</th>
                    <th style="">Mã sinh viên</th>
                    <th>Họ và tên</th>
                    <th></th>
                    <th>Lớp sinh hoạt</th>
                    <th>Điểm chuyên cần</th>
                    <th>Điểm bài tập</th>
                    <th>Điểm giữa kì</th>
                    <th>Điểm cuối kì</th>
                    <th>Điểm đã phúc khảo</th>
                    <th>Điểm trung bình</th>
                    <th>Điểm chữ</th>
                  </tr>
                </thead>
                <tbody>
                  <tr> 
                    @foreach ($getRecord as $value )
                      <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td><b>{{ $value->MSV }}</b></td>
                        <td>
                          {{ $value->First_Name}} 
                        </td>
                        <td>
                          <b>{{ $value->Last_Name}}</b>
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
                        <td class="project_progress">
                            {{ $value->update_score}}
                        </td>
                        <td>
                          @if($value->update_score)
                            {{ $result = ($value->Midterm_score * 0.2)+
                              ($value->update_score *0.6)+
                              ($value->Dilligence_score*0.1)+
                              ($value->Exercise_score*0.1) }} 
                          @else
                            {{ $result = ($value->Midterm_score * 0.2)+
                              ($value->Final_score *0.6)+
                              ($value->Dilligence_score*0.1)+
                              ($value->Exercise_score*0.1) }} 
                          @endif
                        </td>
                        <td>
                          @if($value->update_score)
                            @if ((0 <= 
                              ($value->Midterm_score * 0.2)+
                              ($value->update_score *0.6)+
                              ($value->Dilligence_score*0.1)+
                              ($value->Exercise_score*0.1)) 
                              && 
                              (($value->Midterm_score * 0.2)+
                              ($value->update_score *0.6)+
                              ($value->Dilligence_score*0.1)+
                              ($value->Exercise_score*0.1) <=3.5) )
                              <span class="text-danger font-weight-bold">F</span>  
                            @elseif ((3.6 <= 
                              ($value->Midterm_score * 0.2)+
                              ($value->update_score *0.6)+
                              ($value->Dilligence_score*0.1)+
                              ($value->Exercise_score*0.1))
                              &&
                              (($value->Midterm_score * 0.2)+
                              ($value->update_score *0.6)+
                              ($value->Dilligence_score*0.1)+
                              ($value->Exercise_score*0.1) <=4.9) )
                              <span class="text-warning font-weight-bold">D</span> 
                            @elseif ((5 <= 
                              ($value->Midterm_score * 0.2)+
                              ($value->update_score *0.6)+
                              ($value->Dilligence_score*0.1)+
                              ($value->Exercise_score*0.1)) 
                              &&
                              (($value->Midterm_score * 0.2)+
                              ($value->update_score *0.6)+
                              ($value->Dilligence_score*0.1)+
                              ($value->Exercise_score*0.1) <=6.9) )
                              <span class="text-info font-weight-bold">C</span> 
                            @elseif ((7 <= 
                              ($value->Midterm_score * 0.2)+
                              ($value->update_score *0.6)+
                              ($value->Dilligence_score*0.1)+
                              ($value->Exercise_score*0.1)) 
                              && 
                              (($value->Midterm_score * 0.2)+
                              ($value->update_score *0.6)+
                              ($value->Dilligence_score*0.1)+
                              ($value->Exercise_score*0.1) <=8.4) )
                              <span class="text-primary font-weight-bold">B</span> 
                            @else 
                              <span class="text-success font-weight-bold">A</span> 
                            @endif
                          @else
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
                          @endif
                          
                        </td>
                      </tr>
                    @endforeach
                  </tr>   
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