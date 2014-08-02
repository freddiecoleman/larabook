<?php

$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('login to my Larabook account');

$I->haveAnAccount();
$I->amOnPage('/login');
$I->fillField('email', '');
$I->fillField('password', '');
$I->click('Sign In');

$I->seeInCurrentUrl('/statuses');
$I->see('Welcome back!');