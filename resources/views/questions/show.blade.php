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
                    <div class="float-right">
                        <span class="text-muted">Answered {{ $question->created_date }}<span>
                        <div class="media mt-2">
                            <a href="{{ $question->user->url }}" class="pr-2">
                                <img src="{{ $question->url->avatar }}" />
                            </a>
                            <div class="media-body mt-1">
                                <a href="{{ $question->user->url }}">
                                    {{ $question->url->name }}
                                </a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $question->answers_count . " " . Str::plural('Answer', $question->answers_count) }}</h2>
                    </div>
                    <hr />
                    @foreach($question->answers as $answer)
                        <div class="media">
                            <div class="media-body">
                                {{ $answer->body }}
                                <div class="float-right">
                                    <span class="text-muted">Answered {{ $answer->created_date }}<span>
                                    <div class="media mt-2">
                                        <a href="{{ $answer->user->url }}" class="pr-2">
                                            <img src="{{ $answer->url->avatar }}" />
                                        </a>
                                        <div class="media-body mt-1">
                                            <a href="{{ $answer->user->url }}">
                                                {{ $answer->url->name }}
                                            </a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                    @endforach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
