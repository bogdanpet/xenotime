<?php

namespace App\Http\Controllers;

use App\Datatables\PostsDatatable;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic;

class PostsController extends Controller
{
    public $image_sizes = [
        'thumb' => [ 300, 300, true ]
    ];

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

        if ($request->hasFile('featured_image')) {
            $relative_path = '/content/' . date('Y') . '/' . date('m');
            $path          = base_path('public' . $relative_path);
            if ( ! file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $name = uniqid('img') . '_' . time() . '.' . $request->file('featured_image')->extension();

            $request->file('featured_image')->move($path, $name);

            $inputs['image'] = $relative_path . '/' . $name;

            $img = ImageManagerStatic::make(base_path('public/' . $inputs['image']));

            $img->fit(300, 300)->save(suffix($path . '/' . $name, 'thumb'));
        }

        $inputs['user_id'] = Auth::user()->id;

        Post::create($inputs);

        return redirect(admin_url('posts'));
    }
}
