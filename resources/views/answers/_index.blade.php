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
                              @can('accept', $answer)
                              <a title="Mark as best answer" 
                                    class="vote-accepted favourite mt-2"
                                    onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $answer->id}}').submit();"
                                >
                                    <span class="favourite-count">&#10004</span>8292
                                </a>
                                <form 
                                    id="accept-answer-{{ $answer->id }}" 
                                    action="{{ route('answers.accept', $answer->id) }}" 
                                    method="POST" style="display: none"> 
                                    @csrf
                                </form>
                                @else
                                    @if($answer->is_best)
                                    <a title="This has been accepted as best answer" 
                                    class="{{ $answer->status }} mt-2"
                                    >
                                        <span class="favourite-count">&#10004</span>8292
                                    </a>
                                    @endif
                              @endcan
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
                        </div>
                        <hr />
                    @endforeach
                </div>
               @endif
            </div>
        </div>
    </div>