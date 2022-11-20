@extends('customers.layout')
@section('content')
<div class="card m-5">
    <div class="card-header">
        <h2>Customers</h2>
    </div>
    <div class="card-body">
        <h5 class="card-tittle">{{ $customer->first_name }}</h5>
        <p class="card-text">Last name: {{ $customer->last_name }}</p>
        <p class="card-text">Birth date: {{ $customer->birth_date }}</p>
        <p class="card-text">Personal Document: {{ $customer->personal_doc }}</p>
    </div>
</div>
@endsection