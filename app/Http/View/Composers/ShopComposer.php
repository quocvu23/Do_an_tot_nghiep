<?php


namespace App\Http\View\Composers;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\View\View;

class ShopComposer
{
    protected $users;

    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $id = Auth::user()->id;
        // lấy từ bảng shop
        $currentuser = User::where('id', $id)->with('shops')->first();
        $shops = $currentuser->shops;
        $view->with('tenShop', $shops->ten);
        $view->with('logo', $shops->hinhanh);
        // lấy từ bảng taikhoan
        $currentuser1 = User::find($id);

        $view->with('ten', $currentuser1->ten);
        $view->with('id', $id);
    }
}
