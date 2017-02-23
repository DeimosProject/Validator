<?php

namespace Deimos\Validator\Filters;

trait Alpha
{

    /**
     * @param string $message
     *
     * @return static
     */
    public function alphaOnly($message = null)
    {
        return $this->notRegex('~[^a-zа-яё]~iu', $message);
    }

    /**
     * @param string $message
     *
     * @return static
     */
    public function alphaDigits($message = null)
    {
        return $this->notRegex('~[^\da-zа-яё]~iu', $message);
    }

    /**
     * @param string $message
     *
     * @return static
     */
    public function digitsOnly($message = null)
    {
        return $this->notRegex('~\D~iu', $message);
    }

    /**
     * @param string $message
     *
     * @return static
     */
    public function anyWord($message = null)
    {
        return $this->notRegex('~[^\wa-zа-яё]~iu', $message);
    }

}