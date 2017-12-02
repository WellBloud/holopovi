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
    private $album;
    private $albums;
    private $photos;

    public function __construct(AppSettings $appSettings)
    {
        parent::__construct($appSettings);
        $this->albumsFolder = $this->appSettings->getParameter(['images', 'albumsFolder']);
        $this->albumsThumbsFolder = $this->appSettings->getParameter(['images', 'albumsThumbsFolder']);
        $this->albums = $this->getAlbums();
    }

    public function actionDefault()
    {

    }

    public function actionDetail($id)
    {
        foreach ($this->albums as $album) {
            if ($album['webalized'] === $id) {
                $this->album = $album;
                break;
            }
        }
        if ($this->album === NULL) {
            $this->flashMessage('Album nenalezeno', 'warning');
            $this->redirect('Gallery:');
        }
        $photos = $this->getFiles($this->albumsFolder . $this->album['title']);
        $this->photos = array_diff($photos, [$this->albumsThumbsFolder]);
    }

    public function renderDefault()
    {
        $this->template->albums = $this->albums;
        $this->template->albumsFolder = $this->albumsFolder;
    }

    public function renderDetail()
    {
        $this->template->album = $this->album;
        $this->template->photos = $this->photos;
        $this->template->albumsFolder = $this->albumsFolder;
        $this->template->albumsThumbsFolder = $this->albumsThumbsFolder;
    }

    private function getAlbums()
    {
        $albums = $this->getFiles($this->albumsFolder);
        if (empty($albums)) {
            return [];
        }
        $final = [];
        foreach ($albums as $album) {
            $photos = $this->getFiles($this->albumsFolder . $album . '/' . $this->albumsThumbsFolder);
            $final[] = [
                'title' => $album,
                'webalized' => Strings::webalize($album),
                'photo' => $this->albumsFolder . $album . '/' . $this->albumsThumbsFolder . '/' . $photos[array_rand($photos)]
            ];
        }
        return $final;
    }

}
