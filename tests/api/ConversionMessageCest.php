<?php

class ConversionMessageCest
{
    public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }

    public function index(ApiTester $I)
    {
        $I->wantTo('Get all user related conversion messages');
        $I->sendGET('http://currencyfairtest.com/api/messages');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContains('originatingCountry');
    }

    public function create(ApiTester $I)
    {
        $I->wantTo('save data');
        $I->sendPost('http://currencyfairtest.com/api/messages', [
            "userId" => "10",
            "currencyFrom" => "HUF",
            "currencyTo" => "EUR",
            "amountSell" => "100.0000",
            "amountBuy" => null,
            "rate" => "0.560000",
            "timePlaced" => "2015-11-01 22:00:00",
            "originatingCountry" => "FR"
        ]);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContains('originatingCountry');
    }


}
