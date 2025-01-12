@extends('master.layout')
@section('content')

<main>
    <!--? Hero Start -->
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap hero-cap2 text-center">
                        <h2>Appointment</h2>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <!--? Team Start -->
    <div class="team-area section-padding30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-tittle text-center mb-100">
                        <span>Appointment</span>
                        <h2>Our Specialist</h2>
                    </div>
                </div>
            </div>
            <div>
                <h2>Fill in appointment details</h2>
            </div>
            <div class="container" style="background-color: #f8f9fa; padding: 20px; border-radius: 8px;">
                <form action="{{ route('appointments.store') }}" method="post" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                              <input type="text" name="doctor_id" class="form-control" id="doctor_id" placeholder="Doctor ID" required>
                            </div>
                          </div>
                      <div class="col-md-12 mb-3">
                        <div class="form-group">
                          <input type="text" name="doctor_name" class="form-control" id="doctor_name" placeholder="Doctor Name" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <div class="form-group">
                          <input type="text" name="department" class="form-control" id="department" placeholder="Department" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <div class="form-group">
                          <input type="email" name="email_address" class="form-control" id="email_address" placeholder="Email Address" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <div class="form-group">
                          <input type="text" name="schedule" class="form-control" id="schedule" placeholder="Schedule" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <div class="form-group">
                          <input type="text" name="contact_no" class="form-control" id="contact_no" placeholder="Contact No" required>
                        </div>
                      </div>
                      <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </form>
              </div>



        </div>
    </div>
    <!-- Team End -->
    </main>

@endsection
