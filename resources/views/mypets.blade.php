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
                                        <th scope="col">Edit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pets as $pet)
                                        <tr  scope="row">
                                            <td>{{$pet->name}}</td>
                                            <td>{{$pet->breed}}</td>
                                            <td>{{$pet->type}}</td>
                                            <td>{{$pet->birthdate}}</td>
                                            <td>edit<a href="/mypets/edit/{{$pet->id}}" ><i class='fas fa-pencil-alt'></i></a>

                                            DELETE
                                                <button class="btn btn-sm btn-light-danger"
                                                        data-bs-toggle="tooltip"
                                                        onclick="deletePet('{{$pet->id}}')"
                                                        title="Delete this Phone Number. It can be restored later.">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>



                                {{-- Modal DELETE Site -- }}
                                <x-modal id="">
                                    <x-slot:title>Delete Phone Number</x-slot:title>

                                    <x-slot:content>

                                    </x-slot:content>

                                    <x-slot:footer>
                                        <x-jet-secondary-button data-bs-dismiss="modal">
                                            {{ __('Close') }}
                                        </x-jet-secondary-button>
                                        <x-jet-button type="submit" class="btn-danger px-6" >
                                            {{ __('Delete Phone Number') }}
                                        </x-jet-button>
                                    </x-slot:footer>
                                </x-modal>
                                {{-- END Delete Phone Number Modal --}}





                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach

    <script>
        function deletePet(petID) {
            const modal = new bootstrap.Modal(document.getElementById('model_delete_phonenumber'), { keyboard: false });
//alert(petID);
            const form = document.getElementById('modal_form_delete_phonenumber');
            form.action = `/mypets/remove/`+ petID
            modal.show();
        }
    </script>


    <!-- Modal -->
    <div class="modal fade" id="model_delete_phonenumber" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> <form method="POST" id="modal_form_delete_phonenumber">
                <div class="modal-body">

                        @method('delete')
                        @csrf
                        <h4>Are you sure you want to delete this Phone Number? </h4>


                        <button type="submit" class="btn btn-danger" form="modal_form_delete_phonenumber">Save changes</button>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
