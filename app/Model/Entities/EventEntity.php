<?php
/**
 * @author: wellbloud
 * created: 2.8.18
 */

namespace App\Model\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Event
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     */
    protected $title;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $album;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $description;
    /**
     * @ORM\ManyToOne(targetEntity="Icon", inversedBy="events")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    protected $icon;
    /**
     * @ORM\Column(type="date")
     */
    protected $happenedOn;

}