@extends('invitation.template')
@section('main')
<div class="container text-center">
    <h1>{{$pendingpayment->id}} Pending Payment</h1>
    <iframe src="https://www.veed.io/embed/{{$video->url}}" height="504" frameborder="0" title="Template Bunga Goyang (2) Wulan Agung.mp4" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
</div>           

@endsection
