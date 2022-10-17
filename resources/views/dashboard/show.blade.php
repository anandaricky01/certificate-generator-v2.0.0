@extends('layouts.layout')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Show Data</h1>
</div>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Show Detail Data</th>
            <th scope="col" class="text-end">
                <a href="/certificate" class="btn btn-sm btn-primary">Back</a>
                <a href="/certificate/{{ $certificate->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                <form action="/certificate/{{ $certificate->id }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <tr>
            <th scope="row">ID</th>
            <td>{{ $certificate->id }}</td>
        </tr>
        <tr>
            <th scope="row">Name</th>
            <td>{{ $certificate->name }}</td>
        </tr>
        <tr>
            <th scope="row">File</th>
            <td>{{ $certificate->file_name }}</td>
        </tr>
        <tr>
            <th scope="row">Print Count</th>
            <td>{{ $certificate->print_count }}</td>
        </tr>
        <tr>
            @if ($certificate->file_name == NULL)
            <td colspan="2">
                <p class="lead text-center">Certificate has not generated!</p>
            </td>
            @else
            <td colspan="2" class="text-center"><img src="{{ asset($certificate->file_name) }}" alt="" class="rounded"
                    width="50%"></td>
            @endif
        </tr>
    </tbody>
</table>
@endsection
