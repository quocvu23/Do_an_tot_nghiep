@extends('ChuShop.main')
@section('content')
    <main class="content" style="height: 1000px">
        @include('admin.alert')
        <div class="row">

            <div class="col-12 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="col-4">
                            <div class="form-group">
                                <div class="input-group input-group-merge search-bar">
                                    <span class="input-group-text" id="topbar-addon">
                                        <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control" id="searchInputName"
                                        placeholder="Nhập tên khách hàng" aria-label="Search"
                                        aria-describedby="topbar-addon">
                                </div>
                            </div>
                        </div>
                        <div class="row d-block mt-4">
                            <div class="row">
                                <div class="col-md-10">
                                    <h3 style="margin-bottom: 50px">Danh sách đặt dịch vụ</h3>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="menu"><i class="fa-solid fa-filter"></i> Trạng thái</label>

                                        <select class="form-control" style="width: 120px" onchange="handleChange(this)">
                                            {{-- <option>VV</option> --}}
                                            <option value="/ChuShop/lichdatdvs/list?status=1"
                                                {{ $status == 1 ? 'selected' : '' }}>
                                                Chờ Duyệt</option>
                                            <option value="/ChuShop/lichdatdvs/list?status=2"
                                                {{ $status == 2 ? 'selected' : '' }}>
                                                Đã Duyệt</option>
                                            <option value="/ChuShop/lichdatdvs/list?status=3"
                                                {{ $status == 3 ? 'selected' : '' }}>
                                                Hoàn Thành</option>
                                            <option value="/ChuShop/lichdatdvs/list?status=4"
                                                {{ $status == 4 ? 'selected' : '' }}>
                                                Đã Từ Chối</option>

                                        </select>



                                    </div>
                                </div>
                            </div>



                            @if (count($lichdatdvs) > 0)
                                <div style='overflow-x:scroll'>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">STT</th>
                                                <th style="width: 50px">Ảnh đại diện</th>
                                                <th>Tên Khách Hàng</th>
                                                <th>Số điện thoại</th>
                                                <th>Số lượng</th>
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
                                                    <td>{{ $lichdatdv->soluongdv }}</td>
                                                    <td>{{ number_format($lichdatdv->tongtien) }}VNĐ</td>
                                                    <td>{!! \App\Helpers\Helper::trangthai_lichdat($lichdatdv->trangthai) !!}</td>
                                                    <td>{{ \Carbon\Carbon::parse($lichdatdv->created_at)->isoFormat('HH:mm:ss DD/MM/YYYY') }}
                                                    </td>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm"
                                                            href="{{ $status == 1
                                                                ? '/ChuShop/lichdatdvs/edit/' . $lichdatdv->id
                                                                : ($status == 2
                                                                    ? '/ChuShop/lichdatdvs/edit_daduyet/' . $lichdatdv->id
                                                                    : ($status == 3
                                                                        ? '/ChuShop/lichdatdvs/edit_hoanthanh/' . $lichdatdv->id
                                                                        : '/ChuShop/lichdatdvs/edit_tuchoi/' . $lichdatdv->id)) }}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>



                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
        <div id="noResultsMessage" class="alert alert-danger d-none text-center">Không tìm thấy kết quả.</div>
        @include('admin.footer')
    </main>
@endsection
<script>
    function handleChange(select) {
        var url = select.value;
        console.log(select.value);
        if (url) {
            window.location.href = url;
        }
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var searchInput = document.getElementById("searchInputName");
        searchInput.addEventListener("input", searchByName);

        function searchByName() {
            var searchValue = searchInput.value.toLowerCase();

            var tableRows = document.querySelectorAll(".table tbody tr");
            var noResultsMessage = document.getElementById("noResultsMessage");
            var hasResults = false;

            tableRows.forEach(function(row) {
                var nameColumn = row.querySelector("td:nth-child(3)");
                var name = nameColumn.innerText.toLowerCase();

                if (name.includes(searchValue)) {
                    row.style.display = "table-row";
                    hasResults = true;
                } else {
                    row.style.display = "none";
                }
            });

            if (hasResults) {
                noResultsMessage.classList.add("d-none");
            } else {
                noResultsMessage.classList.remove("d-none");
            }
        }
    });
</script>
