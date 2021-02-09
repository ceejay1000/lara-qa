<div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
               @if($answers)
               <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $question->answersCount . " " . Str::plural('Answer', $question->answersCount) }}</h2>
                    </div>
                    <hr />
                    @include('layouts._messages')
                    @foreach($answers as $answer)
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
                                                {{ $answer->user->name }}
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