<?php

namespace FrostApi\Model;

use FrostApi\Data\Work;

class GetWork extends GetModel
{

    protected $workId;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->workId;
    }

    /**
     * @param mixed $workId
     */
    public function setWorkId($workId = null)
    {
        $this->workId = $workId;
    }

    public function __construct($token)
    {
        parent::__construct($token);
        $this->endpoint = "works/%s";

    }

    public function get()
    {
        $result = parent::get();

        if(is_array($result)){

            $works = [];

            foreach ($result as $record){

                $work = new Work();

                $this->set_object_vars($work, (array) $record);

                array_push($works, $work);

            }

            return $works;

        }else{

            $work = new Work();

            $this->set_object_vars($work, (array) $result);

            return $work;

        }

    }

}