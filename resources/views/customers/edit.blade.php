@extends('customers.layout')
@section('content')
<div class="card m-5">
    <div class="card-header">Edit customer</div>
    <div class="card-body">
        <form action="{{ url('customers/' . $customer->id) }}" method="POST">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" value="{{ $customer->id }}" id="id">
            <label>First Name</label></br>
            <input type="text" name="first_name" value="{{ $customer->first_name }}" class="form-control"></br>
            <label>Last Name</label></br>
            <input type="text" name="last_name" value="{{ $customer->last_name }}" class="form-control"></br>
            <label>Birth Date</label></br>
            <input type="date" name="birth_date" value="{{ $customer->birth_date }}" class="form-control"></br>
            <label>Personal Document</label></br>
            <input type="text" name="personal_doc" value="{{ $customer->personal_doc }}" class="form-control"></br>
            <input type="submit" value="Save" class="btn btn-success"></br>
        </form>
    </div>
</div>
@endsection