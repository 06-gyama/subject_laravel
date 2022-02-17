@extends('layouts.app')

@section('delete_confirm')
<head>
	<link href="{{ asset('css/delete_confirm_style.css') }}" rel="stylesheet">
</head>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">退会の確認</div>
					<div class="card-body">                
						<div class="row mb-3 delete-text-wrap">
							<p class="col-md-4 col-form-label delete-text">退会をすると投稿も全て削除されます。</p>
							<p class="col-md-4 col-form-label delete-text">それでも退会をしますか？</p>
						</div>  
						<div class="row mb-0 btn-left-wrap">
							<div class="col-md-6 offset-md-4 btn btn-left">
								<form method="GET" action="{{ url('/destroy/'.$auth_id) }}">
									<button type="submit" class="btn btn-primary">退会する</button>
								</form>
							</div>
						</div>
						<div class="row mb-0">
							<div class="col-md-6 offset-md-4 btn btn-right">
								<a href="/" class="btn btn-primary">キャンセルする</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection