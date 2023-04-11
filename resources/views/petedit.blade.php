@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @foreach($users as $user)
                @endforeach
                    @foreach($pet as $pets)
                    @endforeach
                <form action="{{route('peteditpost')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control form-control-sm"  value="{{$user->id}}" name="id" >
                    <input type="hidden" class="form-control form-control-sm"  value="{{$pets->id}}" name="petid" >

                    <input type="text" class="form-control form-control-sm"  value="{{$pets->name}}" name="name" placeholder="Name">
                    <input type="text" class="form-control form-control-sm"  value="{{$pets->breed}}" name="breed" placeholder="Breed">
                    <input type="text" class="form-control form-control-sm"  value="{{$pets->type}}" name="type" placeholder="Type Of Pet">
                    Format : yyyy-mm-dd
                    <input type="text" class="form-control form-control-sm"  value="" name="birthday" placeholder="BirthDay">
                    <BR>
                    <input type="file" name="file" required>
                    <BR>
                    <input type="submit">
{{$pet}}
                    {{$pets->id}}
                </form>
            </div>
        </div>
    </div>
    <a class="btn btn-danger" href="{{route('mypetsaddnew')}}" style="float:right"> Add New Pet </a>
    {{--$pets--}}

@endsection
