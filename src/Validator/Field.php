<?php

namespace Deimos\Validator;

class Field
{

    // string
    use Filters\Alpha;
    use Filters\Length;

    // number
    use Filters\Between;

    // email
    use Filters\Email;

    // is type
    use Filters\Type\TInt;
    use Filters\Type\TBool;
    use Filters\Type\TFloat;
    use Filters\Type\TString;
    use Filters\Type\TNumeric;

    /**
     * @var string[]
     */
    protected $messages;

    /**
     * @var string
     */
    protected $error;

    /**
     * @var string
     */
    protected $storage;

    /**
     * @var bool
     */
    protected $valid;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var \Deimos\Validator\TCallback[]
     */
    protected $callbacks = [];

    /**
     * Field constructor.
     *
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param string   $message
     * @param callable $callback
     *
     * @return static
     */
    public function callback($message = null, callable $callback)
    {
        $this->callbacks[] = new TCallback($callback, $message);

        return $this;
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->storage;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function error()
    {
        return $this->valid !== null ? $this->error : false;
    }

    /**
     * @param mixed $data
     *
     * @return bool
     */
    public function validate($data)
    {
        $this->storage = &$data;

        foreach ($this->callbacks as $callback)
        {
            if (!$callback($data))
            {
                $this->valid = false;
                $this->error = $callback->message();

                return false;
            }
        }

        $this->valid = true;

        return true;
    }

}