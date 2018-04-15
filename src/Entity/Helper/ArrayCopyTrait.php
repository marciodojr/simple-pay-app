<?php

namespace SimplePayApp\Entity\Helper;

trait ArrayCopyTrait
{
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
