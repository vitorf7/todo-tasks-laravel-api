<?php

use Faker\Factory;
use Illuminate\Support\Facades\Session;
use LaravelTodo\User;

/**
 * Class ApiTester
 */
abstract class ApiTester extends TestCase {

    /**
     * @var \Faker\Generator
     */
    protected $faker;

    protected $testSession;


    /**
     * Constructor
     */
    function __construct()
    {
        $this->faker = Factory::create();
    }

    /**
     * Set Up Method for Tests
     */
    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');

        $this->session(array());
        $this->testSession = Session::all();
    }

    /**
     * Tear Down Method for Tests
     */
    public function tearDown()
    {
        parent::tearDown();
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
     * Method to create new User and then Authenticate the User
     * http://laravel.com/docs/5.0/testing#helper-methods
     */
    public function getAuthenticatedUser()
    {
        $user = new User(['name' => 'McTest', 'email' => 'mctest@example.com', 'password' => Hash::make('password')]);
        $this->be($user);
    }

    /**
     * Method to return the _token for the Session to use during tests that need to
     * pass through the CSRF middleware
     *
     * @return array
     */
    public function getSessionCsrftoken()
    {
        return array( '_token' => $this->testSession['_token']);
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