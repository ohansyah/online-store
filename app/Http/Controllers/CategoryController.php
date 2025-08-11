<?php

namespace App\Http\Controllers;

use App\Services\Session;
use App\Models\Category;

class CategoryController extends Controller
{
    public function delete($categoryId)
    {
        try {
            $category = Category::findOrFail($categoryId);
            $category->delete();
            Session::success(__('success_delete') . ' ' . __('category').' '. $category->name);
        } catch (\Throwable $th) {
            Session::failed(__('failed_delete') . ' ' . __('category'). '. ' . $th->getMessage());
        }
        return redirect()->route('category.index');
    }
}
