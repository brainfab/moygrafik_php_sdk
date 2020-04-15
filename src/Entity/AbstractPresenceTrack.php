<?php

namespace Brainfab\MoyGrafik\Entity;

use Brainfab\MoyGrafik\Presence;
use JMS\Serializer\Annotation as JMS;

abstract class AbstractPresenceTrack extends AbstractEntity
{
    /**
     * @JMS\Type("array<string, string>")
     *
     * @var array
     */
    public $data;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("tracking_date")
     *
     * @var string
     */
    public $trackingDate;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $action = Presence::TRACK_ACTION_TOGGLE;

    /**
     * @var string
     */
    protected $type = null;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
