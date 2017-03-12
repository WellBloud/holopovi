<?php

/*
 * @author Peter Holop <peter.holop@resyst.cz>
 * created 11.3.2017, 16:48:12
 */

namespace App\Presenters;

use Model\Service\AppSettings,
    Nette\Utils\Strings;

class GalleryPresenter extends BasePresenter
{

    private $albumsFolder;
    private $albumsThumbsFolder;
    private $albums;

    public function __construct(AppSettings $appSettings)
    {
        parent::__construct($appSettings);
        $this->albumsFolder = $this->appSettings->getParameter(['images', 'albumsFolder']);
        $this->albumsThumbsFolder = $this->appSettings->getParameter(['images', 'albumsThumbsFolder']);
    }

    public function actionDefault()
    {
        $this->albums = $this->getAlbums();
    }

    public function renderDefault()
    {
        $this->template->albums = $this->albums;
        $this->template->albumsFolder = $this->albumsFolder;
    }

    private function getAlbums()
    {
        $albums = $this->getFiles($this->albumsFolder);
        if (empty($albums)) {
            return [];
        }
        $final = [];
        foreach ($albums as $album) {
            $photos = $this->getFiles($this->albumsFolder . $album . $this->albumsThumbsFolder);
            $final[] = [
                'title' => $album,
                'webalized' => Strings::webalize($album),
                'photo' => $this->albumsFolder . $album . $this->albumsThumbsFolder . '/' . $photos[array_rand($photos)]
            ];
        }
        return $final;
    }

}
