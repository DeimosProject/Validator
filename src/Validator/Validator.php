<?php

namespace Deimos\Validator;

class Validator implements \Iterator
{

    /**
     * @var string
     */
    protected $class = Field::class;

    /**
     * @var Field[]
     */
    protected $fields = [];

    /**
     * @param $name
     *
     * @return Field
     */
    public function field($name)
    {
        if (!isset($this->fields[$name]))
        {
            $class = $this->class;

            $this->fields[$name] = new $class($name);
        }

        return $this->fields[$name];
    }

    /**
     * @param array $storage
     *
     * @return bool
     */
    public function validate(array $storage)
    {
        $result = true;

        foreach ($this->fields as $name => $field)
        {
            if (!$field->validate($storage[$name] ?? null))
            {
                $result = false;
            }
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function current()
    {
        return current($this->fields);
    }

    /**
     * @inheritdoc
     */
    public function next()
    {
        next($this->fields);
    }

    /**
     * @inheritdoc
     */
    public function key()
    {
        return key($this->fields);
    }

    /**
     * @inheritdoc
     */
    public function valid()
    {
        return $this->key() !== null;
    }

    /**
     * @inheritdoc
     */
    public function rewind()
    {
        reset($this->fields);
    }

}