<?php

namespace App\Traits;

trait WithStringFromGenericHuman
{
    public function getStringFromGenericHuman($relation, $attribute, $fall_back = '')
    {
        $string = $fall_back;
        if ($this->{$relation}) {
            $string = $this->{$relation}->{$attribute};
        }
        return $string;
    }
}
