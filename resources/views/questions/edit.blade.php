@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card pb-4">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2> Ask Questions</h2>
                        <div class="ml-auto">
                            <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">
                                Back to Questions
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('questions.update', $question) }}" method="put">
                        @method('put')
                        @include('questions._form', ['btnText' => "Edit question"])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
