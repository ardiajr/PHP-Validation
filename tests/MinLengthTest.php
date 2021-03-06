<?php

include './autoload.php';

use HybridLogic\Validation\Validator;
use HybridLogic\Validation\Rule;

/**
 * Rule Test: MinLength
 *
 * @package default
 * @author Luke Lanchester
 **/
class MinLengthTest extends PHPUnit_Framework_TestCase {


	/**
	 * @var Validator instance
	 **/
	protected $validator;


	/**
	 * Setup
	 *
	 * @return void
	 **/
	public function setUp() {
		$this->validator = new Validator;
		$this->validator->add_rule('field', new Rule\MinLength(5));
	} // end func: setUp



	/**
	 * Tests
	 *
	 * @return void
	 * @dataProvider provider
	 **/
	public function test($input, $expected) {
		$result = $this->validator->is_valid($input);
		$this->assertEquals($expected, $result);
	} // end func: test



	/**
	 * Provider
	 *
	 * @return void
	 **/
	public function provider() {
		return array(
			array(array(), false),
			array(array('field' => null), false),
			array(array('field' => ''), false),
			array(array('field' => '1234'), false),
			array(array('field' => '12345'), true),
			array(array('field' => '123456'), true),
			array(array('field' => '1234567890'), true),
		);
	} // end func: provider



} // end class: MinLengthTest