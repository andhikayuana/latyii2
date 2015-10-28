<?php
namespace AcceptanceTester;

class CRMOperatorSteps extends \AcceptanceTester
{
	function amInAddCustomerUi()
	{
		$I = $this;
		$I->amOnPage('/customers/add');
	}

	public function imagineCustomer()
	{
		$faker = \Faker\Factory::create();
		return [
			'CustomerRecord[name]'=>$faker->name,
			'CustomerRecord[birth_date]'=>$faker->date('Y-m-d'),
			'CustomerRecord[notes]'=>$faker->sentences(8),
			'CustomerRecord[number]'=>$faker->phoneNumber,
		];
	}
}
