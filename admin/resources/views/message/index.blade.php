@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Message Details Page</div>

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
                                    <h6 class="m-0 font-weight-bold text-primary">Create Message</h6>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('message.create') }}">
                                      @csrf
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Select option to send message</label>
                                        <select name="send_to" class="form-control">
                                          <option value="both">Both</option>
                                          <option value="tutor">Tutor</option>
                                          <option value="student">Student</option>
                                        </select>
                                        
                                      </div>

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Enter Message Title</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Message Title" required="">
                                      </div>

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Enter Message</label>
                                        <textarea class="form-control rounded-0" id="message" name="message" rows="3" required></textarea>
                                      </div>

                                      <input class="btn btn-primary" type="submit" value="Create Message">
                                    </form>
                                </div>
                            </div>

                     

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Messages List</h6>
                                </div>
                                <div class="card-body table-responsive" >
                                  <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Send to</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @if(count($messages) < 1)
                                      <tr><td></td><td>No data found!</td></tr>
                                      @endif

                                      @php $id =1; @endphp
                                
                                      @foreach($messages as $msg)
                                      <tr>
                                        <th scope="row">{{$id}}</th>
                                        <td>{{$msg->title}}</td>
                                        <td>{{$msg->message}}</td>
                                        <td>{{$msg->send_to}}</td>
                                        <td><button class="btn btn-default text-danger" type="button"><a class="text-danger" href = 'delete_message/{{ $msg->id }}'>Delete</a></button></td>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
  function selectPromo(select)
  {
    console.log(select.value);
    var copyText = document.getElementById(select.value);

    // Select the text field
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value);
    
    // Alert the copied text
    alert("Copied the text: " + copyText.value);
  }

  $(document).ready(function() {
    $('#copy-button').tooltip();
  });

</script>
@endsection

