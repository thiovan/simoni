<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::paginate(12);

        return view("pages.dashboard.type", [
            "types" => $types
        ]);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with("error", "Jenis Laporan gagal ditambahkan.");
        }

        $type = new Type;
        $type->name = strtolower($request->type);
        $type->save();

        return back()->with("success", "Jenis Laporan berhasil ditambahkan.");
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uuid'  => 'required',
            'type'  => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with("error", "Jenis Laporan gagal diubah.");
        }

        $type = Type::where('uuid', $request->uuid)->first();
        if (!$type) {
            return back()->with("error", "Jenis Laporan tidak ditemukan.");
        }
        $type->name = strtolower($request->type);
        $type->save();

        return back()->with("success", "Jenis Laporan berhasil diubah.");
    }

    public function delete($uuid)
    {
        $type = Type::where('uuid', $uuid)->first();
        if (!$type) {
            return back()->with("error", "Jenis Laporan tidak ditemukan.");
        }

        Comment::where('type_id', $type->id)->update(["type_id" => NULL]);

        $type->delete();

        return back()->with("success", "Jenis Laporan berhasil dihapus.");
    }
}
