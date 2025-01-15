
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
                        <h2>Fill in appointment details</h2>
                    </div>
                </div>
            </div>
            <div>

            </div>
            <div class="container" style="background-color: #f8f9fa; padding: 20px; border-radius: 8px;">

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                              <input type="text" name="appointment_id" class="form-control" id="appointment_id" placeholder="Appointment ID" required>
                            </div>
                          </div>
                      <div class="col-md-12 mb-3">
                        <div class="form-group">
                          <input type="text" name="patient_id" class="form-control" id="patient_id" placeholder="Patient ID" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <div class="form-group">
                          <input type="text" name="doctor_id" class="form-control" id="doctor_id" placeholder="Doctor ID" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <div class="form-group">
                          <input type="date" name="appointment_date" class="form-control" id="appointment_date" placeholder="Appointment Date" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <div class="form-group">
                          <input type="text" name="appointment_time" class="form-control" id="appointment_time" placeholder="Appointment Time" required>
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
