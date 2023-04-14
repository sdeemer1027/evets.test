@extends('layouts.app')
<!--meta http-equiv="refresh" content="3;URL='/organization'" /-->
@section('content')




    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">


                        <hr>
                        <h5>Adopt a Pet from your Area</h5>
                        <div class="row">
                            {{$org}}<hr>
                            {{$zst}} ----
{{$zip}}
                            <hr>
{{$data}}

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
