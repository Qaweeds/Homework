<?php

class ValueObject
{
    private $red;
    private $green;
    private $blue;


    public function __construct($red, $green, $blue)
    {
        $this->red = $this->setRed($red);
        $this->green = $this->setGreen($green);
        $this->blue = $this->setBlue($blue);
    }

    private function setRed($value)
    {
        if ($this->checkRange($value)) {
            return $value;
        }
    }

    private function setGreen($value)
    {
        if ($this->checkRange($value)) {
            return $value;
        }
    }

    private function setBlue($value)
    {
        if ($this->checkRange($value)) {
            return $value;
        }
    }

    /*
     * Не совсем понимаю зачем нужен этот метод. Но раз нужен, то я использовал его в методе mix для проверки
     * приходящего аргумента, вместо строгого указания типа.
     *
     */
    private function equals($obj)
    {
        return $obj instanceof ValueObject;
    }

    public function getRed()
    {
        return $this->red;
    }

    public function getGreen()
    {
        return $this->green;
    }

    public function getBlue()
    {
        return $this->blue;
    }

    private function checkRange($value)
    {
        try {
            if ($value >= 0 and $value <= 255) {
                return true;
            } else {
                throw new Exception('Значения цветов должны быть в пределе от 0 до 255');
            }
        } catch (Exception $e) {
            die($e);
        }
    }

    public function mix($obj)
    {
        try {
            if ($this->equals($obj)) {
                $red = ($this->red + $obj->getRed()) / 2;
                $green = ($this->green + $obj->getGreen()) / 2;
                $blue = ($this->blue + $obj->getBlue()) / 2;
                return new ValueObject($red, $green, $blue);
            } else {
                throw new Exception('Не правильный объект');
            }
        } catch (Exception $e) {
            die($e);
        }
    }

    public static function random()
    {
        return new ValueObject(rand(0, 255), rand(0, 255), rand(0, 255));
    }
}

$color = new ValueObject(200, 200, 200);
$mixedColor = $color->mix(new ValueObject(100, 100, 100));
//$mixedColor2 = $mixedColor->mix($mixedColor);
echo '<pre>';
print_r($color);
echo '</pre>' . '<br>';
echo $mixedColor->getRed() . '<br>';
echo $mixedColor->getGreen() . '<br>';
echo $mixedColor->getBlue() . '<br><br>';


$random_color = ValueObject::random();
$rgb = $random_color->getRed() . ',' . $random_color->getGreen() . ',' . $random_color->getBlue();

echo '<div style="width: 100px; height: 100px; background-color:rgb(' . $rgb . ');"></div>';