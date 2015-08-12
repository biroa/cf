@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">BUY OR SELL CURRENCY</div>
                <div class="row special">
                    <div class="panel-body">
                        <div class="col-md-12"></div>
                        <div class="col-md-6 text-left spacer">
                            <div class="control-group">
                                <input type="text" placeholder="buy" ng-model="currency.buy" class="form-control spec"></div>
                            </div>
                        <div class="col-md-6 text-right spacer">
                            <div class="control-group" ng-controller="currencyController">
                                <select class="form-control spec"  ng-model="currency.from" ng-options="c for c  in currency"></select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row special">
                    <div class="panel-body">
                        <div class="col-md-12"></div>
                        <div class="col-md-6 text-left spacer">
                            <div class="control-group">
                                <input type="text" placeholder="sell" ng-model="currency.sell" class="form-control spec"></div>
                            </div>
                        <div class="col-md-6 text-right button_spacer">
                            <div class="control-group" ng-controller="currencyController">
                                <select class="form-control spec" ng-model="currency.to" ng-options="c for c  in currency"></select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row spacial">
                    <div class="control-group">
                        <div class="col-md-12 text-center spacer">
                            <button type="button" class="btn btn-primary btn-sm">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">MY TRANSACTIONS</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
