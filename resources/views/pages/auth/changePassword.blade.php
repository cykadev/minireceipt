@extends('../layouts/authMaster/master')
@section('content')
<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo pull-left">
					<img src="{{ asset('porto/images/logo.png') }}" height="54" alt="Phoenix School" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
					</div>
					<div class="panel-body">
						<form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Login') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
							<div class="form-group mb-lg{{ $errors->has('email') ? ' has-error' : '' }}">
								<label>{{ __('E-Mail Address') }}</label>
								<div class="input-group input-group-icon">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" placeholder="E-email" autofocus>
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>

								</div>
								@if ($errors->has('email'))
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="form-group mb-lg{{ $errors->has('password') ? ' has-error' : '' }}">
							<label>{{ __('New Password') }}</label>
								<div class="input-group input-group-icon">
                                <input id="password" type="password" class="form-control" name="password" placeholder="New Password">
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
								@if ($errors->has('password'))
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="form-group mb-lg">
							<label>{{ __('Confirm Password') }}</label>
								<div class="input-group input-group-icon">
                               <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>

							</div>
							<br>

							<div class="row">
								<div class="col-sm-8">

								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary hidden-xs">{{ __('Reset') }}</button>

								</div>
							</div>

						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Copyright Phoenix Technologies {{ date('Y')}}. All Rights Reserved.</p>
			</div>
		</section>
@endsection