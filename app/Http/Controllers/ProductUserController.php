<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;

class ProductUserController extends Controller
{
    // protected $productService;

    // public function __construct(ProductService $productService)
    // {
    //     $this->productService = $productService;
    // }

    // public function index($id = '', $slug = '')
    // {
    //     $product = $this->productService->show($id);
    //     $productsMore = $this->productService->more($id);

    //     return view('user.products.detail', [
    //         'title' => $product->name,
    //         'product' => $product,
    //         'products' => $productsMore
    //     ]);
    // }
}
