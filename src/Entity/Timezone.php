<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation as JMS;

class Timezone extends AbstractEntity
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
