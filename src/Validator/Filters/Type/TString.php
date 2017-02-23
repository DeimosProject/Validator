<?php

namespace Deimos\Validator\Filters\Type;

trait TString
{

    /**
     * @param string $message
     *
     * @return static
     */
    public function typeString($message = null)
    {
        return $this->callback($message, function ($storage)
        {
            return is_string($storage);
        });
    }

    /**
     * @param string $pattern
     * @param null   $message
     *
     * @return static
     */
    public function regex($pattern, $message = null)
    {
        return $this->callback($message, function ($storage) use ($pattern)
        {
            return preg_match($pattern, $storage);
        });
    }

    /**
     * @param string $pattern
     * @param null   $message
     *
     * @return static
     */
    public function notRegex($pattern, $message = null)
    {
        return $this->callback($message, function ($storage) use ($pattern)
        {
            return !preg_match($pattern, $storage);
        });
    }

}