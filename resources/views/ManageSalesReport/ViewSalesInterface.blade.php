{{-- view sale report, for admin pupuk admin fk bursary --}}
{{-- use enable_action for admins account to delete or add comment --}}
@php
    $account_type = Auth::user()->account_type;
@endphp

@extends('index')
@section('content')
    <div class="container">
        <div class="p-4 mb-3">
            <div class="row">
                <form id="salesForm" method="GET" action="{{  route('sales.view.get')  }}">
                    <input type="text" class="form-control" name="routeName" value={{ Route::currentRouteName() }} required hidden>
                    <h2 class="text-center mb-4 text-uppercase">Sale report</h2>
                    <div class="col-md-6 mx-auto">
                        <div class="form-group row mb-3">
                            <label for="kioskNum" class="col-sm-4 col-form-label text-end">KIOSK Number</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kioskNum" name="kioskNum" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="application_number" class="col-sm-4 col-form-label text-end">Month</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="month" required>
                                    <option value="" disabled>Select a month</option>
                                    <option value="1" selected>January</option>
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

                        {{-- tell controller to get data --}}
                        <div class="form-group row mb-3">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary">Get sales</button>
                            </div>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
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
            {{-- if there is data --}}
            @if(session()->has('fetchedData'))
                <div class="row">
                    <form method="POST" action="
                    @if(Route::currentRouteName() == 'sales.delete')
                        {{ route('sales.delete.perform') }}
                    @elseif(Route::currentRouteName() == 'sales.comment')
                        {{ route('sales.comment.perform') }}
                    @endif
                    "
                    class="border border-dark p-4">
                        {{-- hidden inputs --}}
                        <input type="text" class="form-control" name="salesID" value="{{ session('fetchedData')->salesID }}"required readonly hidden>
                        
                        @if(Route::currentRouteName() == 'sales.delete')
                            @method('DELETE')
                        @endif

                        @csrf
                        <div class="form-group row mb-3">
                            <label for="totalSale" class="col-sm-4 col-form-label text-end">Total Sale Of KIOSK</label>
                            <div class="col-sm-8">
                                <input type="numerix" class="form-control" id="totalSale" name="total_sale" placeholder="RM"  value={{  session('fetchedData')->totalSales  }} required readonly >
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="saleComment" class="col-sm-4 col-form-label text-end">Comment</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="saleComment" onclick="handleTextareaClick()" required  @if(Route::currentRouteName() != "sales.comment") readonly @endif>{{  session('fetchedData')->comment  }}</textarea>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 text-center">
                            {{-- delete actions for admins --}}
                            @if(Route::currentRouteName() == "sales.delete")
                                @if($account_type == "admin")
                                    <button type="button" class="btn btn-danger ml-2" onclick="window.history.back()">Cancel</button>
                                    <button type="submit" class="btn btn-primary ml-2">Delete</button>
                                @endif
                            {{-- comment actions for admins --}}
                            @elseif(Route::currentRouteName() == "sales.comment")
                                @if($account_type == "admin"||$account_type == "pupuk_admin")
                                    <button type="button" class="btn btn-danger ml-2" onclick="window.history.back()">Cancel</button>
                                    <button type="submit" class="btn btn-primary ml-2">Submit</button>
                                @endif
                            @else
                                <button type="button" class="btn btn-primary ml-2" onclick="window.history.back()">Done</button>
                            @endif
                        </div>
                    </form>
                </div>
            @endif
        </div>

    </div>
    @if(session('commentSucess'))
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var successModal = new bootstrap.Modal(document.getElementById('commentSuccessModal'));
			successModal.show();
		});
	</script>
	@endif
	<div class="modal fade" id="commentSuccessModal" tabindex="-1" aria-labelledby="commentSuccessModal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body text-center text-uppercase">
                    <h1>comment added!</h1>
					<h1>
						<i class="bi bi-check-circle-fill text-success"></i>
					</h1>
				</div>
			</div>
		</div>
	</div>
    @if(session('deleteSucess'))
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var successModal = new bootstrap.Modal(document.getElementById('deleteSuccessModal'));
			successModal.show();
		});
	</script>
	@endif
	<div class="modal fade" id="deleteSuccessModal" tabindex="-1" aria-labelledby="deleteSuccessModal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body text-center text-uppercase">
                    <h1>Report deleted  !</h1>
					<h1>
						<i class="bi bi-check-circle-fill text-success"></i>
					</h1>
				</div>
			</div>
		</div>
	</div>
@endsection
@push('js')
<script>
    // Define the JavaScript function to execute when the textarea is clicked
    function handleTextareaClick() {
        <?php $enable_action = true; ?>;
        // Change the display style of the admins_actions element to 'block'
        document.getElementById('admins_actions').style.display = 'block';
        document.getElementById('done_button').style.display = 'none';
    }
</script>
@endpush
