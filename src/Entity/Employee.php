<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation as JMS;

class Employee extends AbstractEntity
{
    /**
     * @JMS\Type("integer")
     *
     * @var int
     */
    public $id;

    /**
     * @JMS\Type("integer")
     * @JMS\SerializedName("user_id")
     *
     * @var int
     */
    public $userId;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("first_name")
     *
     * @var string
     */
    public $firstName;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("last_name")
     *
     * @var string
     */
    public $lastName;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $phone;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $email;

    /**
     * @JMS\Type("integer")
     * @JMS\SerializedName("color_id")
     *
     * @var integer
     */
    public $colorId;

    /**
     * @JMS\Type("integer")
     *
     * @var integer
     */
    public $clid;

    /**
     * @JMS\Type("integer")
     *
     * @var integer
     */
    public $presenceCloseRule;

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

    /**
     * @JMS\Type("array<integer>")
     *
     * @var array
     */
    public $placements;

    /**
     * @JMS\Type("array<integer>")
     *
     * @var array
     */
    public $sites;

    /**
     * @JMS\Type("array<integer>")
     *
     * @var array
     */
    public $subdivisions;

    /**
     * @JMS\Type("array<integer>")
     *
     * @var array
     */
    public $positions;
}
