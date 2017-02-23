<?php

namespace Deimos\Validator\Filters\Type;

trait TFloat
{

    /**
     * @param string $message
     *
     * @return static
     */
    public function typeFloat($message = null)
    {
        return $this->callback($message, function ($storage)
        {
            return is_float($storage);
        });
    }

}