<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation as JMS;

class PresenceTrackFaceDetectData
{
    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $mac;

    /**
     * @JMS\Type("integer")
     * @JMS\SerializedName("employee_id")
     *
     * @var integer
     */
    public $employeeId;
}
