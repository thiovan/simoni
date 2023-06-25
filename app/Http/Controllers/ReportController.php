<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Type;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $comments = Comment::with(["account", "type", "category", "keyword_match", "keyword_match.keyword"]);

        if ($request->has('search')) {
            $comments = $comments->where('text', 'LIKE', '%' . $request->search . '%')
                ->orWhere('sender', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->has('sosmed')) {
            $comments = $comments->whereHas('account', function ($q) use ($request) {
                $q->whereIn('uuid', $request->sosmed);
            });
        }

        if ($request->has('type')) {
            $comments = $comments->whereHas('type', function ($q) use ($request) {
                $q->whereIn('uuid', $request->type);
            });
        }

        if ($request->has('category')) {
            $comments = $comments->whereHas('category', function ($q) use ($request) {
                $q->whereIn('uuid', $request->category);
            });
        }

        if ($request->has('sort')) {
            $comments = $comments->orderBy(explode(":", $request->sort)[0], explode(":", $request->sort)[1]);
        } else {
            $comments = $comments->orderBy('datetime', 'DESC');
        }

        $comments = $comments->paginate(8);
        $categories = Category::orderby("name", "ASC")->get();
        $types = Type::orderby("name", "ASC")->get();
        $accounts = Account::orderby("sosmed", "ASC")->get();

        return view("pages.dashboard.report", [
            "comments"      => $comments,
            "categories"    => $categories,
            "types"         => $types,
            "accounts"      => $accounts
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
