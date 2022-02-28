<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $post_images = $request->post_image;

        foreach ($post_images as $post_image){

            $image = base64_encode(file_get_contents($post_image->getRealPath()));

            $request->user()->posts()->create([
                'post_image' => $image
            ]);
        }

        return redirect('/profile');
    }

    public function index($id)
    {
        $data = User::find($id);

        $posts_data = Post::where('user_id', $id)->get()->groupBy(function ($row) {
                                                                return $row->updated_at->format('d');
                                                            });

        return view('profile',[ 'data' => $data, 'posts_data' => $posts_data ]);
    }

    public function userIndex()
    {
        $data = Auth::user();

        $posts_data = Post::where('user_id', $data->id)->get()->groupBy(function ($row) {
                                                                    return $row->updated_at->format('d');
                                                                });
        
        return view('profile',[ 'data' => $data, 'posts_data' => $posts_data ]);
    }
}
