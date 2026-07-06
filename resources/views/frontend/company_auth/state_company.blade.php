@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @foreach ($states as $state)
                            <div class="btn btn-primary">
                                <a class="text-white"
                                    href="{{ route('state.show',$state->slug) }}">{{ $state->name }}</a>
                                
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
