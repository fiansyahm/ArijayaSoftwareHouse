@extends('template-wpadmin')
@section('navbar_dashboard', 'active')
@section('main')
    <h2>Purchase Order</h2>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div id="editorView">
        <div class="form-group">
            <label for="file">File HTML</label>
            <div id="editor" style="height: 400px; width: 100%;">{{ $getpo }}</div>
            <textarea name="file" id="file" style="display:none;"></textarea>
        </div>
    </div>

    <!-- Include Ace Editor -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.14/ace.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.14/ext-searchbox.js"></script>
    <script>
        // Initialize Ace Editor
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/chrome"); // Change theme to 'chrome' for light background
        editor.session.setMode("ace/mode/html");
        editor.setOptions({
            maxLines: Infinity,
            autoScrollEditorIntoView: true,
            useSoftTabs: true,
            showFoldWidgets: true,
            tabSize: 4
        });

        // Enable search and highlight functionality
        ace.require("ace/ext/searchbox").Search(editor);

    </script>

    <!-- Custom CSS for search highlight -->
    <style>
        .ace_search_highlight {
            background-color: blue;
        }
    </style>
@endsection
