@extends('template-wpadmin')
@section('navbar_menu_question','active')
@section('main')
    <h1 class="text-center mt-2">Questions</h1>
    <a href="{{ route('questions.create') }}" class="btn btn-primary">Add Question</a>
    <div class="justify-content-center text-center">
        <div class="btn-group" role="group">
            <a href="/question/all" class="btn btn-primary mb-3">All</a>
            <a href="/question/customer" class="btn btn-success mb-3">Customer</a>
            <a href="/question/admin" class="btn btn-danger mb-3">Admin</a>
            <a href="/question/member" class="btn btn-info mb-3">Member</a>
            <a href="/question/training" class="btn btn-warning mb-3">Training</a>
            <a href="/question/prompt" class="btn btn-secondary mb-3">Prompt</a>
            {{-- <a href="/question/shopee" class="btn btn-secondary mb-3" style="background-color: orange">Shopee</a>
            <a href="/question/shopee2" class="btn btn-secondary mb-3" style="background-color: rgb(116, 89, 39)">Shopee</a>
            <a href="/question/karenapp" class="btn btn-secondary mb-3" style="background-color: rgb(106, 16, 224)">Karen App</a> --}}
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Contain</th>
                <th>Image</th>
                <th>Youtube</th>
                <th>Peruntukan </th>
                <th>Status </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
                <tr>
                    <td>{{ $question->name }}</td>
                    <td>{!! $question->contain !!}</td>
                    <td><img src="{{ Storage::url($question->image) }}" alt="{{ $question->name }}" width="100"></td>
                    <td>{{ $question->youtube }}</td>
                    <td>{{{ $question->usertype}}}</td>
                    @if($question->isActive == 1)
                        <td class="text-success">Active</td>
                    @else
                        <td class="text-danger">Not Active</td>
                    @endif
                    <td>
                        <a href="{{ route('questions.edit', $question->id) }}" class="mt-2 btn btn-warning">Edit</a>
                        <form action="{{ route('questions.destroy', $question->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="mt-2 btn btn-danger"onclick="return confirm('Apakah kamu yakin?')">Delete</button>
                        </form>
                        @if($question->usertype == 'shopee2')
                            <a href="/question/{{$question->id}}/change/shopee" class="mt-2 btn btn-info">ACC</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
