<?php

namespace FFTCG\Http\Controllers;

use FFTCG\Card;
use FFTCG\Deck;
use FFTCG\Collection;
use FFTCG\Models\Blog\BlogPost;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class BlogController extends Controller
{
    public function index()
    {
        $recent_posts = BlogPost::where('draft', false)->orderBy('created_at', 'DESC')->limit(5)->get();
        return view('blog.index', ['recent_posts' => $recent_posts]);
    }

    public function create()
    {
        return view('blog.edit', ['post' => new BlogPost()]);
    }

    public function update(Request $request, $post_id = 0)
    {
        if (empty($card_id)) {
            $post = BlogPost::create([
                'user_id' => Auth::id()
            ]);
        } else {
            $post = BlogPost::findOrFail($post_id);
            if (!Auth::check() || $post->user_id == Auth::id()) {
                flash("Not your blog post to edit", 'error');
                return redirect()->action('BlogController@create');
            }
        }
        $post->fill($request->all())->save();
        flash("Blog Post Saved!", 'success');
        return redirect()->action('BlogController@index');
    }
}
