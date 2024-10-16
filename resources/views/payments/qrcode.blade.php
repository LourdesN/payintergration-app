@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h2 class="text-lg font-semibold">Generated QR Code</h2>

    @if(isset($qrcode))
        <img src="{{ $qrcode }}" alt="QR Code" />
    @else
        <p>No QR code generated.</p>
    @endif
</div>
@endsection

