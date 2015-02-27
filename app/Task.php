<?php namespace LaravelTodo;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

	protected $fillable = array('user_id', 'title', 'description');

}
