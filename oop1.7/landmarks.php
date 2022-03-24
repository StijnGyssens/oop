<?php
require_once __DIR__.'/lib/autoload.php';


$container = new Container($configuration);
$dbm = $container->getDBM();
$landmarkLoader = $container->getLandmarkLoader();
$landmarks=$landmarkLoader->getLandmark();

PrintHead();
PrintJumbo("Bezienswaardigheden");
PrintNavbar();
$html="<div class='container'><div class='row row-cols-1 row-cols-md-2 g-4'>";

foreach ($landmarks as $landmark)
{
    $name = $landmark->getName();
    $locationid=$landmark->getLocation();
    $img=$landmark->getImg();
    $description=$landmark->getDescription();
    $rates=$landmark->getRates();
    $type=$landmark->getType();

    $city=$dbm->GetData('select img_title from image where img_id='.$locationid);
    $city=$city[0]["img_title"];
    $img="img/$img";

    $html.="
        <div class='col-4'>
            <div class='card h-100'>
              <img src='$img' class='card-img-top img-fluid' alt='$name'>
              <div class='card-body'>
                <h5 class='card-title'>$name</h5>";
    if ($type==="Man made")
    {
        $builder=$landmark->getBuilder();
        $year=$landmark->getBuildYear();
        $html.="<p class='card-text'>Gebouwd door $builder in $year</p>";
    }
    $html.="
                <p class='card-text'>$description</p>
              </div>
              <div class='card-footer'>
                <small class='text-muted'>Kostprijs: $rates</small>
              </div>
            </div>
          </div>";
}
$html.="</div></div></body></html>";
print $html;