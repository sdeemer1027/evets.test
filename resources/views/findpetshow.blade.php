@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    @foreach($users as $user)
                        <div class="card-header">Find a Pet to Adopt:
                            <span style="float:right;">
                                @foreach($searchfor as $searched)
                          <strong>  {{$searched}} </strong>
                                @endforeach
                            </span>
{{--$searchfor--}}
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    @include('partial.profileleft')
                                </div>

                                <div class="col-md-8">
                                    <div class="row">

                                        @foreach($data['animals'] as $newpet )
                                            <div class="col-6 border">
                                                {{--
                                                                                <a href="{{$newpet->url}}" target="_new">
                                                --}}
                                                {{--$newpet->id--}}NAME: <strong>{{$newpet->name}}</strong> ({{$newpet->type}})
                                                <br>
                                                <form action="{{Route('showpet')}}" method="post" enctype="multipart/form-data">
                                                    @csrf

                                                    <input type='hidden' name="petid" value="{{$newpet->id}}">
                                                        <input type="hidden" name="token" value="{{$token}}">
                                                        <input type='hidden' name="name" value="{{$newpet->name}}">
                                                @if($newpet->primary_photo_cropped->small ?? null)
                                                    <img src="{{$newpet->primary_photo_cropped->small ?? null}}" class="img-thumbnail rounded" alt="">
                                                @else
                                                    <img src="/evets-logo.png" class="img-thumbnail rounded-circle" alt="default" width="100">
                                                @endif
                                                    <BR>
                                                    <input type="submit"  value="More Details">

                                                </form>
                                                {{$newpet->description}}

                                                {{--$newpet->url--}}
                                                {{--  </a> --}}
                                                {{--}}
                                          {{$newpet->photos}}
                                                @foreach($newpet['photos'] as $photo)
                                                    {{$photo}}
                                                @endforeach
                      --}}
                                                <br><br>

                                            </div>
                                            <br><br>
                                        @endforeach

                                    </div>





                                    {{--$data--}}

                                </div>

                            </div>


                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
