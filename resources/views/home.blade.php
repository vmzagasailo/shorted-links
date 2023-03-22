@extends('layouts.main')

@section('content')
    <div class="container">
        @if(session('success'))
            <p><strong>Нова силка: {{ session()->get('success') }}</strong></p>
        @endif
        <form action="{{ route('links.send') }}" method="POST">
            @csrf
            <div class="form-group m-4">
                <label for="exampleInputEmail1">Url:</label>
                <input type="text" name="url" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="Enter url">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Добавити">
                </div>
            </div>
        </form>
    </div>
@endsection
