@extends('app')

@section('content')
<div class="container">
    <div class="row" ng-controller="conversionMessage">

        <div class="col-md-12" ng-if="errorBag" ng-cloak>
            <div class="alert alert-danger" role="alert">
                <div ng-repeat="(key, value) in errorBag">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span><span ng-bind="value"></span>
                </div>
            </div>
        </div>
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
                            <button type="button" class="btn btn-primary btn-sm" ng-click='doClick()'>
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
                    <table class="conversion">
                        <tr class="conversion">
                            <th class="conversion">amountBuy</td>
                            <th class="conversion">amountSell</td>
                            <th class="conversion">currencyFrom</td>
                            <th class="conversion">currencyTo</td>
                            <th class="conversion">rate</td>
                            <th class="conversion">conversion</td>
                            <th class="conversion">timePlaced</td>

                        </tr>
                        <tr class="conversion" ng-repeat="x in messageData">
                            <td class="conversion" ng-bind="x.amountBuy"></td>
                            <td class="conversion" ng-bind="x.amountSell"></td>
                            <td class="conversion" ng-bind="x.currencyFrom"></td>
                            <td class="conversion" ng-bind="x.currencyTo"></td>
                            <td class="conversion" ng-bind="x.rate"></td>
                            <td class="conversion" ng-bind="x.conversion"></td>
                            <td class="conversion" ng-bind="x.timePlaced"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
