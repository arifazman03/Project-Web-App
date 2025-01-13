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
                            <h2>Appointments</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!--? Appointment Section Start -->
    <div class="appointment-area section-padding30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-tittle text-center mb-100">
                        <span>Book an Appointment</span>
                        <h2>Schedule Your Visit</h2>
                    </div>
                </div>
            </div>
            <div>
                <h2>Edit Appointment Details</h2>
            </div>
            <div class="container" style="background-color: #f8f9fa; padding: 20px; border-radius: 8px;">
                <form action="{{ route('appointments.update', $appointment->id) }}" method="post" role="form">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="appointment_id">Appointment ID</label>
                                <input type="text" name="appointment_id" class="form-control" id="appointment_id"
                                    value="{{ $appointment->appointment_id }}" required>
                            </div>
                        </div>



                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="doctor_id">Select Doctor</label>
                                <select name="doctor_id" class="form-control" id="doctor_id" required>
                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}"
                                            {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>
                                            {{ $doctor->doctor_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="appointment_date">Appointment Date</label>
                                <input type="date" name="appointment_date" class="form-control" id="appointment_date"
                                    value="{{ $appointment->appointment_date }}" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="appointment_time">Appointment Time</label>
                                <input type="time" name="appointment_time" class="form-control" id="appointment_time"
                                    value="{{ $appointment->appointment_time }}" required>
                            </div>
                        </div>




                        <!--div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" id="status" required>
                                    <option value="scheduled" {{ $appointment->status == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                    <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                        </div-->

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Update Appointment</button>
                            <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Appointment End -->
</main>
@endsection
