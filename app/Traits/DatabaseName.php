<?php

namespace App\Traits;

trait DatabaseName
{
    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
