@extends('layouts.app')
@section('content')
    @foreach($users as $user)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">Adding a New Pet

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    @include('partial.profileleft')
                                </div>
                                <div class="col-md-8">

                                    <form action="{{route('mypetsstorenew')}}" method="post">
                                        @csrf
                                        <input type="hidden" class="form-control form-control-sm"  value="{{$user->id}}" name="id" >

                                        <input type="text" class="form-control form-control-sm"  value="" name="name" placeholder="Name">
                                        <input type="text" class="form-control form-control-sm"  value="" name="breed" placeholder="Breed">
                                        <input type="text" class="form-control form-control-sm"  value="" name="type" placeholder="Type Of Pet">
                                        Format : yyyy-mm-dd
                                        <input type="text" class="form-control form-control-sm"  value="" name="birthday" placeholder="BirthDay">


                                        <BR>
                                        <input type="submit">

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
