<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class PresenceTrackManualData.
 */
class PresenceTrackManualData
{
    /**
     * @JMS\Type("integer")
     * @JMS\SerializedName("employee_id")
     *
     * @var integer
     */
    public $employeeId;
}
