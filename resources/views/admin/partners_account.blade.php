

<?php 
	$title='PARTNERS';
 ?>
@extends('layouts.admin')

@section('content')
   
    
    <div class="container p-2 ">

        <h1 class="display-4">Partners</h1>
      

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush