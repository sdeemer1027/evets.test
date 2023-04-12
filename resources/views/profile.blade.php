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


                                <h5>{{$user->name}}</h5>
                                <div>
                                    @if($user->profilepic)
                                        <img src="{{ asset("storage/$user->profilepic") }}" class="img-thumbnail rounded-circle" alt="Steve" width="100"><br/>
                                    @else
                                        <img src="/evets-logo.png" class="img-thumbnail rounded-circle" alt="default" width="100">
                                    @endif
                                </div>
                                <p>
                                </p><table class="table table-hover" padding="0">
                                    <tbody>
                                    @if($user->phone)
                                        <tr>
                                            <td style="padding:0;"> <i class="fas fa-phone fa-xs" aria-hidden="true"></i></td>
                                            <td style="padding:0;">{{$user->phone}}</td>
                                        </tr>
                                    @endif
                                    @if($user->email)
                                        <tr>
                                            <td style="padding:0;"> <i class="fas fa-envelope fa-xs" aria-hidden="true"></i></td>
                                            <td style="padding:0;">{{$user->email}}</td>
                                        </tr>
                                    @endif
                                    @if($user->address)
                                        <tr>
                                            <td style="padding:0;"> <i class="fas fa-home fa-xs" aria-hidden="true"></i></td>
                                            <td style="padding:0;">{{$user->address}}</td>
                                        </tr>
                                    @endif
                                    @if($user->city)
                                        <tr>
                                            <td style="padding:0;"> <i class="fas fa-home fa-xs" aria-hidden="true"></i></td>
                                            <td style="padding:0;">{{$user->city}}</td>
                                        </tr>
                                    @endif
                                    @if($user->state)
                                        <tr>
                                            <td style="padding:0;"> <i class="fas fa-home fa-xs" aria-hidden="true"></i></td>
                                            <td style="padding:0;">{{$user->state}}</td>
                                        </tr>
                                    @endif
                                    @if($user->facebook)
                                        <tr>{{-- onclick="https://www.facebook.com/Stevendeemer2017">--}}
                                            <td style="padding:0;"> <i class="fab fa-facebook-f fa-xs" aria-hidden="true"></i></td>
                                            <td style="padding:0;">Facebook</td>
                                        </tr>
                                    @endif

                                    @if($user->instagram)
                                        <tr>
                                            <td style="padding:0;"> <i class="fab fa-instagram fa-xs" aria-hidden="true"></i></td>
                                            <td style="padding:0;">InstaGram<!--<i class="fab fa-instagram"></i>--></td>
                                        </tr>
                                    @endif
                                    @if($user->linkedin)
                                        <tr>
                                            <td style="padding:0;"> <i class="fab fa-linkedin-in fa-xs" aria-hidden="true"></i></td>
                                            <td style="padding:0;">LinkedIn<!-- <i class="fab fa-linkedin"></i>--></td>
                                        </tr>
                                    @endif

                                    @if($user->youtube)
                                        <tr>
                                            <td style="padding:0;"> <i class="fab fa-youtube" aria-hidden="true"></i></td>
                                            <td style="padding:0;">YouTube<!--  <i class="fab fa-linkedin"></i>--></td>
                                        </tr>
                                    @endif

                                    </tbody>
                                </table>

                                <p></p>




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


                        </div>


                    </div>
                    @endforeach

                        {{--$users--}}
                </div>
            </div>
        </div>
    </div>
@endsection
