<?php

namespace App\Http\Services;

use App\Models\DanhMuc;
use App\Models\DichVu;
use Illuminate\Support\Facades\Session;

class DanhMucService
{
    public function getdichvu()
    {
        return DanhMuc::where('trangthai', 1)
            ->get();
    }
    public function getbanner()
    {
        return DichVu::where('trangthai', 1)
            ->get();
    }

    public function getAll()
    {
        return DanhMuc::where('trangthai', 1)
            ->get();
    }

    public function show()
    {
        return DanhMuc::select('ten', 'id')

            ->where('trangthai', 1)
            ->orderbyDesc('id')
            ->get();
    }


    public function create($request)
    {
        try {
            DanhMuc::create([
                'ten' =>  $request->input('name'),
                'tieude' =>  $request->input('tieude'),
                'mota' =>  $request->input('content'),
                'trangthai' => 1,

            ]);

            Session::flash('success', 'Tạo Danh mục thành công');
        } catch (\Exception) {
            Session::flash('error', 'Tạo Danh mục lỗi');
            return false;
        }
        return true;
    }

    public function update($request, $danhmuc): bool
    {
        $danhmuc->ten = $request->input('name');
        $danhmuc->tieude =  $request->input('tieude');
        $danhmuc->mota =  $request->input('content');
        $danhmuc->trangthai = $request->input('trangthai');
        $danhmuc->save();
        Session::flash('success', 'Cập nhật danh mục thành công');
        return true;
    }

    public function destroy($request)
    {
        $id = (int) $request->input('id');
        $DanhMuc = DanhMuc::where('id', $id)->first();

        if ($DanhMuc) {
            return DanhMuc::where('id', $DanhMuc->id)->delete();
        }
        return false;
    }




    // admin
    public function getId($id)
    {
        return DanhMuc::where('id', $id)->where('trangthai', 1)->firstOrFail();
    }
}
