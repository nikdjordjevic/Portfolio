<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CITATI</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="stil.css">
</head>

<body>

<?php 


$pic = array ( "1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg", "6.jpg", "7.jpg", "8.jpg", "9.jpg", "10.jpg", "11.jpg",
                "12.jpg", "13.jpg", "14.jpg", "15.jpg", "16.jpg", "17.jpg", "18.jpg", "19.jpg", "20.jpg");
shuffle ($pic);

    if (!isset($_GET['images'])){
        $prvaslika = $pic[0];
        $drugaslika = $pic[1];
        $trecaslika = $pic[2];
    }
    
    else {
        $slike= explode (" ", $_GET['images']);
        $prvaslika = $slike [0];
        $drugaslika = $slike [1];
        $trecaslika = $slike [2];
    }
    
?>
<div class= "container-fluid">
    <div class = "row">
        <header class= "col-sm-12 w-100 h-70 d-inline-block">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <?php
                        echo "<img class='d-block w-100' src = 'images/$prvaslika' alt= 'First slide'>";
                    ?>

                </div>
                <div class="carousel-item">
                    <?php
                        echo "<img class='d-block w-100'  src = 'images/$drugaslika' alt= 'Second slide'>";
                    ?>
                </div>
                <div class="carousel-item">
                    <?php
                        echo "<img class='d-block w-100' src = 'images/$trecaslika' alt= 'Third slide'>";
                    ?>
                </div>
            </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
        </header>
    </div>
</div>

<?php

    $allQuotes = explode ("\n", file_get_contents ('quotes/motivacija.txt'));
    $allQuotes = array_merge($allQuotes, explode("\n", file_get_contents ('quotes/zdravlje.txt')));
    $allQuotes = array_merge($allQuotes, explode("\n", file_get_contents ('quotes/ljubav.txt')));
    $allQuotes = array_merge($allQuotes, explode("\n", file_get_contents ('quotes/posao.txt')));
 
    $randArrayIndexNum = rand(0,count ($allQuotes) - 1);
    $randPhraseAll = $allQuotes[$randArrayIndexNum];
    $randAutorAll = $allQuotes[$randArrayIndexNum + 1];


    if ($randArrayIndexNum % 2 == 0){
        $randPhraseAll = $allQuotes [$randArrayIndexNum];
        $randAutorAll = $allQuotes [$randArrayIndexNum + 1];
    }
    else {
        $randPhraseAll = $allQuotes [$randArrayIndexNum - 1];
        $randAutorAll = $allQuotes [$randArrayIndexNum];
    }

    $text = "";
    $posao = "";
    $zdravlje = "";
    $motivacija = "";
    $ljubav = "";


    if (isset($_GET['link'])){
        $link = $_GET['link'];
        if ($link == 'posao'){
            $text = file_get_contents ('quotes/posao.txt');
            $posao = "active";
        }
        if ($link == 'zdravlje'){
            $text = file_get_contents ('quotes/zdravlje.txt');
            $zdravlje = "active";
        }
        if ($link == 'ljubav'){
            $text = file_get_contents ('quotes/ljubav.txt');
            $ljubav = "active";
        }
        if ($link == 'motivacija'){
            $text = file_get_contents ('quotes/motivacija.txt');
            $motivacija = "active";
        }
    }   
?>
<div class= "container-fluid">
    <div class="row">
        <nav class = "col-sm-12 navbar-expand-xl|lg|md|sm py-4 ">
            <ul class="nav nav-fill nav-pills nav-justified">
                <li class="nav-item">
                    <a class= "nav-link <?php echo $posao ?>" href="?link=posao&images=<?php echo "$prvaslika $drugaslika $trecaslika";?>">Posao</a>
                </li>
                <li class="nav-item">
                    <a class= "nav-link <?php echo $zdravlje ?>" href="?link=zdravlje&images=<?php echo "$prvaslika $drugaslika $trecaslika";?>">Zdravlje</a>
                </li>
                <li class="nav-item">
                    <a class= "nav-link <?php echo $ljubav ?>" href="?link=ljubav&images=<?php echo "$prvaslika $drugaslika $trecaslika";?>">Ljubav</a>
                </li>
                <li class="nav-item">
                    <a class= "nav-link <?php echo $motivacija ?>" href="?link=motivacija&images=<?php echo "$prvaslika $drugaslika $trecaslika";?>">Motivacija</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<div class= "container-fluid">
    <div class= "row">
        <div class = "container-fluid">
            <section class = "col-sm-12 bg-info" >
                <div class="py-5 text-center">
                    <blockquote class="blockquote">
                        <?php

                            $quotesArray = "";
                            if (isset($_GET['link'])){
                                $quotesArray = explode ("\n", $text);
                            }
                            else {
                                $quotesArray = $allQuotes;
                            }

                            $randArrayIndexNum = rand(0,count ($quotesArray) - 1);
                            $randPhrase = "";
                            $randAutor = "";

                            if ($randArrayIndexNum % 2 == 0){
                                $randPhrase = $quotesArray[$randArrayIndexNum];
                                $randAutor = $quotesArray[$randArrayIndexNum + 1];
                            }
                            else {
                                $randPhrase = $quotesArray[$randArrayIndexNum - 1];
                                $randAutor = $quotesArray[$randArrayIndexNum];
                            }

                            echo "<p class= 'text-white lead font-italic'>$randPhrase</p>";
                            echo "<footer class='blockquote-footer text-white font-italic'> $randAutor </footer>";
                        ?>
                    </blockquote>
                </div>
            </section>
        </div>
    </div>
</div>

<div class= "container-fluid">
    <div class="row">
        <footer class="fixed-bottom col-sm-12">
            <?php
                date_default_timezone_set("Europe/Belgrade");
                //echo date ('l, d.m.Y.');
                $dd = date ('d.m.Y.');
                $dan = date ('l');
                if ($dan == 'Monday'){
                    echo "<p class='text-center text-secondary'>Danas je ponedeljak, $dd </p>";
                }
                elseif ($dan == 'Tuesday'){
                    echo "<p class='text-center text-secondary'>Danas je utorak, $dd </p>";
                }
                elseif ($dan == 'Wednesday'){
                    echo "<p class='text-center text-secondary'>Danas je sreda, $dd </p>";
                }
                elseif ($dan == 'Thursday'){
                    echo "<p class='text-center text-secondary'>Danas je četvrtak, $dd </p>";
                }
                elseif ($dan == 'Friday'){
                    echo "<p class='text-center text-secondary'>Danas je petak, $dd </p>";
                }
                elseif ($dan == 'Saturday'){
                    echo "<p class='text-center text-secondary'>Danas je subota, $dd </p>";
                }
                else {
                    echo "<p class='text-center text-secondary'>Danas je nedelja, $dd </p>";
                }
            ?>
        </footer>
    </div>
</div>


</body>
</html>
