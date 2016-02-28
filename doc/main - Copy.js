/*
	//  check if there is/are session cards
	checkSavedProperties();
	
	$('.star-tooltip').click(function() {
        var $savedCards = $.cookie('savedcards');
        var listingId = $(this).data('property');
		// console.log(listingId);
        if( !$(this).hasClass('saved') ) {
            if(!$savedCards){
                // $.cookie('savedcards', listingId);
				$.cookie('savedcards', listingId, { path: '/' });
            } else {
                var cards = $savedCards.split("|");
                var isExists = false;
                for (i=0;i<cards.length;i++) {
                   if(cards[i] == listingId){
                       isExists = true;
                       break;
                   }
                }
                if(!isExists)
                    cards.push(listingId);

                // $.cookie('savedcards', cards.join('|'));
                $.cookie('savedcards', cards.join('|'), { path: '/' });
            }
            $(this).addClass('saved');
        } else {
            var cards = $savedCards.split("|");
            var newCards = new Array();
            for (i=0; i<cards.length; i++) {
               if(cards[i] != listingId) {
                   newCards.push(cards[i]);
               }
            }
            // $.cookie('savedcards', newCards.join('|'));
            $.cookie('savedcards', newCards.join('|'), { path: '/' });
            $(this).removeClass('saved');
        }
        checkSavedProperties();
        return false;
    });
	
	function checkSavedProperties()
    {
        // console.log( $.cookie('savedcards') );
		if( !$.cookie('savedcards') ) {
			// $.removeCookie('savedcards');
			$.removeCookie('savedcards', { path: '/' });
        }
    }
*/

	// Initialise Angular Module
	var boards = angular.module('cardApp', ["xeditable"]);
	
	boards.run(function(editableOptions) {
		editableOptions.theme = 'bs3'; // bootstrap3 theme. Can be also 'bs2', 'default'
	});
	
	
	// Set-up a controller
	boards.controller('CardListController', function($scope, $http) {

		$scope.listCardsByBoard = [];
		boards = [];

		var req = {
			url: 'functions.php',
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		};
		
		$http(req).success( function (data) {
			
			// Load list of cards by board.
			$scope.listCardsByBoard = data.boards;

			// Set-up card details for board
			jQuery.each(data.boards, function(id, obj) {
				jQuery.each(obj.card_data, function(i, n_obj) {
					boards.push([
						n_obj.card_id, 
						n_obj.cardtext,
						n_obj.cardcolors
					]);
				});
			});			
		});
	
		// boards.addCard = function() {
			// boards.card_data.push({ card_id: 12345, cardtext : card.cardtext, cardcolors : ['yellow', 'orange'] });
			// card.cardtext = '';
		// };
		
		
 
		/*cardList.remaining = function() {
		  var count = 0;
		  angular.forEach(cardList.cards, function(todo) {
			count += todo.done ? 0 : 1;
		  });
		  return count;
		};
	 
		cardList.archive = function() {
		  var oldTodos = cardList.cards;
		  cardList.cards = [];
		  angular.forEach(oldTodos, function(todo) {
			if (!todo.done) cardList.cards.push(todo);
		  });
		};*/

		/*function ClickToEditCtrl($scope) {
			// $scope.title = "Welcome to this demo!";
			$scope.editorEnabled = false;

			$scope.enableEditor = function() {
				$scope.editorEnabled = true;
				$scope.editableTitle = $scope.editableTitle;
			};

			$scope.disableEditor = function() {
				$scope.editorEnabled = false;
			};

			$scope.save = function() {
				$scope.editableTitle = $scope.editableTitle;
				$scope.disableEditor();
			};
		}*/
	});
	
	
