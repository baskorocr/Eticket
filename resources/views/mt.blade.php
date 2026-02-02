@extends('layout.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card text-center">
            <div class="card-header">Yeahh</div>

            <div class="card-body">
                <p>Terimakasih sudah koonfirmasi,</p>
                 <p>Sampai bertemu pada Family Gathering!!.</p>
                 <a href="{{ route('index') }}" class="btn btL">Home</a>
            </div>
        </div>
    </div>
@endsection
