<?php
    session_start();
    require __DIR__ . '/vendor/autoload.php';

    use App\Services\LoadService;
    use App\Services\SessionService;
?>
<!doctype html>
<html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <title>SG Bowling Console</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">

        <meta name="theme-color" content="#fafafa">

        <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body class="bg-blue font-sans">
        <!--[if IE]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <div class="w-5/6 mx-auto my-6 border border-grey-darkest rounded p-6 bg-blue-light">
            <h1><img src="/img/logo.png" alt="SG Bowling Console" /> SG Bowling Console</h1>
            <div class="">
                <?php
                    echo (new LoadService)->execute();
                ?>
            </div>
            <?php
            $bowlingConfig = (new SessionService)->get('bowlingConfig');
            if($bowlingConfig) {
            ?>
            <form action="/" method="POST">
                <input type="hidden" name="form_type" value="reset_game" />
                <input class="mt-6 shadow bg-green hover:bg-green-light focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="Reset Game" />
            </form>
            <?php
            }
            ?>
        </div>

        <script src="js/vendor/modernizr-3.7.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>

</html>
