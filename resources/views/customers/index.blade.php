@extends('customers.layout')
@section('content')
<div class="container">
    <div class="row m-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Customers</h2>
                </div>
                <div class="card-body">
                    <a href="{{ URL::to('customers/create') }}" class="btn btn-success btn-sm">Add new customer</a>
                    
                    <table class="rounded table table-striped table-dark table-hover mt-2" style="border-radius: 10px">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">first_name</th>
                                <th scope="col">last_name</th>
                                <th scope="col">birth_date</th>
                                <th scope="col">personal_doc</th>
                                <th scope="col">created_at</th>
                                <th scope="col">updated_at</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $key => $value)
                            <tr class="align-middle">
                                <th scope="row">{{ $value->id }}</td>
                                <td>{{ $value->first_name }}</td>
                                <td>{{ $value->last_name }}</td>
                                <td>{{ $value->birth_date }}</td>
                                <td>{{ $value->personal_doc }}</td>
                                <td>{{ $value->created_at }}</td>
                                <td>{{ $value->updated_at }}</td>
                    
                                <!-- we will also add show, edit, and delete buttons -->
                                <td>
                                    <div class="d-flex">
                                        <a class="m-1 " href="{{ URL::to('customers/' . $value->id) }}">
                                            <span class="material-symbols-outlined">info</span>
                                        </a>
                                        <a class="m-1" href="{{ URL::to('customers/' . $value->id . '/edit') }}">
                                            <span class="material-symbols-outlined">edit</span>
                                        </a>
                                        <form method="POST" action="{{ url('/customers' . '/' . $value->id) }}" accept-charset="UTF-8" style="display: inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger btn-sm" type="submit" title="Delete">
                                                <span class="material-symbols-outlined">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection