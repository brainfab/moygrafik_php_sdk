<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation as JMS;

class EmployeesCollection extends Collection
{
    protected $key = 'employees';

    /**
     * @var array
     * @JMS\Type("array<Brainfab\MoyGrafik\Entity\Employee>")
     */
    public $employees;
}
