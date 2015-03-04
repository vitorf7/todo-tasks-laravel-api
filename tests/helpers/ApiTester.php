<?php

use Faker\Factory;

/**
 * Class ApiTester
 */
abstract class ApiTester extends TestCase {

    /**
     * @var \Faker\Generator
     */
    protected $faker;


    /**
     * Constructor
     */
    function __construct()
    {
        $this->faker = Factory::create();
    }

    /**
     * Set Up Method
     */
    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');
    }

    /**
     * Method to get JSON from the API
     *
     * @param        $uri
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     */
    protected function getJson($uri, $method = 'GET', $parameters = array() )
    {
        return json_decode( $this->call( $method, $uri, $parameters )->getContent() );
    }

    /**
     * Assert Method to extend PHP Unit assertObjectHasAttribute
     * to check for multiple attributes
     */
    protected function assertObjectHasAttributes()
    {
        $args = func_get_args();

        $object = array_pop( $args );

        foreach ( $args as $arg ) {
            $this->assertObjectHasAttribute( $arg, $object );
        }

    }

}