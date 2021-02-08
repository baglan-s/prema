<div class="row gallery-row">
    @if(count($templates))
        @foreach($templates as $key => $value)
            <div
              class="col-xl-6 gallery-item js-gallery-item"
{{--              @if ($loop->iteration == 2)--}}
{{--              data-action="{{ route('exports.second', $team_id) }}"--}}
{{--              @else--}}
              data-action="{{ route('exports.export', [$loop->iteration, $team_id]) }}"
{{--              @endif--}}
              style="background-image: url('{{ url('exports/images/'.$value) }}');"
            >
            </div>
        @endforeach
    @endif
</div>