<?php

class TasksTest extends ApiTester {

    use TestFactory;

    public function getStub($fields = array())
    {
        return array_merge(array(
            'user_id'       => 1,
            'title'         => (string) $this->faker->sentence(3),
            'description'   => (string) $this->faker->realText(100),
            'completed'     => $this->faker->boolean()
        ), $fields);
    }

    /**
     * Test to check that you get an OK response when fetching all tasks
     */
    public function testItFetchesAllTasks()
    {
        $this->make('LaravelTodo\\Task');

        $this->getJson('api/v1/tasks');

        $this->assertResponseOk();
    }

    /**
     * Test that you get an OK response when fetching a single task
     * as well as checking that it contains all the necessary attributes
     */
    public function testItFetchesSingleTask()
    {
        $this->make('LaravelTodo\\Task');

        $task = $this->getJson('api/v1/tasks/1')->data;

        $this->assertResponseOk();

        $this->assertObjectHasAttributes('user', 'title', 'description', 'completed', $task);
    }

    /**
     * Test that you get a 404 response when fetching a Task that
     * does not exist
     */
    public function testIt404sWhenTaskNotFound()
    {
        $this->make('LaravelTodo\\Task');

        $json = $this->getJson('api/v1/tasks/x');

        $this->assertResponseStatus(404);
        $this->assertObjectHasAttribute('error', $json);
    }

    /**
     * Test a new lesson is successfully created
     */
    public function testItCreatesNewLessonGivenValidParameters()
    {
        $this->getJson('api/v1/tasks', 'POST', $this->getStub(array('user_id' => 1)));

        $this->assertResponseStatus(201);
    }

    /**
     * Test a 422 is returned if validation fails
     */
    public function testItThrows422IfTaskRequestFailsValidation()
    {
        $this->getJson('api/v1/tasks', 'POST');

        $this->assertResponseStatus(422);
    }

}
