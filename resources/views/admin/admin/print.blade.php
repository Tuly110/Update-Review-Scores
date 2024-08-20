<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title> VKU</title>
<link rel="icon" href="https://haitrieu.com/wp-content/uploads/2022/11/Logo-Truong-Dai-hoc-CNTT-va-Truyen-thong-Viet-Han-Dai-hoc-Da-Nang.png" type="image/x-icon" />

<div class="m-5">
    <div class="title_left">
        <h4> Danh sách điểm phúc khảo môn {{ $getSubject->name }}</h4>
    </div>
    <table class="table table-bordered">
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
                    <td>{{ $loop->iteration }}</td>
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
    <div class="decision" style="float: right;">
        <p class="text-center fw-bold ">Theo Quyết Định <input type="text" style="border: 0" placeholder="Nhập số quyết định"></p>
        <p class="text-center fw-bold ">Người xác nhận danh sách điểm</p>
        <p class="text-center fst-italic fw-lighter ">
            (Kí và ghi rõ họ tên)
            <br>
            <br>
            <br>
           
        </p>
    </div>
</div>
