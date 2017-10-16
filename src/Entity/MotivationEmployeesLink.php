<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class MotivationEmployeesLink.
 */
class MotivationEmployeesLink extends Entity
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
