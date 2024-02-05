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
            <input type="text" class="form-control" id="customerName" placeholder="Enter your name" style="border: 1px solid #ced4da;">
          </div>
          <div class="col-md-4 mb-3">
            <label for="customerEmail" class="form-label">Sub-county</label>
            <input type="email" class="form-control" id="customerEmail" placeholder="Enter your email" style="border: 1px solid #ced4da;">
          </div>
          <div class="col-md-4 mb-3">
            <label for="customerPassword" class="form-label">Ward</label>
            <input type="password" class="form-control" id="customerPassword" placeholder="Enter your password" style="border: 1px solid #ced4da;">
          </div>
          <div class="col-md-4 mb-3">
            <label for="customerName" class="form-label">Area</label>
            <input type="text" class="form-control" id="customerName" placeholder="Enter your name" style="border: 1px solid #ced4da;">
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
            <input type="text" class="form-control" id="customerName" placeholder="Enter your name" style="border: 1px solid #ced4da;">
          </div>
          <div class="col-md-4 mb-3">
            <label for="customerEmail" class="form-label">Sub-county</label>
            <input type="email" class="form-control" id="customerEmail" placeholder="Enter your email" style="border: 1px solid #ced4da;">
          </div>
          <div class="col-md-4 mb-3">
            <label for="customerPassword" class="form-label">Ward</label>
            <input type="password" class="form-control" id="customerPassword" placeholder="Enter your password" style="border: 1px solid #ced4da;">
          </div>
          <div class="col-md-4 mb-3">
            <label for="customerName" class="form-label">Area</label>
            <input type="text" class="form-control" id="customerName" placeholder="Enter your name" style="border: 1px solid #ced4da;">
          </div>
          <div class="col-md-4 mb-3">
            <label for="customerName" class="form-label">Contact Information</label>
            <input type="text" class="form-control" id="customerName" placeholder="Enter your name" style="border: 1px solid #ced4da;">
          </div>
          <div class="col-md-4 mb-3">
            <label for="customerEmail" class="form-label">Specialization</label>
            <input type="email" class="form-control" id="customerEmail" placeholder="Enter your email" style="border: 1px solid #ced4da;">
          </div>
          <div class="col-md-4 mb-3">
            <label for="customerPassword" class="form-label">Qualification</label>
            <input type="password" class="form-control" id="customerPassword" placeholder="Enter your password" style="border: 1px solid #ced4da;">
          </div>
          <div class="col-md-4 mb-3">
            <label for="profilePic" class="form-label">Profile Picture</label>
            <div class="input-group">
              <input type="file" class="form-control" id="profilePic" accept="image/*">
              <label class="input-group-text" for="profilePic"><i class="fas fa-upload"></i></label>
            </div>
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


</body>

</html>