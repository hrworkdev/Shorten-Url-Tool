<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortenedUrl;
use Auth;

class ShortenedUrlController extends Controller
{
    public function shortenUrl(Request $request)
    {
        $user = Auth::user();
        $originalUrl = $request->input('original_url');
        $shortenedUrl = $this->generateShortUrl();

        $user->shortenedUrls()->create([
            'original_url' => $originalUrl,
            'shortened_url' => $shortenedUrl,
        ]);

        return view('shortened_url', ['shortenedUrl' => $shortenedUrl]);
    }

    private function generateShortUrl()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shortUrlLength = 6; 

        $shortenedUrl = substr(str_shuffle($characters), 0, $shortUrlLength);
        

        return $shortenedUrl;
    }

    public function redirectToOriginalUrl($shortenedUrl)
    {
        $url = ShortenedUrl::where('shortened_url', $shortenedUrl)->firstOrFail();
        $url->increment('clicks'); // Increment the clicks count
        return redirect($url->original_url);
    }


 

}
