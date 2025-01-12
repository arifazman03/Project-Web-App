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
        <!--patient table -->
        <h1>Appointment List</h1>

        <!-- Add Appointment Button -->
        <a href="{{ route('appointment.create') }}" class="btn btn-primary mb-3">Add Appointment</a>

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>Patient ID</th>
                    <th>Doctor ID</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->id }}</td>
                        <td>{{ $appointment->Patient ID}}</td>
                        <td>{{ $appointment->Doctor ID}}</td>
                        <td>{{ $appointment->Appointment Date }}</td>
                        <td>{{ $appointment->Appointment Time }}</td>
                        <td>{{ $appointment->Actions }}</td>

                        <td>
                            <a href="{{ route('appointment.edit', $appointment->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</main>

@endsection
