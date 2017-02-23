<?php

namespace Deimos\Validator\Filters;

trait Email
{

    /**
     * @param string $message
     *
     * @return static
     */
    public function email($message = null)
    {
        return $this->callback($message, function ($storage)
        {
            return filter_var($storage, FILTER_VALIDATE_EMAIL);
        });
    }

}