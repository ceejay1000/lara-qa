@can('accept', $model)
    <a title="Mark as best answer" 
        class="vote-accepted favourite mt-2"
        onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $model->id}}').submit();"
    >
        <span class="favourite-count">&#10004</span>
    </a>
    <form 
        id="accept-answer-{{ $model->id }}" 
        action="{{ route('answers.accept', $model->id) }}" 
        method="POST" style="display: none"> 
        @csrf
    </form>
    @else
    @if($model->is_best)
    <a title="This has been accepted as best answer" 
    class="{{ $model->status }} mt-2"
    >
        <span class="favourite-count">&#10004</span>8292
    </a>
    @endif
@endcan