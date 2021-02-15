@if ($model instanceof App\Models\Question)
    @php
        $name = "question"; 
        $firstUriSegment = "questions";
    @endphp
@elseif ($model instanceof App\Models\Answer)
    @php    
        $name = "answer"; 
        $firstUriSegment = "answers";
    @endphp
@endif
@php
    $formId = $name . " " . $model->id; 
    $formAction = "/{$firstUriSegment}/{$model->id}/vote";
@endphp
<div class="f-flex flex-column vote-controls">
    <a title="This {{ $name }} is useful" class="vote-up {{ Auth::guest() ? 'off' : ''}}"
    onclick="event.preventDefault(); document.getElementById('up-vote-{{ $formId }}').submit();">
        <span>&#128077</span>                      
    </a>
    <form 
        id="up-vote-{{ $name }}-{{ $model->id }}" 
        action="{{ $formAction }}" 
            method="POST" style="display: none"> 
        @csrf
        <input type="hidden" name="vote" value="1" />
    </form>
    <span class="votes-count">{{ $question->votes_count }}</span>
    <a 
        title="This {{ $name }} is not useful" 
        class="vote-down off {{ Auth::guest() ? 'off' : ''}}"
        onclick="event.preventDefault(); document.getElementById('down-vote-{{ $formId }}').submit();">
        <span>&#128078</span>
    </a>
    <form 
        id="down-vote-{{ $formId }}" 
        action="{{ $formAction }}" 
        method="POST" style="display: none"> 
        @csrf
        <input type="hidden" name="vote" value="-1" />
    </form>
    
    @if ($model instanceof App\Models\Question)
        @include('shared._favourite', [
            'model' => $model
        ])
    @elseif ($model instanceof App\Models\Answer)
        @include('shared._accept', [
            'model' => $model
        ])
    @endif
</div>
