<div class="accordion" id="courseContent">
    @foreach ($sections as $section)
        <div class="card bg-dark">
            <div class="card-header p-0 mb-1" id="section{{ $section->id }}">
                <h5 class="mb-0">
                    <div class="p-3 text-secondary d-flex justify-content-between" type="button" data-toggle="collapse" data-target="#collapse{{ $section->id }}" aria-expanded="true" aria-controls="collapseOne">
                        <span>{{ $section->title }}</span>
                        <span>{{ formatDuration($section->section_duration, '%h:%i','%i:%s') }}</span>
                    </div>
                </h5>
            </div>
            <div id="collapse{{ $section->id }}" class="collapse hide" aria-labelledby="section{{ $section->id }}" data-parent="#courseContent">
                @foreach ($section->lectures as $lecture)
                    <div class="card-body text-muted d-flex justify-content-between">
                        <p>{{ $lecture->title }}</p>
                        <p>{{ formatDuration($lecture->duration, '%h:%i','%i:%s') }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
