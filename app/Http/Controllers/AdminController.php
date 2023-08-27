<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortenedURL;

class AdminController extends Controller
{
    public function dashboard()
    {
        $shortenedURLs = ShortenedURL::latest()->get();
        return view('admin.dashboard', ['shortenedURLs' => $shortenedURLs]);
    }

    
}
