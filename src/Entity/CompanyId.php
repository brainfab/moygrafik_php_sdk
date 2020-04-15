<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation as JMS;

class CompanyId extends AbstractEntity
{
    /**
     * @JMS\Type("integer")
     *
     * @var int
     */
    public $id;
}
