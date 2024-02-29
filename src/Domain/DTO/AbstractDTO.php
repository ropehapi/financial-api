<?php

namespace App\Domain\DTO;

abstract class AbstractDTO
{
    public function toArray():array
    {
        return $this->all();
    }
    public function all():array
    {
        return get_object_vars($this);
    }

    public function data():array
    {
        return $this->data;
    }

    public function append($data):void
    {
        $this->data[] = $data;
    }
}