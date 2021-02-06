@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card pb-4">
                <div class="card-header">All Questions</div>
                <div class="card-body">
                    @foreach($questions as $question)
                        <div class="media">
                        <div class="d-flex flex-column counters">
                            <div class="vote">
                                <strong>{{ $question->votes }}</strong>{{ Str::plural('vote', $question->votes) }}
                            </div>
                            <div class="status {{ $question->status }}">
                                <strong>{{ $question->answers }}</strong>{{ Str::plural('answer', $question->answer) }}
                            </div>
                        </div>
                            <div class="status">
                                {{ $question->views . Str::plural('view', $question->views) }}
                            </div>
                        </div>
                            <div class="media-body border-bottom border-4 mb-4">
                                <h3>
                                    <a href="{{ $question->url }}">{{ $question->title }}</a>
                                </h3>
                                <p class="lead">Asked by 
                                    <a href="{{ $question->user->url }}">
                                        {{ $question->user->name }}
                                    </a>
                                    <small class="text-muted">{{ $question->created_date }}</small>
                                </p>
                                {{ Str::limit($question->body, 250) }}
                            </div>
                        </div>
                    @endforeach 
                    <div class="mx-auto">
                     {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection