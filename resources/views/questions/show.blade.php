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
                    <a title="Click to mark as favourite question (Click again to undo)" 
                       class="favourite mt-2 "
                       onclick="event.preventDefault(); document.getElementById('favourite-question-{{ $question->id }}').submit();">
                        <span class="favourite-count">&#127775</span>
                        <span>{{ $question->favourites_count }}</span>
                    </a>
                    <form 
                        id="favourite-question-{{ $question->id}}" 
                        action="/questions/{{ $question->id }}/favourites" 
                        method="POST" style="display: none"> 
                        @csrf

                        @if($question->is_favourited)
                            @method('DELETE')
                        @endif
                    </form>
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
    @include('answers._index', [
        'answers' => $question->answers,
        'answersCount' => $question->answers_count
    ])
    @include('answers._create')
</div>
@endsection
