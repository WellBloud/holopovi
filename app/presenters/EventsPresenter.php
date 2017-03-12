<?php

/*
 * @author Peter Holop <peter.holop@resyst.cz>
 * created 11.3.2017, 17:23:08
 */

namespace App\Presenters;

use Model\Service\AppSettings;

class EventsPresenter extends BasePresenter
{

    private $eventsDatabase;
    private $events;
    private $timelineFolder;
    private $timelineThumbsFolder;
    private $count;
    // sirka a vyska iframe (youtube videa)
    private $iframeWidth;
    private $iframeHeight;

    public function __construct(AppSettings $appSettings)
    {
        parent::__construct($appSettings);
        setlocale(LC_TIME, 'czech');
        setlocale(LC_TIME, 'cs_CZ');
        $this->iframeHeight = $this->appSettings->getParameter(['youtube', 'iframeHeight']);
        $this->iframeWidth = $this->appSettings->getParameter(['youtube', 'iframeWidth']);
        $this->timelineFolder = $this->appSettings->getParameter(['images', 'timelineFolder']);
        $this->timelineThumbsFolder = $this->appSettings->getParameter(['images', 'timelineThumbsFolder']);
        $this->count = $this->appSettings->getParameter(['global', 'loadEvents']);
        $this->eventsDatabase = $this->getEventsDatabase();
        $this->addEventProperties();
    }

    public function actionDefault()
    {
        $this->events = $this->getEvents($this->count);
    }

