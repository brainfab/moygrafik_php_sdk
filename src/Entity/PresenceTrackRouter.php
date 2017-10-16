<?php

namespace Brainfab\MoyGrafik\Entity;

use Brainfab\MoyGrafik\Presence;
use JMS\Serializer\Annotation as JMS;

/**
 * Class PresenceTrackRouter.
 */
class PresenceTrackRouter extends PresenceTrack
{
    /**
     * @JMS\Type("Brainfab\MoyGrafik\Entity\PresenceTrackRouterData")
     *
     * @var PresenceTrackRouterData
     */
    public $data;

    /**
     * @var string
     */
    protected $type = Presence::TRACK_TYPE_ROUTER;
}
