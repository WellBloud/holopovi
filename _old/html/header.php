<!DOCTYPE html>
<html lang="cs">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name='description' content='<?php echo HOLOPOVI_META_DESC; ?>'>
        <meta name='keywords' content='<?php echo HOLOPOVI_META_KEYS; ?>'>
        <meta name='author' content='<?php echo HOLOPOVI_META_AUTHOR; ?>'>
        <meta name='robots' content='all'>

        <title><?php echo HOLOPOVI_SITENAME; ?></title>

        <link rel="stylesheet" href="css/bootstrap.css?v=<?php echo HOLOPOVI_VERZE; ?>">
        <link rel="stylesheet" href="css/style.css?v=<?php echo HOLOPOVI_VERZE; ?>">
        <link rel="stylesheet" href="foliogallery/foliogallery.css?v=<?php echo HOLOPOVI_VERZE; ?>" />
        <link rel="stylesheet" href="colorbox/colorbox.css?v=<?php echo HOLOPOVI_VERZE; ?>" />
        <link rel="stylesheet" href="css/TimeCircles.css?v=<?php echo HOLOPOVI_VERZE; ?>">
	    <link rel="stylesheet" href="css/timeline.css?v=<?php echo HOLOPOVI_VERZE; ?>">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="foliogallery/jquery.1.11.js"></script>
        <script src="foliogallery/foliogallery.js?v=<?php echo HOLOPOVI_VERZE; ?>"></script>
        <script src="colorbox/jquery.colorbox-min.js?v=<?php echo HOLOPOVI_VERZE; ?>"></script>
        <script src="js/TimeCircles.js?v=<?php echo HOLOPOVI_VERZE; ?>"></script>
        <script src="js/modernizr.js?v=<?php echo HOLOPOVI_VERZE; ?>"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                            <span class="sr-only">Zobrazit navigaci</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php"><?php echo HOLOPOVI_SITENAME; ?></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php"><i class="fa fa-home"></i>Úvodní stránka</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-venus-mars"></i>Svatba <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="oznameni.php"><i class="fa fa-envelope-o"></i>Svatební oznámení</a></li>
                                    <li><a href="galerie.php"><i class="fa fa-picture-o"></i>Svatební galerie</a></li>
                                    <li><a href="video.php"><i class="fa fa-film"></i>Svatební video</a></li>
                                </ul>
                            </li>
                            <li><a href="udalosti.php"><i class="fa fa-calendar-o"></i>Události</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container theme-showcase" role="main">
            <article>