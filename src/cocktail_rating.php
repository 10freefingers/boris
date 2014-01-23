﻿<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">
    <title>Jumbotron Template for Bootstrap</title>
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
</head>
<body style="">
<div id="action-bar"><!-- Navigation -->
	<div id="logo"><a href="drink_list_02.php"><img src="img/logo_boris.png"></a></div>
    <div id="filter">
    	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-filter"></span></button></a>
        <ul class="dropdown-menu">

            <li class="dropdown-header">Taste</li>
              <ul class="input-group" style="list-style-type:none">
                  <li><input id="radio-taste-1" type="radio" name="groupTaste" value="Sweet" class="taste"/>Sweet</li>
                  <li><input id="radio-taste-2" type="radio" name="groupTaste" value="Fruity" class="taste"/>Fruity</li>
                  <li><input id="radio-taste-3" type="radio" name="groupTaste" value="Sour" class="taste"/>Sour</li>
                  <li><input id="radio-taste-4" type="radio" name="groupTaste" value="Bitter" class="taste"/>Bitter</li>
              </ul>

            <li class="dropdown-header">Alcohol Strength</li>
              <ul class="input-group" style="list-style-type:none">
                  <li><input id="radio-alc-1" type="radio" name="groupAlc" value="Alc-Free" class="alc"/>Alc-Free</li>
                  <li><input id="radio-alc-2" type="radio" name="groupAlc" value="Weak" class="alc"/>Weak</li>
                  <li><input id="radio-alc-3" type="radio" name="groupAlc" value="Middle" class="alc"/>Middle</li>
                  <li><input id="radio-alc-4" type="radio" name="groupAlc" value="Strong" class="alc"/>Strong</li>
              </ul>

        </ul>
    </div>
    <div id="search">
    	
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button></a>
        <ul class="dropdown-menu">

            <li class="dropdown-header"></li>
              <ul class="input-group searchbarleft" style="list-style-type:none">
                  <li><input id="search-input" type="text" class="form-control" placeholder="Search" /></li>
              </ul>
              <ul class="input-group searchbuttonright" style="list-style-type:none">
                  <li><button id="search-submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button></li>
              </ul>
                  

        </ul>
        
    </div>
