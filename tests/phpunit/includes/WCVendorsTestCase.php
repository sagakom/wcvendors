<?php
/**
 * Ready to use test case which set up Brain Monkey.
 *
 * @package WCVendors_Pro
 */

use Brain\Monkey;
use Mockery;

/**
 * Base test case for WC Vendors Component.
 */
class WCVendorsTestCase extends \PHPUnit\Framework\TestCase {

	/**
	 * Set up test case.
	 */
	public function setUp(): void {
		parent::setUp();
		Monkey\setUp();

		// A few common passthrough.
		Monkey\Functions\stubs(
			 array(
				 '__',
				 '_e',
				 '_n',
				 'plugin_dir_url',
				 'plugin_dir_path',
				 'esc_attr',
				 'esc_html',
				 'esc_html__',
				 'esc_url',
			 )
			);
	}

	/**
	 * Tear down test case.
	 */
	public function tearDown(): void {
		$this->addToAssertionCount(
			Mockery::getContainer()->mockery_getExpectationCount()
		);
		Monkey\tearDown();
		parent::tearDown();
	}
}
