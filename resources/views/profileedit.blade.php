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


                                    <h5>{{$user->name}}</h5>
                                    <div>
                                        @if($user->profilepic)
                                            <img src="{{ asset("storage/$user->id/$user->profilepic") }}" class="img-thumbnail rounded-circle" alt="Steve" width="100"><br/>
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
                                    @foreach($users as $user)
                                   <form action="{{route('profileeditor')}}" method="post"  enctype="multipart/form-data">
                                       @csrf
                                       <input type="hidden" class="form-control form-control-sm"  value="{{$user->id}}" name="id" placeholder="First Name">

                                       <div class="row">
                                           <div class="col-6">
                                               @if($user->profilepic)
                                                   <img src="{{ asset("storage/$user->id/$user->profilepic") }}" class="img-thumbnail rounded-circle" alt="Steve" width="100"><br/>
                                               @else
                                                   <img src="/evets-logo.png" class="img-thumbnail rounded-circle" alt="default" width="100">
                                               @endif

                                           </div>
                                           <div class="col-6">
                                               <label for="facebook" class="col-md-4 col-form-label">Change your Profile Picture</label>

                                               <input type="file" name="file" required>
                                           </div>
                                       </div>


                                       <input type="text" class="form-control form-control-sm"  value="{{$user->firstname}}" name="firstname" placeholder="First Name">
                                      <input type="text" class="form-control form-control-sm" value="{{$user->lastname}}" name="lastname" placeholder="Last Name">

                                       <input type="text" class="form-control form-control-sm" value="{{$user->address}}" name="address" placeholder="Address">
                                       <input type="text" class="form-control form-control-sm" value="{{$user->address2}}" name="address2" placeholder="Address 2">
                                       <input type="text" class="form-control form-control-sm" value="{{$user->city}}" name="city" placeholder="City">
                                       <input type="text" class="form-control form-control-sm" value="{{$user->state}}" name="state" placeholder="State">
                                       <input type="text" class="form-control form-control-sm" value="{{$user->zip}}" name="zip" placeholder="Zip Code" required>


                                       <input type="text" class="form-control form-control-sm" value="{{$user->phone}}" name="phone" placeholder="Phone Number">

                                       <hr>Social Networks

                                       <div class="row mb-12">
                                   <label for="facebook" class="col-md-4 col-form-label">Facebook</label>
                                       <input type="text" class="form-control form-control-sm" value="{{$user->facebook}}" name="facebook" placeholder="Your Facebook URL">
                                   <label for="instagram" class="col-md-4 col-form-label">Instagram</label>
                                       <input type="text" class="form-control form-control-sm" value="{{$user->instagram}}" name="instagram" placeholder="Your Instagram URL">
                                   <label for="linkedin" class="col-md-4 col-form-label">Linkedin</label>
                                       <input type="text" class="form-control form-control-sm" value="{{$user->linkedin}}" name="linkedin" placeholder="Your Linkedin URL">
                                   <label for="youtube" class="col-md-4 col-form-label">Youtube</label>
                                       <input type="text" class="form-control form-control-sm" value="{{$user->youtube}}" name="youtube" placeholder="Your YouTube URL">
                                       </div>

                                           <hr>


                                       <div class="row mb-12">
                                           <div class="col-md-6">

                                           <label for="age" class="col-md-4 col-form-label">Age</label>

                                           <input type="text" class="form-control form-control-sm" value="{{$user->age}}" name="age" placeholder="Your Age">
                                           </div>
                                           <div class="col-md-6">
                                           <label for="gender" class="col-md-4 col-form-label">gender</label>

                                       <select class="form-control form-control-sm" name="gender">
                                           <option value="">Select Gender / Identity</option>
                                           <option value="male" @if($user->gender == 'male') selected @endif>Male</option>
                                           <option value="female"@if($user->gender == 'female') selected @endif>Female</option>
                                       </select>
                                           </div>
                                       </div>

                                       <div class="row mb-3">
                                           <label for="description" class="col-md-4 col-form-label">Description / Bio </label>
                                           <div class="col-md-12">

                                       <textarea name="description" class="form-control form-control-sm" > {{$user->description ?? null}}</textarea>
                                       </div></div>
                                       <BR>
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
