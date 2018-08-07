<?php

/*
 * @author Peter Holop <peter.holop@resyst.cz>
 * created 11.3.2017, 16:10:48
 */

namespace App\Presenters;

use Nette\Application\UI,
    Model\Service\AppSettings;

abstract class BasePresenter extends UI\Presenter
{

    /**
     * @var AppSettings
     */
    protected $appSettings;

    public function __construct(AppSettings $appSettings)
    {
        $this->appSettings = $appSettings;
    }

    /**
     * @inheritdoc
     */
    protected function createTemplate($class = NULL)
    {
        $template = parent::createTemplate($class);
        $template->sitename = $this->appSettings->getParameter(['global', 'sitename']);
        $template->metaAuthor = $this->appSettings->getParameter(['global', 'metaAuthor']);
        $template->metaDesc = $this->appSettings->getParameter(['global', 'metaDesc']);
        $template->metaKeys = $this->appSettings->getParameter(['global', 'metaKeys']);
        $template->version = $this->appSettings->getParameter(['global', 'version']);

        return $template;
    }


}
