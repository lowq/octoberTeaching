<?php

namespace AppLogger\Logger\Models;

use Model;

/**
 * Logs Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Logs extends Model
{
    protected $fillable = ['datetime', 'username', 'delay'];

    protected $dates = ['datetime'];

    public $timestamps = false;
    /**
     * @var string table name
     */
    public $table = 'applogger_logger_logs';
}
