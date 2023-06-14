<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(12);

        return view("pages.dashboard.category", [
            "categories" => $categories
        ]);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with("error", "Kategori gagal disimpan.");
        }

        $category = new Category;
        $category->name = strtolower($request->category);
        $category->save();

        return back()->with("success", "Kategori berhasil disimpan.");
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uuid'      => 'required',
            'category'  => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with("error", "Kategori gagal disimpan.");
        }

        $category = Category::where('uuid', $request->uuid)->first();
        if (!$category) {
            return back()->with("error", "Kategori tidak ditemukan.");
        }
        $category->name = strtolower($request->category);
        $category->save();

        return back()->with("success", "Kategori berhasil disimpan.");
    }

    public function delete($uuid)
    {
        $category = Category::where('uuid', $uuid)->first();
        if (!$category) {
            return back()->with("error", "Kategori tidak ditemukan.");
        }

        Comment::where('category_id', $category->id)->update(["category_id" => NULL]);

        $category->delete();

        return back()->with("success", "Kategori berhasil dihapus.");
    }
}