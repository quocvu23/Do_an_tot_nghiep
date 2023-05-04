<?php

namespace App\Http\Services;

use App\Models\DanhMuc;


use Illuminate\Support\Facades\Session;

class DanhMucService
{
    // menu ít, k cần phân trang
    public function getParent()
    {
        return DanhMuc::where('danhmuccha', 0)->get();
    }
    // menu nhiều, cần phân trang
    public function getAll()
    {
        return DanhMuc::orderByDesc('id')->paginate(20);
    }

    public function show()
    {
        return DanhMuc::select('ten', 'id')
            ->where('danhmuccha', 0)
            ->orderbyDesc('id')
            ->get();
    }

    public function create($request)
    {
        try {
            DanhMuc::create([
                'ten' => (string) $request->input('name'),
                'danhmuccha' => (int) $request->input('danhmuccha'),
                'trangthai' => 1,

            ]);

            Session::flash('success', 'Tạo Danh mục thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $danhmuc): bool
    {
        if ($request->input('danhmuccha') != $danhmuc->id) {
            $danhmuc->danhmuccha = (string) $request->input('danhmuccha');
        }
        $danhmuc->ten = (string) $request->input('name');
        $danhmuc->trangthai = (string) $request->input('trangthai');
        $danhmuc->save();

        Session::flash('success', 'Cập nhật danh mục thành công');
        return true;
    }

    // public function destroy($request)
    // {
    //     $id = (int) $request->input('id');
    //     $DanhMuc = DanhMuc::where('id', $id)->first();

    //     if ($DanhMuc) {
    //         return DanhMuc::where('id', $DanhMuc->id)->orWhere('danhmuccha', $id)->delete();
    //     }
    //     return false;
    // }

    // public function getId($id)
    // {
    //     return DanhMuc::where('id', $id)->where('trangthai', 1)->firstOrFail();
    // }

    // public function getProduct($DanhMuc)
    // {

    //     return $DanhMuc->products()
    //         ->select('id', 'name', 'price', 'price_sale', 'thumb')
    //         ->where('trangthai', 1)
    //         ->orderBy('id')
    //         ->paginate(12);
    // }
}