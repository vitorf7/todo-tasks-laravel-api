<?php namespace LaravelTodo\Http\Controllers;

use LaravelTodo\Http\Requests;
use Illuminate\Http\Response;

use Illuminate\Http\Request;
use LaravelTodo\Task;
use VitorFaiante\Transformers\TaskTransformer;

class ApiTasksController extends ApiController {

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

        //$this->middleware('auth.basic', array('only' => 'store'));
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $tasks = Task::all();

        return $this->respond(array(
            'data'  => $this->taskTransformer->transformCollection($tasks->all())
        ));

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
     * @param Request $request
     *
     * @return Response
     */
	public function store( Request $request)
	{
		if ( ! $request->input('user_id') || ! $request->input('title') || ! $request->input('description') ) {

            // return 422
            return $this->respondUnprocessableEntity('Parameters failed validation for a task.');

        }

        Task::create($request->all());

        return $this->respondCreated( 'Task has been created successfully' );
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
            return $this->respondNotFound('Task Not Found!');
        }

        return $this->respond(array(
            'data'  => $this->taskTransformer->transform($task)
        ));

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
