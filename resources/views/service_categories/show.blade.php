

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Category</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/assets/img/favicons/logo.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/assets/img/favicons/logo.png') }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/assets/img/favicons/logo.png') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Custom styles */
        
        
        .card {
            margin-top: 20px;
        }
      
.circle{
  position: absolute;
  border-radius: 50%;
  background: white;
  animation: ripple 15s infinite;
  box-shadow: 0px 0px 1px 0px #508fb9;
}

.small{
  width: 200px;
  height: 200px;
  left: -100px;
  bottom: -100px;
}

.medium{
  width: 400px;
  height: 400px;
  left: -200px;
  bottom: -200px;
}

.large{
  width: 600px;
  height: 600px;
  left: -300px;
  bottom: -300px;
}

.xlarge{
  width: 800px;
  height: 800px;
  left: -400px;
  bottom: -400px;
}

.xxlarge{
  width: 1000px;
  height: 1000px;
  left: -500px;
  bottom: -500px;
}

.shade1{
  opacity: 0.2;
}
.shade2{
  opacity: 0.5;
}

.shade3{
  opacity: 0.7;
}

.shade4{
  opacity: 0.8;
}

.shade5{
  opacity: 0.9;
}

@keyframes ripple{
  0%{
    transform: scale(0.8);
  }
  
  50%{
    transform: scale(1.2);
  }
  
  100%{
    transform: scale(0.8);
  }
}
        
    </style>
</head>
<body style="background:url('/images/city-illuminate-by-sun.jpg') center/cover;" >
    

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(255, 255, 255, 0.5);height:70px"> <!-- Add inline style for background-color -->
  <div class="container-fluid justify-content-center"> <!-- Add container-fluid and justify-content-center classes -->
    <a class="navbar-brand" style="color:black;font-weight:600" href="/"> <img src="/public/assets/img/logo.png" alt="Service Finder Logo" style="max-height: 40px;"> <!-- Replace path_to_your_logo_image with the actual path to your logo image -->Service Finder</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto"> <!-- Change mr-auto to mx-auto to center align the links -->
        <li class="nav-item">
          <a class="nav-link" style="color:black;font-weight:600" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color:black;font-weight:600" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color:black;font-weight:600" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="width:1800px">
        <div class="card" style="width:100%; background-color: rgba(255, 255, 255, 0.5);border-radius:10px;">
                <div class="card-header">{{ $category->name }}</div>
<!-- HTML for danger alert with login and register links -->
<div id="dangerAlert" class="alert alert-primary text-center" style="display: none;width:100%" role="alert"><i class="fa-solid fa-triangle-exclamation" style="color: #000000;"></i>
    Please <a href="/login">login</a> or <a href="{{ route('register') }}">sign up</a> to continue with the booking process.
</div>

                <div class="card-body elevation-23">
                    <p>{{ $category->description }}</p>
                    <form id="searchForm">
                        <h4 style="font-weight:800">Services:</h4>
                        @if($category->services->count() > 0)
                            <select class="form-select mb-3" id="serviceDropdown">
                                <option value="">Select Service</option>
                                @foreach($category->services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>

                            <!-- Dynamic Dropdowns -->
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="county" class="form-label" style="font-weight:800">County:</label>
                                    <select class="form-select" id="county">
                                        <option value="">Select County</option>
                                        @foreach($counties as $county)
                                            <option value="{{ $county->id }}">{{ $county->county_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="subcounty" class="form-label" style="font-weight:800">Subcounty:</label>
                                    <select class="form-select" id="subcounty">
                                        <option value="">Select Subcounty</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="ward" class="form-label" style="font-weight:800">Ward:</label>
                                    <select class="form-select" id="ward">
                                        <option value="">Select Ward</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="area" class="form-label" style="font-weight:800">Area:</label>
                                    <select class="form-select" id="area">
                                        <option value="">Select Area</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn elevation-3" id="searchButton" style="width:100%; background: gold; color: black;font-weight:800">
                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span> <!-- Loading spinner -->
                            Search
                        </button>

                        @else
                    <div class="alert alert-danger" role="alert">
                    <i class="fa-solid fa-triangle-exclamation"></i> No services found for this category.
                    </div>
                @endif

                    </form>
                    <br>
                    <div id="searchResults" class="row justify-content-center" style="border-radius:50px">
    <!-- Service provider cards will be displayed here -->
</div>
                </div>
                
            </div>

            
        </div>
    </div>
</div>

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
    });
</script>

<script>
    $(document).ready(function() {
    $('#searchForm').submit(function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Show loading spinner
        $('#searchButton').find('.spinner-border').removeClass('d-none');

        var serviceId = $('#serviceDropdown').val();
        var countyId = $('#county').val();
        var subcountyId = $('#subcounty').val();
        var wardId = $('#ward').val();
        var areaId = $('#area').val();

        $.ajax({
            url: "{{ route('searchServiceProviders') }}",
            type: "GET",
            data: {
                service_id: serviceId,
                county_id: countyId,
                subcounty_id: subcountyId,
                ward_id: wardId,
                area_id: areaId
            },
            success: function(response) {
                // Hide loading spinner
                $('#searchButton').find('.spinner-border').addClass('d-none');

                displaySearchResults(response);
            },
            error: function(xhr, status, error) {
                // Handle errors
            }
        });
    });

    function displaySearchResults(results) {
    $('#searchResults').empty(); // Clear previous results

    // Check if results array is empty
    if (results.length === 0) {
        // If no results found, display a message
        $('#searchResults').append('<p><i class="fa-solid fa-triangle-exclamation "></i> No service provider found.</p>');
        return; // Exit the function
    }

    // Iterate through each result and create a card for it
    results.forEach(function(result) {
        var cardHtml = `
            <div class="card mb-3" style="border-radius: 40px; width: 300px; margin: 8px;background-color: rgba(255, 255, 255, 0.5)">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="${result.profile_pic}" class="img-fluid rounded-circle" alt="Profile Picture" style="width: 100%; border-radius: 50%;margin-top:10px;height:50%">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">${result.service_provider_name}</h5>
                            <p class="card-text">Service Offered: ${result.service_name}</p>
                            <button class="btn btn-primary elevation-23" style="border-radius: 20px; width: 100%;">
                                <i class="fas fa-shopping-cart" style="color:gold"></i> Place Order
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $('#searchResults').append(cardHtml); // Append the card to the search results section
    });
}

    });
</script>
<!-- Updated JavaScript code -->
<script>
    $(document).ready(function() {
        // Event handler for the "Place Order" button
        $(document).on('click', '.btn-primary', function() {
            // Check if the user is authenticated
            var isAuthenticated = "{{ auth()->check() }}";

            // If the user is authenticated, proceed with placing the order
            if (isAuthenticated) {
                // Add your logic to proceed with the order placement process here
            } else {
                // If the user is not authenticated, display the danger alert
                $('#dangerAlert').fadeIn().delay(3000).fadeOut(); // Show the danger alert for 3 seconds
            }
        });
    });
</script>



<script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
