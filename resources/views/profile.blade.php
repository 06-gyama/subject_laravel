@extends('layouts.app')

@section('profile')
<head>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user_profile.css') }}" rel="stylesheet">
</head>

<div class="container box-profile">
    <div class="profile-area">
        <div class="profile-icon-wrap">
            <img class="profile-icon" src="data:image/png;base64,{{ $data->image }}" alt="プロフィール画像">
        </div>

        <div class="user-text">
            <h4>{{ $data->nickname }}</h4>
            <p>{{ $data->choice }}</p>
            <p><span>活動エリア : </span>{{ $data->place }}</p>
            <p><img class="insta-icon" src="{{ asset('img/Instagram-icon.png') }}" alt="Instagramアイコン"> : {{ $data->insta }}</p>
            <p>{{ $data->profile }}</p>
        </div>
    </div>
    <div class="post-area">
        <div class="post-column">
            <div class="card-body">
                @if (Request::is('profile'))
                <form method="POST" action="{{ url('/post') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('写真選択') }}</label>

                        <div class="col-md-6">
                            <input type="file" name="post_image[]" required class="form-control mx-auto" multiple>
                        </div>
                    </div>
                    <div class="row mb-0 btn-area">
                        <div class="col-md-6 offset-md-4 btn-wrap">
                            <button type="submit" class="btn btn-primary">投稿</button>
                        </div>
                    </div>
                </form>
                @endif

                @if ($posts_data->isEmpty())
                    @if (Request::is('profile'))
                        <div class="post-none">
                            <p>写真を投稿しましょう</p>
                        </div>
                    @elseif (Request::is('profile/*'))
                        <div class="post-none">
                            <p>投稿がありません</p>
                        </div>
                    @endif
                @else
                    <ul class="post-list">
                        @foreach ($posts_data as $post_data)
                        <li class="post">
                            <div class="post-date">
                                <p>{{ $post_data[0]->updated_at->format('Y年m月d日') }}</p>
                            </div>
                            
                            <div class="swiper">
                                <!-- 全スライドをまとめるラッパー -->
                                <div class="swiper-wrapper">
                                    <!-- 各スライド -->
                                    @foreach ($post_data as $post)
                                    <div class="@if (count($post_data) != 1) swiper-slide @endif swiper-image">
                                        <img src="data:image/png;base64,{{ $post->post_image }}">
                                    </div>
                                    @endforeach
                                </div>
                                @if (count($post_data) != 1)
                                <!--  ページネーション（※省略可) -->
                                <div class="swiper-pagination"></div>
                                
                                <!-- ナビゲーションボタン（※省略可) -->
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                                @endif
                            </div>

                            @if (Request::is('profile'))
                                <div class="post-edit-wrap">
                                    <a href="" class="post-edit">編集</a>
                                    <a href="" class="post-delete">削除</a>
                                </div>
                            @endif

                        </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
<script src="{{ mix('js/swiper.js') }}"></script>
@endsection