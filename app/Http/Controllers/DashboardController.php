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

        $categoryTotal = [
            [
                "category"  => "aduan",
                "total"     => $aduanTotal
            ],
            [
                "category"  => "kritik",
                "total"     => $kritikTotal
            ],
            [
                "category"  => "saran",
                "total"     => $saranTotal
            ],
            [
                "category"  => "pujian",
                "total"     => $pujianTotal
            ],
        ];

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
        $comments = Comment::paginate(6);
        $categories = Category::get();
        $types = Type::get();

        return view("pages.dashboard.report", [
            "comments"      => $comments,
            "categories"    => $categories,
            "types"         => $types,
        ]);
    }
}
