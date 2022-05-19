@extends('layout')
@section('content')
<div class="container mt-4">
    <h3>Import Form</h3>
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
            @endif
            <form action="{{route('import')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="import" class="form-label">Export Data</label><br>
                    <input type="file" name="file" id="import" class="fomr-control">
                </div>
                <button class="btn btn-success">Submit</button>
                <a href="{{route('students.index')}}" class="btn btn-warning">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection