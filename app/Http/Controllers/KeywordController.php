<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use App\Models\KeywordMatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KeywordController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $keywords = Keyword::where('text', 'LIKE', '%' . $request->search . '%')
            ->orderby('text', 'ASC')
            ->paginate(12);
        } else {
            $keywords = Keyword::orderby('text', 'ASC')->paginate(12);
        }

        return view("pages.dashboard.keyword", [
            "keywords" => $keywords
        ]);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'keyword' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with("error", "Kata Kunci gagal ditambahkan.");
        }

        $keyword = new Keyword;
        $keyword->text = strtolower($request->keyword);
        $keyword->save();

        return back()->with("success", "Kata Kunci berhasil ditambahkan.");
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uuid'     => 'required',
            'keyword'  => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with("error", "Kata Kunci gagal diubah.");
        }

        $keyword = Keyword::where('uuid', $request->uuid)->first();
        if (!$keyword) {
            return back()->with("error", "Kata Kunci tidak ditemukan.");
        }
        $keyword->text = strtolower($request->keyword);
        $keyword->save();

        return back()->with("success", "Kata Kunci berhasil diubah.");
    }

    public function delete($uuid)
    {
        $keyword = Keyword::where('uuid', $uuid)->first();
        if (!$keyword) {
            return back()->with("error", "Kata Kunci tidak ditemukan.");
        }

        KeywordMatch::where("keyword_id", $keyword->id)->delete();

        $keyword->delete();

        return back()->with("success", "Kata Kunci berhasil dihapus.");
    }
}
