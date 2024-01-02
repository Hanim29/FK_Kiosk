@extends('index')

@section('content')
@php
	// get the role of the current user and render different template
	$account_type = Auth::user()->account_type
@endphp
<div class="container">
	<table class="table m-5">
		<thead class="text-left">
			<tr>
				<th></th>
				<th scope="col">Application</th>
				<th scope="col">Status</th>
				<th scope="col" colspan="2">Action</th>
			</tr>
		</thead>
	<tbody>
	@if($account_type == "student" || $account_type == "vendor")
		<td><i class="bi bi-eye-fill"></i></td>
		<td>{{ $userApplication->appID }}</td>
		@if($userApplication->appStatus == "pending")
			<td>
				<span class="badge rounded-pill text-bg-secondary">{{ $userApplication->appStatus }}</span>
			</td>
			<td>
				<a class="btn btn-primary disabled">Pay</a>
			</td>
			<td>
				<a class="btn btn-success disabled">Update</a>
			</td>
		@else
			<td>
				<span class="badge rounded-pill text-bg-success">{{ $userApplication->appStatus }}</span>
			</td>
			<td>
				<a href="{{ route('payments.create') }}" class="btn btn-primary">Pay</a>
			</td>
			<td>
				<a href="{{ route('payments.update.show', ['appID'=>$userApplication->appID]) }}" class="btn btn-success">Update</a>
			</td>
		@endif
	@elseif ($account_type == "admin")
		@if (!$payments || count($payments) === 0)
			<tr>
				<td colspan="5" class="text-center py-3">
					<div class="alert alert-warning mb-0">
						No records found
					</div>
				</td>
			</tr>
		@else
			@foreach ($payments as $payment)
				<tr>
					@if ($payment['paymentStatus'] == "paid")
						<td><i class="bi bi-eye-fill"></i></td>
						<td>{{ $payment['appID'] }}</td>
						<td>
							<span class="badge rounded-pill text-bg-success">Paid</span>
						</td>
						<td>
							<a href="{{ route('payments.show', ["paymentID"=>$payment['latestPaymentID']]) }}" class="btn btn-primary">View</a>
						</td>
						<td>
							<form action="{{ route('payments.delete', ['paymentID' => $payment['latestPaymentID']]) }}" method="POST">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
							</form>
						</td>
					@else
						<td></td>
						<td>{{ $payment['appID'] }}</td>
						<td>
							<span class="badge rounded-pill text-bg-secondary">Pending</span>
						</td>
						<td></td>
						<td></td>
					@endif
				</tr>
			@endforeach
		@endif
	@elseif ($account_type == "fk_bursary")
		@if (!$payments || count($payments) === 0)
			<tr>
				<td colspan="5" class="text-center py-3">
					<div class="alert alert-warning mb-0">
						No records found
					</div>
				</td>
			</tr>
		@else
			@foreach ($payments as $payment)
				<tr>
					@if ($payment['paymentStatus'] == "paid")
						<td><i class="bi bi-eye-fill"></i></td>
						<td>{{ $payment['appID'] }}</td>
						<td>
							<span class="badge rounded-pill text-bg-success">Paid</span>
						</td>
						<td>
							<a href="{{ route('payments.show', ["paymentID"=>$payment['latestPaymentID']]) }}" class="btn btn-primary">View</a>
						</td>
					@else
						<td></td>
						<td>{{ $payment['appID'] }}</td>
						<td>
							<span class="badge rounded-pill text-bg-secondary">Pending</span>
						</td>
						<td></td>
						<td></td>            
					@endif
				</tr>
			@endforeach
		@endif
	@endif

	</tbody>
	</table>
	{{-- overlay to show admin delete sucessful --}}
	@if(session('showSucess'))
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var successModal = new bootstrap.Modal(document.getElementById('paymentSuccessModal'));
			successModal.show();
		});
	</script>
	@endif
	<div class="modal fade" id="paymentSuccessModal" tabindex="-1" aria-labelledby="paymentSuccessModal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body text-center">
					<h1>
						<i class="bi bi-check-circle-fill text-success"></i>
					</h1>
					<p>Payment deleted</p>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
