{{-- Ths file will be included in another view --}}
@if ($answersCount > 0)
    <div class="row mt-4" v-cloak>
        {{-- BootStrap part --}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $answersCount . " " . Str::plural('Answer', $answersCount) }}</h2>
                    </div>
                    <hr>
                    @include ('layouts._messages')
                    @foreach ($answers as $answer)
                        @include ('answers._answer')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
