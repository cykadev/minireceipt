@extends('../layouts/authMaster/master')
@section('content')
<section class="body-sign">
			<div class="center-sign">
				<a href="{{ url('/') }}" class="logo pull-left">
					<img src="{{ asset('porto/images/logo.png') }}" height="54" alt="Phoenix School" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Recover Password</h2>
					</div>
					<div class="panel-body">
						<div class="alert alert-info">
							<p class="m-none text-weight-semibold h6">Enter your e-mail below and we will send you reset instructions!</p>
						</div>

					    @if (session('status'))
                        <div class="alert alert-success">
							<p class="m-none text-weight-semibold h6">{{ session('status') }}</p>
						</div>
                    	@endif

                    <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf
							<div class="form-group mb-none{{ $errors->has('email') ? ' has-error' : '' }}">
								<div class="input-group">
                                <input name="email" type="email" class="form-control input-lg" value="{{ $email ?? old('email') }}" placeholder="E-mail" autofocus>
									<span class="input-group-btn">
										<button class="btn btn-primary btn-lg" type="submit">{{ __('Reset') }}</button>
									</span>
								</div>

								@if ($errors->has('email'))
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>

							<p class="text-center mt-lg">Remembered? <a href="{{ route('login') }}">Sign In!</a></p>
						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Copyright Phoenix Technologies {{ date('Y')}}. All Rights Reserved.</p>
			</div>
		</section>
@endsection