    public function handleLoadMoreEvents($offset)
    {
        $events = $this->getEvents($this->count, $offset);
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

    /**
     * Load portion of events
     * @param integer $count
     * @param integer $offset
     * @return array
     */
    private function getEvents($count, $offset = 0)
    {
        return array_slice($this->eventsDatabase, $offset, $count);
    }

    /**
     * Set extra properties to the $eventsDatabase
     */
    private function addEventProperties()
    {
        foreach ($this->eventsDatabase as $key => $event) {
            $this->eventsDatabase[$key]['images'] = $this->getFiles($this->timelineFolder . $event['album']);
            $this->eventsDatabase[$key]['jetomu'] = $this->displayBeforeDate($event['date']);
            $this->eventsDatabase[$key]['czDate'] = strftime("%e. %B %Y", strtotime($event['date']));
        }
    }

    /**
     * Displays how many years, months and days it has been from set date
     * @param   $date   datum
     * @return string
     */
    private function displayBeforeDate($date)
    {
        $diff = abs(strtotime(date("Y-m-d")) - strtotime($date));

        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

        if ($years == 1) {
            $ystr = 'rok';
        } else if ($years > 1 && $years < 5) {
            $ystr = 'roky';
        } else {
            $ystr = 'roků';
        }
        if ($months == 1) {
            $mstr = 'měsíc';
        } else if ($months > 1 && $months < 5) {
            $mstr = 'měsíce';
        } else {
            $mstr = 'měsíců';
        }
        if ($days == 1) {
            $dstr = 'den';
        } else if ($days > 1 && $days < 5) {
            $dstr = 'dny';
        } else {
            $dstr = 'dnů';
        }

        $final_string = 'Už je tomu ';
        if ($years != 0) {
            $final_string .= $years . ' ' . $ystr;
            if ($months == 0) {
                $final_string .= ' a ';
            }
        }
        if ($months != 0) {
            if ($years != 0) {
                $final_string .= ' ';
            }
            $final_string .= $months . ' ' . $mstr . ' a ';
        }
        $final_string .= $days . ' ' . $dstr;

        return $final_string;
    }

    private function getEventsDatabase()
    {
        $events = [
            [
                'date' => '2015-09-25',
                'title' => 'Zájezd do Paříže',
                'album' => '2015_pariz',
                'desc' => '<p>Vyhráli jsme v tombole zájezd, tak jsme si to za to kilo za lístky náramně užili.</p>',
                'icon' => 'location',
            ], [
                'date' => '2014-12-31',
                'title' => 'Silvestr 2014 v Beskydech',
                'album' => '2014_silvestr',
                'desc' => '',
                'icon' => 'location',
            ], [
                'date' => '2014-12-05',
                'title' => 'Pečeme Angry Muffins',
                'album' => '2014_muffin',
                'desc' => '',
                'icon' => 'picture',
            ], [
                'date' => '2014-09-28',
                'title' => 'Momentky z bruslí',
                'album' => '2014_brusle',
                'desc' => '',
                'icon' => 'picture',
            ], [
                'date' => '2014-08-21',
                'title' => 'Svatební cesta',
                'album' => false,
                'desc' => '<p>Líbánky jsme si užívali na Krétě, fotek je moc a tak jsou v galerii.</p>',
                'icon' => 'location',
            ], [
                'date' => '2014-07-12',
                'title' => 'Svatba',
                'album' => false,
                'desc' => '<p>A už jsme oficiálně svoji...</p><p>Fotky jsou v naší galerii.</p>
                <p>
                    <iframe width="' . $this->iframeWidth . '" height="' . $this->iframeHeight . '" src="https://www.youtube.com/embed/PAR_n_z7_7k?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                </p>',
                'icon' => 'movie',
            ], [
                'date' => '2014-07-05',
                'title' => 'Předsvatební focení',
                'album' => '2014_predsvatebni',
                'desc' => '',
                'icon' => 'picture',
            ], [
                'date' => '2014-02-22',
                'title' => 'Svatební Futurum',
                'album' => '2014_futurum',
                'desc' => '',
                'icon' => 'picture',
            ], [
                'date' => '2013-11-30',
                'title' => 'Zasnoubení',
                'album' => '2013_zasnoubeni',
                'desc' => '<p>Odhodlal jsem se do toho prásknout...</p>',
                'icon' => 'picture',
            ], [
                'date' => '2013-01-25',
                'title' => 'Francouzské Alpy',
                'album' => '2013_alpy',
                'desc' => '',
                'icon' => 'location',
            ], [
                'date' => '2012-10-13',
                'title' => 'Putování slováckým vinohradem',
                'album' => '2012_burcak',
                'desc' => '',
                'icon' => 'picture',
            ], [
                'date' => '2012-07-23',
                'title' => 'Dovolená v Egyptě',
                'album' => '2012_egypt',
                'desc' => '',
                'icon' => 'location',
            ], [
                'date' => '2012-07-14',
                'title' => 'Koncert kapely The Hiccups',
                'album' => '2012_marky_koncert2',
                'desc' => '',
                'icon' => 'picture',
            ], [
                'date' => '2012-07-13',
                'title' => 'Naši kluci',
                'album' => '2012_kluci',
                'desc' => '',
                'icon' => 'picture',
            ], [
                'date' => '2012-06-23',
                'title' => 'Koncert kapely T-Pack',
                'album' => '2012_tpack',
                'desc' => '<p>Vinohradský druhý ročník hudebního odpoledne "mladých kapel"</p>',
                'icon' => 'picture',
            ], [
                'date' => '2012-04-06',
                'title' => 'Lasergame',
                'album' => '2012_lasergame',
                'desc' => '',
                'icon' => 'picture',
            ], [
                'date' => '2012-02-15',
                'title' => 'Čekání na jaro',
                'album' => '2012_zima',
                'desc' => '',
                'icon' => 'picture',
            ], [
                'date' => '2011-12-31',
                'title' => 'Silvestr 2011',
                'album' => '2011_silvestr',
                'desc' => '',
                'icon' => 'location',
            ], [
                'date' => '2011-11-24',
                'title' => 'Míša a Joey se perou o dobroty',
                'album' => false,
                'desc' => '<p><iframe width="' . $this->iframeWidth . '" height="' . $this->iframeHeight . '" src="https://www.youtube.com/embed/dCaMkikHu9A?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></p>',
                'icon' => 'movie',
            ], [
                'date' => '2011-10-03',
                'title' => 'Míša',
                'album' => '2011_misa',
                'desc' => '',
                'icon' => 'picture',
            ], [
                'date' => '2011-08-15',
                'title' => 'Jízda Brnem na bruslích',
                'album' => '2011_jizda_brnem',
                'desc' => '',
                'icon' => 'picture',
            ], [
                'date' => '2011-07-31',
                'title' => 'Dovolená Itálie',
                'album' => '2011_italie',
                'desc' => '',
                'icon' => 'location',
            ], [
                'date' => '2011-03-24',
                'title' => 'Koncert kapely The Hiccups',
                'album' => '2011_marky_koncert',
                'desc' => '',
                'icon' => 'picture',
            ], [
                'date' => '2010-12-24',
                'title' => 'Joey pod vánočním stromečkem',
                'album' => false,
                'desc' => '<p><iframe width="' . $this->iframeWidth . '" height="' . $this->iframeHeight . '" src="https://www.youtube.com/embed/yk4zlZx3Yws?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></p>',
                'icon' => 'movie',
            ], [
                'date' => '2010-09-16',
                'title' => 'Víkend na Balatóně',
                'album' => '2010_balaton',
                'desc' => '',
                'icon' => 'location',
            ], [
                'date' => '2010-08-01',
                'title' => 'Tatry',
                'album' => '2010_tatry',
                'desc' => '',
                'icon' => 'location',
            ], [
                'date' => '2010-04-24',
                'title' => 'Svatba Káji a Ľubky',
                'album' => '2010_svatby',
                'desc' => '',
                'icon' => 'picture',
            ], [
                'date' => '2010-02-28',
                'title' => 'Joey',
                'album' => '2010_joey',
                'desc' => '',
                'icon' => 'picture',
            ], [
                'date' => '2009-12-31',
                'title' => 'Silvestr 2009',
                'album' => '2009_silvestr',
                'desc' => '',
                'icon' => 'picture',
            ], [
                'date' => '2009-12-27',
                'title' => 'Svoboďáček s Kubou a Jančou',
                'album' => '2009_svobodacek',
                'desc' => '<p>S <a href="http://jancaakubaseberou.cz/" target="_blank">Kubou a Jančou</a></p>',
                'icon' => 'picture',
            ], [
                'date' => '2009-03-28',
                'title' => 'Alpská lyžovačka s Lukášem a Marky',
                'album' => '2009_alpy_italie',
                'desc' => '<p>Sice padaly laviny, ale o to to byl větší zážitek</p>',
                'icon' => 'location',
            ], [
                'date' => '2008-10-11',
                'title' => 'Výlet do Alp s Ráčkovic famílií',
                'album' => '2008_alpy',
                'desc' => '<p>Celodenní procházka po okraji Alp.</p>',
                'icon' => 'location',
            ], [
                'date' => '2008-06-15',
                'title' => 'Svatba Míšy a Verči',
                'album' => '2008_svatba_misy',
                'desc' => '',
                'icon' => 'picture',
            ], [
                'date' => '2008-04-30',
                'title' => 'Poslední zvonění',
                'album' => '2008_posledni_zvoneni',
                'desc' => '',
                'icon' => 'picture',
            ], [
                'date' => '2008-04-08',
                'title' => 'Stužkovák',
                'album' => '2008_stuzkovak',
                'desc' => '',
                'icon' => 'picture',
            ], [
                'date' => '2007-12-31',
                'title' => 'Silvestr 2007',
                'album' => '2007_silvestr',
                'desc' => '',
                'icon' => 'location',
            ], [
                'date' => '2007-08-18',
                'title' => 'MHD Selfie',
                'album' => '2007_mhd',
                'desc' => '<p>Ještě než to bylo cool...</p>',
                'icon' => 'picture',
            ], [
                'date' => '2007-07-02',
                'title' => 'Markétka skáče z letadla',
                'album' => '2007_seskok',
                'desc' => '',
                'icon' => 'picture',
            ], [
                'date' => '2007-05-21',
                'title' => 'Výlet do Olomouce',
                'album' => '2005_olomouc',
                'desc' => '',
                'icon' => 'location',
            ], [
                'date' => '2007-05-10',
                'title' => 'Pařba ve 14ce',
                'album' => '2007_14ka',
                'desc' => '<p>Jeden z mnoha večerů strávených kdesi ve městě...</p>',
                'icon' => 'picture',
            ], [
                'date' => '2007-02-28',
                'title' => 'Začátek chození',
                'album' => false,
                'desc' => '<p>Dohromady jsme se dali na konci třeťáku, při úmorných studiích na <a href="http://www.gml.cz/" target="_blank"><abbr title="Gymnázium Matyáše Lercha">GML</abbr></a>.</p>',
                'icon' => 'location',
            ], [
                'date' => '2005-11-24',
                'title' => 'Bílá prodloužená',
                'album' => '2005_bila_prodlouzena',
                'desc' => '<p>Ó ano, i my jsme se učili tancovat. Vyvrcholením tohoto marného snažení byla dechberoucí podívaná, určená především pro nostalgické vzpomínky rodičů a posměch přihlížejících.</p>',
                'icon' => 'picture',
            ], [
                'date' => '2005-02-25',
                'title' => 'Lyžák v prváku',
                'album' => '2005_lyzak',
                'desc' => '<p>První flirtování v podobě shazování druhého z lyží započalo již zde.</p>',
                'icon' => 'location',
            ], [
                'date' => '2004-09-01',
                'title' => 'První setkání',
                'album' => '2004_setkani',
                'desc' => '<p>Poprvé jsme se uviděli při nástupu do prváku na <a href="http://www.gml.cz/" target="_blank"><abbr title="Gymnázium Matyáše Lercha">GML</abbr></a>. Tehdy jsme ale vypadali jako pořádný paka</p>',
                'icon' => 'picture',
            ],
        ];
        return $events;
    }

}
