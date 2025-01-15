

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
                        <h2>Book Appointment</h2>
                    </div>
                </div>
            </div>



                <table class="table" style="font-size: 18px;">
                    <thead class="table-gray">

            <tr>
                <th scope ="col">Appointment ID</th>
                <th scope ="col">Patient ID</th>
                <th scope ="col">Doctor ID</th>
                <th scope ="col">Appointment Date</th>
                <th scope ="col">Appointment Time</th>
                <th scope ="col">Actions</th>
            </tr>

        </thead>
                  </table>
            </div>
        </div>
    </div>

    }
        <a class="btn" href="{{ route('appointments.create') }}" role="button">Add Appointment</a>

    <!-- Team End -->
    </main>

@endsection
