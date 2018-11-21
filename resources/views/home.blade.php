@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-success">
                <div class="box-body">
                        <div class="card">                
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <p class="text-center">
                                Selamat Datang, {{ auth()->user()->fullName }} !
                            </p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
