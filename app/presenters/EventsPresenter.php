<?php

/*
 * @author Peter Holop <peter.holop@resyst.cz>
 * created 11.3.2017, 17:23:08
 */

namespace App\Presenters;

use App\Model\FrontModule\Repository\EventRepository;
use Model\Service\AppSettings;

class EventsPresenter extends BasePresenter
{
    private $events;
    private $timelineFolder;
    private $timelineThumbsFolder;
    private $count;
    /**
     * @var EventRepository
     */
    private $eventRepository;

    public function __construct(AppSettings $appSettings, EventRepository $eventRepository)
    {
        parent::__construct($appSettings);
        $this->eventRepository = $eventRepository;
        $this->timelineFolder = $this->appSettings->getParameter(['images', 'timelineFolder']);
        $this->timelineThumbsFolder = $this->appSettings->getParameter(['images', 'timelineThumbsFolder']);
        $this->count = $this->appSettings->getParameter(['global', 'loadEvents']);
    }

    public function actionDefault()
    {
        $this->events = $this->eventRepository->findAllOrderedByDateDesc($this->count);
    }

    public function handleLoadMoreEvents($offset)
    {
        $events = $this->eventRepository->findAllOrderedByDateDesc($this->count, $offset);
        if (!empty($events)) {
            $this->events = $events;
            $this->redrawControl('eventsSnippet');
        }
    }

    public function renderDefault()
    {
        $this->template->events = $this->events;
        $this->template->timelineFolder = $this->timelineFolder;
        $this->template->timelineThumbsFolder = $this->timelineThumbsFolder;
    }

}
