<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ConnectHub</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Vendor CSS Files -->
  <link href="{{ asset('NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('NiceAdmin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
<link href="{{ asset('NiceAdmin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
<link href="{{ asset('NiceAdmin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
<link href="{{ asset('NiceAdmin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="{{ asset('NiceAdmin/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 09 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body style="background:white" >
  <main>
  @if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    <div class="container">

      <section class="section  register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4" style="background: url('/images/istockphoto-616858578-612x612.jpg') center no-repeat; ">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3" style="background: rgba(255, 255, 255, 0.5);width:100%">
                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                  </div>

                            <!-- Extra Large Modal -->
                <button type="button" class="btn btn-primary " style="margin:14px; width:100%" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">
                Customer
            </button>

            <button type="button" class="btn btn-primary ml-2"  style="margin:14px;width:100%" data-bs-toggle="modal" data-bs-target="#ExtralargeModal1">
                Service Provider
            </button>



              <!-- Your modal code with Font Awesome icons -->
<div class="modal fade" id="ExtralargeModal" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Customer Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3">
          <div class="col-md-4 mb-3">
            <label for="customerName" class="form-label">Name</label>
            <input type="text" class="form-control" id="customerName" placeholder="Enter your name" style="border: 1px solid #ced4da;">
          </div>
          <div class="col-md-4 mb-3">
            <label for="customerEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="customerEmail" placeholder="Enter your email" style="border: 1px solid #ced4da;">
          </div>
          <div class="col-md-4 mb-3">
            <label for="customerPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="customerPassword" placeholder="Enter your password" style="border: 1px solid #ced4da;">
          </div>

          <div class="col-md-4 mb-3">
            <label for="customerName" class="form-label">County</label>
            <select class="form-select" id="county" style="border: 1px solid #ced4da;">
        <option value="">Select County</option>
        <!-- Replace the options below with dynamically generated options if needed -->
        @foreach($counties as $county)
         <option value="{{ $county->id }}">{{ $county->county_name }}</option>
        @endforeach
    </select>
          </div>
          <div class="col-md-4 mb-3">
            <label for="subcounty" class="form-label">Sub-county</label>
            <select class="form-select" id="subcounty">
     <option value="">Select Subcounty</option>
     </select>
          </div>
          <div class="col-md-4 mb-3">
            <label for="customerPassword" class="form-label">Ward</label>
            <select class="form-select" id="ward">
             <option value="">Select Ward</option>
              </select>
          </div>
          <div class="col-md-4 mb-3">
            <label for="customerName" class="form-label">Area</label>
            <select class="form-select" id="area">
             <option value="">Select Area</option>
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <label for="customerName" class="form-label">Contact Information</label>
            <input type="text" class="form-control" id="customerName" placeholder="Enter your name" style="border: 1px solid #ced4da;">
          </div>
            
          <div class="col-md-4 mb-3">
            <label for="profilePic" class="form-label">Profile Picture</label>
            <div class="input-group">
              <input type="file" class="form-control" id="profilePic" accept="image/*">
              <label class="input-group-text" for="profilePic"><i class="fas fa-upload"></i></label>
            </div>
          </div>
          <div class="col-md-4 mb-3">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
          <!-- Add more fields as needed -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

   <!-- Extra Large Modal -->
   

              <div class="modal fade" id="ExtralargeModal1" tabindex="-1">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Service Providers</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('service-providers.store') }}" method="POST" class="row g-3">
    @csrf          
    <div class="col-md-4 mb-3">
            <label for="customerName" class="form-label">Name</label>
            <input type="text" class="form-control" id="customerName" name="name" placeholder="Enter your name" style="border: 1px solid #ced4da;" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="customerEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="customerEmail"  name="email" placeholder="Enter your email" style="border: 1px solid #ced4da; " required>
          </div>
          <input type="hidden" name="role" value="2">

          <div class="col-md-4 mb-3">
            <label for="customerPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="customerPassword" name="password" placeholder="Enter your password" style="border: 1px solid #ced4da;" required>
          </div>
          <div class="col-md-4 mb-3">
    <label for="gender" class="form-label">Gender</label>
    <select class="form-select" id="gender" name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select>
</div>

<div class="col-md-4 mb-3">
    <label for="countySelect" class="form-label">County</label>
    <select class="form-select" id="countySelect" name="county_id" style="border: 1px solid #ced4da;">
        <option value="">Select County</option>
        <!-- Replace the options below with dynamically generated options if needed -->
        @foreach($counties as $county)
         <option value="{{ $county->id }}">{{ $county->county_name }}</option>
        @endforeach
    </select>
</div>

<div class="col-md-4 mb-3">
    <label for="subcountySelect" class="form-label">SubCounty</label>
    <select class="form-select" id="subcountySelect" name="subcounty_id">
     <option value="">Select Subcounty</option>
    </select>
</div>
          <div class="col-md-4 mb-3">
            <label for="customerPassword" class="form-label">Ward</label>
            <select class="form-select" id="wardSelect" name="ward_id">
             <option value="">Select Ward</option>
              </select>
          </div>
          <div class="col-md-4 mb-3">
            <label for="customerName" class="form-label">Area</label>
            <select class="form-select" id="areaSelect" name="area_id">
             <option value="">Select Area</option>
              </select>
          </div>
          <div class="col-md-4 mb-3">
    <label for="serviceCategory" class="form-label">Service Category</label>
    <select class="form-select" id="serviceCategory" name="service_category_id" style="border: 1px solid #ced4da;">
        <option value="">Select Service Category</option>
        @foreach($serviceCategories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>

<div class="col-md-4 mb-3">
    <label for="service" class="form-label">Service</label>
    <select class="form-select" id="service" name="service_id" style="border: 1px solid #ced4da;">
        <option value="">Select Service</option>
    </select>
</div>
          <div class="col-md-4 mb-3">
            <label for="customerName" class="form-label">Contact Information</label>
            <input type="text" class="form-control" id="customerName" name="contact_information" placeholder="Enter your contact" style="border: 1px solid #ced4da;">
          </div>
          <div class="col-md-4 mb-3">
            <label for="customerEmail" class="form-label">Business Name</label>
            <input type="text" class="form-control" id="customerEmail" name="business_name" placeholder="Enter your Business Name" style="border: 1px solid #ced4da;">
          </div>
          <div class="col-md-4 mb-3">
            <label for="customerEmail" class="form-label">Business Description</label>
            <input type="text" class="form-control" id="customerEmail" name="business_description" placeholder="Enter your Business Name" style="border: 1px solid #ced4da;">
          </div> 
          <div class="col-md-4 mb-3">
            <label for="customerEmail" class="form-label">Website</label>
            <input type="text" class="form-control" id="customerEmail" name="website" placeholder="Enter your Business Website" style="border: 1px solid #ced4da;">
          </div>
          <div class="col-md-4 mb-3">
    <label for="qualification" class="form-label">Qualification</label>
    <select class="form-select" id="qualification" name="qualifications" style="border: 1px solid #ced4da;">
        <option value="">Select Qualification</option>
        <option value="diploma">Diploma</option>
        <option value="bachelor">Bachelor's Degree</option>
        <option value="master">Master's Degree</option>
        <option value="phd">PhD</option>
        <!-- Add more qualifications as needed -->
    </select>
</div>

          <div class="col-md-4 mb-3">
            <label for="profilePic" class="form-label">Profile Picture</label>
            <div class="input-group">
              <input type="file" class="form-control" name="profile_pic" id="profilePic" accept="image/*">
              <label class="input-group-text" for="profilePic"><i class="fas fa-upload"></i></label>
            </div>
          </div>
          <div class="col-md-4 mb-3">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
          <!-- Add more fields as needed -->
        </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Extra Large Modal-->


                </div>
              </div>

             

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- Vendor JS Files -->
<script src="{{ asset('NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('NiceAdmin/assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('NiceAdmin/assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('NiceAdmin/assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('NiceAdmin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('NiceAdmin/assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('NiceAdmin/assets/js/main.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#county').change(function() {
            var countyId = $(this).val();
            if (countyId) {
                $.ajax({
                    url: "{{ route('getSubcountiesByCounty') }}",
                    type: "GET",
                    data: {county_id: countyId},
                    success: function(response) {
                        $('#subcounty').empty();
                        $('#subcounty').append('<option value="">Select Subcounty</option>');
                        $.each(response, function(key, value) {
                            $('#subcounty').append('<option value="' + value.id + '">' + value.subcounty_name + '</option>');
                        });
                    }
                });
            } else {
                $('#subcounty').empty();
                $('#subcounty').append('<option value="">Select Subcounty</option>');
            }
        });

        $('#subcounty').change(function() {
            var subcountyId = $(this).val();
            if (subcountyId) {
                $.ajax({
                    url: "{{ route('getWardsBySubcounty') }}",
                    type: "GET",
                    data: {subcounty_id: subcountyId},
                    success: function(response) {
                        $('#ward').empty();
                        $('#ward').append('<option value="">Select Ward</option>');
                        $.each(response, function(key, value) {
                            $('#ward').append('<option value="' + value.id + '">' + value.ward_name + '</option>');
                        });
                    }
                });
            } else {
                $('#ward').empty();
                $('#ward').append('<option value="">Select Ward</option>');
            }
        });

        $('#ward').change(function() {
            var wardId = $(this).val();
            if (wardId) {
                $.ajax({
                    url: "{{ route('getAreasByWard') }}",
                    type: "GET",
                    data: {ward_id: wardId},
                    success: function(response) {
                        $('#area').empty();
                        $('#area').append('<option value="">Select Area</option>');
                        $.each(response, function(key, value) {
                            $('#area').append('<option value="' + value.id + '">' + value.area_name + '</option>');
                        });
                    }
                });
            } else {
                $('#area').empty();
                $('#area').append('<option value="">Select Area</option>');
            }
        });

        // Repeat the same logic for the subcounty, ward, and area dropdowns for the second form
        $('#countySelect').change(function() {
            var countyId = $(this).val();
            if (countyId) {
                $.ajax({
                    url: "{{ route('getSubcountiesByCounty') }}",
                    type: "GET",
                    data: {county_id: countyId},
                    success: function(response) {
                        $('#subcountySelect').empty();
                        $('#subcountySelect').append('<option value="">Select Subcounty</option>');
                        $.each(response, function(key, value) {
                            $('#subcountySelect').append('<option value="' + value.id + '">' + value.subcounty_name + '</option>');
                        });
                    }
                });
            } else {
                $('#subcountySelect').empty();
                $('#subcountySelect').append('<option value="">Select Subcounty</option>');
            }
        });

        $('#subcountySelect').change(function() {
            var subcountyId = $(this).val();
            if (subcountyId) {
                $.ajax({
                    url: "{{ route('getWardsBySubcounty') }}",
                    type: "GET",
                    data: {subcounty_id: subcountyId},
                    success: function(response) {
                        $('#wardSelect').empty();
                        $('#wardSelect').append('<option value="">Select Ward</option>');
                        $.each(response, function(key, value) {
                            $('#wardSelect').append('<option value="' + value.id + '">' + value.ward_name + '</option>');
                        });
                    }
                });
            } else {
                $('#wardSelect').empty();
                $('#wardSelect').append('<option value="">Select Ward</option>');
            }
        });

        $('#wardSelect').change(function() {
            var wardId = $(this).val();
            if (wardId) {
                $.ajax({
                    url: "{{ route('getAreasByWard') }}",
                    type: "GET",
                    data: {ward_id: wardId},
                    success: function(response) {
                        $('#areaSelect').empty();
                        $('#areaSelect').append('<option value="">Select Area</option>');
                        $.each(response, function(key, value) {
                            $('#areaSelect').append('<option value="' + value.id + '">' + value.area_name + '</option>');
                        });
                    }
                });
            } else {
                $('#areaSelect').empty();
                $('#areaSelect').append('<option value="">Select Area</option>');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#serviceCategory').change(function() {
            var categoryId = $(this).val();
            if (categoryId) {
                $.ajax({
                    url: '/get-services/' + categoryId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#service').empty();
                        $('#service').append('<option value="">Select Service</option>');
                        $.each(data, function(key, value) {
                            $('#service').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#service').empty();
                $('#service').append('<option value="">Select Service</option>');
            }
        });
    });
</script>

</body>

</html>