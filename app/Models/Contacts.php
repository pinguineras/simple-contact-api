<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contacts
 *
 * @package App
 */
class Contacts extends Model
{
    //use SoftDeletes; /* Activate or inactivate SoftDeletes*/

    /**
     * Database Table model
     *
     * @var string
     */
    protected $table = 'contacts';

    /**
     * Define the primary key from Model
     *
     * @var string
     */
    public $primaryKey = 'id';

}