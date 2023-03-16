<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/main.css">
</head>
<body style="background-color: #666666;">

  <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="POST" action="/register-proses" class="login100-form validate-form">
					@csrf
                    <span class="login100-form-title p-b-43">
						Register Member
					</span>
					
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="nama" id="nama">
						<span class="focus-input100"></span>
						<span class="label-input100">Nama</span>
					</div>
                    @error('nama')
                    <small class="text-danger">{{ $message}}</small>
					{{-- Jika nama tidak di input maka akan muncul notifikasi --}}

                    @enderror

					<div class="wrap-input100 validate-input">
						<input class="input100" type="email" name="email" id="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
                    </div>
                    @error('email')
                    <small class="text-danger">{{ $message}}</small>
					{{-- Jika email tidak di input maka akan muncul notifikasi --}}

                    @enderror
					
					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password" id="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
          </div>
                    @error('password')
                    <small class="text-danger">{{ $message}}</small>
					{{-- Jika password tidak di input maka akan muncul notifikasi --}}
                    @enderror

          <div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password_confirmation" id="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Konfirmasi Password</span>
          </div>
                    @error('password')
                    <small class="text-danger">{{ $message}}</small>
					{{-- Jika password tidak di input maka akan muncul notifikasi --}}
                    @enderror

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Register
						</button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							Sudah punya akun? <a href="/">Login</a>
						</span>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('/assets/images/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>

  <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assetsjs/main.js"></script>
</body>
</html>