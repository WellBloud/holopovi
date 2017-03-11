<?php
class Common {

    /**
     * Return czech month name
     *
     * return string
     */
    function czechMonth($month) {
        static $names = array(1 => 'leden', 'únor', 'březen', 'duben', 'květen', 'červen', 'červenec', 'srpen', 'září', 'říjen', 'listopad', 'prosinec');

        return $names[$month];
    }

    /**
     * Formats date to czech format
     *
     * return string
     */
    function displayCzechDate($date){
        $month = $this->czechMonth(date("n", strtotime($date)));
        $day = date("j", strtotime($date));
        $year = date("Y", strtotime($date));

        return $day . '. ' . $month . ' ' . $year;
    }

    /**
     * Displays how many years, months and days it has been from set date
     * @param   $date   datum
     *
     * return string
     */
    static function displayBeforeDate($date){
        $diff = abs(strtotime(date("Y-m-d")) - strtotime($date));

        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

        if ($years == 1) {
            $ystr = 'rok';
        } else if ($years > 1 && $years <5) {
            $ystr = 'roky';
        } else {
            $ystr = 'roků';
        }
        if ($months == 1) {
            $mstr = 'měsíc';
        } else if ($months > 1 && $months <5) {
            $mstr = 'měsíce';
        } else {
            $mstr = 'měsíců';
        }
        if ($days == 1) {
            $dstr = 'den';
        } else if ($days > 1 && $days <5) {
            $dstr = 'dny';
        } else {
            $dstr = 'dnů';
        }

        $final_string = 'Už je tomu ';
        if ($years != 0) {
            $final_string .= $years . ' ' .  $ystr;
            if ($months == 0) {
                $final_string .= ' a ';
            }
        }
        if ($months != 0) {
            if ($years != 0) {
                $final_string .= ' ';
            }
            $final_string .= $months . ' ' .  $mstr . ' a ';
        }
        $final_string .= $days . ' ' . $dstr;

        return $final_string;
    }

    /**
     * Vrati vygenerovany blok pro timeline
     * @param   $album          adresar s fotkama
     * @param   $date           datum udalosti
     * @param   $title          nazev udalosti
     * @param   $description    popis udalosti
     * @param   $icon           ikona, ktera se ma vykreslit
     *
     * return string
     */
    function getTimelineBlock($album, $date, $title, $description, $icon = 'dovolena') {
        if ($album !== false) {
            $fotky = $this->getImages($album);
        }
        $jetomu = $this->displayBeforeDate($date);
        $cz_date = $this->displayCzechDate($date);

        $block = '
   		<section class="timeline-block">
			<div class="timeline-img ' . $icon . '">
				<img src="images/cd-icon-' . $this->getTimelineIcon($icon) . '.svg" alt="' . $icon . '">
			</div>
			<div class="timeline-content">
				<h2>' . $title . '</h2>
                ' . (!empty($description) ? $description : '');
        if ($album !== false) {
            $block .= '<p>';
            foreach($fotky as $foto) {
                $block .= '<a class="minialbum" id="' . $album . '" href="images/fotky/' . $album . '/' . $foto . '"><img src="images/thumbs/' . $album . '/' . $foto . '" alt="' . $title . '" /></a>';
            }
            $block .= '</p>';
        }
        $block .= '
                <time datetime="' . $date . '">' . $cz_date . '<br /><small>' . $jetomu . '</small></time>
			</div>
		</section>
        ';
        return $block;
    }

    /**
     * Prohleda zadanou slozku a vrati seznam souboru
     * @return  array
     */
    function getImages($folder) {
        $fotky = scandir('images/fotky/' . $folder);
        $fotky = array_diff($fotky, array('.', '..'));

        return $fotky;
    }

    /**
     * vrati nazev ikony
     * @return  string
     */
    function getTimelineIcon($icon = 'dovolena') {
        switch ($icon) {
            case 'dovolena':
                return 'location';
                break;
            case 'fotky':
                return 'picture';
                break;
            case 'video':
                return 'movie';
                break;
        }
    }

}
?>