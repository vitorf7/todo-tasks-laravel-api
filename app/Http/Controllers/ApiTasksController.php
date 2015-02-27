<?php namespace LaravelTodo\Http\Controllers;

use LaravelTodo\Http\Requests;
use Illuminate\Http\Response;
use LaravelTodo\Http\Controllers\Controller;

use LaravelTodo\Task;

class ApiTasksController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $tasks = Task::all();

        return response(array(
            'data'  => $this->transformCollection($tasks)
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
            'data'  => $this->transform($task)
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

    private function transformCollection( $tasks )
    {
        return array_map(array($this, 'transform'), $tasks->toArray());
    }

    private function transform($tasks)
    {
        return array(
            'title'         => $tasks['title'],
            'description'   => $tasks['description'],
            'completed'     => (bool) $tasks['completed']
        );

    }

}
