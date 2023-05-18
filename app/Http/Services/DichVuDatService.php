<?php

namespace App\Http\Services;

use App\Jobs\SendMail;
use App\Models\DichVu;
use App\Models\DichVu_DichVuDat;
use App\Models\DichVuDat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DichVuDatService
{

    public function create($request)
    {
        $dichVuDat = new DichVuDat([
            'shop_id' => $request->input('shop_id'),
            'ten' =>  $request->input('ten'),
            'email' =>  $request->input('email'),
            'sdt' =>  $request->input('sdt'),
            'ngay' =>  $request->input('ngay'),
            'gio' =>  $request->input('gio'),
            'loaithucung' =>  $request->input('loaithucung'),
            'taikhoan_id' =>  $request->input('taikhoan_id'),
            'tongtien' =>  $request->input('tongtien'),
            "trangthai" => 1
        ]);
        $dichVuDat->save();

        $dichvus = $request->input('dichvu');

        foreach ($dichvus as $dichvu_id) {
            $dichVuDat_dv = new DichVu_DichVuDat([
                'dichvudat_id' => $dichVuDat->id,
                'dichvu_id' =>  $dichvu_id,
            ]);
            $dichVuDat_dv->save();
        }
    }
    public function choduyet()
    {
        $current_user = Auth::user();
        // Lấy shop_id của tài khoản hiện tại
        $shop_id = $current_user->shop_id;
        return DichVuDat::where('trangthai', 1)
            ->where('shop_id', $shop_id)->orderBy('ngay')
            ->paginate(10);
    }
    public function daduyet()
    {
        $current_user = Auth::user();
        // Lấy shop_id của tài khoản hiện tại
        $shop_id = $current_user->shop_id;

        return DichVuDat::where('trangthai', 2)
            ->where('shop_id', $shop_id)->orderBy('ngay')
            ->paginate(10);
    }
    public function hoanthanh()
    {
        $current_user = Auth::user();
        // Lấy shop_id của tài khoản hiện tại
        $shop_id = $current_user->shop_id;
        return DichVuDat::where('trangthai', 3)
            ->where('shop_id', $shop_id)->orderBy('ngay')
            ->paginate(10);
    }
    public function duyet($request, $lichdatdv)
    {
        $lichdatdv->nhanvien_id = $request->input('nhanvien');
        $lichdatdv->trangthai = $request->input('trangthai');
        $lichdatdv->save();

        Session::flash('success', 'Duyệt thành công');
        #Queue
        SendMail::dispatch($request->input('email'))->delay(now()->addSeconds(5));
        return true;
    }
    public function list()
    {
        $taikhoan_id = Auth::user()->id;

        return DichVuDat::where('taikhoan_id', '=', $taikhoan_id)->orderBy('trangthai')
            ->paginate(10);
    }
    public function update($request, $lichdatdv)
    {
        $lichdatdv->fill($request->input());
        $lichdatdv->save();

        Session::flash('success', 'Duyệt thành công');
        return true;
    }
}
