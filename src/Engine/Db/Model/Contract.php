<?php namespace Engine\Db\Model;

use Phalcon\Mvc\EntityInterface,
    Phalcon\Mvc\ModelInterface,
    Phalcon\Mvc\Model\ResultInterface;
use Serializable;

interface Contract extends EntityInterface, ModelInterface, ResultInterface,
                           Serializable
{
}