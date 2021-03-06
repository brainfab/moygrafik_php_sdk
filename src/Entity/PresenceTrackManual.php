<?php

namespace Brainfab\MoyGrafik\Entity;

use Brainfab\MoyGrafik\Presence;
use JMS\Serializer\Annotation as JMS;

class PresenceTrackManual extends AbstractPresenceTrack
{
    /**
     * @JMS\Type("Brainfab\MoyGrafik\Entity\PresenceTrackManualData")
     *
     * @var PresenceTrackManualData
     */
    public $data;

    /**
     * @var string
     */
    protected $type = Presence::TRACK_TYPE_MANUAL;
}
