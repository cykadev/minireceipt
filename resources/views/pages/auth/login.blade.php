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
						<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
							<div class="form-group mb-lg{{ $errors->has('email') ? ' has-error' : '' }}">
								<label>{{ __('E-Mail Address') }}</label>
								<div class="input-group input-group-icon">
									<input id="email" name="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" autofocus>
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
								<div class="clearfix">
									<label class="pull-left">{{ __('Password') }}</label>
									{{-- <a href="{{ route('password.request') }}" class="pull-right">Lost Password?</a> --}}
								</div>
								<div class="input-group input-group-icon">
								<input id="password" name="password" type="password" class="form-control input-lg" name="password">
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

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="remember" {{ old('remember') ? 'checked' : '' }} name="remember" type="checkbox"/>
										<label for="remember">{{ __('Remember Me') }}</label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary hidden-xs">Sign In</button>

								</div>
							</div>

						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Copyright Phoenix Technologies {{ date('Y')}}. All Rights Reserved.</p>
			</div>
		</section>
@endsection