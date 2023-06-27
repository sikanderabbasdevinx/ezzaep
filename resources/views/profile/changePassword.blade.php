@extends('layouts.app')

@section('content')
<main class="py-4">

				<div class="container password-container">
				<div class="title-text">Change Password</div>
				<div class="card card-primary password-container">
					<div class="justify-content-between align-items-center">
						@if(Auth()->user()->default_password_reset == 1)
						<div class="text-right">
							<a class="btn btn-danger" href="{{ route('logout') }}"
								onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</div>
						@endif
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form class="" method="POST" action="{{route('profile.changePassword')}}">
							@csrf
					<div class="card-body">
					<div class="bg-white">	
					    	@if($errors->any())
                            <div class="text-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach($errors->all() as $error )
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        	@endif
							@if (session('status'))
								<div class="alert alert-danger" role="alert">
									{{ session('status') }}
								</div>
							@endif
						
                            
							<div class="row mb-4">
								<label class="col-md-3 col-form-label font-weight-bold">Old Password<span class="mandotary">*</span></label>
								<div class="col-md-9">
									<input type="password" name="old_pwd" class="form-control" placeholder="Old Password"
										required>
								</div>
							</div>

							<div class="row mb-4">
								<label class="col-md-3 col-form-label font-weight-bold">New Password<span class="mandotary">*</span></label>
								<div class="col-md-9">
									<input type="password" name="new_pwd" class="form-control" placeholder="New Password" required>
								</div>
							</div>

							<div class="row mb-4">
								<label class="col-md-3 col-form-label font-weight-bold">Confirm Password<span class="mandotary">*</span></label>
								<div class="col-md-9">
									<input type="password" name="confirm_pwd" class="form-control" placeholder="Confirm Password" required>
								</div>
							</div>

							
						
					</div>
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
					<div class="text-right"><button type="submit" class="btn btn-primary">Submit</button></div>
					</div>
					</form>
					</div>
					
				</div>
		</main>
	</div>
@endsection
