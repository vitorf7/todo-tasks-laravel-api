<?php namespace LaravelTodo\Http\Controllers;

use LaravelTodo\Http\Requests;
use Illuminate\Http\Response;

use LaravelTodo\Task;
use VitorFaiante\Transformers\TaskTransformer;

class ApiTasksController extends Controller {

    /**
     * @var TaskTransformer
     */
    private $taskTransformer;

    /**
     * Constructor
     * @param TaskTransformer $taskTransformer
     */
    function __construct(TaskTransformer $taskTransformer)
    {
        $this->taskTransformer = $taskTransformer;
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $tasks = Task::all();

        return response(array(
            'data'  => $this->taskTransformer->transformCollection($tasks->all())
        ), 200);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$task = Task::find($id);

        if ( !$task ) {
            return response(array(
                'errors' => array(
                    'message'   => 'Task Not Found'
                )
            ), 404);
        }

        return response(array(
            'data'  => $this->taskTransformer->transform($task)
        ), 200);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
