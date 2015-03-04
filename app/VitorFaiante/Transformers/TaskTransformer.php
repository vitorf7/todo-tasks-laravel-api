<?php  namespace VitorFaiante\Transformers; 

class TaskTransformer extends Transformer {

    public function transform($task)
    {
        return array(
            'user'          => (int) $task['user_id'],
            'title'         => $task['title'],
            'description'   => $task['description'],
            'completed'     => (boolean) $task['completed']
        );

    }

}