@extends('template-wpadmin')

@section('navbar_menu_question','active')

@section('main')
    <h1>{{ isset($question) ? 'Edit Question' : 'Create Question' }}</h1>
    <form action="{{ isset($question) ? route('questions.update', $question->id) : route('questions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($question))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $question->name ?? '') }}" required>
        </div>
        <div class="form-group">
            <label for="contain">Contain</label>
            <textarea name="contain" id="contain" class="form-control" required>{{ old('contain', $question->contain ?? '') }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
            @if(isset($question) && $question->image)
                <img src="{{ Storage::url($question->image) }}" alt="{{ $question->name }}" width="100">
            @endif
        </div>
        <div class="form-group">
            <label for="usertype">Peruntukan</label>
            <input type="text" name="usertype" class="form-control" value="{{ old('usertype', $question->usertype ?? '') }}" placeholder="customer/member/admin/training/prompt/shopee">
        </div>
        <div class="form-group">
            <label for="youtube">Youtube</label>
            <input type="text" name="youtube" class="form-control" value="{{ old('youtube', $question->youtube ?? '') }}">
        </div>
        <div class="form-group">
            <label for="isActive">Status</label>
            <select name="isActive" class="form-control">
                <option value="1" {{ isset($question) && $question->isActive == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ isset($question) && $question->isActive == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($question) ? 'Update' : 'Create' }}</button>
    </form>
    
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('contain');
    </script>
@endsection
