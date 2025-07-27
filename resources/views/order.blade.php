@extends('layouts.app')
@section('content')
<div class="container mt-4">
  <div class="row">
    <div class="col-6 mx-auto bg-primary text-white p-3">
      <div class="container mt-4">
<form action="{{ route('orders.store') }}" method="POST">
    @csrf

    <!-- Provider ID -->
    <div class="mb-3">
        <label for="provider_id" class="form-label">Provider ID</label>
        <input type="number" class="form-control" id="provider_id" name="provider_id" required>
    </div>

    <!-- Service ID -->
    <div class="mb-3">
        <label for="service_id" class="form-label">Service ID</label>
        <input type="number" class="form-control" id="service_id" name="service_id" required>
    </div>

    <!-- Total Time -->
    <div class="mb-3">
        <label for="total_time" class="form-label">Total Time (hours)</label>
        <input type="number" class="form-control" id="total_time" name="total_time" required>
    </div>

    <!-- Earnings -->
    <div class="mb-3">
        <label for="earnings" class="form-label">Earnings (₽)</label>
        <input type="number" step="0.01" class="form-control" id="earnings" name="earnings" required>
    </div>

    <!-- Status (с выпадающим списком) -->
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status" required>
        <option value="created">created</option>
        <option value="payed">payed</option>
        <option value="started">started</option>
        <option value="finished">finished</option>
        <option value="confirmed">confirmed</option>
        <option value="closed">closed</option>
        <option value="canceled">canceled</option>
        </select>
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-primary">Save</button>
</form>

</div>
</div>
<div class="conteiner mt-4">
<div class="text-center mb-4">
        <a href="{{ route('orders.stats') }}">Go to statistic 7 days with status 'confirmed'</a>
  </div>
  </div>  
  <div class="container mt-5">
    <form action="{{ route('orders.statsprovider') }}" method="POST">
        @csrf

        <!-- Выпадающий список Provider -->
        <div class="mb-3">
            <label for="provider_id" class="form-label">provider_id)</label>
            <select class="form-select" name="provider_id" id="provider_id">
             @foreach($providers as $provider)
            <option value="{{ $provider }}">{{ $provider }}</option>
             @endforeach

            </select>
        </div>

        <!-- Выпадающий список Статуса -->
        <div class="mb-3">
            <label for="status" class="form-label">status</label>
            <select class="form-select" name="status" id="status">
                <option value="created">created</option>
        <option value="payed">payed</option>
        <option value="started">started</option>
        <option value="finished">finished</option>
        <option value="confirmed">confirmed</option>
        <option value="closed">closed</option>
        <option value="canceled">canceled</option>
            </select>
        </div>

        <!-- Кнопка отправки -->
        <button type="submit" class="btn btn-primary">Go to statistic for provider_id</button>
    </form>
</div>
  
@endsection