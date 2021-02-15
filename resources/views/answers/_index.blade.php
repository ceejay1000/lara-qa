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
                            <a title="This answer is useful" class="vote-up {{ Auth::guest() ? 'off' : ''}}"
                            onclick="event.preventDefault(); document.getElementById('up-vote-answer-{{ $answer->id }}').submit();">
                                <span>&#128077</span>                      
                            </a>
                            <form 
                                id="up-vote-answer-{{ $answer->id }}" 
                                action="/answers/{{ $answer->id }}/vote" 
                                method="POST" style="display: none"> 
                                @csrf
                                <input type="hidden" name="vote" value="1" />
                            </form>
                            <span class="votes-count">{{ $answer->votes_count }}</span>
                            <a 
                                title="This answer is not useful" 
                                class="vote-down off {{ Auth::guest() ? 'off' : ''}}"
                                onclick="event.preventDefault(); document.getElementById('down-vote-answer-{{ $answer->id }}').submit();">
                                <span>&#128078</span>
                            </a>
                            <form 
                                id="down-vote-answer-{{ $answer->id}}" 
                                action="/answers/{{ $answer->id }}/vote" 
                                method="POST" style="display: none"> 
                                @csrf
                                <input type="hidden" name="vote" value="-1" />
                            </form>
                             
                            </div>
                            <div class="media-body">
                                {{ $answer->body }}
                                <div>
                                    <div class="col-4">
                                        <div class="ml-auto">
                                            @if($question)
                                            @if (Auth::user()->can("update", $answer))
                                                <a href="{{ route('questions.answers.edit', [$question->id, $answer->id]) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                            @endif
                                            <!-- @can("update", $question)
                                                <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                            @endcan -->
                                            @if (Auth::user()->can("delete", $answer))                                      
                                                <form action="{{  route('questions.answers.destroy', [$question->id, $answer->id]) }}" method="POST" class="form-delete">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="">Delete</button>
                                                </form>
                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                <div class="col-4"></div>
                                <div class="col-4 mt-4">
                                    <!-- <span class="text-muted mt-4">Answered {{ $answer->created_date }}<span>
                                    <div class="media mt-4">
                                        <a href="{{ $answer->user->url }}" class="pr-2">
                                            <img src="{{ $answer->user->avatar }}" />
                                        </a>
                                        <div class="media-body mt-1">
                                            <a href="{{ $answer->user->url }}">
                                                {{ $answer->user->name }}
                                            </a> 
                                        </div>
                                    </div> -->
                                    @include('shared._author', [
                                        'model' => $answer,
                                        'label' => 'answered'
                                    ])
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