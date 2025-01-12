@extends('layout')

@section('content')
    <div class="container">
        <h2>Edit Appointment</h2>
        <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $appointment->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $appointment->email }}" required>
            </div>
            <div class="form-group">
                <label for="appointment_date">Appointment Date</label>
                <input type="datetime-local" name="appointment_date" class="form-control" value="{{ $appointment->appointment_date->format('Y-m-d\TH:i') }}" required>
            </div>
            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea name="notes" class="form-control">{{ $appointment->notes }}</textarea>
            </div>
            <button type="submit" class="btn btn-warning">Update Appointment</button>
        </form>
    </div>
@endsection
