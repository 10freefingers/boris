﻿<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>BORIS - Cocktail details</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/common.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style type="text/css"></style>
    
    <?php
        include 'php/helper.php';
        
	    $base_url = 'http://localhost/boris/src/php/';
	    $getCoktailsUrl = $base_url . 'getCocktails.php?id=1&rating=1&recipe=1';
	    $result = json_decode(file_get_contents($getCoktailsUrl));
	    $cocktailArray = $result->data;
        $cocktail = reset($cocktailArray);
    ?>  
    </head>
  
  

  <body style="">
    <!-- Navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">
            <img src="img/logo_boris.png" class="img img-responsive" alt="Responsive image">
          </a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <!--<div id="mixingProgress" class="nav navbar-text progress" style="min-width: 150px;">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                        <span class="sr-only">60% Complete</span>
                    </div>
                </div>-->
            </li>
            <li>
                <button id="orderDrink" type="button" class="btn btn-default navbar-btn navbar-right" data-toggle="modal" data-target="#modal_confirmOrder">
                    Order
                    <span class="glyphicon glyphicon-glass"></span>
                </button>
                <!--<button id="rateDrink" type="button" class="btn btn-default navbar-btn navbar-right">
                    Rate
                    <span class="glyphicon glyphicon-star-empty"></span>
                </button>-->
                <!--<a href="drink_rate.html">  
                    <button id="btn_rate" type="button" class="btn btn-actionbar">   
                             
                        <span class="glyphicon glyphicon-star-empty"></span> 
                        Rate
                    </button>
                    </a> -->
                <a href="drink_rate.html" class="btn btn-default navbar-btn navbar-right">     
                    <span class="glyphicon glyphicon-star-empty"></span> 
                    Rate
                </a>
                <!--<button id="stopMixing" type="button" class="btn btn-default navbar-btn navbar-right hidden" data-toggle="modal" data-target="#modal_confirmOrder">
                    Stop
                    <span class="glyphicon glyphicon-stop"></span>
                </button>-->
            </li>
      </div>
    </div>

    
    <!-- Modal -->
    <div class="modal fade" id="modal_confirmOrder" tabindex="-1" role="dialog" aria-labelledby="Confirm order" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Cocktail order</h4>
          </div>
          <div class="modal-body">
            Please confirm that you want to order this cocktail. Cheers!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button id="confirmOrderDrink" type="button" class="btn btn-primary">Confirm</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    
    <!-- Content container -->
    <div class="container">

      <!-- Example row of columns -->
        <div class="row" style="height: 200px;">
            <div class="col-xs-6">
                <img class="img-responsive pull-right" src="img/drink_example.jpg"  style="height: 100%"/>
            </div>
            <div class="col-xs-6">
                <div class="pull-left">
                    <div class="h1"><?php print $cocktail->name; ?></div>
                    <?php 
                    /*
                        function renderRating($ratingCount, $ratingMax, $filledContent, $emptyContent) { 
                            for($i=1;$i<=5;$i++)
                            {
                                if($i <=  $ratingCount) { print($filledContent); }
                                else { print($emptyContent); }
                            }
                        }*/
                        
                        $rating = round($cocktail->rating->taste->average, 0, PHP_ROUND_HALF_UP);
                        
                        
                        /*
                        for($i=1;$i<=5;$i++)
                        {
                            if($i <=  $rating) { print('<div class="glyphicon glyphicon-star"></div>'); }
                            else { print('<div class="glyphicon glyphicon-star-empty"></div>'); }
                        }
                        */
                        echo renderRating($rating,5,'<div class="glyphicon glyphicon-star"></div>','<div class="glyphicon glyphicon-star-empty"></div>');
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Ingredients Row 2 -->
            <div class="col-xs-12 col-sm-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h2 class="panel-title"><strong>Infos</strong></h2>
                  </div>
                    <table class="table table-striped">
                        <tr>
                            <td>Most orders rank</td><td><span class="badge"><?php print $cocktail->orders; ?></span></td>
                        </tr>
                        <tr>
                            <td>Sour</td><td><span class="badge">
                            <?php 
                            /*
                                $rating = round($cocktail->rating->sour, 0, PHP_ROUND_HALF_UP);
                                for($i=1;$i<=5;$i++)
                                {
                                    if($i <=  $rating) {
                                }*/
                            ?>
                            </span></td>
                        </tr>
                        <tr>
                            <td>Sweet</td><td><span class="badge">Lightly</span></td>
                        </tr>
                        <tr>
                            <td>Bitter</td><td><span class="badge">Lightly</span></td>
                        </tr>
                        <tr>
                            <td>Fruity</td><td><span class="badge">Lightly</span></td>
                        </tr>
                        <tr>
                            <td>Alcohol percentage</td><td><span class="badge">30%</span></td>
                        </tr>
                        <tr>
                            <td>Strength taste</td><td><span class="badge">Middle</span></td>
                        </tr>
                        <tr>
                            <td>Events</td><td><span class="badge">At the beach</span></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- Ingredients Row 1 -->
            <div class="col-xs-12 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title"><strong>Ingredients</strong></h2>
                    </div>
                    <table class="table table-striped"">
                        <tr>
                            <td>Gin</td><td><span class="badge">4cl</span></td>
                        </tr>
                        <tr>
                            <td>Lemon juice</td><td><span class="badge">2cl</span></td>
                        </tr>
                        <tr>
                            <td>Powdered sugar</td><td><span class="badge">2cl</span></td>
                        </tr>
                        <tr>
                            <td>Carbonated water</td><td><span class="badge">2</span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><strong>Similar cocktails</strong></h3>
          </div>
          <div class="panel-body">
            <div class="row align-bottom">
                <div id="similar_drinks"><!--Is filled dynamically by jQuery with similar cocktails recommendation.--></div>
            </div>
          </div>
        </div>
        <div class="row">        
            <div class="col-xs-12 col-sm-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h2 class="panel-title"><strong>Recipe</strong></h2>
                  </div>
                  <div class="panel-body">
                    <ol>
                        <li>Shake gin, juice of lemon, and powdered sugar</li>
                        <li>Strain into a highball glass over two ice cubes. </li>
                        <li>Fill with carbonated water, stir, and serve. </li>
                    </ol>
                  </div>
                </div>                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title"><strong>Further infos</strong></h2>
                    </div>
                    <table class="table table-striped"">
                        <tr>
                        <td>Look</td><td><span class="badge">4/5</span></td>
                    </tr>
                    <tr>
                        <td>Number of purchases</td><td><span class="badge">20</span></td>
                    </tr>
                    </table>
                </div>                
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title"><strong>Description</strong></h3>
                  </div>
                  <div class="panel-body">
                    A Gin Fizz is the best-known cocktail in the Fizz family. The first printed reference to a fizz (spelled "fiz") is in the 1887 
                    edition of Jerry Thomas' Bartender's Guide, which contains six fizz recipes. 
                    The Fizz became widely popular in America between 1900 and the 1940s. Known 
                    as a hometown specialty of New Orleans, the Gin Fizz was so popular that bars 
                    would employ scrums of bartenders working in teams that would take turns shaking 
                    the fizzes. Demand for fizzes went international as evidenced by the inclusion of 
                    the cocktail in the French cookbook L'Art Culinaire Francais published in 1950.
                  </div>
                </div>
            </div>
        </div>

        <hr />

        <footer class="text-center">
            <a href="#">Impressum</a>            
        </footer>
        <br />
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-ui-1.10.3/jquery-1.9.1.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/Recommender.js" type="text/javascript"></script>
    <script>
        // Activates the Carousel
        $('.carousel').carousel({
            interval: 5000
        });

        var similar = recommend(1); // nummer des aktuellen cocktail als parameter --> gibt ein array mit ähnlichen Cocktails in absteigender reihenfolge zurück
        console.log($(similar));

        var count = similar.length;
        var gridRatio = 0;

        //Calculate which ratio for the columns has to be used, dependent from the number of similar cocktails
        if (count <= 1) {gridRatio = 12; }
        else if (count == 2) { gridRatio = 6; }
        else { gridRatio = 4; }

        //Loop through similar drinks, max. 3 times and insert them into the belonging template
        for (var i = 0; i < count && i < 3; i++) {
            var drinkName = "Gin Fizz";
            var drinkImgSrc = "drink_example.jpg";

            $("#similar_drinks").append(
            '<div class="col-xs-' + gridRatio + ' text-center">' +
                '<img src="img/' + drinkImgSrc + '" alt="' + drinkName + '" class="img-responsive center-block" />' +
                '<strong>' + drinkName + '</strong>' +
            '</div>');
        }
        /*
        $("
        <div class="col-xs-4 text-center">
                <img src="img/drink_example.jpg" alt="..." class="img-responsive center-block" />
                <strong>Gin Fizz</strong>
            </div>        
            <div class="col-xs-4 text-center">
                <img src="img/drink_example2.jpg" alt="..." class="img-responsive center-block" />
                <strong>Cuba Libre</strong>
            </div>    
            <div class="col-xs-4 text-center">
                <img src="img/drink_example.jpg" alt="..." class="img-responsive center-block" />
                <strong>Gin Fizz</strong>
                
        </div>*/

        $("#confirmOrderDrink").click(function () {
            console.log("confirmed order");
            $('#modal_confirmOrder').modal('hide')
//            $('#orderDrink').hide();
//            $('#stopMixing').show();
//            $('#mixingProgress').show();
        });

	</script>

</body></html>