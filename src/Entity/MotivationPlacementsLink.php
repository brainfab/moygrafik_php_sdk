<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class MotivationPlacementsLink.
 */
class MotivationPlacementsLink extends Entity
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
