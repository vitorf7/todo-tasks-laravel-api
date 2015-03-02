<?php  namespace VitorFaiante\Transformers; 

class TaskTransformer extends Transformer {

    public function transform($task)
    {
        return array(
            'title'         => $task['title'],
            'description'   => $task['description'],
            'completed'     => (boolean) $task['completed']
        );

    }

}