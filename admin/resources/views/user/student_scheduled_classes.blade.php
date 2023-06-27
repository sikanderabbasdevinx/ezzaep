@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Student Details Page</div>

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

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection

