Boris.DetailView = function () {
    var that = {},
		mainController,
        drinkModel,
        searchInput,
        searchSubmit,
        similarDrinkIds,
        is_tablet = false,

    init = function (pDrinkModel) {
        console.log("detail view init");

        mainController = Boris.MainController();
        drinkModel = pDrinkModel;

        //Check if tablet
        if ($.cookie('tablet') == "true") {
            is_tablet = true;
            $('#rateDrink').hide(); //Hide "Rate" Button
            $('#orderDrink').show();    //Show "Order" Button
        }

        $rateDrinkBtn = $("#rateDrink");
        $rateDrinkBtn.on('click', onRateDrinkClick);

        $confirmOrderDrinkBtn = $("#confirmOrderDrink");
        $confirmOrderDrinkBtn.on('click', onConfirmOrderDrinkBtn);

        $('#modal_confirmOrder').modal('hide');
    },

    setDrink = function (drink) {
        currentDrink = drink;
    },

    //Get similar drinks and render them
    renderSimilarDrinks = function () {
        console.log("renderSimilarDrinks");

        //var count = Object.keys($allDrinks).length;
        var count = Object.keys(drinkModel.getAllDrinks()).length;
        var gridRatio = 0;

        //Calculate which ratio for the columns has to be used, dependent from the number of similar cocktails
        if (count <= 1) { gridRatio = 12; }
        else if (count == 2) { gridRatio = 6; }
        else { gridRatio = 4; }

        //Loop through similar drinks, max. 3 times and insert them into the belonging template
        for (var i = 0; i < 3 && i < count; i++) {
            var similarDrinkId = drinkModel.getSimilarIds()[i];
            var similarDrink = drinkModel.getAllDrinks()[similarDrinkId];

            var drinkName = similarDrink.name;
            var drinkImgSrc = "drink_example1.jpg"; //!!similarDrink.image;
            var drinkRating = similarDrink.rating.taste.average;

            $("#similar_drinks").append(
                '<a href="drink_detail.php?id=' + similarDrinkId + '"><div class="col-xs-' + gridRatio + ' text-center">' +
                '<img src="img/' + drinkImgSrc + '" alt="' + drinkName + '" class="img-responsive center-block" />' +
                renderRating() + "<br />" +
                '<strong>' + drinkName + '</strong>' +
                '</div></a>');
        };
    },

    /*---Event Handlers---*/

    onRateDrinkClick = function (drinkId) {
        goToQuestionnaire(drinkId);
    },

    onConfirmOrderDrinkBtn = function (drinkId) {
        confirmOrderDrink();
    },

    /*---Methods---*/

    renderRating = function (ratingCount) {
        //Round rating
        ratingCount = Math.round(ratingCount);

        var filledContent = '<div class="glyphicon glyphicon-star"></div>';
        var emptyContent = '<div class="glyphicon glyphicon-star-empty"></div>';

        var renderedResult = "";

        //Render
        for (var i = 1; i <= 5; i++) {
            if (i <= ratingCount) { renderedResult += filledContent; }
            else { renderedResult += emptyContent; }
        }
        return renderedResult;
    },

    goToQuestionnaire = function (drinkId) {
        window.location = 'cocktail_rating.php?id=' + drinkId;
    },

    calculatePostData = function (drinId) {

    },

    confirmOrderDrink = function () {
        mainController.orderDrink(drinkModel.getDrink());
    };

    /*---Public variables and methods---*/
    that.init = init;
    that.renderSimilarDrinks = renderSimilarDrinks;

    return that;
};