<body>
    @extends('index')
    @section('content')

    <div class="container-fluid"> <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <style>
              .card-header {
                text-align: center;
                font-weight: bold;
              }
    
              /* Stretch form elements */
              .form-group {
                width: 100%;
              }
    
              /* Align vendor options horizontally */
              .vendor-option {
                display: inline-block;
                margin-right: 10px;
              }
            </style>
            <div class="card-header">{{ __('Approval Kiosk Application') }}</div>
    
            <div class="card-body">
                <form method="POST" action="{{ route('applications.adminupdate', $applications->appID) }}">
                    @csrf
                    @method('PUT')
                <div class="form-group">
                  <p><b>Select Vendor Placement</b></p>
                  <div class="row justify-content-center">
                    <div class="col-10">
                      <div class="vendor-option d-flex justify-content-between" >
                        <input type="radio" id="1" name="vendorSelect" value="1" {{ $applications->vendorSelect == 1 ? 'checked' : ''}} disabled>
                        <label for="vendor1">Vendor 1</label>
                        <input type="radio" id="2" name="vendorSelect" value="2" {{ $applications->vendorSelect == 2 ? 'checked' : ''}} disabled>
                        <label for="vendor2">Vendor 2</label>
                      </div>
                      <div class="vendor-option d-flex justify-content-between">
                        <input type="radio" id="3" name="vendorSelect" value="3" {{ $applications->vendorSelect == 3 ? 'checked' : ''}} disabled>
                        <label for="vendor3">Vendor 3</label>
                        <input type="radio" id="4" name="vendorSelect" value="4" {{ $applications->vendorSelect == 4 ? 'checked' : ''}} disabled>
                        <label for="vendor4">Vendor 4</label>
                      </div>
                    </div>
                  </div>
                </div>
    
                <div class="form-group">
                  <p><b>Date for Rental</b></p>
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <label for="dateRentFrom">From:</label>
                      <input type="date" id="dateRentFrom" name="dateRentFrom" class="form-control" value="{{ $applications->dateRentFrom}}" disabled>
                      @error('dateRentFrom')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="dateRentTo">To:</label>
                      <input type="date" id="dateRentTo" name="dateRentTo" class="form-control" value="{{ $applications->dateRentTo}}" disabled>
                      @error('dateRentTo')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                </div>
    
                <div class="form-group">
                  <p><b>Business Details</b></p>
                  <label for="name">Name</label>
                  <input type="text" id="bizName" name="bizName" class="form-control" value="{{ $applications->bizName}}" disabled>
                  @error('bizName')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
    
                  <label for="ssmNo">SSM Registration Number</label>
                  <input type="text" id="ssmNo" name="ssmNo" class="form-control" value="{{ $applications->ssmNo}}" disabled>
                  @error('ssmNo')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror

                  <label for="bizType">Business Type</label>
              <select id="bizType" name="bizType" class="form-control custom-select" value="{{ $applications->bizType}}" disabled>
                <option value="" selected disabled>Choose a business type</option>
                <option value="food" {{ $applications->bizType == 'food' ? 'selected' : '' }}>Food</option>
                <option value="drinks" {{ $applications->bizType == 'drinks' ? 'selected' : '' }}>Drinks</option>
                <option value="flowers" {{ $applications->bizType == 'flowers' ? 'selected' : '' }}>Flowers</option>
                </select>
                <br>
                                    
                    <div class="form-group">
                        <p><b>Application Status</b></p>
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <div class="vendor-option d-flex justify-content-between">
                                    <input type="radio" id="accepted" name="appStatus" value="accepted">
                                    <label for="accepted">Accepted</label>
                                </div>
                                <div class="vendor-option d-flex justify-content-between">
                                    <input type="radio" id="rejected" name="appStatus" value="rejected">
                                    <label for="rejected">Rejected</label>
                                </div>
                            </div>
                        </div>
                    </div>


                
                <style>
                .custom-select {
                    padding-right: 30px; /* Adjust for arrow size */
                    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='%23333' d='M2 0L0 2h4zm0 5L0 3h4z'/%3E%3C/svg%3E");
                    background-position: right 10px center; /* Adjust for arrow position */
                    background-repeat: no-repeat;
                    background-size: 12px 10px; /* Adjust for arrow size */
                }
                </style>
          </div>
        </div>
        <div class="row mb-0">
            <div class="col-12 text-center">
                <a href="{{ route('applications.index') }}" class="btn btn-primary">{{ __('Submit') }}</a>
                                <br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
</body>    
