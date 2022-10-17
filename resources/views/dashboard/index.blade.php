@extends('layouts.layout')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Baru Masuk</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

{{-- search bar --}}
<form action="/certificate" method="get">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search Name Here..." aria-label="Recipient's username"
            aria-describedby="button-addon2" name="search">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
    </div>
</form>
{{-- search bar --}}
<div class="row">
    <div class="col text-end">
        <a href="/certificate/create" class="btn btn-sm btn-primary">+ Create New Certificate</a>
    </div>
</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Print Count</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($certificates as $certificate)
        <tr>
            <th scope="row">{{ $certificate->id }}</th>
            <td>{{ $certificate->name }}</td>
            <td>{{ $certificate->print_count }}</td>
            <td>
                <a href="/certificate/{{ $certificate->id }}" class="btn btn-primary badge rounded-pill">Show</a>
                <a href="/certificate/{{ $certificate->id }}/edit" class="btn btn-warning badge rounded-pill">Edit</a>
                <form action="/certificate/{{ $certificate->id }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger badge rounded-pill">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $certificates->links() }}
@endsection
