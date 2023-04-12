@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    @foreach($users as $user)
                    <div class="card-header">Profile Information for {{$user->name}}
                    <a class="btn btn-danger" href="{{route('profileEdit')}}" style="float:right"> Edit Profile</a>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                @include('partial.profileleft')
                            </div>

                            <div class="col-md-8">

                                <a class="btn btn-danger" href="{{route('mypetsaddnew')}}" style="float:right"> Add New Pet </a>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Breed</th>
                                        <th scope="col">type </th>
                                        <th scope="col">Birthday</th>
                                        <th scope="col">EDIT</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($pets as $pet)

                                        <tr  scope="row">
                                            <td>

                                                {{$pet->name}}</td>
                                            <td>{{$pet->breed}}</td>
                                            <td>{{$pet->type}}</td>
                                            <td>{{$pet->birthdate}}</td>
                                            <td>edit<a href="/mypets/edit/{{$pet->id}}" ><i class='fas fa-pencil-alt'></i></a></td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
 {{--
                                @foreach($pets as $pet)
                                    @foreach($petpictures as $petpicture)
                                        @if($petpicture->pet_id == $pet->id )
                                       <div class="col-4 flex-column">     {{$pet->name}}
                                            <img src="{{ asset("storage/$user->id/pets/$petpicture->picture") }}" class="img-thumbnail rounded" alt="Steve" width="50">
                                       </div>

                                        @endif
                                    @endforeach
                                @endforeach
--}}
{{--$petpictures--}}
                                {{--$pets--}}


                            </div>
                            <a class="btn btn-danger" href="{{route('editphotos')}}" style="float:right"> Edit All Photos</a>

                        </div>


                    </div>
                    @endforeach

                        {{--$users--}}
                </div>
            </div>
        </div>
    </div>
@endsection
