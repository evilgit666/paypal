@extends('layouts.header')
@section('content')
    <div class="container-fluid mt--7">
        <!-- Table -->
        <div class="row" style="padding-top: 10px">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Role Management</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm">
                                    Add
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th width="280px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-end mb-0">
                                    {!! $roles->render() !!}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>







@endsection
