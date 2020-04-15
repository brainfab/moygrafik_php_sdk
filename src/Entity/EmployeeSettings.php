<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation as JMS;

class EmployeeSettings extends AbstractEntity
{
    /**
     * @JMS\Type("Brainfab\MoyGrafik\Entity\EmployeeSettingMotivation")
     *
     * @var EmployeeSettingMotivation
     */
    public $motivation;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $role;
}
