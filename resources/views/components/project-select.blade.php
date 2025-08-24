<label class="projectsSelectBox_label">
    <input 
        class="checkboxLanguage" 
        type="checkbox" 
        name="language[]" 
        value="{{ $language->id }}" 
    />
    <span class="projectsSelectBox_span">{{ $language->name }}</span>
</label>