<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Type;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $comments = Comment::with(["account", "type", "category", "keyword_match", "keyword_match.keyword"])
                ->where('text', 'LIKE', '%' . $request->search . '%')
                ->orWhere('sender', 'LIKE', '%' . $request->search . '%')
                ->orderBy('datetime', 'DESC')
                ->paginate(8);
        } else {
            $comments = Comment::with(["account", "type", "category", "keyword_match", "keyword_match.keyword"])
                ->orderBy('datetime', 'DESC')
                ->paginate(8);
        }

        $categories = Category::get();
        $types = Type::get();

        return view("pages.dashboard.report", [
            "comments"      => $comments,
            "categories"    => $categories,
            "types"         => $types,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'uuid' => 'required',
        ]);

        $category = Category::where('uuid', $request->category)->first();
        if ($category) {
            $category = $category->id;
        }

        $type = Type::where('uuid', $request->type)->first();
        if ($type) {
            $type = $type->id;
        }

        $comment = Comment::where('uuid', $request->uuid)->first();
        $comment->category_id = $category;
        $comment->type_id = $type;
        $comment->save();

        return back()->with("message", "Data berhasil disimpan.");
    }
}
