<?php

namespace FrostApi\Model;
use GuzzleHttp\Client;

abstract class BaseModel
{

    protected $baseUri = "https://api.frost.po.et/";

    protected $endpoint = "";

    protected $token = "";

    protected $client;

    public function __construct($token)
    {
        $this->token = $token;

        $this->client = new Client([
            'base_uri' => $this->baseUri,
        ]);

    }

}