@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @foreach($users as $user)
                @endforeach
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
    <a class="btn btn-danger" href="{{route('mypetsaddnew')}}" style="float:right"> Add New Pet </a>
    {{--$pets--}}

@endsection
