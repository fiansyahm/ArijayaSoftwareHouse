@extends('template-wpadmin')

@section('navbar_menu_templatechat','active')

@section('main')
    <h1>{{ isset($templatechat) ? 'Edit' : 'Create' }} Template Admin</h1>
    <form action="{{ isset($templatechat) ? route('templatechats.update', $templatechat->id) : route('templatechats.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($templatechat))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $templatechat->name ?? '') }}" required>
        </div>
        <div class="form-group">
            <label for="contain">Contain</label>
            <textarea name="contain" id="contain" class="form-control" required>{{ old('contain', $templatechat->contain ?? '') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($templatechat) ? 'Update' : 'Create' }}</button>
    </form>
    
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('contain');
    </script>
@endsection
