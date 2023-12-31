@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-hover">
    <thead>
        <tr>
         <th scope="col">Id</th>
        <th scope="col">E-mail</th>
        <th scope="col">Imię</th>
        <th scope="col">Nazwisko</th>
        <th scope="col">Numer telefonu</th>
        <th scope="col">Akcje</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->email }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->surname }}</td>
            <td>{{ $user->phone_number }}</td>
            <td>
                <button class="btn btn-danger btn-sm delete" data-id="{{ $user->id }}">
                    x
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>
    {{ $users->links() }}
</div>
@endsection
@section('javascript')
    $(function() {
        $('.delete').click(function() {
            $.ajax({
                method: "DELETE",
                url: "http://shoponline.test/users/" + $(this).data("id")
                //data: { id: $(this).data("id") }
            })
                .done(function(response){
                    window.location.reload();
                    alert('success');
            })
                .fail(function(response){
                    alert("ERROR");
            });  
        });     
    });
@endsection
