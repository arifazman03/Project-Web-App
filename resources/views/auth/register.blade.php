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
                <form method="POST" action="{{ url('register') }}">
                    @csrf

                    <div>
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required autofocus>
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" required>
                    </div>

                    <div>
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" required>
                    </div>

                    <button class="btn btn-primary" type="submit">Register</button>
                </form>

                @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
