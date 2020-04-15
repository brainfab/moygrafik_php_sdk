<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation as JMS;

class EmployeeSettingMotivation extends AbstractEntity
{
    /**
     * @JMS\Type("boolean")
     *
     * @var bool
     */
    public $enabled;

    /**
     * @JMS\Type("boolean")
     * @JMS\SerializedName("show_if_disabled")
     *
     * @var bool
     */
    public $showIfDisabled;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("company_link")
     *
     * @var string
     */
    public $companyLink;

    /**
     * @JMS\Type("array<Brainfab\MoyGrafik\Entity\MotivationEmployeesLink>")
     * @JMS\SerializedName("employees_links")
     *
     * @var string
     */
    public $employeesLinks;

    /**
     * @JMS\Type("array<Brainfab\MoyGrafik\Entity\MotivationPlacementsLink>")
     * @JMS\SerializedName("placements_links")
     *
     * @var string
     */
    public $placementsLinks;
}
