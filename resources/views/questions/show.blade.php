@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card pb-4">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h1>{{ $question->title }}</h1>
                        <!-- <div class="ml-auto">
                            <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">
                                Ask a question
                            </a>
                        </div> -->
                    </div>
                </div>
                <div class="card-body">
                    {{ $question->body }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