</div> <!-- Ende Navigation -->
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-xs-12">
                <h2>
                    Cocktail:
                </h2>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="input-group">
                    <h4>
                        Alter</h4>
                    <input id="age-questionnaire" type="text" class="form-control">
                </div>
            </div>
            <div class="col-xs-6 col-md-3">
                <h4>
                    Geschlecht</h4>
                <label class="radio-inline">
                    <input name="radioGroup" id="männlich" value="m" type="radio" class="genderRadios">m</label>
                <label class="radio-inline">
                    <input name="radioGroup" id="weiblich" value="w" type="radio" class="genderRadios">w</label>
            </div>
        </div><!-- end first row -->
        <hr />
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6"> <!-- Geschmack -->
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2">
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-7">
                        <p class="alignleft">&#60;Trifft nicht zu</p>
                        <p class="alignright">Trifft zu&#62;</p>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3">
                    </div>
                </div>  
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <h4>Herb</h4>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8" align="center"> <!-- Herb -->
                            <label class="radio-inline">
                                <input name="radioGroup1" id="Herb1" value="1" type="radio"></label>
                            <label class="radio-inline">
                                <input name="radioGroup1" id="Herb2" value="2" type="radio"></label>
                            <label class="radio-inline">
                                <input name="radioGroup1" id="Herb3" value="3" type="radio"></label>
                            <label class="radio-inline">
                                <input name="radioGroup1" id="Herb4" value="4" type="radio"></label>
                            <label class="radio-inline">
                                <input name="radioGroup1" id="Herb5" value="5" type="radio"></label>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <h4>Süß</h4>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8" align="center"> <!-- Süß -->
                        <label class="radio-inline">
                            <input name="radioGroup2" id="Süß1" value="1" type="radio"></label>
                        <label class="radio-inline">
                            <input name="radioGroup2" id="Süß2" value="2" type="radio"></label>
                        <label class="radio-inline">
                            <input name="radioGroup2" id="Süß3" value="3" type="radio"></label>
                        <label class="radio-inline">
                            <input name="radioGroup2" id="Süß4" value="4" type="radio"></label>
                        <label class="radio-inline">
                            <input name="radioGroup2" id="Süß5" value="5" type="radio"></label>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <h4>Sauer</h4>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8" align="center"> <!-- Sauer -->
                        <label class="radio-inline">
                            <input name="radioGroup3" id="Sauer1" value="1" type="radio"></label>
                        <label class="radio-inline">
                            <input name="radioGroup3" id="Sauer2" value="2" type="radio"></label>
                        <label class="radio-inline">
                            <input name="radioGroup3" id="Sauer3" value="3" type="radio"></label>
                        <label class="radio-inline">
                            <input name="radioGroup3" id="Sauer4" value="4" type="radio"></label>
                        <label class="radio-inline">
                            <input name="radioGroup3" id="Sauer5" value="5" type="radio"></label>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <h4>Fruchtig</h4>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8" align="center"> <!-- Fruchtig -->
                        <label class="radio-inline">
                            <input name="radioGroup4" id="Fruchtig1" value="1" type="radio"></label>
                        <label class="radio-inline">
                            <input name="radioGroup4" id="Fruchtig2" value="2" type="radio"></label>
                        <label class="radio-inline">
                            <input name="radioGroup4" id="Fruchtig3" value="3" type="radio"></label>
                        <label class="radio-inline">
                            <input name="radioGroup4" id="Fruchtig4" value="4" type="radio"></label>
                        <label class="radio-inline">
                            <input name="radioGroup4" id="Fruchtig5" value="5" type="radio"></label>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <h4>Stark</h4>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8" align="center"> <!-- Stark -->
                        <label class="radio-inline">
                            <input name="radioGroup5" id="Stark1" value="1" type="radio"></label>
                        <label class="radio-inline">
                            <input name="radioGroup5" id="Stark2" value="2" type="radio"></label>
                        <label class="radio-inline">
                            <input name="radioGroup5" id="Stark3" value="3" type="radio"></label>
                        <label class="radio-inline">
                            <input name="radioGroup5" id="Stark4" value="4" type="radio"></label>
                        <label class="radio-inline">
                            <input name="radioGroup5" id="Stark5" value="5" type="radio"></label>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                    </div>
                </div>
            </div> <!-- end Geschmack -->
            
            <div class="col-xs-12 col-sm-6 col-md-6"> <!-- Assoziation -->
               <h5>Mit welchen dieser Ereignisse assoziieren Sie diesen Cocktail am meisten?</h5> 
               <div class="row">
                    <div class="col-xs-6 col-md-6">
                            <label class="checkbox">
                            <input type="checkbox" value="option1" id="amStrand">Am Strand</label>
                            <label class="checkbox">
                            <input type="checkbox" value="option1" id="Firmenfeier">Firmenfeier</label>
                            <label class="checkbox">
                            <input type="checkbox" value="option1" id="Junggesellenabschied">Junggesellenabschied</label>
                            <label class="checkbox">
                            <input type="checkbox" value="option1" id="Hochzeit">Hochzeit</label>
                            <label class="checkbox">
                            <input type="checkbox" value="option1" id="In der Cocktailbar">In der Cocktailbar</label>
                            <label class="checkbox">
                            <input type="checkbox" value="option1" id="Nach dem Essen">Nach dem Essen</label>
                            <label class="checkbox">
                            <input type="checkbox" value="option1" id="Daheim auf dem Sofa">Daheim auf dem Sofa</label>
                    </div>
                    <div class="col-xs-6 col-md-6">
                            <label class="checkbox">
                            <input type="checkbox" value="option1" id="Checkbox1">Zum Vorglühen</label>
                            <label class="checkbox">
                            <input type="checkbox" value="option1" id="Beim ersten Date">Beim ersten Date</label>
                            <label class="checkbox">
                            <input type="checkbox" value="option1" id="In der Disco">In der Disco</label>
                            <label class="checkbox">
                            <input type="checkbox" value="option1" id="WG-Party">WG-Party</label>
                            <label class="checkbox">
                            <input type="checkbox" value="option1" id="Am Sommerabend">Am Sommerabend</label>
                            <label class="checkbox">
                            <input type="checkbox" value="option1" id="Kalter Winterabend">Kalter Winterabend</label>
                    </div>
               </div>
               
            </div> <!-- end Assoziation -->
            </div>
        </div>


        <hr>
        <footer>
        <p>BORIS 2014</p>
      </footer>
    </div>
    <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-ui-1.10.3/jquery-1.9.1.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom Javascript -->
    <script src="js/App.js"></script>
    <script src="js/SearchView.js"></script>
    <script src="js/FilterView.js"></script>
    <script src="js/MainController.js"></script>
    <script src="js/MainModel.js"></script>
    <script src="js/SignView.js"></script>
    <script src="js/QuestionnaireView.js"></script>

    <script>
    $(function() {
        Boris.init();
    });
    $('#search-input').click(function (e) {
        e.stopPropagation();
    });
    </script>
    
</body>
</html>
