@extends('layouts.layout')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Edit</h1>
</div>

<a href="/certificate" class="btn btn-danger btn-sm mb-3">
    Back
</a>

@if(session()->has('danger'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {!! session('danger') !!}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<form method="POST" action="/certificate/{{ $certificate->id }}">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nama"
            aria-describedby="emailHelp" value="{{ $certificate->name }}" name="name">
        @error('name')
        <div id="validationServerUsernameFeedback" class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
