@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">STT</th>
                <th>Ảnh đại diện</th>
                <th>Tên shops</th>

                <th>Tiền</th>
                <th>Ngày Thêm</th>
                {{-- <th style="width: 100px">&nbsp;</th> --}}
            </tr>
        </thead>
        <tbody>

            @foreach ($phithus as $key => $phithu)
                @php
                    $stt = $key + 1;
                @endphp
                <tr>
                    <td>{{ $stt }}</td>
                    <td><a href="{{ $phithu->shops->hinhanh }}" target="_blank">
                            <img src="{{ $phithu->shops->hinhanh }}" height="40px">
                        </a>
                    </td>
                    <td>{{ $phithu->shops->ten }}</td>

                    <td>{{ $phithu->tien }}</td>
                    <td>{{ \Carbon\Carbon::parse($phithu->created_at)->isoFormat('DD/MM/YYYY') }}</td>

                    {{-- <td>

                        <a class="btn btn-primary btn-sm" href="/admin/accs/edit/{{ $phithu->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow({{ $phithu->id }}, '/admin/accs/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
