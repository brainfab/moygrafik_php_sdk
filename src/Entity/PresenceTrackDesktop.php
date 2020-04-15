<?php

namespace Brainfab\MoyGrafik\Entity;

use Brainfab\MoyGrafik\Presence;
use JMS\Serializer\Annotation as JMS;

class PresenceTrackDesktop extends AbstractPresenceTrack
{
    /**
     * @JMS\Type("Brainfab\MoyGrafik\Entity\PresenceTrackDesktopData")
     *
     * @var PresenceTrackDesktopData
     */
    public $data;

    /**
     * @var string
     */
    protected $type = Presence::TRACK_TYPE_DESKTOP;
}
