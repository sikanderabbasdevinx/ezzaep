@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Users Details Page</div>

                <div class="card-body">
                    @if ($message = Session::get('status'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <div class="row">

                      <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">User Details</h6>
                                </div>
                                <div class="card-body">
                                  <div class="row">
                                    <b>Current Package : </b><p>{{ $user->how_many_students}} {{$user->how_many_students?'Students,':''}} &nbsp {{($currentPackage)}}</p>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4">
                                      <b>First Name</b>
                                      <p>{{$user->first_name}}</p>  
                                    </div>
                                    <div class="col-lg-4">
                                      <b>Last Name</b>
                                      <p>{{$user->last_name}}</p>  
                                    </div>
                                    <div class="col-lg-4">
                                      <b>Email Address</b>
                                      <p>{{$user->email}}</p>  
                                    </div>
                                  </div>
                                  
                                  <div class="row">
                                    <div class="col-lg-4">
                                      <b>Date Of Birth</b>
                                      <p>{{$user->dob}}</p>  
                                    </div>
                                    <div class="col-lg-4">
                                      <b>Gender</b>
                                      <p>{{$user->gender?$user->gender:'---'}}</p>  
                                    </div>
                                    <div class="col-lg-4">
                                      <b>Phone Number</b>
                                      <p>{{$user->phone_number?$user->phone_number:'---'}}</p>  
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-lg-4">
                                      <b>Address</b>
                                      <p>{{$user->address?$user->address:'---'}}</p>  
                                    </div>
                                    <div class="col-lg-4">
                                      <b>City</b>
                                      <p>{{$user->city?$user->city:'---'}}</p>  
                                    </div>
                                    <div class="col-lg-4">
                                      <b>Country</b>
                                      <p>{{$user->country?$user->country:'---'}}</p>  
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-lg-4">
                                      <b>Age (Years)</b>
                                      <p>{{$user->age?$user->age:'---'}}</p>  
                                    </div>
                                    <div class="col-lg-4">
                                      <b>Subjects Offered/Expertise</b>
                                      <p>{{$user->expertise?$user->expertise:'---'}}</p>  
                                    </div>
                                    <div class="col-lg-4">
                                      <b>Relevant Experience(Years)</b>
                                      <p>{{$user->relevent_experience?$user->relevent_experience:'---'}}</p>  
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-lg-4">
                                      <b>Qualifications/Certifications</b>
                                      <p>{{$user->qualifications?$user->qualifications:'---'}}</p>  
                                    </div>
                                    <div class="col-lg-4">
                                      <b>TimeZone</b>
                                      <p>{{$user->timezone?$user->timezone:'---'}}</p>  
                                    </div>
                                    <div class="col-lg-4">
                                      <b>Where did you hear about EZAA EduPlatform?</b>
                                      <p>{{$user->wh_here_about_ezaaep?$user->wh_here_about_ezaaep:'---'}}</p>  
                                    </div>
                                  </div>

                                </div>
                            </div>

                     

                        </div>


                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Scheduled Classes</h6>
                                </div>
                                <div class="card-body">
                                 <table class="table table-striped">
                                  <thead>
                                     <tr>
                                       <th scope="col">#</th>
                                       <th scope="col">Class Title</th>
                                       <th scope="col">Class Date/Time</th>
                                       <th scope="col">Class Duration</th>
                                     </tr>
                                  </thead>
                                   <tbody>
                                    @php $id =1; @endphp
                                    @forelse($scheduleClasses as $sccheduleClass)
                                     <tr>
                                       <th scope="row">{{$id}}</th>
                                       <td>{{$sccheduleClass->title}}</td>
                                       <td>{{\Carbon\Carbon::parse($sccheduleClass->start_time)->format('d/m/Y H:i')}}</td>
                                       <td>{{$sccheduleClass->duration}} Min</td>
                                     </tr>
                                     @php $id++; @endphp

                                     @empty
                                     <tr>
                                       <td colspan="4">No Schedule Class found.</td>
                                     </tr>
                                     @endforelse
                                   </tbody>
                                 </table>
                                </div>
                            </div>

                     

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Students List</h6>
                                </div>
                                <div class="card-body">
                                  <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Subject</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @if(empty($students))
                                      <tr><td></td><td>No data found!</td></tr>
                                      @endif
                                      @php $id =1; @endphp
                                      @foreach($students as $student)
                                      <tr>
                                        <th scope="row">{{$id}}</th>
                                        <td>{{$student->first_name}} - {{$student->last_name}}</td>
                                        <td>@if(!empty($student->gender)){{$student->gender}}@else -- @endif</td>
                                        <td>@if(!empty($student->phone_number)){{$student->phone_number}}@else -- @endif</td>
                                        <td>@if(!empty(substr($student->tutoring_subject, 2, -2))){{ substr($student->tutoring_subject, 2, -2) }}@else -- @endif</td>
                                      </tr>
                                      @php $id++; @endphp 
                                      @endforeach
                                    </tbody>
                                  </table>
                                  
                                </div>
                            </div>

                         
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection

