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

                                    @foreach($users as $user)
                                    @endforeach
                                    @foreach($pets as $pet)
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
                                        {{--$pets--}}
                                        {{--$pet->id--}}
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Launch demo modal
                        </button>


                    </div>
                </div>
            </div>
        </div>
    @endforeach



@endsection

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

