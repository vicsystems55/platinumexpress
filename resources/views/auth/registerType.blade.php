@extends('layouts.app', ['class' => 'bg-dark'])

@section('content')
    @include('layouts.headers.guest')

    <div style="min-height: 500px;" class="container">
    
        <div class="row">

        <div class="col-md-4 p-2">

                 <div class="card mx-auto" style="width: 18rem; height: 520px;">
                <img src="{{ asset('argon') }}/img/rideraccount.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h2 class="card-text">
                        Register as a Rider
                    </h2>
                    <p>
                        Signup an account as a rider, to have access to Platinum Express Packages and earn comfortable from your services.
                    </p>
                    <a href="{{ route('registerRider')}}" class="btn btn-warning text-center mx-auto">Create Account</a>
                </div>
                
                </div>

            </div>


            <div class="col-md-4 p-2">

                 <div class="card mx-auto" style="width: 18rem; height: 520px;">
                <img src="{{ asset('argon') }}/img/standardaccount.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h2 class="card-text">
                        Register a Standard Account
                    </h2>
                    <p>
                       Do you wish to use Platinum Express services, signup now to enjoy fast order and delivery services.
                    </p>
                    <a href="{{ route('register')}}" class="btn btn-warning text-center mx-auto">Create Account</a>
                </div>
                </div>

            </div>

            <div class="col-md-4 p-2">

            <div class="card mx-auto" style="width: 18rem; height: 520px;">
                <img src="{{ asset('argon') }}/img/membershipaccount.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h2 class="card-text">
                    Register a Membership Account
                    </h2>
                    <p>
                        Move a step further and signup as a member to enjoy, awesome discounted packages and also flexible bill settlement.
                    </p>
                    <a href="{{ route('registerCompany')}}" class="btn btn-warning text-center mx-auto">.Create Account</a>
                </div>
                </div>

            </div>

        </div>

    </div>
@endsection
