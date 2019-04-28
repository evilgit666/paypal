@extends('layouts.header')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">List Transactions</h4>
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
                                    <th>Transaction ID</th>
                                    <th>Email Payer </th>
                                    <th>Transaction Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($listtransaction["transaction_details"] as $v)
                                    <tr>
                                        <td><a href="{{url('checktransaction?idTransaction=')}}{{$v['transaction_info']['transaction_id']}}">{{$v['transaction_info']['transaction_id']}}</a> </td>
                                        <td>{{$v['payer_info']['email_address']}}</td>
                                        <td>{{$v['transaction_info']['transaction_amount']['value']}}</td>
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
                            <label for="password1">Password</label>
                            <input class="form-control" type="password" name="password" required="" id="password1"
                                   placeholder="Enter your password">
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
