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
                        <h2>Medical Records</h2>
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
                        <span>Our Medical Records</span>
                        <h2>Dentistry Department</h2>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <a class="btn" href="{{ route('medical.create') }}" role="button">Add Record</a>
            </div>
            <div>
                <table class="table">
                    <thead class="table-gray">
                        <tr>
                            <th scope="col">Record ID</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Diagnosis</th>
                            <th scope="col">Treatment</th>
                            <th scope="col">Doctor</th>
                            <th scope="col">Date of Record</th>
                            <th scope="col">Action</th>
                          </tr>
                    </thead>

                  </table>
            </div>
        </div>
    </div>
    </main>

@endsection
