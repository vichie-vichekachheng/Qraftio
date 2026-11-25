@extends('admin.maindesign')

@section('view_orders')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Orders Management</h3>
            <p class="text-muted mb-0">Manage and monitor all customer orders.</p>
        </div>
    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-dark border-0 p-3">
            <div class="d-flex justify-content-end">
                
            </div>
        </div>

        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead>
                        <tr class="text-muted small">
                            <th>ORDER ID</th>
                            <th>ADDRESS</th>
                            <th>PHONE NUMBER</th>
                            <th>USER ID</th>
                            <th>PRODUCT ID</th>
                            <th>STATUS</th>
                            <th>CREATED AT</th>
                            <th class="text-center">ACTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->phone_number }}</td>
                                <td>{{ $order->user_id }}</td>
                                <td>{{ $order->product_id }}</td>

                                <td>
                                    <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill px-3 py-2">
                                        {{ $order->status ?? 'Pending' }}
                                    </span>
                                </td>

                                <td>{{ $order->created_at?->format('d M Y') ?? 'N/A' }}</td>

                                <td class="text-center">
                                    <a href="#" class="btn btn-sm border" title="View">
                                        <i class="bi bi-eye text-primary"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted">
                                    No orders found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>

    </div>

</div>

@endsection