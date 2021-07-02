<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index()
    {
        $org = DB::table('organizations')
            ->latest('created_at')
            ->get(10)
            ->get();

        return view('index', ['org' => $org]);
    }
}
