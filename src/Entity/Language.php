<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation as JMS;

class Language extends AbstractEntity
{
    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $code;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $name;
}
