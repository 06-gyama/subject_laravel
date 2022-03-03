<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;


class PostController extends Controller
{
    /**
     * 写真投稿
     */
    public function store(Request $request)
    {
        $post_at = $request->post_at;

        $post_images = $request->post_image;

        foreach ($post_images as $post_image){

            $image = base64_encode(file_get_contents($post_image->getRealPath()));

            $request->user()->posts()->create([
                'post_image' => $image,
                'post_at' => $post_at,
            ]);
        }

        return redirect('/profile');
    }

    /**
     * 投稿一覧取得
     */
    public function index($id)
    {
        $data = User::find($id);

        $posts_data = Post::where('user_id', $id)->get()->groupBy(function ($row) {
                                                                return $row->post_at->format('Y年m月d日');
                                                            });

        return view('user.profile',[ 'data' => $data, 'posts_data' => $posts_data ]);
    }

    /**
     * 自分の投稿一覧取得
     */
    public function userIndex()
    {
        $data = Auth::user();

        $posts_data = Post::where('user_id', $data->id)->orderBy('post_at', 'desc')->get()->groupBy(function ($row) {
                                                                    return $row->post_at->format('Y年m月d日');
                                                                });
        
        return view('user.profile',[ 'data' => $data, 'posts_data' => $posts_data ]);
    }

    /**
     * 投稿編集画面
     */
    public function post_edit(Request $request)
    {
        $data = Auth::user();

        $post_at = $request->post_at;

        return view('user.post_edit',[ 'data' => $data, 'post_at' => $post_at ]);
    }

    /**
     * 投稿編集
     */
    public function post_update(Request $request)
    {
        if ($request->update_post_at == null) {
            // 日付未選択の場合
            $update_post_at = $request->post_at;
            
        }else{
            // 日付が選択されていた場合
            $update_post_at = $request->update_post_at;
        }

        if ($request->post_image == null) {
            // 画像未選択の場合
            // 編集対象レコード取得
            $posts = $request->user()->posts()->where('post_at', $request->post_at)->get();

            foreach($posts as $post) {
                // 取得したレコードのpost_atカラムを更新
                $post->post_at = $update_post_at;
                $post->save();
            }
            
        }else{
            // 画像が選択されていた場合upload
            $post_images = $request->post_image;
            
            // 既存カラム削除
            $request->user()->posts()->where('post_at', $request->post_at)->delete();

            foreach ($post_images as $post_image){
                
                $image = base64_encode(file_get_contents($post_image->getRealPath()));
 
                $request->user()->posts()->create([
                    'post_image' => $image,
                    'post_at' => $update_post_at,
                ]);
            }
        }
        return redirect('/profile');
    }

    /**
     * 投稿削除
     */
    public function post_delete(Request $request)
    {
        $request->user()->posts()->where('post_at', $request->post_at)->delete();

        return redirect('/profile');
    }
}
