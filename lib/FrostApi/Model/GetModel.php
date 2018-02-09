<?php

namespace FrostApi\Model;

use FrostApi\Exception\UnprocessableEntity;
use FrostApi\Exception\BadRequest;
use FrostApi\Exception\Conflict;
use FrostApi\Exception\Forbidden;
use FrostApi\Exception\InternalServerError;

abstract class GetModel extends BaseModel
{

    public abstract function getId();

    public function get()
    {

        try {

            $response = $this->client->get(sprintf($this->endpoint, $this->getId()), [
                'debug' => FALSE,
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

    protected function set_object_vars($object, array $vars) {
        $has = get_object_vars($object);
        foreach ($has as $name => $oldValue) {
            $object->$name = isset($vars[$name]) ? $vars[$name] : NULL;
        }
    }

}