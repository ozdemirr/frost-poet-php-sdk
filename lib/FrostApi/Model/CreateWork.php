<?php

namespace FrostApi\Model;

use FrostApi\Data\Work;

class CreateWork extends PostModel
{

    public $body;

    public function __construct($token)
    {

        parent::__construct($token);

        $this->endpoint = "works";

        $this->body = new Work();

        $now = new \DateTime("now", new \DateTimeZone("UTC"));
        $this->body->setDateCreated($now->format(\DateTime::ISO8601));
        $this->body->setDatePublished($now->format(\DateTime::ISO8601));


    }

}