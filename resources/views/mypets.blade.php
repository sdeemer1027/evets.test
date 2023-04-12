@extends('layouts.app')
@section('content')
    @foreach($users as $user)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">My Pets
                <a class="btn btn-danger" href="{{route('mypetsaddnew')}}" style="float:right"> Add New Pet </a>
                </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                    @include('partial.profileleft')
                            </div>
                            <div class="col-md-8">

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
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
