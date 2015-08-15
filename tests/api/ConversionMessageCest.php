<?php

class ConversionMessageCest
{
    public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }

    /**
     * create a conversion message
     *
     * @param \ApiTester $I
     */
    public function create(ApiTester $I)
    {
        $I->wantTo('Save conversion message.');
        $I->sendPost('http://currencyfairtest.com/api/messages', [
            "userId" => "100",
            "currencyFrom" => "HUF",
            "currencyTo" => "EUR",
            "amountSell" => "999.0000",
            "amountBuy" => null,
            "rate" => "9.999",
            "timePlaced" => "31-AUG-15 22:00:00"
        ]);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContains('SUCCESS');
    }


    /**
     * getAll record
     *
     * @param \ApiTester $I
     */
    public function index(ApiTester $I)
    {
        $I->wantTo('Get all user related conversion messages.');
        $I->sendGET('http://currencyfairtest.com/api/messages');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson('SUCCESS');
    }

    /**
     * get one record based on pk
     *
     * @param \ApiTester $I
     */
    public function show(ApiTester $I)
    {
        $I->wantTo('Get one conversion message by pk.');
        $I->sendGET('http://currencyfairtest.com/api/messages/1');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson('SUCCESS');
    }

    /**
     * getAll record
     *
     * @param \ApiTester $I
     */
    public function getAll(ApiTester $I)
    {
        $I->wantTo('Get all user related conversion messages.');
        $I->sendGET('http://currencyfairtest.com/api/messages');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson('SUCCESS');
    }

    /**
     * @param \ApiTester $I
     */
    public function missingTimePlacedError(ApiTester $I)
    {
        $I->wantTo('Error while saving: wrong timePlaced format.');
        $I->sendPost('http://currencyfairtest.com/api/messages', [
            "userId" => "100",
            "currencyFrom" => "HUF",
            "currencyTo" => "EUR",
            "amountSell" => "999.0000",
            "amountBuy" => null,
            "rate" => "9.999",
            "timePlaced" => "2015-12-22 22:00:00"
        ]);
        $I->seeResponseCodeIs(400);
        $I->seeResponseIsJson();
        $I->seeResponseContains('ERROR');
        $I->seeResponseContains('timePlaced');
        $I->seeResponseContains('The time placed does not match the format y-M-d H:i:s.');
    }

    /**
     * @param \ApiTester $I
     */
    public function missingCurrencyFromError(ApiTester $I)
    {
        $I->wantTo('Error while saving: missing currencyFrom.');
        $I->sendPost('http://currencyfairtest.com/api/messages', [
            "userId" => "100",
            "currencyTo" => "EUR",
            "amountSell" => "999.0000",
            "amountBuy" => null,
            "rate" => "9.999",
            "timePlaced" => "31-AUG-15 22:00:00"
        ]);
        $I->seeResponseCodeIs(400);
        $I->seeResponseIsJson();
        $I->seeResponseContains('ERROR');
        $I->seeResponseContains('currencyFrom');
        $I->seeResponseContains('The currency from field is required.');
    }

    /**
     * @param \ApiTester $I
     */
    public function missingCurrencyToError(ApiTester $I)
    {
        $I->wantTo('Error while saving: missing currencyTo.');
        $I->sendPost('http://currencyfairtest.com/api/messages', [
            "userId" => "100",
            "currencyFrom" => "EUR",
            "amountSell" => "999.0000",
            "amountBuy" => null,
            "rate" => "9.999",
            "timePlaced" => "31-AUG-15 22:00:00"
        ]);
        $I->seeResponseCodeIs(400);
        $I->seeResponseIsJson();
        $I->seeResponseContains('ERROR');
        $I->seeResponseContains('currencyTo');
        $I->seeResponseContains('The currency to field is required');
    }

    /**
     * @param \ApiTester $I
     */
    public function missingSellAndBuyError(ApiTester $I)
    {
        $I->wantTo('Error while saving: missing amountSell and amountBuy.');
        $I->sendPost('http://currencyfairtest.com/api/messages', [
            "userId" => "100",
            "currencyFrom" => "EUR",
            "amountSell" => "999.0000",
            "amountBuy" => null,
            "rate" => "9.999",
            "timePlaced" => "31-AUG-15 22:00:00"
        ]);
        $I->seeResponseCodeIs(400);
        $I->seeResponseIsJson();
        $I->seeResponseContains('ERROR');
    }

    /**
     * @param \ApiTester $I
     */
    public function missingRateError(ApiTester $I)
    {
        $I->wantTo('Error while saving: missing rate.');
        $I->sendPost('http://currencyfairtest.com/api/messages', [
            "userId" => "100",
            "currencyFrom" => "EUR",
            "amountSell" => "999.0000",
            "timePlaced" => "31-AUG-15 22:00:00"
        ]);
        $I->seeResponseCodeIs(400);
        $I->seeResponseIsJson();
        $I->seeResponseContains('ERROR');
        $I->seeResponseContains('rate');
        $I->seeResponseContains('The rate field is required.');
    }


}
