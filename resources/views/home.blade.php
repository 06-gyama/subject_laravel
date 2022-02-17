@extends('layouts.app')

@section('content')
<head>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<div class="box-title">
    <h1>Easy to start subject</h1>
</div>

<div class="container box-users">
    <h2>カメラマン・被写体さん</h2>
    <ul class="user-list">
        @foreach ($users_data as $data)
            <li class="user">
                <a href="">
                    <img class="profile-icon" src="data:image/png;base64,{{ $data->image }}" alt="プロフィール画像">
                    <div class="user-text">
                        <h4>{{ $data->nickname }}</h4>
                        <p>{{ $data->choice }}</p>
                        <p><span>活動地 : </span>{{ $data->place }}</p>
                        <p><img class="insta-icon" src="{{ asset('img/Instagram-icon.png') }}" alt="Instagramアイコン"> {{ $data->insta }}</p>
                        <p>{{ $data->profile }}</p>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>
<footer>
    <small>Copyright © Keita Yamaji All rights reserved.</small>
</footer>
@endsection
