<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // 自分のid取得
        $auth_id = Auth::id();

        $users_data = User::where('id','<>',$auth_id)->orderBy('id', 'desc')->get();

        return view('home', compact('users_data', 'auth_id'));
    }
}
