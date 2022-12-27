    <?php
    $url = "https://api.openweathermap.org/data/2.5/weather?q=Marseille&lang=fr&units=metric&appid=6817e1068e3b4070a4f2f036c8544bc5";
    $raw = file_get_contents($url); //Fonction qui permet de récupérer le contenu de l'api météo

    $json = json_decode($raw); //Pour récuperer les données sous format Json

    var_dump($json);

    $name = $json->name; // Pour montrer le nom de la ville
    echo $name;

    $weather = $json->weather[0]->main;
    $desc = $json->weather[0]->description; // Pour montrer la description de la météo (ex : nuageux, pluvieux)

    // echo $weather . " " . $desc;

    $temp = $json->main->temp;
    $feel_like = $json->main->feels_like; // Pour montrer la température 

    echo $temp . " " . $feel_like;

    $speed = $json->wind->speed; // Pour montrer la vitesse du vent
    $deg = $json->wind->deg;

    echo $speed . " " . $deg;


    ?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Meteo</title>
        <link rel="stylesheet" href="meteo.css">
    </head>

    <body>
        <div class="container text-center py-5">
            <h1>Météo du jour à <strong><?php echo $name; ?></strong></h1>

            <div class="row justify-content-center align-items-center">
                <?php
                switch ($weather) {
                    case "Clear":
                ?>
                        <div class="icon sunny">
                            <div class="sun">
                                <div class="rays"></div>
                            </div>
                        </div>
                    <?php
                        break;

                    case 'Drizzle':
                    ?>
                        <div class="icon sun-shower">
                            <div class="cloud"></div>
                            <div class="sun">
                                <div class="rays"></div>
                            </div>
                            <div class="rain"></div>
                        </div>
                    <?php
                        break;

                    case 'Rain':
                    ?>
                        <div class="icon rainy">
                            <div class="cloud"></div>
                            <div class="rain"></div>
                        </div>
                    <?php
                        break;

                    case 'Clouds':
                    ?>
                        <div class="icon cloudy">
                            <div class="cloud"></div>
                            <div class="cloud"></div>
                        </div>
                    <?php
                        break;

                    case 'Thunderstorm':
                    ?>
                        <div class="icon thunder-storm">
                            <div class="cloud"></div>
                            <div class="lightning">
                                <div class="bolt"></div>
                                <div class="bolt"></div>
                            </div>
                        </div>
                    <?php
                        break;

                    case 'Snow':
                    ?>
                        <div class="icon flurries">
                            <div class="cloud"></div>
                            <div class="snow">
                                <div class="flake"></div>
                                <div class="flake"></div>
                            </div>
                        </div>

                <?php
                        break;
                }
                ?>

                <div class="meteo_desc text-left">
                    <h2>
                        <?php echo $temp; ?> °C / Ressenti <?php echo $feel_like; ?> °C <br />
                        <?php echo $speed; ?> Km/h - <?php echo $deg; ?> ° <br />
                        <?php echo $desc; ?>
                    </h2>
                </div>
            </div>
        </div>
    </body>

    </html>