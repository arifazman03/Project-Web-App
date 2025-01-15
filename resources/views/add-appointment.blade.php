

@extends('master.layout')
@section('content')

<main>
    <!--? Hero Start -->
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <!-- Section Title -->
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-tittle text-center mb-100">

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
                        <h2>Book Appointment</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-12 text-right m-3">
                <a class="btn" href="{{ route('appointments.create') }}" role="button">Add appointment</a>
            </div>

                <table class="table" style="font-size: 18px;">
                    <thead class="table-gray">

            <tr>
                <th scope ="col">Appointment ID</th>
                <th scope ="col">Patient ID</th>
                <th scope ="col">Doctor ID</th>
                <th scope ="col">Appointment Date</th>
                <th scope ="col">Appointment Time</th>
                <th scope ="col">Action</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>{{$appointment->appointment_id}}</td>
                    <td>{{$appointment->patient_id}}</td>
                    <td>{{$appointment->doctor_id}}</td>
                    <td>{{$appointment->appointment_date}}</td>
                    <td>{{$appointment->appointment_time}}</td>

                    <td>
                        <form action="{{ route('appointment.destroy', $appointment->id) }}" method="POST" id="delete-form-{{ $appointment->id }}" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        <a class="text-primary" href="{{ route('appointments.edit', $appointment->id) }}">✏️</a>
                        <a href="#" class="text-danger delete-appointment" data-id="{{ $appointment->id }}" title="Delete Appointment">🗑️</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
                  </table>
            </div>
        </div>
    </div>

    <div class="button-container text-right">
        <a class="btn" href="{{ route('appointments.create') }}" role="button">Add Appointment</a>

    <!-- Team End -->
    </main>

@endsection
