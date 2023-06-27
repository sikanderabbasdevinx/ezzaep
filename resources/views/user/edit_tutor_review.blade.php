@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tutor Review Details Page</div>

                  <div class="card-body">
                    @if ($message = Session::get('status'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Update Tutor Review</h6>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('tutor.update.review',['id'=>$tutor_reviews->id]) }}">
                                      @csrf
                                      <div class="form-group">
                                        <label for="fullname">Full Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name" value="@if(!empty($tutor_reviews->name)){{$tutor_reviews->name}}@endif" required="" >
                                      </div>

                                      <div class="form-group">
                                        <label for="fullname">Your Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" value="@if(!empty($tutor_reviews->email)){{$tutor_reviews->email}}@endif" required="" >
                                      </div>

                                      <div class="form-group">
                                        <label for="fullname">Company Name</label>
                                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Company Name" value="@if(!empty($tutor_reviews->company_name)){{$tutor_reviews->company_name}}@endif" required="" >
                                      </div>

                                      <div class="form-group">
                                        <label for="fullname">Review Title</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Review Title" value="@if(!empty($tutor_reviews->title)){{$tutor_reviews->title}}@endif" required="" >
                                      </div>

                                      <div class="form-group">

                                        <fieldset class="rating">

                                            <legend>Your Rating</legend>

                                            <input type="radio" id="star5" name="rating" value="5" {{$tutor_reviews->rating == '5'? 'checked': ''}} /><label for="star5" title="Rocks!">5 stars</label>

                                            <input type="radio" id="star4" name="rating" value="4" {{$tutor_reviews->rating == '4'? 'checked': ''}} /><label for="star4" title="Pretty good">4 stars</label>

                                            <input type="radio" id="star3" name="rating" value="3" {{$tutor_reviews->rating == '3'? 'checked': ''}}/><label for="star3" title="Meh">3 stars</label>

                                            <input type="radio" id="star2" name="rating" value="2" {{$tutor_reviews->rating == '2'? 'checked': ''}}/><label for="star2" title="Kinda bad">2 stars</label>

                                            <input type="radio" id="star1" name="rating" value="1" {{$tutor_reviews->rating == '1'? 'checked': ''}}/><label for="star1" title="Sucks big time">1 star</label>

                                        </fieldset>

                                    </div>

                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Write Feedback</label>
                                        <textarea class="form-control rounded-0" id="feedback" name="feedback" rows="3" required>@if(!empty($tutor_reviews->feedback)){{$tutor_reviews->feedback}}@endif</textarea>
                                    </div>

                                    <div class="form-group">
                                         <input class="btn btn-primary" type="submit" value="Update">
                                          
                                    </div>

                                    </form>
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

