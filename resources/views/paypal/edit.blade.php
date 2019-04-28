@extends('layouts.header')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit PayPal Account</h4>
                </div>
            </div>
        </div>
        <!-- start page title -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="" class="form-horizontal">
                            @csrf
                            <div class="form-group row mb-3">
                                <label class="col-3 col-form-label">Email</label>
                                <div class="col-9">
                                    <input type="text" value="{{$paypalaccount->email}}" name="email"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-3 col-form-label">clientId</label>
                                <div class="col-9">
                                    <input type="text" name="clientId" value="{{$paypalaccount->clientId}}"
                                            class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-3 col-form-label">clientSecret</label>
                                <div class="col-9">
                                    <input type="text" value="{{$paypalaccount->clientSecret}}" name="clientSecret"
                                           class="form-control">
                                </div>
                            </div>

                            <div class="form-group mb-0 justify-content-end row">
                                <div class="col-9">
                                    <button type="submit" class="btn btn-info">Save</button>
                                </div>
                            </div>
                        </form>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
            <!-- end page title -->
        </div>


    </div>
@endsection
