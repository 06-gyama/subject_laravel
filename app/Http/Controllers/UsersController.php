<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function destroy($id)
    {
        $auth = User::find($id);
        $auth->delete();
        return redirect('/');
    }

    public function delete_confirm()
    {
        $auth_id = Auth::id();
        return view('user.delete_confirm',[ 'auth_id' => $auth_id ]);
    }


    public function edit()
    {

        $auth = Auth::user();

        return view('user.edit',[ 'auth' => $auth ]);

    }

    public function update(Request $request, $id)
    {

        // 対象レコード取得
        $auth = User::find($id);

        // $request->file('image')
        if ($request->image == null) {
            // Profile-icon画像未選択の場合
            // $fullFilePath = $auth->img_url;
            $image = $auth->image;
            
        }else{
            // 画像が選択されていた場合upload
            // $fileName = $request->file('image')->getClientOriginalName();
            // Storage::putFileAs('public/images', $request->file('image'), $fileName);
            // $fullFilePath = '/storage/images/'. $fileName;
            $image = base64_encode(file_get_contents($request->image->getRealPath()));
        }

        // リクエストデータ受取
        $data = $request->all();

        // データトークン削除
        unset($data['_token']);

        // Name未入力の場合
        if ($data['name'] == '') {
            $data['name'] = $auth->name;
        }

        // NickName未入力の場合
        if ($data['nickname'] == '') {
            $data['nickname'] = $auth->nickname;
        }

        // E-Mail Address未入力の場合
        if ($data['email'] == '') {
            $data['email'] = $auth->email;
        }

        // Place未選択の場合
        if ($data['place'] == null) {
            $data['place'] = $auth->place;
        }

        // カメラマンor被写体未選択の場合
        if ($data['choice'] == null) {
            $data['choice'] = $auth->choice;
        }

        // Profile未入力の場合
        if ($data['profile'] == '') {
            $data['profile'] = $auth->profile;
        }

        // Instagram:ユーザーネーム未入力の場合
        if ($data['insta'] == '') {
            $data['insta'] = $auth->insta;
        }

        // レコードアップデート
        $auth->fill([
            // 'img_url' => $fullFilePath,
            'image' => $image,
            'name' => $data['name'],
            'nickname' => $data['nickname'],
            'email' => $data['email'],
            'place' => $data['place'],
            'choice' => $data['choice'],
            'profile' => $data['profile'],
            'insta' => $data['insta'],
        ])->save();

        return redirect('/');
    }
}
