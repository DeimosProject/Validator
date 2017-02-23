<?php

namespace Deimos\Validator\Filters\Type;

trait TBool
{

    /**
     * @param string $message
     *
     * @return static
     */
    public function typeBool($message = null)
    {
        return $this->callback($message, function (&$storage)
        {
            $storage  = filter_var($storage, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

            return null !== $storage;
        });
    }

}