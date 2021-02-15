@if ($answersCount > 0)
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
                        @include ('answers._answer', ['answer' => $answer])
                    @endforeach
                </div>
               @endif
            </div>
        </div>
    </div>
@endif