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
                <form class="post_create" method="POST" action="{{ url('/post') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="image" class="col-md-4 col-form-label text-md-end image-choice">{{ __('写真選択') }}</label>

                        <div class="col-md-6">
                            <input type="file" name="post_image[]" required class="form-control mx-auto" multiple>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="post_at" class="col-md-4 col-form-label text-md-end image-date">{{ __('撮影日') }}</label>

                        <div class="col-md-6">
                            <input id="post_at" type="datetime-local" class="form-control @error('post_at') is-invalid @enderror" name="post_at" value="{{ old('post_at') }}" required>

                            @error('post_at')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
                            <div class="post-top">
                                <div class="post-date">
                                    <p>{{ $post_data[0]->post_at->format('Y年m月d日') }}</p>
                                </div>

                                @if (Request::is('profile'))
                                    <div class="nav-item dropdown dropend">
                                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <span class="fa-solid fa-ellipsis fa-2x"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <form action="{{ url('/post_edit') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="post_at" value="{{ $post_data[0]->post_at }}">
                                                <button type="button" class="dropdown-item">編集</button>
                                            </form>
                                            <!-- モーダルを開くリンク -->
                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#testModal">削除</button>
                                        </div>
                                    </div>

                                    <!-- ボタン・リンククリック後に表示される画面の内容 -->
                                    <div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4>削除確認画面</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <label>投稿を削除しますか？</label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">閉じる</button>
                                                    <form action="{{ url('/post_delete') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="post_at" value="{{ $post_data[0]->post_at }}">
                                                        <button type="submit" class="btn btn-right btn-danger">削除</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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