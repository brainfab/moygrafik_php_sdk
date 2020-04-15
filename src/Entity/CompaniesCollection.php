<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation\Type;

class CompaniesCollection extends Collection
{
    protected $key = 'companies';

    /**
     * @var array
     * @Type("array<Brainfab\MoyGrafik\Entity\Company>")
     */
    public $companies;
}
