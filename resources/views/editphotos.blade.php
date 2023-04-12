@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    @foreach($users as $user)
                        <div class="card-header">Profile Information for {{$user->name}}</div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    @include('partial.profileleft')
                                </div>

                                <div class="col-md-8">
                                    @foreach($users as $user)
                                        <form action="{{route('photodelete')}}" method="post"  enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" class="form-control form-control-sm"  value="{{$user->id}}" name="id" placeholder="First Name">

                                                    @foreach($files as $file)
                                                        @if(str_replace("public/$user->id/", "",$file) != ''.$user->profilepic.'')
                                                    <input type="checkbox" name="file2[]" value="{{str_replace("public/$user->id/", "",$file)}}">
                                                    <img src="{{asset("storage/".str_replace("public/", "",$file))}}" class="img-thumbnail rounded" alt="Steve" width="100">

                                                @endif
                                                          @endforeach





                                            <input type="submit" class="btn btn-primary">
                                        </form>
                                    @endforeach


                                </div>


                            </div>


                        </div>
                    @endforeach

                    {{--$users--}}
                </div>
            </div>
        </div>
    </div>
@endsection
