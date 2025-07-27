@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Статистика по выполненным заказам</h4>

    <table class="table table-bordered table-striped">
        <thead class="table-secondary">
            <tr>
                <th>ID</th>
                <th>Service_id</th>
                <th>Total Time (hours)</th>
                <th>Earnings (₽)</th>
                <th>created_at</th>
                <th>updated_at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ordersproviders as $ordersprovider)
            <tr>
                <td>{{ $ordersprovider->id }}</td>
                <td>{{ $ordersprovider->service_id }}</td>
                <td>{{ $ordersprovider->total_time }}</td>
                <td>{{ $ordersprovider->earnings }}</td>
                <td>{{ $ordersprovider->created_at }}</td>
                <td>{{ $ordersprovider->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection