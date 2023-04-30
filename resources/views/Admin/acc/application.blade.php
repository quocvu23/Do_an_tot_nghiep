@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">STT</th>
                <th>Logo</th>
                <th>Tên Shop</th>
                <th>Chủ Sở Hữu</th>
                <th>Email</th>
                <th>Trạng Thái</th>
                <th>Ngày Tạo</th>

                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($accs as $key => $acc)
                @php
                    $stt = $key + 1;
                @endphp
                <tr>

                    <td>{{ $stt }}</td>
                    <td><a href="{{ $acc->hinhanh }}" target="_blank">
                            <img src="{{ $acc->hinhanh }}" height="40px">
                        </a>
                    </td>
                    <td>{{ $acc->shop_ten }}</td>
                    <td>{{ $acc->user_ten }}</td>
                    <td>{{ $acc->email }}</td>
                    <td>{!! \App\Helpers\Helper::active($acc->trangthai) !!}</td>
                    <td>{{ \Carbon\Carbon::parse($acc->created_at)->isoFormat('DD/MM/YYYY') }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/accs/showappli/{{ $acc->user_id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow({{ $acc->shop_id }}, '/admin/accs/destroyshop')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection