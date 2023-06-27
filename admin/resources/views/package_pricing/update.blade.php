@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Update Package Price Page</div>

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
                                    <h6 class="m-0 font-weight-bold text-primary">Update Package Price</h6>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('price.update') }}">
                                      @csrf
                                    
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Select Package</label>
                                        <select class="form-control" name="package_id" required="">
                                          <option value="">Select Package</option>
                                          @foreach($packageList as $package)
                                          <option value="{{ $package->id}}">{{ $package->title}}</option>
                                          @endforeach
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Select No. of Student</label>
                                        <select class="form-control" name="number_of_student">
                                          <option value="upto4">Upto 4</option>
                                          <option value="upto8">Upto 8</option>
                                          <option value="upto12">Upto 12</option>
                                          <option value="upto16">Upto 16</option>
                                          <option value="upto20">Upto 20</option>
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Price (£)</label>
                                        <input type="number" class="form-control" name="price" required="">
                                      </div>

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Gocardless URL</label>
                                        <input type="text" class="form-control" name="gc_url">
                                      </div>

                                      <input class="btn btn-primary" type="submit" value="Update Price">
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

