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

                        <hr>
                        <h5>Adopt a Pet from your Area</h5>
<div class="row">
{{-- }}
                  @foreach($data['animals'] as $newpet)
                            <div class="col-6 border">
{{--
                                <a href="{{$newpet->url}}" target="_new">
-- }}
                          {{--$newpet->id -- }}NAME: <strong>{{$newpet->name}}</strong> ({{$newpet->type}})
                          <br>

                          @if($newpet->primary_photo_cropped->small ?? null)
                              <img src="{{$newpet->primary_photo_cropped->small ?? null}}" class="img-thumbnail rounded" alt="" width="100%">
                          @else
                              <img src="/evets-logo.png" class="img-thumbnail rounded-circle" alt="default" width="100">
                          @endif
                          {{$newpet->description}}

                          {{--$newpet->url--}}
{{--  </a> -- }}
                          {{-- }}
                    {{$newpet->photos}}
                          @foreach($newpet['photos'] as $photo)
                              {{$photo}}
                          @endforeach
-- }}
                          <br><br>

                            </div>
                            <br><br>
                        @endforeach
                        --}}

</div>


                    {{--$data--}}

                    {{--Auth()->user()->zip--}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
