@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    @foreach($users as $user)

                        <div class="card-header">Meet : <strong>{{$data['name']}}</strong>
                            <span style="float:right;"></span>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>{{$data['name']}}</h5>
                                    <div>
                                        @if($data['primary_photo_cropped']->full)
                                           <img src="{{$data['primary_photo_cropped']->full}}" class="img-thumbnail rounded-circle" alt="Steve" width="100"><br/>
                                       @else
                                           <img src="/evets-logo.png" class="img-thumbnail rounded-circle" alt="default" width="100">
                                        @endif
                                    </div>
                                    <p>
                                    </p><table class="table table-hover" padding="0">
                                        <tbody>
                                        <tr>
                                            <td style="padding:0;"></td>
                                            <td style="padding:0;">{{$data['breeds']->primary}}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0;"></td>
                                            <td style="padding:0;">{{$data['type']}}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0;"></td>
                                            <td style="padding:0;">Age: {{$data['age']}}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0;"></td>
                                            <td style="padding:0;">Size: {{$data['size']}}</td>
                                        </tr>

                                        <tr>
                                            <td style="padding:0;"></td>
                                            <td style="padding:0;"></td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0;"> <i class="fas fa-envelope fa-xs" aria-hidden="true"></i></td>
                                            <td style="padding:0;">{{$data['contact']->email}}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0;"> <i class="fas fa-phone fa-xs" aria-hidden="true"></i></td>
                                            <td style="padding:0;">{{$data['contact']->phone}}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0;"> <i class="fas fa-home fa-xs" aria-hidden="true"></i></td>
                                            <td style="padding:0;">{{$data['contact']->address->address1}}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0;"></td>
                                            <td style="padding:0;">{{$data['contact']->address->address2}}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0;"></td>
                                            <td style="padding:0;">{{$data['contact']->address->city}}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0;"></td>
                                            <td style="padding:0;">{{$data['contact']->address->state}}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0;"></td>
                                            <td style="padding:0;">{{$data['contact']->address->postcode}}</td>
                                        </tr>




                                        </tbody>
                                    </table>

                                    <p></p>




                                </div>

                                <div class="col-md-8">
                                    <div class="row">


                                    </div>

                                    @foreach($data['photos'] as $photo)
                                        {{--$photo->small--}}

                                        <img src="{{$photo->full}}" width="100%">
                                    @endforeach
                                    <BR>
                                    {{$data['description']}}

                                       <hr>

                                </div>

                            </div>


                        </div>
                    @endforeach
                        {{--$data['animal']--}}

                        {{--$data--}}

                </div>
            </div>
        </div>
    </div>
@endsection
