@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Promocode Details Page</div>

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

                        <!-- Content Column -->
                        <div class="col-lg-4 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Create Promocode</h6>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('promocode.create') }}">
                                      @csrf
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Enter Promocode</label>
                                        <input type="text" class="form-control" id="promocode" name="promocode" aria-describedby="promocodeHelp" placeholder="Enter Promocode" required="">
                                        <small id="promocodeHelp" class="form-text text-muted">Only one time can be used.</small>
                                      </div>

                                      {{--<div class="form-group">
                                        <label for="exampleInputEmail1">Select Expiration Period</label>
                                        <select class="form-control" name="expire_date">
                                          <option value="7">1 Week</option>
                                          <option value="15">2 Week</option>
                                          <option value="23">3 Week</option>
                                          <option value="30">4 Week</option>
                                          <option value="37">5 Week</option>
                                        </select>
                                      </div>--}}

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Enter Expiration Period (in days) :</label>
                                        <input type="number" name="expire_date" placeholder="Enter Expiration Period (in days): Ex:15" class="form-control">
                                      </div>


                                      <input class="btn btn-primary" type="submit" value="Create Promocode">
                                    </form>
                                </div>
                            </div>

                     

                        </div>

                        <div class="col-lg-8 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Promocode List</h6>
                                </div>
                                <div class="table-responsive card-body">
                                  <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Promocode</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Expiry Date/Time</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @if(empty($promocode))
                                      <tr><td></td><td>No data found!</td></tr>
                                      @endif
                                      @php $id =1; @endphp
                                      @foreach($promocode as $promo)
                                      <tr>
                                        <th scope="row">{{$id}}</th>
                                        <td id="p222romo_{{$promo->id}}"><input type="text" value="{{$promo->promocode}}" id="promo_{{$promo->id}}">{{--$promo->promocode--}}</td>
                                        @if($promo->used_status=='1')
                                        <td class="text-success">Active</td>
                                        @else
                                        <td class="text-danger"> Inactive</td>
                                        @endif
                                        <td> {{\Carbon\Carbon::parse($promo->expire_date)->format('d/m/Y H:i')}}</td>
                                        <td><button class="btn btn-default" type="button" id="copy-button" value="promo_{{$promo->id}}" onclick="selectPromo(this)" data-placement="button" title="Copy to Clipboard">Copy</button></td>
                                        
                                        <td><button class="btn btn-default text-danger" type="button"><a class="text-danger" href = 'delete_rpomocode/{{ $promo->id }}'>Delete</a></button></td>
                                      </tr>
                                      @php $id++; @endphp 
                                      @endforeach
                                    </tbody>
                                  </table>
                                  
                                </div>
                            </div>

                         
                        </div>
                    </div>

                    <!-- organization promocode -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-4 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Create Promocode For Organization</h6>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('promocode.create') }}">
                                      @csrf
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Enter Promocode</label>
                                        <input type="text" class="form-control" id="promocode" name="promocode" aria-describedby="promocodeHelp" placeholder="Enter Promocode" required="">
                                      </div>

                                      <div class="form-group">
                                        <label for="number_of_use">Number of times to use Promocode</label>
                                        <input type="number" class="form-control" id="number_of_use" name="number_of_use" aria-describedby="promocodeHelp" placeholder="Enter Number of times to use Promocode" min="1" required="">
                                      </div>

                                      <div class="form-group">
                                        <label for="orgName">Enter Organization Name </label>
                                        <input type="text" name="org_name" placeholder="Enter Organization name" class="form-control">
                                      </div>

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Enter Expiration Period (in days) </label>
                                        <input type="number" name="expire_date" placeholder="Enter Expiration Period (in days): Ex:15" class="form-control">
                                      </div>

                                      <input class="btn btn-primary" type="submit" value="Create Promocode">
                                    </form>
                                </div>
                            </div>

                     

                        </div>

                        <div class="col-lg-8 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Organization Promocode List</h6>
                                </div>
                                <div class="table-responsive card-body">
                                  <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Promocode</th>
                                        <th scope="col">Organization Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Expiry Date/Time</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @if(empty($org_promocode))
                                      <tr><td></td><td>No data found!</td></tr>
                                      @endif
                                      @php $id =1; @endphp
                                      @foreach($org_promocode as $promo)
                                      <tr>
                                        <th scope="row">{{$id}}</th>
                                        <td id="p222romo_{{$promo->id}}"><input type="text" value="{{$promo->promocode}}" id="promo_{{$promo->id}}">{{--$promo->promocode--}}</td>
                                        <td>{{$promo->org_name}}</td>
                                        @if(checkPromoUse($promo->id) > 0)
                                        <td class="text-success">Active</td>
                                        @else
                                        <td class="text-danger"> Inactive</td>
                                        @endif
                                        <td> {{\Carbon\Carbon::parse($promo->expire_date)->format('d/m/Y H:i')}}</td>

                                        <td><button class="btn btn-default" type="button" id="copy-button" value="promo_{{$promo->id}}" onclick="selectPromo(this)" data-placement="button" title="Copy to Clipboard">Copy</button></td>
                                        
                                        <td><button class="btn btn-default text-danger" type="button"><a class="text-danger" href = 'delete_rpomocode/{{ $promo->id }}'>Delete</a></button></td>
                                      </tr>
                                      @php $id++; @endphp 
                                      @endforeach
                                    </tbody>
                                  </table>
                                  
                                </div>
                            </div>

                         
                        </div>
                    </div>
                    <!-- End organization promocode -->


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

