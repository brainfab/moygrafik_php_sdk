<?php

namespace Brainfab\MoyGrafik\Entity;

use Brainfab\MoyGrafik\Presence;
use JMS\Serializer\Annotation as JMS;

class PresenceTrackFaceDetect extends AbstractPresenceTrack
{
    /**
     * @JMS\Type("Brainfab\MoyGrafik\Entity\PresenceTrackFaceDetectData")
     *
     * @var PresenceTrackFaceDetectData
     */
    public $data;

    /**
     * @var string
     */
    protected $type = Presence::TRACK_TYPE_FACE_DETECT;
}
