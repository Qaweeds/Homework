<?php

trait trait1
{
    public function method()
    {
        return 1;
    }
}

trait trait2
{
    public function method()
    {
        return 2;
    }
}

trait trait3
{
    public function method()
    {
        return 3;
    }
}

class Test
{
    use trait1, trait2, trait3 {

        trait1::method insteadof trait2;
        trait2::method insteadof trait3;

        trait2::method as method2;
        trait3::method as method3;
    }

    public function getSum()
    {
        return $this->method() + $this->method2() + $this->method3();
    }
}

$test = new Test();

echo $test->getSum();
