

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
                    <div class="section-tittle text-center mb-0">
                        <span>Appointment</span>
                        <h2></h2>
                    </div>
                </div>
            </div>
            <div class="text-end">

    <a href="{{ route('appointments.create') }}" class="btn btn-primary mb-3">Add Appointment</a>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope ="col">Appointment ID</th>
                <th scope ="col">Patient ID</th>
                <th scope ="col">Doctor ID</th>
                <th scope ="col">Appointment Date</th>
                <th scope ="col">Appointment Time</th>
                <th scope ="col">Actions</th>
            </tr>

        </thead>
                    <tbody>
                        @foreach($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->patient_id }}</td>
                    <td>{{ $appointment->doctor_id }}</td>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td>{{ $appointment->appointment_time }}</td>
                                <td>
                                    <form action="{{ route('doctor.destroy',$doctor->id) }}" method="POST">
                                        <a class="text-primary" href="{{ route('doctor.edit',$doctor->id) }}">✏️</a>
                                        @csrf
                                        @method('DELETE')

                                        <a href="#" class="text-danger delete-doctor" data-id="{{ $doctor->id }}" title="Delete Doctor">🗑️</a>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                document.querySelectorAll('.delete-doctor').forEach(function (element) {
                                                    element.addEventListener('click', function (e) {
                                                        e.preventDefault(); // Prevent default link behavior

                                                        const doctorId = this.getAttribute('data-id'); // Get doctor ID from data-id attribute
                                                        if (confirm('Are you sure you want to delete this doctor?')) {
                                                            // Create a form dynamically
                                                            const form = document.createElement('form');
                                                            form.action = `/doctor/${doctorId}`; // Adjust this route as needed
                                                            form.method = 'POST';
                                                            form.style.display = 'none';

                                                            // Add CSRF and method inputs
                                                            const csrfInput = document.createElement('input');
                                                            csrfInput.type = 'hidden';
                                                            csrfInput.name = '_token';
                                                            csrfInput.value = '{{ csrf_token() }}'; // Laravel CSRF token

                                                            const methodInput = document.createElement('input');
                                                            methodInput.type = 'hidden';
                                                            methodInput.name = '_method';
                                                            methodInput.value = 'DELETE';

                                                            form.appendChild(csrfInput);
                                                            form.appendChild(methodInput);
                                                            document.body.appendChild(form); // Append form to the body
                                                            form.submit(); // Submit the form
                                                        }
                                                    });
                                                });
                                            });
                                        </script>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <!-- Team End -->
    </main>

@endsection
