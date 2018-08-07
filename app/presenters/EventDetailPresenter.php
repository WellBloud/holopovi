<?php

/**
 * @author: Peter Holop <peter.holop@resyst.cz>
 * created: 07.08.2018
 */
declare(strict_types=1);


namespace App\Presenters;


use App\Model\Entities\Event;
use App\Model\FrontModule\Repository\EventRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Model\Service\AppSettings;
use Nette\Application\BadRequestException;

class EventDetailPresenter extends BasePresenter
{

    /**
     * @var EventRepository
     */
    private $eventRepository;
    /**
     * @var Event
     */
    private $event;
    /**
     * @var Event
     */
    private $previousEvent;
    /**
     * @var Event
     */
    private $nextEvent;
    private $timelineFolder;
    private $timelineThumbsFolder;

    public function __construct(AppSettings $appSettings, EventRepository $eventRepository)
    {
        parent::__construct($appSettings);
        $this->eventRepository = $eventRepository;
        $this->timelineFolder = $this->appSettings->getParameter(['images', 'timelineFolder']);
        $this->timelineThumbsFolder = $this->appSettings->getParameter(['images', 'timelineThumbsFolder']);
    }

    public function actionDefault(int $id)
    {
        try {
            $this->event = $this->eventRepository->find($id);
        } catch (NoResultException $e) {
            throw new BadRequestException();
        } catch (NonUniqueResultException $e) {
            throw new BadRequestException();
        }
        $this->previousEvent = $this->eventRepository->findOlder($this->event->getHappenedOn());
        $this->nextEvent = $this->eventRepository->findNewer($this->event->getHappenedOn());
    }

    public function renderDefault()
    {
        $this->template->event = $this->event;
        $this->template->previousEvent = $this->previousEvent;
        $this->template->nextEvent = $this->nextEvent;
        $this->template->timelineFolder = $this->timelineFolder;
        $this->template->timelineThumbsFolder = $this->timelineThumbsFolder;
    }
}