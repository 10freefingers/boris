Boris.MainModel = function() {
    var that = {},
    normalUsername = "normaluser",
    settingsUsername = "settingsuser",
    correctPW = "0000",
    taste = null,
    alcStrength = null,
	phpRepo = null,
	numCocktailsTotal = 0,
	ingredientsList = null,

    init = function() {
        //console.log("model init");
        initPhpRepo();
    },
	
	initPhpRepo = function() {
		phpRepo = {};
		baseUrl = document.baseURI.replace(/\\/g, '/').replace(/\/[^\/]*\/?$/, '') + "/";
		//var baseUrl = "http://localhost/boris/src/php/
		phpRepo.search = "php/search.php";
		phpRepo.getIngredients = "php/getIngredients.php";
		phpRepo.getCocktails = "php/getCocktails.php";
		//to be continued...
		
		updateDatabaseCache();
	},
	
	updateDatabaseCache = function() {
		initIngredientsList();
		initNumCocktails();
	},
	
	getResUrl = function(which) {
		switch(which) {
			case "search":
				return phpRepo.search;
				break;
			case "getIngredients":
				return phpRepo.getIngredients;
				break;
			case "getCocktails":
				return phpRepo.getCocktails;
			default:
				return false;
				break;	
		}
	},
	
	initIngredientsList = function() {
		ingredientsList = new Array();
		$.get(getResUrl("getIngredients"), function(data) {
			var tempArr = $.map(data.data, function(value, index) {
				return [value];
			});
			for (var i=0; i<tempArr.length; i++) {
				//console.log("arr", tempArr[i].name);
				ingredientsList.push(tempArr[i].name.toLowerCase());
			}
		});
	},
	
	initNumCocktails = function() {
		$.get(getResUrl("getCocktails"), function(data) {
			//console.log("initNumCocktails", data);
			var tempArr = $.map(data.data, function(value, index) {
				return [value];
			});
			numCocktailsTotal = tempArr.length;
		});
	},
	
	checkIfIngredient = function(query) {
		for (var j=0; j<ingredientsList.length; j++) {
        	if (ingredientsList[j].match(query)) return j;
    	}
    	return false;
	},
	
	getNumCocktails = function() {
		return numCocktailsTotal;
	},

    //sign in stuff
    getUsernameForDrinkList = function() {
        return normalUsername;
    },
    getUsernameForSettings = function() {
        return settingsUsername;
    },
    getCorrectPassword = function() {
        return correctPW;
    },

    //getter and setter for filtering alcStrength and Taste
    getSelectedTaste = function() {
        return taste;
    },    
    getSelectedAlcStrength = function() {
        return alcStrength;
    },
    setSelectedTaste = function(flavour) {
        taste = flavour;
        console.log(taste);
    },
    setSelectedAlcStrength = function(alc) {
        alcStrength = alc;
        console.log(alcStrength);
    };

    that.init = init;
    that.getResUrl = getResUrl;
    that.checkIfIngredient = checkIfIngredient;
	that.getNumCocktails = getNumCocktails;
    that.getUsernameForDrinkList = getUsernameForDrinkList;
    that.getUsernameForSettings = getUsernameForSettings;
    that.getCorrectPassword = getCorrectPassword;
    that.getSelectedTaste = getSelectedTaste;
    that.getSelectedAlcStrength = getSelectedAlcStrength;
    that.setSelectedTaste = setSelectedTaste;
    that.setSelectedAlcStrength = setSelectedAlcStrength;

    return that;
};