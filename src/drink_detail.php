﻿<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>BORIS - Drink Details</title>

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
        
        //$drinkId = '11';
        $drinkId = $_GET['id'];
        
	    $base_url = 'http://localhost/boris/src/php/';
        
        //Get selected cocktail
	    $getCocktailUrl = $base_url . 'getCocktails.php?id=' . $drinkId . '&rating=0&recipe=1';
	    $result = json_decode(file_get_contents($getCocktailUrl));           
	    $cocktailArray = $result->data;
        $cocktail = reset($cocktailArray);        
        $recipe = $cocktail -> recipe;
        
        //Get all cocktails
        $getCocktailsUrl = $base_url . 'getCocktails.php?rating=0&recipe=1';
	    $allResult = json_decode(file_get_contents($getCocktailsUrl));    
        
        $allCocktails = $allResult->data;
        
        $ratingFilledRendering = '<div class="glyphicon glyphicon-star"></div>';
        $ratingEmptyRendering = '<div class="glyphicon glyphicon-star-empty"></div>';
    ?>  
    </head>
  
  

  <body style="">
  <div id="action-bar"><!-- Navigation -->
	<div id="logo"><a href="drink_list.php"><img src="img/logo_boris.png"></a></div>
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
                <button id="rateDrink" type="button" class="btn btn-default navbar-btn navbar-right">
                    Rate
                    <span class="glyphicon glyphicon-star-empty"></span>
                </button>               
                
                <!--<button id="stopMixing" type="button" class="btn btn-default navbar-btn navbar-right hidden" data-toggle="modal" data-target="#modal_confirmOrder">
                    Stop
                    <span class="glyphicon glyphicon-stop"></span>
                </button>-->
            </li>
    	
