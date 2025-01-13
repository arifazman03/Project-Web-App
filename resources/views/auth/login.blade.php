@extends('master.layout')
@section('content')

<main>
    <!-- Hero Start -->
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 text-center">
                            <h2>Log In</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Add New Drug Form -->
    <div class="team-area section-padding30">
        <div class="container">
            <!-- Section Title -->
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-tittle text-center mb-100">
                        <span>Welcome</span>
                        <h2>HOSPITAL KUALA LUMPUR</h2>
                    </div>
                </div>
            </div>

            <div>
                <h2>Fill in Your Details</h2>
            </div>


            <div class="container" style="background-color: #f8f9fa; padding: 20px; border-radius: 8px;">
                <form action="{{ route('login') }}" method="POST" >
    @csrf

    <div class="col-md-12 mb-3">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
        </div>
    </div>

    <a href="{{ route('home') }}" class="btn btn-primary">Login</a>
</form>
            </div>
