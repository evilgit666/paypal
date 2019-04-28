@extends('layouts.header')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Check Transaction</h4>
                </div>
            </div>
        </div>
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="get">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="simpleinput">ID Transaction</label>
                                    <input type="text" name="idTransaction" id="simpleinput" class="form-control">
                                </div> <!-- end col -->
                                <div class="col-lg-2">
                                    <label for="simpleinput">Check</label>
                                    <input type="submit" value="Submit" class="btn-success form-control">
                                </div> <!-- end col -->

                            </div>
                        </form>
                        <!-- end row-->

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>
        @if($data)
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <!-- Invoice Logo-->
                            <div class="clearfix">
                                <div class="float-right">
                                    <h4 class="m-0 d-print-none">Transaction details</h4>
                                </div>
                            </div>

                            <!-- Invoice Detail-->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="float-left mt-3">
                                        <p><b>Payment received
                                                from {{$paymentdetail->payer->payer_info->shipping_address->recipient_name}}</b>
                                        </p>
                                        <h6>Billing Address</h6>
                                        <address>
                                            {{$paymentdetail->payer->payer_info->email}}<br>
                                            {{$paymentdetail->payer->payer_info->shipping_address->line1}}<br>
                                            {{$paymentdetail->payer->payer_info->shipping_address->city}},
                                            {{$paymentdetail->payer->payer_info->shipping_address->state}}
                                            {{$paymentdetail->payer->payer_info->shipping_address->postal_code}},
                                            {{$paymentdetail->payer->payer_info->shipping_address->country_code}}<br>
                                            <abbr title="Phone">P:</abbr> {{$paymentdetail->payer->payer_info->phone}}
                                            <br>
                                            <span class="badge badge-success">{{$paymentdetail->payer->status}}</span>
                                        </address>

                                    </div>

                                </div><!-- end col -->
                                <div class="col-sm-4 offset-sm-2">
                                    <div class="mt-3 float-sm-right">
                                        <p class="font-13"><strong>Payment Date: </strong><span
                                                    class="float-right"> {{$data->create_time}}</span></p>
                                        <p class="font-13"><strong>Payment Status: </strong> <span
                                                    class="badge badge-success float-right">{{$data->state}}</span></p>
                                        <p class="font-13"><strong>Transaction ID: </strong> <span
                                                    class="float-right">{{$data->id}}</span></p>
                                        <p class="font-13"><strong>Parent Payment: </strong> <span
                                                    class="float-right">{{$data->parent_payment}}</span></p>
                                    </div>
                                </div><!-- end col -->
                            </div>
                            <!-- end row -->
                            <!-- end row -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table mt-4">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Unit Cost</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($paymentdetail->transactions as $v)
                                                @foreach($v->item_list->items as $i)

                                                    <tr>
                                                        <td>1</td>
                                                        <td>{{$i->name}}</td>
                                                        <td>{{$i->quantity}}</td>
                                                        <td>{{$i->price}}</td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive-->
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-sm-6">

                                </div> <!-- end col -->
                                <div class="col-sm-6">
                                    <div class="float-right mt-3 mt-sm-0">
                                        <p><b>Sub-total:</b> <span
                                                    class="float-right">{{$data->amount->total}} {{$data->amount->currency}}</span>
                                        </p>
                                        <p><b>Fee:</b> <span
                                                    class="float-right"> -{{$data->transaction_fee->value}} {{$data->transaction_fee->currency}}</span>
                                        </p>
                                        <h3>{{$data->amount->total-$data->transaction_fee->value}} {{$data->transaction_fee->currency}}</h3>
                                    </div>
                                    <div class="clearfix"></div>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row-->


                            @if($data->state !== 'refunded' && $data->state !== 'partially_refunded')
                                <div class="d-print-none mt-4">
                                    <div class="text-right">
                                        <a href="{{url('refund')}}/{{$data->id}}" class="btn btn-info">Refund</a>
                                    </div>
                                </div>
                        @endif

                        <!-- end buttons -->

                        </div> <!-- end card-body-->
                    </div> <!-- end card -->
                </div> <!-- end col-->
            </div>
        @endif


    </div>
@endsection
