<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation as JMS;

class PaginatedCollection extends Collection
{
    /**
     * @JMS\Type("integer")
     * @JMS\SerializedName("current_page")
     *
     * @var int
     */
    public $currentPage;

    /**
     * @JMS\Type("integer")
     *
     * @var int
     */
    public $total;

    /**
     * @JMS\Type("integer")
     *
     * @var int
     */
    public $last;

    /**
     * @JMS\Type("integer")
     *
     * @var int
     */
    public $first;

    /**
     * @JMS\Type("integer")
     * @JMS\SerializedName("per_page")
     *
     * @var int
     */
    public $perPage;

    /**
     * @JMS\Type("integer")
     * @JMS\SerializedName("page_count")
     *
     * @var int
     */
    public $pageCount;

    /**
     * @JMS\Type("integer")
     *
     * @var int
     */
    public $prev;

    /**
     * @JMS\Type("integer")
     *
     * @var int
     */
    public $next;
}
