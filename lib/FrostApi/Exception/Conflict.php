<?php


namespace FrostApi\Exception;


class Conflict extends \Exception
{

    public function __construct($message, $code = 409,
                                \Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }

}