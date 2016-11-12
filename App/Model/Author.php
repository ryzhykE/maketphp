<?php

namespace App\Model;

use App\Model;

/**
 * Class Author
 * @package App\Model
 */

class Author
    extends Model
{
    public static $table = 'authors';
    public $id;
    public $name;
}