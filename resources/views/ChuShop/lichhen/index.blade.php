@extends('ChuShop.main')
@section('content')
    <main class="content" style="height: 1000px">
        @include('admin.alert')
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block mt-4">
                            <div class="row">
                                <div class="col-md-10">
                                    <h3 style="margin-bottom: 50px">Danh sách đặt dịch vụ</h3>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="menu">Trạng thái</label>
                                        <select class="form-control" style="width: 150px;" onchange="handleChange(this)">
                                            <option value="" disabled selected>Chọn trạng thái</option>
                                            <option value="/ChuShop/lichdatdvs/list">Chờ Duyệt</option>
                                            <option value="/ChuShop/lichdatdvs/list_daduyet">Đã Duyệt</option>
                                            <option value="/ChuShop/lichdatdvs/list_hoanthanh">Hoàn Thành</option>
                                        </select>

                                        <script>
                                            function handleChange(select) {
                                                var url = select.value;
                                                if (url) {
                                                    window.location.href = url;
                                                }
                                            }
                                        </script>

                                    </div>
                                </div>
                            </div>



                            @if (count($lichdatdvs) > 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">STT</th>
                                            <th style="width: 50px">Ảnh đại diện</th>
                                            <th>Tên Khách Hàng</th>
                                            <th>Số điện thoại</th>
                                            <th>Số lượng dịch vụ</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng Thái</th>
                                            <th>Ngày Tạo</th>

                                            <th style="width: 80px">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($lichdatdvs as $key => $lichdatdv)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td><a href="{{ $lichdatdv->hinhanh }}" target="_blank">
                                                        <img src="{{ $lichdatdv->taikhoans->hinhanh }}" height="30px">
                                                    </a>
                                                </td>
                                                <td>{{ $lichdatdv->ten }}</td>

                                                <td>{{ $lichdatdv->sdt }}</td>
                                                <td>{{ $soluongdv }}</td>
                                                <td>{{ number_format($lichdatdv->tongtien) }}VNĐ</td>
                                                <td>{!! \App\Helpers\Helper::trangthai_lichdat($lichdatdv->trangthai) !!}</td>
                                                <td>{{ \Carbon\Carbon::parse($lichdatdv->created_at)->isoFormat('DD/MM/YYYY HH:mm:ss') }}
                                                </td>
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm"
                                                        href="/ChuShop/lichdatdvs/edit/{{ $lichdatdv->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    {{-- <a href="#" class="btn btn-danger btn-sm"
                                                    onclick="removeRow({{ $lichdatdv->id }}, '/admin/accs/destroy')">
                                                    <i class="fas fa-trash"></i>
                                                </a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-info">
                                    Tất cả các lịch đặt dịch vụ đã được duyệt.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.footer')
    </main>
@endsection
