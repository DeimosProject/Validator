<?php

namespace Deimos\Validator\Filters;

trait Length
{

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return static
     */
    public function minLength($value, $message = null)
    {
        return $this->callback($message, function ($storage) use ($value)
        {
            return $value <= mb_strlen($storage);
        });
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return static
     */
    public function maxLength($value, $message = null)
    {
        return $this->callback($message, function ($storage) use ($value)
        {
            return mb_strlen($storage) <= $value;
        });
    }

}