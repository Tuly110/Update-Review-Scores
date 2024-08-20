@extends('layouts.app')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
   <form action="" method="post">
    {{ csrf_field() }}
      <div class="">
        <div class="page-title">
          <div class="title_left ">
              <h5>Phúc khảo điểm học phần <b>{{ $getSubject->name }}</b></h5>
              {{-- <h4>Phúc khảo điểm học phần {{ $getStudent->MSV }}</h4> --}}
              {{-- <h4>Phúc khảo điểm học phần {{ $getOnlyUpdate->update_score }}</h4> --}}
              {{-- <h4>Phúc khảo điểm học phần {{ $getRecord->MSV }}</h4> --}}
          </div>
          <div class="title_right">
            <div class="col-md-5 col-sm-5   form-group pull-right top_search">
              <div class="input-group">
                <button type="submit" class="btn btn-success btn-sm" name="add" ><i class="fa fa-check"></i> Lưu điểm </button>
                {{-- <a href="" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Lưu điểm </a>  --}}
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
                <div class="">
                  <div class="">
                    <table class="table projects">
                      <thead>
                        <tr class="text-center" style="background-color: #2A3F54; color: white">
                          <th style="">#</th>
                          <th style="">Mã sinh viên</th>
                          <th>Họ và tên</th>
                          <th>Lớp sinh hoạt</th>
                          <th>Điểm cuối kì</th>
                          <th>Điểm phúc khảo</th>
                          <th>Tình trạng</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($getRecord as $value )
                          <tr class="text-center">
                            <td>
                              <input name="ID" type="text" value="{{ $loop->iteration }}" class="text-center" readonly size="1" style="border: 0;">
                            </td>
                            <td>
                              <input name="MSV" type="text" value="{{ $value->MSV }}" class="text-center" readonly size="5" style="border: 0;">
                            </td>
                            <td>
                              <input name="" type="text" value=" {{ $value->First_Name}} {{ $value->Last_Name}}" class="text-center" readonly size="25" style="border: 0;">
                            </td>
                            <input type="hidden" name="First_Name" value="{{ $value->First_Name}}">
                            <input type="hidden" name="Last_Name" value="{{ $value->Last_Name}}">
                            <input type="hidden" name="ID_subject" value="{{ $value->ID_subject}}">
                            <input type="hidden" name="Dilligence_score" value="{{ $value->Dilligence_score}}">
                            <input type="hidden" name="Midterm_score" value="{{ $value->Midterm_score}}">
                            <td class="project_progress">
                              <input name="Class" type="text" value="{{ $value->Class}}" class="text-center" readonly size="1" style="border: 0;">
                            </td> 
                            <td class="project_progress">
                              <input name="final_score" type="text" value="{{($value->Final_score)}}" class="text-center" readonly size="1" style="border: 0;">
                            </td>
                            <td>
                              <input type="text" name="update_score" size="5">
                            </td>
                            <td>
                                @foreach ($getOnlyUpdate as $key )
                                  @if (strcmp($key->msv, $value->MSV) == 0)
                                    <span class="text-danger font-weight-bold">Đã nhập điểm</span>
                                  @endif
                                @endforeach 
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <div style="padding: 10px;" class="d-flex justify-content-center">
          {!! $getRecord->appends(Request::except('page'))->links() !!}
        </div>
      </div>
   </form>
  </div>
  <!-- /page content -->
@endsection