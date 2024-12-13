<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use App\Http\Requests\BlogPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        // Filter blog posts by category if a category ID is provided
        $query = BlogPost::query()->with('category');
        if ($request->has('category_id') && $request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        $blogPosts = $query->get();

        return view('blog_posts.index', compact('blogPosts', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('blog_posts.create', compact('categories'));
    }

    public function store(BlogPostRequest $request)
    {


        BlogPost::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('blog_posts.index');
    }

    public function show(BlogPost $blogPost)
    {
        return view('blog_posts.show', compact('blogPost'));
    }

    public function edit(BlogPost $blogPost)
    {
        $categories = Category::all();
        return view('blog_posts.edit', compact('blogPost', 'categories'));
    }

    public function update(BlogPostRequest $request, BlogPost $blogPost)
    {
        $blogPost->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('blog_posts.index');
    }

    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
        return redirect()->route('blog_posts.index');
    }
}

