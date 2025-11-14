@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ __('Welcome to TaskManager!') }}</p>
                    <p><a href="{{ route('tasks.index') }}" class="btn btn-primary">{{ __('Go to Tasks') }}</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
