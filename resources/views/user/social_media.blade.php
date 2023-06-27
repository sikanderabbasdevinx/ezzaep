@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Social Media Links Details Page</div>

                <div class="card-body">
                    {{--@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif--}}
                    @if ($message = Session::get('status'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <div class="row">


                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Social Media Links List</h6>
                                </div>
                                <div class="card-body">
                                  <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Links</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @if(empty($social_medias))
                                      <tr><td></td><td>No data found!</td></tr>
                                      @endif
                                      @php $id =1; @endphp

                                      @foreach($social_medias as $social)

                                      <tr>
                                        <form method="post" action="{{route('social_links.update',['id'=>$social->id])}}">
                                        
                                        <th scope="row">{{$id}}</th>
                                        <td><label>{{$social->title}}</label></td>
                                        <td><textarea name="link" id="social_{{$social->id}}">{{$social->link}}</textarea></td>
                                        <td><button class="btn btn-default" type="button" id="copy-button" value="social_{{$social->id}}" onclick="selectPromo(this)" data-placement="button" title="Copy to Clipboard">Copy</button></td>
                                        {{csrf_field()}}
                                        <td><input type="submit" class="btn btn-default text-success" type="button" value="Update" ></td>
                                        </form>

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

