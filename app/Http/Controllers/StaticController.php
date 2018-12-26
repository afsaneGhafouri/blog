<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function index(Request $request, string $media)
    {
        $data = [
            'title' => 'Juni',
            'name' => $media
        ];
        return view('static', compact('data'));
    }
}
