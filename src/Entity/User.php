<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation as JMS;

class User extends AbstractEntity
{
    /**
     * @JMS\Type("integer")
     *
     * @var int
     */
    public $id;

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
    public $avatar;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("avatar_big")
     *
     * @var string
     */
    public $avatarBig;

    /**
     * @JMS\Type("Brainfab\MoyGrafik\Entity\Language")
     *
     * @var Language
     */
    public $language;

    /**
     * @JMS\Type("Brainfab\MoyGrafik\Entity\Country")
     *
     * @var Country
     */
    public $country;

    /**
     * @JMS\Type("Brainfab\MoyGrafik\Entity\Timezone")
     *
     * @var Timezone
     */
    public $timezone;

    /**
     * @JMS\Type("array<string>")
     *
     * @var array
     */
    public $roles;
}
