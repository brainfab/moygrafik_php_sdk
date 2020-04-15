<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation as JMS;

class Country extends AbstractEntity
{
    /**
     * @JMS\Type("integer")
     *
     * @var int
     */
    public $id;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $name;
}
