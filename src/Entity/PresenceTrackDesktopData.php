<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class PresenceTrackDesktopData.
 */
class PresenceTrackDesktopData
{
    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $mac;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $ip;

    /**
     * JSON serialized array of connected devices: ['<devices ip>' => <device mac>,].
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    public $devices;
}
