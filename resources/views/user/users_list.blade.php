@extends('layouts.app')

@section('content')

 @if ($message = Session::get('status'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>
                    @endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Active Users Details</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>City</th>
                                                    <th>Country</th>
                                                    <th>Where did  you hear about EZAAEP ?</th>
                                                    <th>Registered Date</th>
                                                    <th>Package</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>City</th>
                                                    <th>Country</th>
                                                    <th>Where did  you hear about EZAAEP ?</th>
                                                    <th>Registered Date</th>
                                                    <th>Package</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @forelse($users as $user)
                                                <tr>
                                                    <td><a href="{{route('users.details',['id'=>$user->id])}}">{{$user->first_name}} - {{$user->last_name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->city?$user->city:'---'}}</td>
                                                    <td>{{$user->country?$user->country:'---'}}</td>
                                                    <td>{{$user->wh_here_about_ezaaep?$user->wh_here_about_ezaaep:'---'}}</td>
                                                    <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</td>
                                                    <td>{{ $user->how_many_students}} {{$user->how_many_students?'Students':''}} &nbsp {{getPackageName($user->tutor_packages)}}</td>

                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="6">No data found.</td>
                                                </tr>
                                                @endforelse
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- **End  -->
                        </div>
                    </div>
                </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
         <div class="col-md-12">

                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Inactive Users Details</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>City</th>
                                                    <th>Country</th>
                                                    <th>Where did  you hear about EZAAEP ?</th>
                                                    <th>Registered Date</th>
                                                    <th>Package</th>
                                                     <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>City</th>
                                                    <th>Country</th>
                                                    <th>Where did  you hear about EZAAEP ?</th>
                                                    <th>Registered Date</th>
                                                    <th>Package</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @forelse($inActiveUsers as $user)
                                                <tr>
                                                    <td><a href="{{route('users.details',['id'=>$user->id])}}">{{$user->first_name}} - {{$user->last_name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->city?$user->city:'---'}}</td>
                                                    <td>{{$user->country?$user->country:'---'}}</td>
                                                    <td>{{$user->wh_here_about_ezaaep?$user->wh_here_about_ezaaep:'---'}}</td>
                                                    <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</td>
                                                    <td>{{ $user->how_many_students}} {{$user->how_many_students?'Students':''}} &nbsp {{getPackageName($user->tutor_packages)}}</td>
                                                    <td class="{{$user->active =='1'?'text-success':'text-danger'}}">{{$user->active =='1'?'Active':'Inactive'}}</td>
                                                    <td><button class="btn btn-default text-danger" type="button"><a class="text-danger" href ="{{ route('users.delete',['id'=>$user->id]) }}">Delete</a></button></td>

                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="6">No data found.</td>
                                                </tr>
                                                @endforelse
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- **End  -->
                        </div>
                    </div>
                </div>
      
    </div>
</div>


@endsection

