@extends('customers.layout')
@section('content')
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>first_name</td>
                <td>last_name</td>
                <td>birth_date</td>
                <td>personal_doc</td>
                <td>created_at</td>
                <td>updated_at</td>
            </tr>
        </thead>
        <tbody>
        @foreach($customers as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->first_name }}</td>
                <td>{{ $value->last_name }}</td>
                <td>{{ $value->birth_date }}</td>
                <td>{{ $value->personal_doc }}</td>
                <td>{{ $value->created_at }}</td>
                <td>{{ $value->updated_at }}</td>
    
                <!-- we will also add show, edit, and delete buttons -->
                <td>
    
                    <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->
    
                    <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('customers/' . $value->id) }}">Show this shark</a>
    
                    <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('customers/' . $value->id . '/edit') }}">Edit this shark</a>
    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection