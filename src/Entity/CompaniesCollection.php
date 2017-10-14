<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class VideosCollection.
 */
class CompaniesCollection extends Collection
{

    /**
     * Data collection property name.
     *
     * @var string
     */
    protected $key = 'companies';

    /**
     * @var array
     * @JMS\Type("array<Brainfab\MoyGrafik\Entity\Company>")
     */
    public $companies;
}
