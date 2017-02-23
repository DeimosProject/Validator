<?php

namespace Deimos\Validator\Filters;

trait Between
{

    /**
     * @param mixed  $min
     * @param mixed  $max
     * @param string $message
     *
     * @return static
     */
    public function between($min, $max, $message = null)
    {
        return $this->callback($message, function ($storage) use ($min, $max)
        {
            return $min <= $storage && $storage <= $max;
        });
    }

}