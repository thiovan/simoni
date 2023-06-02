<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PlaygroundController extends Controller
{
    public function index()
    {
        return response()->json([
            "pass" => Hash::make("admin")
        ]);
    }
}
