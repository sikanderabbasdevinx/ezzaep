@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card-body">
        @if ($message = Session::get('status'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif

        <div class="col-lg-12 mb-4">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">EZAA EduPlatform Prices and Packages</h6>
            </div>
              <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" style="margin-bottom:50px;">

                    <thead>
                        <tr>
                            <th class="left_td_color">No. of Students</th>
                            @foreach($packageList as $package)
                            <th><div class="head"><label for="check1">{!! $package->title !!}</label></div></th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($packagePrice as $price)
                            @foreach($price as $key=>$pclist)
                            <tr class="active">
                                <td class="left_td_color"><div class="head"><label for="check5">{{$key}}</label></div></td>
                                @foreach($pclist as $pc)
                                @if(strlen($pc['package_id']) == 1)
                                <td><div class="head"><label>£{{ ($pc['price']) }}</label></div></td>
                                @endif
                                @endforeach
                            </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                <a class="btn btn-primary" href="{{ route('pricing.update') }}">Update Package Price</a>
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

