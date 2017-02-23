<?php

namespace Deimos\Validator;

class TCallback
{

    /**
     * @var callable
     */
    protected $callback;

    /**
     * @var string
     */
    protected $message;

    /**
     * Callback constructor.
     *
     * @param $callback
     * @param $message
     */
    public function __construct($callback, $message)
    {
        $this->callback = $callback;
        $this->message  = $message;
    }

    /**
     * @return string
     */
    public function message()
    {
        return $this->message;
    }

    /**
     * @param mixed $data
     *
     * @return mixed
     */
    public function __invoke(&$data)
    {
        $callback = $this->callback;

        return $callback($data);
    }

}