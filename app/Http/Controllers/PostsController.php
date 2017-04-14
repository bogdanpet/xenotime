<?php

namespace App\Http\Controllers;

use App\Datatables\PostsDatatable;
use App\Post;

class PostsController extends Controller
{
    public function index(PostsDatatable $datatable)
    {
        $posts = Post::paginate();
        $datatable->setData($posts);

        return view('admin.posts.index', compact('datatable', 'posts'));
    }
}
