<a title="Click to mark as favourite question (Click again to undo)" 
    class="favourite mt-2 {{( Auth::guest() ? 'off': $model->is_favourited) ? 'favourited': ''}}"
    onclick="event.preventDefault(); document.getElementById('favourite-question-{{ $model->id }}').submit();">
    <span class="favourite-count">&#127775</span>
    <span>{{ $question->favourites_count }}</span>
</a>
<form 
    id="favourite-question-{{ $model->id }}" 
    action="/questions/{{ $model->id }}/favourites" 
    method="POST" style="display: none"> 
    @csrf

    @if($question->is_favourited)
        @method('DELETE')
    @endif
</form>