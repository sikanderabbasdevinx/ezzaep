@extends('layouts.app')

@section('content')
<style type="text/css">
    .txtanswer{
            width: 100%;
            height: 80px;
    }
</style>
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
                                    <h6 class="m-0 font-weight-bold text-primary">FAQ Questions</h6>
                                </div>
                                @php $i =1;@endphp
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Question</th>
                                                    <th>Answer</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Question</th>
                                                    <th>Answer</th>
                                                    <th>Action</th>

                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @forelse($faqList as $faq)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{$faq->question}}</td>
                                                    <form method="post" action="{{route('faq.update',['id'=>$faq->id])}}">
                                                    {{csrf_field()}}

                                                    <td><textarea class="txtanswer" placeholder="Describe your answer here..." name="answer">{{$faq->answer}}</textarea></td>
                                                    <td>
                                                       
                                                        <input type="submit" class="btn btn-default text-success" type="button" value="Update" >
                                                    </form>
                                                        <button class="btn btn-default text-danger" type="button"><a class="text-danger" href ="{{ route('faq.delete',['id'=>$faq->id]) }}">Remove</a></button></td>
                                                </tr>
                                                @php $i++; @endphp
                                                @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">No data found.</td>
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

