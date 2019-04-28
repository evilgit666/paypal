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
                    <h4 class="page-title">PayPal Account</h4>
                </div>
            </div>
        </div>
        <!-- start page title -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-striped table-centered mb-0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Slient Id</th>
                                    <th>Slient Secret</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($paypalaccount as $v)
                                <tr>
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->email}}</td>
                                    <td>{{$v->clientId}}</td>
                                    <td>{{$v->clientSecret}}</td>
                                    <td>{{$v->status}}</td>
                                    <td><a href="{{url('paypal_account')}}/{{$v->id}}" class="action-icon"> <i
                                                    class="mdi mdi-pencil"></i></a></td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end table-responsive-->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
            <!-- end page title -->
        </div>


    </div>
    <!-- SignIn modal content -->
    <div id="create" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="" method="post" class="pl-3 pr-3">
                        @csrf
                        <div class="form-group">
                            <label for="emailaddress1">Email address</label>
                            <input class="form-control" type="text" name="email" id="emailaddress1" required=""
                                   placeholder="john@deo.com">
                        </div>
                        <div class="form-group">
                            <label for="emailaddress1">ClientId</label>
                            <input class="form-control" type="text" name="clientId"  required="">
                        </div>

                        <div class="form-group">
                            <label for="password1">ClientSecret</label>
                            <input class="form-control" type="text" name="clientSecret" required="">
                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-rounded btn-primary" type="submit">Create</button>
                        </div>

                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
