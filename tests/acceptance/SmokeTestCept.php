<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('See phone latyii2');
$I->amOnPage('/web');
$I->see('sign in');
