<?php
require_once 'define.php';
require_once 'class/common.php';
$cf = new Common;
include_once 'html/header.php';
// sirka a vyska iframe (youtube videa)
$if_w = 430;
$if_h = 242;
?>
<div class="theme-showcase" role="main">
    <div class="page-header">
        <h1><i class="fa fa-calendar-o"></i>Události <small>aneb společná cesta životem</small></h1>
    </div>
	<section id="timeline" class="tl-container">
        <?php
        $datum = '2015-09-25';
        $nazev = 'Zájezd do Paříže';
        $album = '2015_pariz';
        $popis = '<p>Vyhráli jsme v tombole zájezd, tak jsme si to za to kilo za lístky náramně užili.</p>';
        $ikona = 'dovolena';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2014-12-31';
        $nazev = 'Silvestr 2014 v Beskydech';
        $album = '2014_silvestr';
        $popis = '';
        $ikona = 'dovolena';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2014-12-05';
        $nazev = 'Pečeme Angry Muffins';
        $album = '2014_muffin';
        $popis = '';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2014-09-28';
        $nazev = 'Momentky z bruslí';
        $album = '2014_brusle';
        $popis = '';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2014-08-21';
        $nazev = 'Svatební cesta';
        $album = false;
        $popis = '<p>Líbánky jsme si užívali na Krétě, fotek je moc a tak jsou v <a href="/galerie.php">galerii</a>.</p>';
        $ikona = 'dovolena';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2014-07-12';
        $nazev = 'Svatba';
        $album = false;
        $popis = '<p>A už jsme oficiálně svoji...</p><p>Fotky jsou v naší <a href="/galerie.php">galerii</a>.</p>
                <p>
                    <iframe width="' . $if_w . '" height="' . $if_h . '" src="https://www.youtube.com/embed/PAR_n_z7_7k?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                </p>';
        $ikona = 'video';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2014-07-05';
        $nazev = 'Předsvatební focení';
        $album = '2014_predsvatebni';
        $popis = '';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2014-02-22';
        $nazev = 'Svatební Futurum';
        $album = '2014_futurum';
        $popis = '';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2013-11-30';
        $nazev = 'Zasnoubení';
        $album = '2013_zasnoubeni';
        $popis = '<p>Odhodlal jsem se do toho prásknout...</p>';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2013-01-25';
        $nazev = 'Francouzské Alpy';
        $album = '2013_alpy';
        $popis = '';
        $ikona = 'dovolena';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2012-10-13';
        $nazev = 'Putování slováckým vinohradem';
        $album = '2012_burcak';
        $popis = '';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2012-07-23';
        $nazev = 'Dovolená v Egyptě';
        $album = '2012_egypt';
        $popis = '';
        $ikona = 'dovolena';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2012-07-14';
        $nazev = 'Koncert kapely The Hiccups';
        $album = '2012_marky_koncert2';
        $popis = '';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2012-07-13';
        $nazev = 'Naši kluci';
        $album = '2012_kluci';
        $popis = '';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2012-06-23';
        $nazev = 'Koncert kapely T-Pack';
        $album = '2012_tpack';
        $popis = '<p>Vinohradský druhý ročník hudebního odpoledne "mladých kapel"</p>';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2012-04-06';
        $nazev = 'Lasergame';
        $album = '2012_lasergame';
        $popis = '';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2012-02-15';
        $nazev = 'Čekání na jaro';
        $album = '2012_zima';
        $popis = '';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2011-12-31';
        $nazev = 'Silvestr 2011';
        $album = '2011_silvestr';
        $popis = '';
        $ikona = 'dovolena';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2011-11-24';
        $nazev = 'Míša a Joey se perou o dobroty';
        $album = false;
        $popis = '<p><iframe width="' . $if_w . '" height="' . $if_h . '" src="https://www.youtube.com/embed/dCaMkikHu9A?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></p>';
        $ikona = 'video';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2011-10-03';
        $nazev = 'Míša';
        $album = '2011_misa';
        $popis = '';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2011-08-15';
        $nazev = 'Jízda Brnem na bruslích';
        $album = '2011_jizda_brnem';
        $popis = '';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2011-07-31';
        $nazev = 'Dovolená Itálie';
        $album = '2011_italie';
        $popis = '';
        $ikona = 'dovolena';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2011-03-24';
        $nazev = 'Koncert kapely The Hiccups';
        $album = '2011_marky_koncert';
        $popis = '';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2010-12-24';
        $nazev = 'Joey pod vánočním stromečkem';
        $album = false;
        $popis = '<p><iframe width="' . $if_w . '" height="' . $if_h . '" src="https://www.youtube.com/embed/yk4zlZx3Yws?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></p>';
        $ikona = 'video';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2010-09-16';
        $nazev = 'Víkend na Balatóně';
        $album = '2010_balaton';
        $popis = '';
        $ikona = 'dovolena';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2010-08-01';
        $nazev = 'Tatry';
        $album = '2010_tatry';
        $popis = '';
        $ikona = 'dovolena';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2010-04-24';
        $nazev = 'Svatba Káji a Ľubky';
        $album = '2010_svatby';
        $popis = '';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2010-02-28';
        $nazev = 'Joey';
        $album = '2010_joey';
        $popis = '';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2009-12-31';
        $nazev = 'Silvestr 2009';
        $album = '2009_silvestr';
        $popis = '';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2009-12-27';
        $nazev = 'Svoboďáček s Kubou a Jančou';
        $album = '2009_svobodacek';
        $popis = '<p>S <a href="http://jancaakubaseberou.cz/" target="_blank">Kubou a Jančou</a></p>';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2009-03-28';
        $nazev = 'Alpská lyžovačka s Lukášem a Marky';
        $album = '2009_alpy_italie';
        $popis = '<p>Sice padaly laviny, ale o to to byl větší zážitek</p>';
        $ikona = 'dovolena';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2008-10-11';
        $nazev = 'Výlet do Alp s Ráčkovic famílií';
        $album = '2008_alpy';
        $popis = '<p>Celodenní procházka po okraji Alp.</p>';
        $ikona = 'dovolena';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2008-06-15';
        $nazev = 'Svatba Míšy a Verči';
        $album = '2008_svatba_misy';
        $popis = '';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2008-04-30';
        $nazev = 'Poslední zvonění';
        $album = '2008_posledni_zvoneni';
        $popis = '';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2008-04-08';
        $nazev = 'Stužkovák';
        $album = '2008_stuzkovak';
        $popis = '';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2007-12-31';
        $nazev = 'Silvestr 2007';
        $album = '2007_silvestr';
        $popis = '';
        $ikona = 'dovolena';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2007-08-18';
        $nazev = 'MHD Selfie';
        $album = '2007_mhd';
        $popis = '<p>Ještě než to bylo cool...</p>';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2007-07-02';
        $nazev = 'Markétka skáče z letadla';
        $album = '2007_seskok';
        $popis = '';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2007-05-21';
        $nazev = 'Výlet do Olomouce';
        $album = '2005_olomouc';
        $popis = '';
        $ikona = 'dovolena';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2007-05-10';
        $nazev = 'Pařba ve 14ce';
        $album = '2007_14ka';
        $popis = '<p>Jeden z mnoha večerů strávených kdesi ve městě...</p>';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2007-02-28';
        $nazev = 'Začátek chození';
        $album = false;
        $popis = '<p>Dohromady jsme se dali na konci třeťáku, při úmorných studiích na <a href="http://www.gml.cz/" target="_blank"><abbr title="Gymnázium Matyáše Lercha">GML</abbr></a>.</p>';
        $ikona = 'dovolena';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2005-11-24';
        $nazev = 'Bílá prodloužená';
        $album = '2005_bila_prodlouzena';
        $popis = '<p>Ó ano, i my jsme se učili tancovat. Vyvrcholením tohoto marného snažení byla dechberoucí podívaná, určená především pro nostalgické vzpomínky rodičů a posměch přihlížejících.</p>';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2005-02-25';
        $nazev = 'Lyžák v prváku';
        $album = '2005_lyzak';
        $popis = '<p>První flirtování v podobě shazování druhého z lyží započalo již zde.</p>';
        $ikona = 'dovolena';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);

        $datum = '2004-09-01';
        $nazev = 'První setkání';
        $album = '2004_setkani';
        $popis = '<p>Poprvé jsme se uviděli při nástupu do prváku na <a href="http://www.gml.cz/" target="_blank"><abbr title="Gymnázium Matyáše Lercha">GML</abbr></a>. Tehdy jsme ale vypadali jako pořádný paka</p>';
        $ikona = 'fotky';
        echo $cf->getTimelineBlock($album, $datum, $nazev, $popis, $ikona);
        ?>
	</section>
</div>
<?php
include_once 'html/footer.php';
?>