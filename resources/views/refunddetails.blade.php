@extends('layouts.header')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Refund #{{$data->id}}</h4>
                </div>
            </div>
        </div>
        <!-- start page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mb-3 header-title">Issue Refund</h4>
                        <p class="text-muted mb-3">
                            You can refund all or part of your buyer's payment for 180 days after the buyer sent the original payment. When you refund a payment for goods or services, we contribute the variable portion of the original transaction fee to the refund, and we keep the fixed-fee portion of that fee from your account. For more details, refer to the page How do PayPal refunds work? or the section that discusses fees in your User Agreement.
                            <br>To issue a refund, enter the amount in the Refund Amount field and click Continue.</p>

                        <form method="post" action="{{url('refund')}}" class="form-horizontal">
                            @csrf
                            {{--<div class="form-group row mb-3">--}}
                                {{--<label class="col-3 col-form-label">Contact info</label>--}}
                                {{--<div class="col-9">--}}
                                    {{--<input type="text" readonly="" class="form-control">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group row mb-3">
                                <label class="col-3 col-form-label">Transaction Id</label>
                                <div class="col-9">
                                    <input type="text" value="{{$data->id}}" name="idTransaction" readonly class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-3 col-form-label">Original Payment</label>
                                <div class="col-9">
                                    <input type="text" name="originalamount" value="{{$data->amount->total}}" readonly class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-3 col-form-label">Amount Remaining</label>
                                <div class="col-9">
                                    <input type="text" value="{{$data->amount->total}}" readonly class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-3 col-form-label">Refund Amount</label>
                                <div class="col-9">
                                    <input type="text" placeholder="{{$data->amount->total}}" name="amount" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-3 col-form-label">Invoice Number (Optional)</label>
                                <div class="col-9">
                                    <input name="invoice" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-3 col-form-label">Note To Buyer (Optional)</label>
                                <div class="col-9">
                                    <textarea name="description" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group mb-0 justify-content-end row">
                                <div class="col-9">
                                    <button type="submit" class="btn btn-info"  onclick="return confirm('OK to Refund!');">Refund</button>
                                </div>
                            </div>
                        </form>

                    </div>  <!-- end card-body -->
                </div>  <!-- end card -->
            </div>  <!-- end col -->

        </div>


    </div>

@endsection
