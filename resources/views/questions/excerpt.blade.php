<div class="media post">
<div class="d-flex flex-column counters">
    <div class="vote">
        <strong>{{ $question->votes_count }}</strong>{{ Str::plural('vote', $question->votes_count) }}
    </div>
    <div class="status {{ $question->status }}">
        <strong>{{ $question->answers_count}}</strong>{{ Str::plural('answer', $question->answers_count) }}
    </div>
</div>
    <div class="status">
        {{ $question->views . Str::plural('view', $question->views) }}
    </div>
</div>
    <div class="media-body border-bottom border-4 mb-4">
    <div class="d-flex align-items-center">
        <h3 class="mt-0">
            <a href="{{ $question->url }}">{{ $question->title }}</a>
        </h3>
        <div class="ml-auto">
            @if($question)
            @if (Auth::user()->can("update", $question))
                <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
            @endif
            <!-- @can("update", $question)
                <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
            @endcan -->
            @if (Auth::user()->can("delete", $question))                                      
                <form action="{{  route('questions.destroy', $question->id) }}" method="POST" class="form-delete">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="">Delete</button>
                </form>
            @endif
            @endif
        </div>
    </div>
        <p class="lead">Asked by 
            <a href="{{ $question->user->url }}">
                {{ $question->user->name }}
            </a>
            <small class="text-muted">{{ $question->created_date }}</small>
        </p>
        {{ Str::limit($question->body, 250) }}
    </div>
</div>