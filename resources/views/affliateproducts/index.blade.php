@extends('template-wpadmin')

@section('navbar_menu_affliate', 'active')

@section('main')
<div class="container">
    <h1>Affliate Products</h1>
    <a href="{{ route('affliateproducts.create') }}" class="btn btn-primary">Add New Product</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>URL</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($affliateproducts as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->url }}</td>
                    <td>{{ $product->isActive ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('affliateproducts.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                        <button class="btn btn-info" onclick="copyToClipboard('{{ $product->url }}')">Copy</button>
                        <form action="{{ route('affliateproducts.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script>
function copyToClipboard(text) {
    var textarea = document.createElement("textarea");
    textarea.value = text;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand("copy");
    document.body.removeChild(textarea);
    alert("URL copied to clipboard!");
}
</script>
@endsection