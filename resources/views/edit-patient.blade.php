@extends('master.layout')

@section('content')
<main>
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 text-center">
                            <h2>Edit Patient</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <!-- Search Bar -->
        <form action="{{ route('patients.search') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Search patients..." required>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <!-- Search Results Table -->
        @if(isset($patients))
            <table border="1" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patients as $patient)
                        <tr>
                            <td>{{ $patient->id }}</td>
                            <td>{{ $patient->first_name }}</td>
                            <td>{{ $patient->last_name }}</td>
                            <td>{{ $patient->date_of_birth }}</td>
                            <td>{{ $patient->gender }}</td>
                            <td>{{ $patient->phone_number }}</td>
                            <td>{{ $patient->email }}</td>
                            <td>{{ $patient->address }}</td>
                            <td>
                                <a href="{{ route('patients.update', $patient->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{ route('patients.delete', $patient->id) }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</main>
@endsection
