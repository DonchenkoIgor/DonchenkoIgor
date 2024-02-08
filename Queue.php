<?php

class Queue
{

    private $data = [];

    public function Add($item)
    {
        array_push($this->data, $item);
    }

    public function Get()
    {
        return array_shift($this->data);
    }

    public function Count()
    {
        return count($this->data);
    }

    public function Clear()
    {
        $this->data = [];
    }
}

$queue = new Queue;

$queue->Add(33);
$queue->Add(54798);
$queue->Add(333);

echo "<br>Count: ";
echo $queue->Count(). '<br>';

echo "Queue elements: " . '<br>';
echo $queue->Get()  . '<br>';
echo $queue->Get()  . '<br>';
echo $queue->Get()  . '<br>';

$queue->Clear();

