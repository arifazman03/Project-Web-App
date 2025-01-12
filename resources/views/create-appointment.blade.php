@extends('master.layout')

@section('content')
    <div class="container">
        <h2>Create New Appointment</h2>
        <form action="{{ route('appointments.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="appointment_date">Appointment Date</label>
                <input type="datetime-local" name="appointment_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea name="notes" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Appointment</button>
        </form>
    </div>
@endsection
