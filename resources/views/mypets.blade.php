@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <a class="btn btn-danger" href="{{route('mypetsaddnew')}}" style="float:right"> Add New Pet </a>
    {{--$pets--}}
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10">
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Breed</th>
            <th scope="col">type </th>
            <th scope="col">Birthday</th>
        </tr>
    </thead>
    <tbody>
                @foreach($pets as $pet)
                    <tr  scope="row">
                      <td>{{$pet->name}}</td>
                      <td>{{$pet->breed}}</td>
                      <td>{{$pet->type}}</td>
                      <td>{{$pet->birthdate}}</td>
                    </tr>
                @endforeach
    </tbody>
</table>












                {{--$pets--}}
            </div>
        </div>

    </div>


@endsection
