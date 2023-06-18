<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $aduanTotal = Comment::whereHas('type', function ($query) {
            return $query->where('name', 'aduan');
        })->count();

        $kritikTotal = Comment::whereHas('type', function ($query) {
            return $query->where('name', 'kritik');
        })->count();

        $saranTotal = Comment::whereHas('type', function ($query) {
            return $query->where('name', 'saran');
        })->count();

        $pujianTotal = Comment::whereHas('type', function ($query) {
            return $query->where('name', 'pujian');
        })->count();

        $categoryTotal = [];
        $categories = Category::get();
        foreach ($categories as $category) {
            $total = Comment::where('category_id', $category->id)->count();
            array_push($categoryTotal, [
                "category"  => $category->name,
                "total"     => $total
            ]);
        }

        $graphTotal = [];
        for ($i = 0; $i <= 5; $i++) {
            $currentDate = Carbon::now()->startOfMonth()->subMonth($i);
            $currentMonthName = $currentDate->format('m/y');

            $total = Comment::where([
                [DB::raw('month(datetime)'), $currentDate->month],
                [DB::raw('year(datetime)'), $currentDate->year],
            ])->get();

            array_push($graphTotal, [
                "month" => $currentMonthName,
                "total" => $total->count()
            ]);
        }

        return view('pages.dashboard.home', [
            "aduanTotal"    => $aduanTotal,
            "kritikTotal"   => $kritikTotal,
            "saranTotal"    => $saranTotal,
            "pujianTotal"   => $pujianTotal,
            "graphTotal"    => array_reverse($graphTotal),
            "categoryTotal" => $categoryTotal
        ]);
    }

    public function report()
    {
        $comments = Comment::with(["account", "type", "category", "keyword_match", "keyword_match.keyword"])
            ->orderBy('datetime', 'DESC')
            ->paginate(8);
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
