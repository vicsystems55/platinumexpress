<?php 
    $title='PORTFOLIO';
 ?>
@extends('layouts.partners')

@section('content')
   
    
    <div class="container-fluid p-2">
       
    @if(Auth::user()->payment_status ==='unpaid')

@include('partners.unpaid')


@else

<h1>You have successfully paid your registration fee.</h1>
@endif
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush