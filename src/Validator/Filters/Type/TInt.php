<?php

namespace Deimos\Validator\Filters\Type;

trait TInt
{

    /**
     * @param string $message
     *
     * @return static
     */
    public function typeInt($message = null)
    {
        return $this->callback($message, function ($storage)
        {
            return is_int($storage);
        });
    }

}