<?php

trait TestFactory {

    /**
     * @var int
     */
    protected $times = 1;

    /**
     * Method to set up the number of times
     *
     * @param $count
     *
     * @return $this
     */
    protected function times( $count )
    {
        $this->times = $count;

        return $this;
    }

    /**
     * Make a new record in the DB
     *
     * @param       $type
     * @param array $fields
     */
    protected function make($type, array $fields = array())
    {
        while($this->times--) {
            $stub = array_merge($this->getStub(), $fields);

            $type::create($stub);

        }
    }

    /**
     * Get stub for the record
     *
     * @throws BadMethodCallException
     */
    protected function getStub()
    {
        throw new BadMethodCallException('Create your own getStub method to declare your fields');
    }

}