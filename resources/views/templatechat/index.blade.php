@extends('template-wpadmin')
@section('navbar_menu_templatechat', 'active')
@section('main')
    <h1>Template Admin</h1>
    <a href="{{ route('templatechats.create') }}" class="btn btn-primary">Tambah Template Admin</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Contain</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($templatechats as $templatechat)
                <tr>
                    <td>{{ $templatechat->name }}</td>
                    <td>
                        <div class="content-preview" id="content-preview-{{ $templatechat->id }}">
                            {!! Str::limit(strip_tags($templatechat->contain), 100) !!}
                            @if(strlen(strip_tags($templatechat->contain)) > 100)
                                <button class="btn btn-link toggle-content" data-id="{{ $templatechat->id }}">Show More</button>
                            @endif
                        </div>
                        <div id="full-content-{{ $templatechat->id }}" class="full-content" style="display: none;">
                            {!! $templatechat->contain !!}
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('templatechats.edit', $templatechat->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('templatechats.destroy', $templatechat->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            {{-- confirmasi deete --}}
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        <button class="btn btn-secondary" onclick="copyToClipboard(`{!! $templatechat->contain !!}`)">Copy</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.toggle-content').on('click', function() {
                const id = $(this).data('id');
                const fullContent = $('#full-content-' + id);
                const previewContent = $('#content-preview-' + id);
                const button = $(this);

                if (fullContent.is(':visible')) {
                    fullContent.hide();
                    button.text('Show More');
                } else {
                    fullContent.show();
                    fullContent[0].scrollIntoView({ behavior: 'smooth' });
                    button.text('Show Less');
                }
            });
        });

        async function copyToClipboard(content) {
            try {
                // Remove <p> tags from the content
                content = content.replace(/<p>/g, '').replace(/<\/p>/g, '');

                // Convert HTML tags to WhatsApp Markdown-like syntax
                let formattedContent = content
                    .replace(/<b>(.*?)<\/b>/g, '*$1*')  // Bold to WhatsApp bold
                    .replace(/<strong>(.*?)<\/strong>/g, '*$1*')  // Strong to WhatsApp bold
                    .replace(/<i>(.*?)<\/i>/g, '_$1_')  // Italic to WhatsApp italic
                    .replace(/<em>(.*?)<\/em>/g, '_$1_')  // Emphasis to WhatsApp italic
                    .replace(/<br\s*\/?>/g, '\n')  // Replace <br> tags with new lines
                    .replace(/&nbsp;/g, "\n")  // Replace &nbsp; with new lines
                    .replace(/amp;/g, "&"); // change &amp; to &
                 // Check if {kode} exists
                if (!content.includes('{kode}')) {
                    alert('Tidak ada {kode} pada pertanyaan');
                } else {
                    alert('Ada {kode} pada pertanyaan');
                    // Fetch the code
                    const response = await fetch('/code/get');
                    const data = await response.json();
                    
                    if (data) {
                        const kode = data.kode;
                        // Replace {kode} with the fetched code
                        formattedContent = formattedContent.replace(/{kode}/g, kode);
                    } else {
                        console.error('Error: Code data is null');
                    }
                }

                // Create a temporary textarea to copy the formatted text content
                const textArea = document.createElement("textarea");
                textArea.value = formattedContent;
                document.body.appendChild(textArea);
                textArea.select();
                document.execCommand("Copy");
                document.body.removeChild(textArea);

                alert('Copied: ' + formattedContent);
            } catch (error) {
                console.error('Error fetching code:', error);
            }
        }
    </script>
@endsection
