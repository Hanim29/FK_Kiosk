@extends('index')
@php
    $account_type = Auth::user()->account_type;
@endphp
@push("js")
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-8">
                <div class="chart">
                    <h1 class="text-center text-uppercase">kiosk sales by month</h1>
                    <canvas id="sale-chart" class="chart-canvas"></canvas>
                </div>
            </div>
            <div class="col-2 d-flex flex-column justify-content-end">
                @if($account_type == "student" || $account_type == "vendor")
                    <a href="{{ route('sales.add.show') }}" class="btn btn-primary mb-2">Add Report</a>
                    <a href="{{ route('sales.update.show') }}" class="btn btn-primary mb-2">Update Report</a>
                @elseif ($account_type == "admin" || $account_type == "pupuk_admin")
                    <form class="mb-2" method="GET" action="{{ route('sales.index') }}">
                        <div class="form-group row mb-2">
                            <input type="text" class="form-control" id="kioskNum" name="kioskNum" placeholder="KIOSK Number" required>
                        </div>
                        <div class="form-group row mb-2">
                            <button type="submit" class="btn btn-primary mb-2 text-center">Get sales</button>
                        </div>
                    </form>
                    <a href="{{ route('sales.comment') }}" class="btn btn-primary mb-2">Add Comment</a>
                    <a href="{{ route('sales.view') }}" class="btn btn-primary mb-2">View Report</a>
                    @if ($account_type == "admin")
                        <a href="{{ route('sales.delete') }}" class="btn btn-primary mb-2">Delete Report</a>
                    @endif
                @elseif ($account_type == "fk_bursary")
                    <form class="mb-2" method="GET" action="{{ route('sales.index') }}">
                        <div class="form-group row mb-2">
                            <input type="text" class="form-control" id="kioskNum" name="kioskNum" placeholder="KIOSK Number" required>
                        </div>
                        <div class="form-group row mb-2">
                            <button type="submit" class="btn btn-primary mb-2 text-center">Get sales</button>
                        </div>
                    </form>
                    <a href="{{ route('sales.view') }}" class="btn btn-primary mb-2">View Report</a>
                @endif
            </div>
            
        </div>
    </div>
@endsection
@php
    // Assuming $salesByMonth is the array containing month names as keys and sales as values
    $months = [];
    $sales = [];

    // Extract month names and sales values
    foreach ($salesByMonth as $month => $sale) {
        $months[] = $month;
        $sales[] = $sale;
    }
@endphp
@push("js")
<script>
    const ctx = document.getElementById('sale-chart');
    var data = {
        labels: @json($months), // Pass PHP array $months as JSON
        datasets: [
            {
                label: 'Sales',
                data: @json($sales), // Pass PHP array $sales as JSON
                borderWidth: 1
            }
        ]
    };
    new Chart(ctx, {
        type: 'bar',
        data: data,
    });
</script>
  
    
@endpush
