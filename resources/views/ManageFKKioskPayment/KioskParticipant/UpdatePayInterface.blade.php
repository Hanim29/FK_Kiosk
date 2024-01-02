@extends('index')
@section('content')
    <div class="container">
        <h2 class="text-center mb-4 text-uppercase">Update Payment Information</h2>
        <form class="p-4 mb-3" id="paymentForm" method="POST" action="{{ route('payments.update.perform', ["paymentID"=>$paymentRecord->paymentID]) }}">
            @csrf
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="form-group row mb-3">
                        <label for="application_number" class="col-sm-4 col-form-label text-end">Application Number:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="application_number" name="appID" value="{{ $paymentRecord->appID}}"required>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="phone_number" class="col-sm-4 col-form-label text-end">Phone Number:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="phone_number" name="phoneNum" value="{{ $paymentRecord->phoneNum }}" required>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="email" class="col-sm-4 col-form-label text-end">Email:</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email" value="{{ $paymentRecord->email }}" required>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="date_of_payment" class="col-sm-4 col-form-label text-end">Date of Payment:</label>
                        <div class="col-sm-8">
                            <input type="datetime-local" class="form-control" id="date_of_payment" name="payDate" value="{{ \Carbon\Carbon::parse($paymentRecord->payDate)->format('Y-m-d H:i:s') }}" required>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="kiosk_number" class="col-sm-4 col-form-label text-end">KIOSK Number:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="kiosk_number" name="kioskNum" value="{{ $paymentRecord->kioskNum }}" required>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="total_payment" class="col-sm-4 col-form-label text-end">Total Payment:</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="total_payment" name="totalPay" value="{{ $paymentRecord->totalPay }}" required>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="payment_method" class="col-sm-4 col-form-label text-end">Payment Method:</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="payment_method" name="payMethod" required>
                                <option value="cash" {{ ($paymentRecord->payMethod == "cash") ? 'selected' : '' }} >Cash</option>
                                <option value="card" {{ ($paymentRecord->payMethod == "card") ? 'selected' : '' }}>Card</option>
                                <option value="online" {{ ($paymentRecord->payMethod == "online") ? 'selected' : '' }}>Online</option>
                                <!-- Add more payment method options as needed -->
                            </select>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <div class="form-group row mb-3" id="initialButtons">
                        <div class="col-sm-12 text-center">
                            <button class="btn btn-primary" id="submitButton" onclick="submitToConfirm()">Submit</button>
                        </div>
                    </div>

                    <!-- "Cancel" and "Pay" buttons initially hidden -->
                    <div class="form-group row mb-3" id="secondaryButtons" style="display: none;">
                        <div class="col-sm-12 text-center">
                            <button type="button" class="btn btn-danger ml-2" onclick="cancelAction()">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        {{-- overlay to show update sucessful --}}
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
                        <p>Update sucessful</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    // Function to handle form submission
    function submitToConfirm() {
        event.preventDefault(); // Prevent the default form submission
        
        // Get all form elements by their tag name
        var formElements = document.getElementById('paymentForm').getElementsByTagName('input');
        
        // Loop through form elements to set them as readonly
        for (var i = 0; i < formElements.length; i++) {
            formElements[i].readOnly = true;
        }
        
        // Disable the submit button after form submission
        document.getElementById('submitButton').disabled = true;

        // add border to the form
        document.getElementById('paymentForm').classList.add('border', 'border-dark', 'rounded');
        
        // Hide the initial submit button and show Pay and Cancel buttons
        document.getElementById('initialButtons').style.display = 'none';
        document.getElementById('secondaryButtons').style.display = 'block';
    }

    // Function to handle cancel action
    function cancelAction() {
        // Show the initial submit button and hide Pay and Cancel buttons
        document.getElementById('initialButtons').style.display = 'block';
        document.getElementById('secondaryButtons').style.display = 'none';
        
        // Enable the form fields and submit button again
        var formElements = document.getElementById('paymentForm').getElementsByTagName('input');
        for (var i = 0; i < formElements.length; i++) {
            formElements[i].readOnly = false;
        }

        // remove the form border
        document.getElementById('paymentForm').classList.remove('border', 'border-dark', 'rounded');
        
        document.getElementById('submitButton').disabled = false;
    }
</script>
@endpush
