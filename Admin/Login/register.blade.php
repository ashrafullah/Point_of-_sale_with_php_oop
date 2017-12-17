@extends('Admin.login.master')
@section('content')
<div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-2 p-0">
		<div class="card border-grey border-lighten-3 px-2 py-2 m-0">
			<div class="card-header no-border">
				<div class="card-title text-xs-center">
					<img src="{{ url('public/Admin/') }}/app-assets/images/logo/robust-logo-dark.png" alt="branding logo">
				</div>
				<h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Create Account</span></h6>
			</div>
			<div class="card-body collapse in">	
				<div class="card-block">
					<form class="form-horizontal form-simple" action="{{ url('register') }}" method="post">
						 {{ csrf_field() }}
						<fieldset class="form-group{{ $errors->has('name') ? ' has-error' : '' }} position-relative has-icon-left mb-1">
			<input type="text" class="form-control form-control-lg input-lg" id="name" placeholder="User Name" name="name">
			@if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
							<div class="form-control-position">
							    <i class="icon-head"></i>
							</div>
						</fieldset>
						<fieldset class="form-group{{ $errors->has('name') ? ' has-error' : '' }} position-relative has-icon-left mb-1">
							<input type="email" class="form-control form-control-lg input-lg" id="email" placeholder="Your Email Address" name="email">
							@if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							<div class="form-control-position">
							    <i class="icon-mail6"></i>
							</div>
						</fieldset>
						<fieldset class="form-group position-relative has-icon-left">
							<input type="password" class="form-control form-control-lg input-lg" id="password" placeholder="Enter Password" name="password">
							@if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
							<div class="form-control-position">
							    <i class="icon-key3"></i>
							</div>
						</fieldset>
							<fieldset class="form-group position-relative has-icon-left">
							<input type="password" class="form-control form-control-lg input-lg" id="password" placeholder="Enter Confirm Password" name="password_confirmation">
							<div class="form-control-position">
							    <i class="icon-key3"></i>
							</div>
						</fieldset>
						<button type="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Register</button>
					</form>
				</div>
				<p class="text-xs-center">Already have an account ? <a href="{{ url('login') }}" class="card-link">Login</a></p>
			</div>
		</div>
	</div>
</section>
        </div>
@endsection