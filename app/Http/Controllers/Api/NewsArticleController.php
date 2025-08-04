<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DefaultResource;
use Illuminate\Http\Request;
use App\Models\NewsArticle;

class NewsArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $articles = NewsArticle::paginate(10);

            return response(new DefaultResource(true, 'News articles retrieved successfully.', $articles), 200);
        } catch (\Throwable $th) {
            return response(new DefaultResource(false, $th->getMessage(), null), 500);
        }
    }
}
