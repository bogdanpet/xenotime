<?php

namespace App\Http\Controllers;

use App\Datatables\PostsDatatable;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index(PostsDatatable $datatable)
    {
        $posts = Post::paginate();
        $datatable->setData($posts);

        return view('admin.posts.index', compact('datatable', 'posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:2|max:255'
        ]);

        $inputs = $request->all();

        $inputs['user_id'] = Auth::user()->id;

        Post::create($inputs);

        return redirect(admin_url('posts'));
    }
}
