<?php

class Stack
{
    private $data=[];

    public function Add($item)
    {
        array_push($this->data, $item);
    }
    public function Get()
    {
        return array_pop($this->data);
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

$stack = new Stack();

$stack->Add(1);
$stack->Add(54);
$stack->Add(722);
$stack->Add(456);

echo "<br>Count: ";
echo $stack->Count(). '<br>';

echo "Stack elements: ". '<br>';
echo $stack->Get() . '<br>';
echo $stack->Get() . '<br>';
echo $stack->Get() . '<br>';
echo $stack->Get() . '<br>';

$stack->Clear();

?>


