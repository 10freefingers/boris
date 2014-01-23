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

	likertBitterVal = null,
    likertSweetVal = null,
    likertSourVal = null,
    likertFruityVal = null,
    likertStrongVal = null,

	gender = null,

    //PHP data is rate.php

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
			
			//numCocktailsTotal = tempArr.length;
			
			numCocktailsTotal = new Array();
			for (var i=1; i<=tempArr.length; i++) {
				numCocktailsTotal.push(i);	
			}
			
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
    },
    //getter and setter for likert scale in questionnaire
    getLikertBitterVal = function() {
        return likertBitterVal;
    },    
    getLikertSweetVal = function() {
        return likertSweetVal;
    },
    getLikertSourVal = function() {
        return likertSourVal;
    },
    getLikertFruityVal = function() {
        return likertFruityVal;
    },
    getLikertStrongVal = function() {
        return likertStrongVal;
    },
    setLikertBitterVal = function(likertBitterVal) {
        this.likertBitterVal = likertBitterVal;
        console.log("likert Bitter " + likertBitterVal);
    },
    setLikertSweetVal = function(likertSweetVal) {
        this.likertSweetVal = likertSweetVal;
        console.log("likert Sweet " + likertSweetVal);
    },
    setLikertSourVal = function(likertSourVal) {
        this.likertSourVal = likertSourVal;
        console.log("likert Sour " + likertSourVal);
    },
    setLikertFruityVal = function(likertFruityVal) {
        this.likertFruityVal = likertFruityVal;
        console.log("likert Fruity " + likertFruityVal);
    },
    setLikertStrongVal = function(likertStrongVal) {
        this.likertStrongVal = likertStrongVal;
        console.log("likert Strong " + likertStrongVal);
    },
    //getter and setter for rest of questionnaire
    getGenderVal = function() {
        return gender;
    };
    setGenderVal = function(gender) {
        this.gender = gender;
        console.log("gender " + gender);
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
    that.getLikertBitterVal = getLikertBitterVal;
    that.getLikertSweetVal = getLikertSweetVal;
    that.getLikertSourVal = getLikertSourVal;
    that.getLikertFruityVal = getLikertFruityVal;
    that.getLikertStrongVal = getLikertStrongVal;
    that.setLikertBitterVal = setLikertBitterVal;
    that.setLikertSweetVal = setLikertSweetVal;
    that.setLikertSourVal = setLikertSourVal;
    that.setLikertFruityVal = setLikertFruityVal;
    that.setLikertStrongVal = setLikertStrongVal;
    that.getGenderVal = getGenderVal;
    that.setGenderVal = setGenderVal;

    return that;
};