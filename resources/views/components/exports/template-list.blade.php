<div class="row gallery-row">
    @if(count($templates))
        @foreach($templates as $template)
            <div
              class="col-xl-6 gallery-item js-gallery-item"
{{--              @if ($loop->iteration == 2)--}}
{{--              data-action="{{ route('exports.second', $team_id) }}"--}}
{{--              @else--}}
              data-action="{{ route('exports.export', [$template->name, $team_id]) }}"
{{--              @endif--}}
              style="background-image: url('{{ asset($template->image) }}');"
            >
                <span class="gallery-item-title">{{ $template->template_name }}</span>
            </div>
        @endforeach
    @endif
</div>