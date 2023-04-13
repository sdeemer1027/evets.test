@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    @foreach($users as $user)
                        <div class="card-header">Find a Pet to Adopt around zip: {{$user->zip}}

                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    @include('partial.profileleft')
                                </div>

                                <div class="col-md-8">
Lets setup and search for a new pet to adopt <BR>
                                    <form action="{{Route('findpetshow')}}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <label for="zip" class="col-md-4 col-form-label">Zip Code:</label>
                                        <input type="text" class="form-control form-control-sm"  value="{{$user->zip}}" name="zip" placeholder="ZipCode">
                                        <label for="type" class="col-md-4 col-form-label">Select a Type of Pet:</label>
                                        <select name="type" class="form-control form-control-sm">
                                            @foreach($data['types'] as $type)
                                                <option value="{{$type->name}}">{{$type->name}}</option>
                                            @endforeach
                                        </select>
<input type="hidden" name="token" value="{{$token}}">

       <input type="submit">
</form>


{{--
                                    @foreach($data['types'] as $type)
                                    {{$type->name}} <br>
                                    @endforeach
--}}
{{--$data--}}
{{--$token--}}
                                </div>

                            </div>


                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
