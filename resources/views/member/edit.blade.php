@extends('layouts.header')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#create">Create
                        </button>
                    </div>
                    <h4 class="page-title">Member</h4>
                </div>
            </div>
        </div>
        <!-- start page title -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                    <input name="name" class="form-control" type="text" value="{{$user->name}}" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input name="password" class="form-control" type="password">
                                </div>
                                <div class="col-md-6">
                                    <label>Role</label>
                                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <hr>
                            <input class="btn btn-primary float-right" type="submit"
                                   value="submit">
                        </form>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
            <!-- end page title -->
        </div>


    </div>

@endsection
