<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation as JMS;

class Company extends AbstractEntity
{
    /**
     * @JMS\Type("integer")
     *
     * @var int
     */
    public $id;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $name;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $slug;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("active_face_detect_schema")
     *
     * @var string
     */
    public $activeFaceDetectSchema;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $avatar;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("avatar_big")
     *
     * @var string
     */
    public $avatarBig;
}
