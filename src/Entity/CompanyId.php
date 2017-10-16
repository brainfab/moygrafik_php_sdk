<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class CompanyId.
 */
class CompanyId extends Entity
{
    /**
     * @JMS\Type("integer")
     *
     * @var int
     */
    public $id;
}
