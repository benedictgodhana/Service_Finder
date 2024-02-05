@extends('layout/layout')

@section('space-work')
<div class="pagetitle">
 
</div><!-- End Page Title -->

<div class="pagetitle">
     
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sub-County table</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                       SubCounty Name
                    </th>
                    <th>County Name</th>
                    <th>Created At</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Updated At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($subcounties as $subcounty)

                  <tr>
                    <td>{{$subcounty->subcounty_name}}</td>
                    <td>{{ $subcounty->county->county_name }}</td>
                    <td>{{$subcounty->created_at}}</td>
                    <td>{{$subcounty->updated_at}}</td>

                    <td>
                    <button type="button" class="btn btn-outline-warning elevation-3" data-bs-toggle="modal" data-bs-target="#basicModal{{ $subcounty->id }}" >
                View details
              </button>

              <div class="modal fade" id="basicModal{{ $subcounty->id }}" tabindex="-1" >
                <div class="modal-dialog" >
                  <div class="modal-content" >
                    <div class="modal-header  text-center  bg-primary">
                      <h5 class="modal-title" style="color:white">Doctor's Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                   <div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <p><strong><i class="fas fa-user"></i> Sub-County Name:</strong> {{ $subcounty->subcounty_name }}</p>
        </div>
        <div class="col-md-6">
            <p><strong><i class="fas fa-envelope"></i>County Name:</strong> {{$subcounty->county->county_name }}</p>
        </div>
               
         
    </div>
  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Basic Modal-->

            </div>
          </div>
      
                    </td>
                  </tr>
                 @endforeach
                 
        
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var qualificationSelect = document.getElementById("qualification");
        var customQualificationField = document.getElementById("customQualificationField");
        var customQualificationInput = document.getElementById("custom_qualification");

        // Function to toggle the display of the custom qualification field
        function toggleCustomQualificationField() {
            customQualificationField.style.display = (qualificationSelect.value === "custom") ? "block" : "none";
        }

        // Initial toggle based on the default value
        toggleCustomQualificationField();

        // Event listener for changes in the qualification dropdown
        qualificationSelect.addEventListener("change", toggleCustomQualificationField);
    });
</script>


@endsection