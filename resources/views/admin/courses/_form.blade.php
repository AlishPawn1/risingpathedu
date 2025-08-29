<div class="col-md-6">
    <label for="name" class="form-label">Course Name</label>
    <input type="text" name="name" id="name" class="form-control"
        value="{{ old('name', $course->name ?? '') }}" required>
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6">
    <label for="duration" class="form-label">Duration</label>
    <input type="text" name="duration" id="duration" class="form-control"
        value="{{ old('duration', $course->duration ?? '') }}" placeholder="e.g., 6 weeks">
    @error('duration')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="col-12">
    <label class="form-label">Description</label>
    <textarea name="description" id="content-editor" class="form-control" rows="4">{{ old('description', $course->description ?? '') }}</textarea>
    @error('description')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6">
    <label for="image" class="form-label">Course Image</label>
    <input type="file" name="image" id="image" class="form-control">
    @if(!empty($course->image))
        <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image" class="mt-2" style="max-width: 150px;">
    @endif
    @error('image')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>