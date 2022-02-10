<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Rules\NotNumeric;
use App\Models\News;
use Inertia\Inertia;

class NewsController extends Controller
{

    public function index()
    {
        $defaulPaginate = config('paginate.size');
        $news = News::latest()->paginate($defaulPaginate);

        return Inertia::render('Backend/News/Index', [
            'news' => $news
        ]);
    }

    public function create()
    {
        return Inertia::render('Backend/News/Create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'         => ['required'],
            'sub_title'     => ['required'],
            'slug'          => ['required', 'unique:news', new NotNumeric],
            'content'       => ['required'],
            'short_content' => ['required'],
        ]);

        if($request->slug) {
            $slug = Str::slug($request->slug, '-');
            $checkSlug = News::where('slug', $slug);
            if($checkSlug) {
                return Inertia::render('Backend/News/Create', [
                    'error' => 'The slug has already been taken.'
                ]);
            }
        }

        $news                = new News();
        $news->title         = $request->title;
        $news->sub_title     = $request->sub_title;
        $news->slug          = $slug;
        $news->content       = $request->content;
        $news->short_content = $request->short_content;
        $image_path          = '';
        if ($request->hasFile('thumb_image_path')) {
            $image_path = $request->file('thumb_image_path')->store('newsImages', 'public');
            $news->thumb_image_path = $image_path;
        }
        $news->save();

        return redirect()->route('news.index');
    }


    public function show($id)
    {
        return 'show';
    }


    public function edit($id)
    {
        $news = News::find($id);

        return Inertia::render('Backend/News/Edit', [
            'news' => $news
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title'         => ['required'],
            'sub_title'     => ['required'],
            'slug'          => ['required', "unique:news,slug,$id", new NotNumeric],
            'content'       => ['required'],
            'short_content' => ['required']
        ]);

        if($request->slug) {
            $slug = Str::slug($request->slug, '-');
        }

        $news                = News::find($id);
        $news->title         = $request->title;
        $news->sub_title     = $request->sub_title;
        $news->slug          = $slug;
        $news->content       = $request->content;
        $news->short_content = $request->short_content;
        $image_path = '';
        if($request->hasFile('thumb_image_path')) {
            $oldImage = public_path('storage/').$news->thumb_image_path;
            @unlink($oldImage);
            $image_path = $request->file('thumb_image_path')->store('newsImages', 'public');
            $news->thumb_image_path = $image_path;
        }
        $news->save();

        return redirect()->route('news.index');
    }

    public function destroy($id)
    {
        return 'delete';
    }
}
