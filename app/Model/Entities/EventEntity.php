<?php
/**
 * @author: wellbloud
 * created: 2.8.18
 */

namespace App\Model\Entities;

use App\Model\Helpers\DateFormatHelper;
use App\Model\Helpers\FileSystemHelper;
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
     * @ORM\Column(type="string", unique=true)
     */
    protected $alias;
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

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * @return mixed
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return Icon
     */
    public function getIcon(): Icon
    {
        return $this->icon;
    }

    /**
     * @return mixed
     */
    public function getHappenedOn()
    {
        return $this->happenedOn;
    }

    public function getImages(): array
    {
        if ($this->getAlbum()) {
            return FileSystemHelper::getFiles('images/fotky/' . $this->getAlbum());
        }
        return [];
    }

    public function getFormattedTimeAgo()
    {
        return DateFormatHelper::formatTimeAgo($this->getHappenedOn());
    }

}