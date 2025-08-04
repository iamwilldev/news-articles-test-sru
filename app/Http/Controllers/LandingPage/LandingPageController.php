<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsArticle;
use Illuminate\Support\Facades\Storage;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        $query = NewsArticle::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', '%' . $search . '%');
        }

        $articles_count = $query->count();
        $articles = $query->latest()->paginate(9);

        foreach ($articles as $article) {
            $path = $article->image;

            if (!$path || !Storage::disk('public')->exists($path)) {
                $article->image_url = asset('assets/images/bg-articles.jpg');
            } else {
                $article->image_url = asset('storage/' . $path);
            }
        }

        return view('landingpage.index', compact('articles', 'articles_count'));
    }

    public function show($id)
    {
        $article = NewsArticle::findOrFail($id);

        if ($article->image) {
            $path = $article->image;
            if (!Storage::disk('public')->exists($path)) {
                $article->image_url = asset('assets/images/bg-articles.jpg');
            } else {
                $article->image_url = asset('storage/' . $path);
            }
        } else {
            $article->image_url = asset('assets/images/bg-articles.jpg');
        }

        return view('landingpage.show', compact('article'));
    }
}
