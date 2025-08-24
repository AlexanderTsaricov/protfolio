<div class="projectBox">
    <p class="projectBox_name">{{ $project->name }}</p>
    <img class="projectBox_image" src="/storage/{{ $project->image }}" alt="Project image">
    <div class="projectBox_descriptionBox">
        <p class="projectBox_description">{{ $project->description }}</p>
        <p class="projectBox_description">Technologies:</p>
        @foreach ($project->languages as $language)
            @php
                $languageModel = App\Models\Language::where('id', $language)->first();
            @endphp
            <p class="projectBox_description jsSelectTechnologies">{{ $languageModel->name }}</p>
        @endforeach
        <a class="projectBox_link" href="{{ $project->link }}" target="_blank" rel="noopener noreferrer">view-project</a>
    </div>
</div>