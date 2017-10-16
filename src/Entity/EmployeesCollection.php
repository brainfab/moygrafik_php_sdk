<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class EmployeesCollection.
 */
class EmployeesCollection extends Collection
{

    /**
     * Data collection property name.
     *
     * @var string
     */
    protected $key = 'employees';

    /**
     * @var array
     * @JMS\Type("array<Brainfab\MoyGrafik\Entity\Employee>")
     */
    public $employees;
}
