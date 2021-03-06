@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                    <div class="card-title">
                       <h1>Edit Your Answer</h1>
                    </div>
                    <hr />
                    <form action="{{ route('questions.answers.update', [$question->id, $answer->id]) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <textarea class="form-control {{ $errors->has('body') ? 'is-invalid': '' }}" rows="7" name="body">
                                {{ old('body', $answer->body) }}
                            </textarea>
                            @if($errors->has('body'))
                                <div>
                                    <strong>{{ $errors->first('body') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="Update" class="btn btn-lg btn-outline-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection