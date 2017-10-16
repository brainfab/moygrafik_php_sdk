<?php

namespace Brainfab\MoyGrafik\Entity;

use Brainfab\MoyGrafik\Presence;
use JMS\Serializer\Annotation as JMS;

/**
 * Class PresenceTrackMobile.
 */
class PresenceTrackMobile extends PresenceTrack
{
    /**
     * @JMS\Type("Brainfab\MoyGrafik\Entity\PresenceTrackMobileData")
     *
     * @var PresenceTrackMobileData
     */
    public $data;

    /**
     * @var string
     */
    protected $type = Presence::TRACK_TYPE_MOBILE;
}
