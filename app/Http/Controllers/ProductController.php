<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\Session;

class ProductController extends Controller
{
    public function delete($productId)
    {
        try {
            $product = Product::findOrFail($productId);
            $product->delete();
            Session::success(__('success_delete') . ' ' . __('product').' '. $product->name);
        } catch (\Throwable $th) {
            if (config('app.debug')) {throw $th;}
            Session::failed(__('failed_delete') . ' ' . __('product'));
        }
        return redirect()->route('product.index');
    }
}
