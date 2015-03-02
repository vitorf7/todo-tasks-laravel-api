<?php  namespace VitorFaiante\Transformers; 

abstract class Transformer {

    public function transformCollection( array $items )
    {
        return array_map(array($this, 'transform'), $items);
    }

    abstract public function transform($item);

}