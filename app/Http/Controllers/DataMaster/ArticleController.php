<?php

namespace App\Http\Controllers\DataMaster;

use App\DataTables\ArticleDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\DataMaster\Article\StoreArticleRequest;
use App\Http\Requests\DataMaster\Article\UpdateArticleRequest;
use App\Http\Resources\DefaultResource;
use App\Models\NewsArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ArticleDataTable $dataTable)
    {
        return $dataTable->render('data_master.articles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('articles', 'public');
                $data['image'] = $imagePath;
            } else {
                $data['image'] = null;
            }

            $article = NewsArticle::create($data);

            DB::commit();

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Article created successfully', $article);
            }

            return redirect()->route('articles.index')->with('success', 'Article created successfully');
        } catch (\Throwable $e) {
            DB::rollBack();

            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            return redirect()->back()->withErrors('Error: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, NewsArticle $article)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                if ($article->image) {
                    Storage::disk('public')->delete($article->image);
                }
                $data['image'] = $request->file('image')->store('articles', 'public');
            } else {
                $data['image'] = $article->image;
            }

            $article->update($data);

            DB::commit();

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Article updated successfully', $article);
            }

            return redirect()->route('articles.index')->with('success', 'Article updated successfully');
        } catch (\Throwable $e) {
            DB::rollBack();

            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            return redirect()->back()->withErrors('Error: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,NewsArticle $article)
    {
        DB::beginTransaction();

        try {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $article->delete();

            DB::commit();

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Article deleted successfully', []);
            }

            return redirect()->route('articles.index')->with('success', 'Article deleted successfully');
        } catch (\Throwable $e) {
            DB::rollBack();

            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            return redirect()->back()->withErrors('Error: ' . $e->getMessage())->withInput();
        }
    }
}
