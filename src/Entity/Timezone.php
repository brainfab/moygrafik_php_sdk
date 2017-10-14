<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Timezone.
 */
class Timezone extends Entity
{
    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $title;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $abbreviation;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("utc_offset")
     *
     * @var string
     */
    public $utcOffset;

    /**
     * @JMS\Type("boolean")
     * @JMS\SerializedName("if_dst")
     *
     * @var string
     */
    public $ifDst;
}