</div> <!-- Ende Navigation -->


    
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
                <div class="pull-left" style="margin-top: 65px;">
                    <div class="h1"><?php print $cocktail->name; ?></div>
                    <?php 
                        $rating = round($cocktail->rating->taste->average, 0, PHP_ROUND_HALF_UP);
                        echo renderRating($rating,5,
                            $ratingFilledRendering,$ratingEmptyRendering);
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
                            <td class="col-xs-6">Sour</td><td class="col-xs-6">
                            <?php 
                                if(array_key_exists('sour', $cocktail->rating)) {
                                    $rating = $cocktail->rating->sour->average;
                                    if($rating != null) {
                                        $myRatingFilledRendering    = "<img src='img/sour0.png' class='attribute-rating'/>";
                                        $myRatingEmptyRendering     = "<img src='img/sour2.png' class='attribute-rating'/>";                                    
                                        print renderRating($rating,5,
                                            $myRatingFilledRendering, $myRatingEmptyRendering);
                                    }
                                }
                                else {
                                    print ('<span class="badge">No ratings</span>');
                                }
                            ?></td>
                        </tr>
                        <tr>
                            <td>Sweet</td><td>
                            <?php 
                                $rating = $cocktail->rating->sweet->average;
                                if($rating != null) {
                                    $myRatingFilledRendering    = "<img src='img/sweet0.png' class='attribute-rating'/>";
                                    $myRatingEmptyRendering     = "<img src='img/sweet2.png' class='attribute-rating'/>";                                    
                                    echo renderRating($rating,5,
                                        $myRatingFilledRendering,$myRatingEmptyRendering);
                                }
                                else {
                                    print ('<span class="badge">No ratings</span>');
                                }
                            ?></td>
                        </tr>
                        <tr>
                            <td>Bitter</td><td>
                            <?php 
                                $rating = $cocktail->rating->bitter->average;
                                if($rating != null) {
                                    $myRatingFilledRendering    = "<img src='img/bitter0.png' class='attribute-rating'/>";
                                    $myRatingEmptyRendering     = "<img src='img/bitter2.png' class='attribute-rating'/>";                                    
                                    echo renderRating($rating,5,
                                        $myRatingFilledRendering,$myRatingEmptyRendering);
                                }
                                else {
                                    print ('<span class="badge">No ratings</span>');
                                }
                            ?></td>
                        </tr>
                        <tr>
                            <td>Fruity</td><td>
                            <?php 
                                $rating = $cocktail->rating->fruity->average;
                                if($rating != null) {
                                    $myRatingFilledRendering    = "<img src='img/fruity0.png' class='attribute-rating'/>";
                                    $myRatingEmptyRendering     = "<img src='img/fruity2.png' class='attribute-rating'/>";                                    
                                    echo renderRating($rating,5,
                                        $myRatingFilledRendering,$myRatingEmptyRendering);
                                }
                                else {
                                    print ('<span class="badge">No ratings</span>');
                                }
                            ?></td>
                        </tr>
                        <tr>
                            <td>Alcohol percentage</td><td><span id="alcPercentageCell" class="badge">
                                <?php 
                                    echo calcAlcPercentage($cocktail->recipe) . " %";
                                ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Strength taste</td><td>
                                <?php 
                                    $rating = $cocktail->rating->strong->average;
                                    if($rating != null) {
                                        $myRatingFilledRendering    = "<img src='img/alcohol0.png' class='attribute-rating'/>";
                                        $myRatingEmptyRendering     = "<img src='img/alcohol2.png' class='attribute-rating'/>";                                    
                                        echo renderRating($rating,5,
                                            $myRatingFilledRendering,$myRatingEmptyRendering);
                                    }
                                    else {
                                        print ('<span class="badge">No ratings</span>');
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Events</td><td>
                            <?php 
                                foreach ($cocktail->events as $event) {    
                                    if((double)$event->value > 0.3) { 
                                        print '<span class="badge">' . $event -> tag . "</span> "; 
                                    }
                                }
                            ?>
                            </span>
                            </td>
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
                    <table class="table table-striped">
                        <?php 
                            foreach ($cocktail->recipe as $ingredient) {    
                                print '<tr><td class="col-xs-6">' . $ingredient->name . '</td><td class="col-xs-6"><span class="badge">' . ($ingredient->amount * 100) . ' %</span></td></tr>';
                            }
                        ?>
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
                    <?php 
                        echo $cocktail->recipedescription;
                    ?>                    
                  </div>
                </div>                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title"><strong>Further infos</strong></h2>
                    </div>
                    <table class="table table-striped">
                    <tr>
                        <td class="col-xs-6">Look</td><td class="col-xs-6"><span class="badge">
                        <?php 
                            print round($cocktail->rating->look->average, 0, PHP_ROUND_HALF_UP) . ' / 5';
                        ?></span></td>
                    </tr>
                    <tr>
                        <td>Number of purchases</td><td><span class="badge">
                        <?php 
                            $orders = $cocktail->orders;
                            if((int) $orders > 0) { print $orders; } 
                            else { print 0; }
                        ?></td></span>
                    </tr>                    
                    <!-- <tr>
                        <td>Most orders rank</td><td><span class="badge"><?php //print $cocktail->orders; ?></span></td>
                    </tr> -->
                    </table>
                </div>                
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title"><strong>Description</strong></h3>
                  </div>
                  <div class="panel-body">
                    <?php 
                        echo $cocktail->description;
                    ?>
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
    
    <script src="js/libs/jquery.cookie.js"></script>
    <script src="js/libs/json2.js"></script>
    
    <!-- Custom Javascript -->         
    <script src="js/App.js"></script>  
    <script src="js/Recommender.js" type="text/javascript"></script>    
    <script src="js/CommunicationHandler.js" type="text/javascript"></script>
    <script src="js/SearchView.js"></script>
    <script src="js/FilterView.js"></script>
    <script src="js/MainController.js"></script>
    <script src="js/MainModel.js"></script>
    <script src="js/SignView.js"></script>
    <script src="js/QuestionnaireView.js"></script>
    <script src="js/DetailView.js"></script>
    <script src="js/DrinkModel.js"></script>
    <script src="js/BorisModel.js"></script>
    
    <script type="text/javascript">
        $(function() {
    	    Boris.init();                
            
            //Read data
            var drinkId = <?php echo $drinkId; ?>;       
            var allCocktails = $(<?php echo json_encode($allCocktails) ?>)[0]; 
            
            //Set values
            drinkModel.setAllDrinks(allCocktails);
            drinkModel.setDrinkId(drinkId);   
            
            //Calculate and set similar
            drinkModel.setSimilarIds(recommend(drinkId));
            communicationHandler.getGlassVol();
            //detailView.calcAlcPercentage();
            
            //Display
            detailView.renderSimilarDrinks();
            //detailView.displayAlcPercentage();
            
	    });
	</script>

</body></html>