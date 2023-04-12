@extends('layouts.app')

@section('content')




<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                        <hr>


{{--}}
                        <div class="container px-4">
                            <div class="row gx-5">
                                <div class="col">
                                    <div class="p-3 border bg-light">Custom column padding</div>
                                </div>
                                <div class="col">
                                    <div class="p-3 border bg-light">Custom column padding</div>
                                </div>
                            </div>
                        </div>
--}}

                  @foreach($data['animals'] as $newpet)
                            <div class="col">
                                <div class="p-3 border bg-light">
<a href="{{$newpet->url}}" target="_new">
                          {{$newpet->id}} {{$newpet->name}}
                          {{$newpet->type}}<hr>
                          @foreach($newpet->breeds as $breeds)
                         {{$breeds}}
                          @endforeach
                          <hr>
                          @if($newpet->primary_photo_cropped->small ?? null)
                              <img src="{{$newpet->primary_photo_cropped->small ?? null}}" class="img-thumbnail rounded-circle" alt="" height="100%"><br/>
                          @else
                              <img src="/evets-logo.png" class="img-thumbnail rounded-circle" alt="default" width="100">
                          @endif
                          {{$newpet->description}}
<br>
                          {{$newpet->url}}

</a>
                          {{--}}
                    {{$newpet->photos}}
                          @foreach($newpet['photos'] as $photo)
                              {{$photo}}
                          @endforeach
--}}
                          <br><br>
                                </div>
                            </div>
                            <br><br>
                        @endforeach




                    {{$data}}

                    {{Auth()->user()->zip}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
