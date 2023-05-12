<?php


namespace App\Helpers;

use Illuminate\Support\Str;

class Helper
{
    public static function danhmuc($danhmucs)
    {
        $html = '';

        foreach ($danhmucs as $key => $danhmuc) {

            $html .= '
                    <tr>
                        <td>' . ++$key . '</td>
                        <td>'  . $danhmuc->ten . '</td>
                        <td>'  . $danhmuc->tieude . '</td>

                      
                        <td>' . self::trangthai($danhmuc->trangthai) . '</td>
                       
                        <td>' . \Carbon\Carbon::parse($danhmuc->created_at)->isoFormat('DD/MM/YYYY') . '</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/admin/danhmucs/edit/' . $danhmuc->id . '">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow(' . $danhmuc->id . ', \'/admin/danhmucs/destroy\')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                ';
        }

        return $html;
    }

    public static function trangthai($trangthai = 0): string
    {
        return $trangthai == 0 ? '<span class="btn btn-danger btn-xs">KHÓA</span>'
            : ($trangthai == 2 ? '<span class="btn btn-warning btn-xs">CHỜ DUYỆT</span>'
                : '<span class="btn btn-success btn-xs">KÍCH HOẠT</span>');
    }

    public static function danhmucs($danhmucs): string
    {
        $html = '<ul>';
        foreach ($danhmucs as $danhmuc) {
            $html .= '<li>
            <a href="/danh-muc/' . $danhmuc->id . '-' . Str::slug($danhmuc->ten, '-') . '.html">' . $danhmuc->ten . '</a>
            </li>';
        }
        $html .= '</ul>';
        return $html;
    }

    public static function gia($gia)
    {
        return number_format($gia);
    }
}
