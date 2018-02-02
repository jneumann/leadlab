<?php

namespace Tests\Feature\model;

use App\ModelHelper;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class helper extends TestCase
{
	public function testAlphaNumeric() {
		$helper = new ModelHelper();

		$this->assertTrue($helper->handleize('A B C') == 'a-b-c');
		$this->assertTrue($helper->handleize('1 2 3') == '1-2-3');
		$this->assertTrue($helper->handleize('A b 3') == 'a-b-3');
	}

	public function testPunctuation() {
		$helper = new ModelHelper();

		$this->assertTrue($helper->handleize("Jake's") == 'jakes');
		$this->assertTrue($helper->handleize("Jake's T-Shirt") == 'jakes-t-shirt');
		$this->assertTrue($helper->handleize("t-shirt & hat") == 't-shirt-hat');
		$this->assertTrue($helper->handleize("t-shirt   &   hat") == 't-shirt-hat');
	}
}
