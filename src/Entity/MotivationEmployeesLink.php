<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation as JMS;

class MotivationEmployeesLink extends AbstractEntity
{
    /**
     * @JMS\Type("int")
     *
     * @var int
     */
    public $id;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $link;
}
