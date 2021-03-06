@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Ask Questions</h2>
                        <div class="ml-auto">
                            {{-- If we click the button, we will go to the create page --}}
                            <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all Question</a>
                            {{-- Then we need to fill up the create method --}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                   <form action="{{ route('questions.store') }}" method="post">
                        @include ("questions._form", ['buttonText' => "Ask Question"])
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
