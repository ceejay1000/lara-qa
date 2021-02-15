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
                    @include('shared._vote', [
                        'model' => $question
                    ])
                    <div class="media-body">
                    {{ $question->body }}
                    <!-- <div class="float-right">
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
                    </div>  --> 
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4"></div>
                        <div class="col-4">
                            @include('shared._author', [
                                'model' => $question,
                                'label' => 'asked'
                            ])
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
