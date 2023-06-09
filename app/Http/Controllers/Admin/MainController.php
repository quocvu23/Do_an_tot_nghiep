<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

   public function index()
   {
      $shop = User::where('quyen_id', '2')->where('trangthai', '<>', 2)->count();
      $khachhang = User::where('quyen_id', '3')->count();
      $chuaduyet = User::where('trangthai', '2')->count();
      $danhmuc = DanhMuc::where('trangthai', '1')->count();
      return view('admin.home', compact('shop', 'khachhang', 'chuaduyet', 'danhmuc'), [
         'title' => 'Trang Admin',

      ]);
   }
}
