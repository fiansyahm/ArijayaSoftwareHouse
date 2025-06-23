@extends('template-wpadmin')

@section('navbar_menu_report','active')

@section('main')
    <h1>{{ isset($templatereport) ? 'Edit' : 'Buat' }} Template Laporan</h1>
    <form action="{{ isset($templatereport) ? route('reports.update', $templatereport->id) : route('reports.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($templatereport))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="name">Name</label>
            <select class="form-select" name="id_absence" id="id_absence">
              @foreach($users as $user)
                  <option value="{{$user->id}}" 
                  @if($id==$user->id)  
                  selected
                  @endif
                  >{{$user->name}}</option>
              @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="contain">Contain</label>
            <textarea name="contain" id="contain" class="form-control" required>{{ old('contain', $templatereport->contain ?? '') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($templatereport) ? 'Update' : 'Create' }}</button>
    </form>
    
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('contain');

        document.getElementById('id_absence').onchange = function() {
            window.location.href = '/report/create/' + this.value;
        };
    </script>
@endsection
