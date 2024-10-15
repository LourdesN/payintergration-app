@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="container mx-auto">
    <h2 class="text-lg font-semibold">Initiate STK Push</h2>

    <!-- Form for Initiating STK Push -->
    <form action="{{ route('payments.initiateSTKPush') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter Phone Number" required>
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" placeholder="Enter Amount" required>
            @error('amount')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Pay Now</button>
    </form>
</div>
@endsection

