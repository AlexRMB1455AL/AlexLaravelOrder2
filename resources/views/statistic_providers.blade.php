@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Статистика по выполненным заказам</h4>

    <table class="table table-bordered table-striped">
        <thead class="table-secondary">
            <tr>
                <th>Provider ID</th>
                <th>Earnings (₽)</th>
                <th>Total Time (hours)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ordersproviders as $ordersprovider)
            <tr>
                <td>{{ $ordersprovider->provider_id }}</td>
                <td>{{ $ordersprovider->earnings }}</td>
                <td>{{ $ordersprovider->total_time }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection