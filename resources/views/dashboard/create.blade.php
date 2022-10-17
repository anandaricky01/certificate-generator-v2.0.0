@extends('layouts.layout')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Certificate</h1>
</div>

@if (session()->has('danger'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('danger') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row">
    <div class="col">
        <h3>Create from Scratch</h3>
        <p class="lead">Create new one by filling the form</p>
        <form action="/certificate" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col">
        <h3>Import via Excel</h3>
        <p class="lead">
            Import your file via Excel file with provided format
        </p>
        <form action="/certificate/import" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="file" class="form-label">File</label>
                <input type="file" class="form-control" id="file" aria-describedby="emailHelp" name="file">
            </div>
            <button class="btn btn-success">+ Import</button>
        </form>
    </div>
</div>
@endsection
