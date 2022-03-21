@extends('layouts.app')

@section('edit')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/update/'.$auth->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">プロフィールアイコン</label>

                            <div class="col-md-6">
                                <input type="file" name="image" accept="image/jpeg,image/png" class="form-control mx-auto">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">名前</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nickname" class="col-md-4 col-form-label text-md-end">ニックネーム</label>

                            <div class="col-md-6">
                                <input id="nickname" type="text" class="form-control" name="nickname" value="{{ old('nickname') }}" autocomplete="nickname">

                                @error('nickname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">メールアドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="place" class="col-md-4 col-form-label text-md-end">活動エリア</label>

                            <div class="col-md-6">
                                <select name="place" id="place" size="1" class="form-control">
                                    <option value="北海道" {{ $auth->place == '北海道' ? 'selected' : ' ' }}>北海道</option>
                                    <option value="青森県" {{ $auth->place == '青森県' ? 'selected' : ' ' }}>青森県</option>
                                    <option value="岩手県" {{ $auth->place == '岩手県' ? 'selected' : ' ' }}>岩手県</option>
                                    <option value="宮城県" {{ $auth->place == '宮城県' ? 'selected' : ' ' }}>宮城県</option>
                                    <option value="秋田県" {{ $auth->place == '秋田県' ? 'selected' : ' ' }}>秋田県</option>
                                    <option value="山形県" {{ $auth->place == '山形県' ? 'selected' : ' ' }}>山形県</option>
                                    <option value="福島県" {{ $auth->place == '福島県' ? 'selected' : ' ' }}>福島県</option>
                                    <option value="茨城県" {{ $auth->place == '茨城県' ? 'selected' : ' ' }}>茨城県</option>
                                    <option value="栃木県" {{ $auth->place == '栃木県' ? 'selected' : ' ' }}>栃木県</option>
                                    <option value="群馬県" {{ $auth->place == '群馬県' ? 'selected' : ' ' }}>群馬県</option>
                                    <option value="埼玉県" {{ $auth->place == '埼玉県' ? 'selected' : ' ' }}>埼玉県</option>
                                    <option value="千葉県" {{ $auth->place == '千葉県' ? 'selected' : ' ' }}>千葉県</option>
                                    <option value="東京都" {{ $auth->place == '東京都' ? 'selected' : ' ' }}>東京都</option>
                                    <option value="神奈川県" {{ $auth->place == '神奈川県' ? 'selected' : ' ' }}>神奈川県</option>
                                    <option value="新潟県" {{ $auth->place == '新潟県' ? 'selected' : ' ' }}>新潟県</option>
                                    <option value="富山県" {{ $auth->place == '富山県' ? 'selected' : ' ' }}>富山県</option>
                                    <option value="石川県" {{ $auth->place == '石川県' ? 'selected' : ' ' }}>石川県</option>
                                    <option value="福井県" {{ $auth->place == '福井県' ? 'selected' : ' ' }}>福井県</option>
                                    <option value="山梨県" {{ $auth->place == '山梨県' ? 'selected' : ' ' }}>山梨県</option>
                                    <option value="長野県" {{ $auth->place == '長野県' ? 'selected' : ' ' }}>長野県</option>
                                    <option value="岐阜県" {{ $auth->place == '岐阜県' ? 'selected' : ' ' }}>岐阜県</option>
                                    <option value="静岡県" {{ $auth->place == '静岡県' ? 'selected' : ' ' }}>静岡県</option>
                                    <option value="愛知県" {{ $auth->place == '愛知県' ? 'selected' : ' ' }}>愛知県</option>
                                    <option value="三重県" {{ $auth->place == '三重県' ? 'selected' : ' ' }}>三重県</option>
                                    <option value="滋賀県" {{ $auth->place == '滋賀県' ? 'selected' : ' ' }}>滋賀県</option>
                                    <option value="京都府" {{ $auth->place == '京都府' ? 'selected' : ' ' }}>京都府</option>
                                    <option value="大阪府" {{ $auth->place == '大阪府' ? 'selected' : ' ' }}>大阪府</option>
                                    <option value="兵庫県" {{ $auth->place == '兵庫県' ? 'selected' : ' ' }}>兵庫県</option>
                                    <option value="奈良県" {{ $auth->place == '奈良県' ? 'selected' : ' ' }}>奈良県</option>
                                    <option value="和歌山県" {{ $auth->place == '和歌山県' ? 'selected' : ' ' }}>和歌山県</option>
                                    <option value="鳥取県" {{ $auth->place == '鳥取県' ? 'selected' : ' ' }}>鳥取県</option>
                                    <option value="島根県" {{ $auth->place == '島根県' ? 'selected' : ' ' }}>島根県</option>
                                    <option value="岡山県" {{ $auth->place == '岡山県' ? 'selected' : ' ' }}>岡山県</option>
                                    <option value="広島県" {{ $auth->place == '広島県' ? 'selected' : ' ' }}>広島県</option>
                                    <option value="山口県" {{ $auth->place == '山口県' ? 'selected' : ' ' }}>山口県</option>
                                    <option value="徳島県" {{ $auth->place == '徳島県' ? 'selected' : ' ' }}>徳島県</option>
                                    <option value="香川県" {{ $auth->place == '香川県' ? 'selected' : ' ' }}>香川県</option>
                                    <option value="愛媛県" {{ $auth->place == '愛媛県' ? 'selected' : ' ' }}>愛媛県</option>
                                    <option value="高知県" {{ $auth->place == '高知県' ? 'selected' : ' ' }}>高知県</option>
                                    <option value="福岡県" {{ $auth->place == '福岡県' ? 'selected' : ' ' }}>福岡県</option>
                                    <option value="佐賀県" {{ $auth->place == '佐賀県' ? 'selected' : ' ' }}>佐賀県</option>
                                    <option value="長崎県" {{ $auth->place == '長崎県' ? 'selected' : ' ' }}>長崎県</option>
                                    <option value="熊本県" {{ $auth->place == '熊本県' ? 'selected' : ' ' }}>熊本県</option>
                                    <option value="大分県" {{ $auth->place == '大分県' ? 'selected' : ' ' }}>大分県</option>
                                    <option value="宮城県" {{ $auth->place == '宮崎県' ? 'selected' : ' ' }}>宮崎県</option>
                                    <option value="鹿児島県" {{ $auth->place == '鹿児島県' ? 'selected' : ' ' }}>鹿児島県</option>
                                    <option value="沖縄県" {{ $auth->place == '沖縄県' ? 'selected' : ' ' }}>沖縄県</option>
                                </select>

                                @error('place')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="choice" class="col-md-4 col-form-label text-md-end">カメラマンor被写体</label>

                            <div class="col-md-6" style="padding-top: 8px">
                                <input id="choice-k" type="radio" name="choice" value="カメラマン" checked="checked">
                                <label for="choice-k">カメラマン</label>
                                <input id="choice-s" type="radio" name="choice" value="被写体">
                                <label for="choice-s">被写体</label>

                                @error('choice')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row mb-3">
                            <label for="profile" class="col-md-4 col-form-label text-md-end">自己紹介</label>

                            <div class="col-md-6">
                                <textarea id="profile" class="form-control" name="profile" value="{{ old('profile') }}"></textarea>

                                @error('profile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="insta" class="col-md-4 col-form-label text-md-end">
                                <img class="insta-icon" src="{{ asset('img/Instagram-icon.png') }}" alt="Instagramアイコン" style="width: 20px; margin-top: -4px;">
                                {{ __('Instagram:ユーザーネーム') }}
                            </label>

                            <div class="col-md-6">
                                <input id="insta" type="text" class="form-control" name="insta" value="{{ old('insta') }}">

                                @error('insta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">編集</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection