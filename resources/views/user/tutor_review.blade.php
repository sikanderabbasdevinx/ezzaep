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

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Tutor Review</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Company Name</th>
                                                    <th>Title</th>
                                                    <th>Rating</th>
                                                    <th>Feedback</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Company Name</th>
                                                    <th>Title</th>
                                                    <th>Rating</th>
                                                    <th>Feedback</th>
                                                    <th>Status</th>
                                                    <th>Action</th>

                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @forelse($tutor_reviews as $review)
                                                <tr>
                                                    <td>{{$review->name}}</td>
                                                    <td>{{$review->email}}</td>
                                                    <td>{{$review->company_name}}</td>
                                                    <td>{{$review->title}}</td>
                                                    <td>{{$review->rating}}</td>
                                                    <td>{{$review->feedback}}</td>
                                                    <td>{{$review->approved == '1' ? 'Aprroved' : 'Not Approved'}}</td>
                                                    <td>
                                                        @if($review->approved == '0')<button class="btn btn-default text-success" type="button"><a class="text-success" href = "{{ route('tutor_review.approve',['id'=>$review->id]) }}">Approve</a></button>@endif
                                                        <button class="btn btn-default text-primary" type="button"><a class="text-primary" href = "{{route('tutor.edit.review',['id'=>$review->id])}}">Edit</a></button>
                                                        <button class="btn btn-default text-danger" type="button"><a class="text-danger" href ="{{ route('tutor_review.delete',['id'=>$review->id]) }}">Delete</a></button></td>
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


@endsection

