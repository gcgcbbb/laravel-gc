@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Edit Question</h2>
                        <div class="ml-auto">
                            {{-- If we click the button, we will go to the create page --}}
                            <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all Question</a>
                            {{-- Then we need to fill up the create method --}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Pass Question instance --}}
                    {{-- We can't just change method="put", it will not work --}}
                   <form action="{{ route('questions.update', $question->id) }}" method="post">
                    {{-- We have to add a line here to put method, it's a Laravel syntax --}}
                        {{ method_field('PUT') }}
                        @include ("questions._form", ['buttonText' => "Update Question"])
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
