@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Questions</h2>
                        <div class="ml-auto">
                            {{-- If we click the button, we will go to the create page --}}
                            <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Ask Question</a>
                            {{-- Then we need to fill up the create method --}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($questions as $question)
                        <div class="media">
                            <div class="d-flex flex-column counters">
                                <div class="vote">
                                    <strong>{{ $question->votes }}</strong> {{ Str::plural('vote', $question->votes) }}
                                </div>
                                <div class="status {{ $question->status }}">
                                    <strong>{{ $question->answers }}</strong> {{ Str::plural('answer', $question->answers) }}
                                </div>
                                <div class="view">
                                    {{ $question->views . " " . Str::plural('view', $question->views) }}
                                </div>
                            </div>
                            <div class="media-body">
                                {{-- url hasn't existed yet --}}
                                <h3 class="mt-0">
                                    <a href='{{ $question->url }}'>{{ $question->title }}</a>
                                </h3>
                                <p class="lead">
                                    Asked by
                                    <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                    {{-- As we are call the attribute, we only need to call it in snake case --}}
                                    <small class="text-muted">{{ $question->created_date }}</small>
                                </p>
                                {{ Str::limit($question->body, 250) }}
                            </div>
                        </div>
                        <hr>
                    @endforeach

                    <div class="mx-auto">
                    {{ $questions->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
