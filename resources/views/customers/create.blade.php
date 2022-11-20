@extends('customers.layout')
@section('content')
<div class="container">
    <div class="row m-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Create customer</div>
                <div class="card-body">
                    <form action="{{ url('customers') }}" method="POST">
                        {!! csrf_field() !!}
                        <label>First Name</label></br>
                        <input type="text" name="first_name" class="form-control"></br>
                        <label>Last Name</label></br>
                        <input type="text" name="last_name" class="form-control"></br>
                        <label>Birth Date</label></br>
                        <input type="date" name="birth_date" class="form-control"></br>
                        <label>Personal Document</label></br>
                        <input type="text" name="personal_doc" class="form-control"></br>
                        <input type="submit" value="Save" class="btn btn-success"></br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection