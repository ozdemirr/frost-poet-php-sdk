<?php

namespace FrostApi\Exception;

class UnprocessableEntity extends \Exception
{

    public function __construct($message, $code = 422,
                                \Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }

}