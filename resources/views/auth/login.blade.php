@extends('layouts.auth')

@section('content')
<div class="col-md-12 col-lg-10">
	<div class="wrap d-md-flex">
		<div class="img" style="background-image: url({{url ('/img/13234481_5165321.jpg')}});">
		</div>
		<div class="login-wrap p-4 p-md-5">
		<div class="d-flex">
			<div class="w-100">
				<h3 class="mb-4">Sign In</h3>
			</div>
		</div>
		<form method="POST" action="{{ route('login') }}" class="signin-form">
			@csrf
			<div class="form-group mb-3">
				<label class="label">Email</label>
				<input 
					type="text" 
					class="form-control @error('email') is-invalid @enderror" 
					:class="{ 'is-invalid': this.email_unavailable }"
					placeholder="Email"
					id="email" 
					name="email" 
					value="{{ old('email') }}"
					autocomplete="email" 
					autofocus
					required
					>
				@error('email')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
			<div class="form-group mb-3">
				<label class="label">Password</label>
				<input 
					type="password" 
					class="form-control @error('password') is-invalid @enderror" 
					placeholder="Password"
					id="password" 
					name="password" 
					autocomplete="current-password" 
					required
					>
				@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			<div class="form-group">
				<button href="/" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
			</div>
			<div class="form-group d-md-flex">
				<div class="w-50 text-left">
				<label class="checkbox-wrap checkbox-primary mb-0">Konfirmasi
					<input type="checkbox" checked>
					<span class="checkmark"></span>
					</label>
				</div>
				<div class="w-50 text-md-right">
					<a href="#">Lupa Password</a>
				</div>
			</div>
		</form>
		<p class="text-center">Tidak Punya Akun? <a href="/register">Buat Akun</a></p>
	</div>
	</div>
</div>

@endsection
