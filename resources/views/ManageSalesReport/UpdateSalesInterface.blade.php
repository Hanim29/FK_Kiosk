@extends('index')
@section('content')
    <div class="container">
        <h2 class="text-center mb-4 text-uppercase">update sales</h2>
        <div class="p-4 mb-3" id="addSaleForm">
            <div class="row" >
                <form method="POST" action="{{  route('sales.update.perform')  }}">
                    @csrf
                    {{-- hidden input fiels --}}
                    <input type="text" class="form-control" name="userID" value={{ Auth::user()->id }} required hidden>
                    <input type="numeric" class="form-control" name="kioskNum" value="1" required hidden>
                    <div class="col-md-6 mx-auto">
                        <div class="form-group row mb-3">
                            <label for="application_number" class="col-sm-4 col-form-label text-end">Month</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="month" required>
                                    <option value="" selected disabled>Select a month</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-3">
                            <label for="application_number" class="col-sm-4 col-form-label text-end">Total Sale Of KIOSK</label>
                            <div class="col-sm-8">
                                <input type="numeric" class="form-control" name="totalSales" placeholder="RM" required>
                            </div>
                        </div>
    
                        <div class="form-group row mb-3" id="secondaryButtons">
                            <div class="col-sm-12 text-center">
                                <button type="button" class="btn btn-danger ml-2" onclick="window.history.back()">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </form>
    </div>

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
				<div class="modal-body text-center text-uppercase">
                    <h1>sale report updated!</h1>
					<h1>
						<i class="bi bi-check-circle-fill text-success"></i>
					</h1>
				</div>
			</div>
		</div>
	</div>
@endsection

