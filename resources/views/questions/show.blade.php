@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card pb-4">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h1>{{ $question->title }}</h1>
                            <!-- <div class="ml-auto">
                                <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">
                                    Ask a question
                                </a>
                            </div> -->
                        </div>
                    </div>
                    <hr />
                </div>
                <div class="media">
                <div class="f-flex flex-column vote-controls">
                    <a title="This question is useful" class="vote-up">
                        <span>&#128077</span>
                    </a>
                    <span class="votes-count">12</span>
                    <a title="This question is not useful" class="vote-down off">
                        <span>&#128078</span>
                    </a>
                    <a title="Click to mark as favourite question (Click again to undo)" class="favourite mt-2">
                        <span class="favourite-count">&#127775</span>8292
                    </a>
                </div>
                    <div class="media-body">
                    {{ $question->body }}
                    <div class="float-right">
                        <span class="text-muted">Answered {{ $question->created_date }}<span>
                        <div class="media mt-2">
                            <a href="{{ $question->user->url }}" class="pr-2">
                                <img src="{{ $question->user->avatar }}" />
                            </a>
                            <div class="media-body mt-1">
                                <a href="{{ $question->user->url }}">
                                    {{ $question->user->name }}
                                </a> 
                            </div>
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
               @if($question->answers)
               <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $question->answers_count . " " . Str::plural('Answer', $question->answers_count) }}</h2>
                    </div>
                    <hr />
                    @foreach($question->answers as $answer)
                        <div class="media">
                            <div class="f-flex flex-column vote-controls">
                                <a title="This answer is useful" class="vote-up">
                                    <span>&#128077</span>
                                </a>
                                <span class="votes-count">12</span>
                                <a title="This question is not useful" class="vote-down off">
                                    <span>&#128078</span>
                                </a>
                                <a title="Mark as best answer" class="vote-accepted favourite mt-2">
                                    <span class="favourite-count">&#10004</span>8292
                                </a>
                            </div>
                            <div class="media-body">
                                {{ $answer->body }}
                                <div class="float-right mt-4">
                                    <span class="text-muted mt-4">Answered {{ $answer->created_date }}<span>
                                    <div class="media mt-4">
                                        <a href="{{ $answer->user->url }}" class="pr-2">
                                            <img src="{{ $answer->user->avatar }}" />
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
                    @endforeach
                </div>
               @endif
            </div>
        </div>
    </div>
</div>
@endsection
