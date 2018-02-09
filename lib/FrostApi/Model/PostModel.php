<?php

namespace FrostApi\Model;

use FrostApi\Exception\UnprocessableEntity;
use FrostApi\Exception\BadRequest;
use FrostApi\Exception\Conflict;
use FrostApi\Exception\Forbidden;
use FrostApi\Exception\InternalServerError;

class PostModel extends BaseModel
{

    public function post()
    {

        try {

            $response = $this->client->post($this->endpoint, [
                'debug' => FALSE,
                'body' => json_encode($this->body),
                'headers' => [
                    'Content-Type' => 'application/json',
                    'token' => $this->token
                ]
            ]);

            return json_decode($response->getBody());

        }catch (\Exception $e){

            if(strpos($e->getMessage(), "Unprocessable Entity")){
                throw new UnprocessableEntity($e->getMessage());
            }else if(strpos($e->getMessage(), "Bad Request")){
                throw new BadRequest($e->getMessage());
            }else if(strpos($e->getMessage(), "Conflict")){
                throw new Conflict($e->getMessage());
            }else if(strpos($e->getMessage(), "Forbidden")){
                throw new Forbidden($e->getMessage());
            }else if(strpos($e->getMessage(), "Internal Server Error")){
                throw new InternalServerError($e->getMessage());
            }else{
                throw new \Exception("Unknown Error");
            }

        }

    }

}