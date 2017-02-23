<?php

namespace Deimos\Validator\Filters\Type;

trait TNumeric
{

    /**
     * @param string $message
     *
     * @return static
     */
    public function typeNumeric($message = null)
    {
        return $this->callback($message, function ($storage)
        {
            return is_numeric($storage);
        });
    }

}