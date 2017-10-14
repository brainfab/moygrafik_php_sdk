<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Language.
 */
class Language extends Entity
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
