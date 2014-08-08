<?php 
$I = new FunctionalTester($scenario);

$I->am('a Larabook member');
$I->wantTo('follow other Larabook users');

$I->haveAnAccount('Larabook\Users\User', ['username' => 'OtherUser']);

$I->click('Browse Users');
$I->click('OtherUser');

$I->seeCurrentUrlEquals('/@OtherUser');
$I->click('Follow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');

$I->see('You are following OtherUser.');
$I->dontSee('Follow OtherUser');

