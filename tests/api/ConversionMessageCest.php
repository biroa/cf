<?php
use \ApiTester;

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
        $I->sendPost('http://currencyfairtest.com/api/messages');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContains('saved');
    }


}
