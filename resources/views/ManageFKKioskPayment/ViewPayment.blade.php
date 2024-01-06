@extends('index')
@section('content')
    <div class="container">
        <h2 class="text-center mb-4 text-uppercase">Payment Information</h2>
        <div class="p-4 mb-3" id="paymentForm">
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

                    <!-- "Cancel" and "Pay" buttons initially hidden -->
                    <div class="form-group row mb-3 no-print" id="secondaryButtons">
                        <div class="col-sm-12 text-center">
                            <button type="button" class="btn btn-danger ml-2" onclick="window.history.back()">Cancel</button>
                            <button type="button" class="btn btn-primary" onclick="window.print()">Print</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
