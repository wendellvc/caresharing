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
	});
	
	// angular.module("dragndropdemo", ['ngRepeatReorder']);
		// function dragndropdemo($scope) {
			// $scope.names = [{val:'bob'},{val:'lucy'},{val:'john'},{val:'luke'},{val:'han'}];
			// $scope.tempplayer = '';
			// $scope.updateNames = function (){
				// if($scope.tempplayer === "") return
				// $scope.names.push({val: $scope.tempplayer});
				// $scope.tempplayer = "";
			// };
			// $scope.checkForNameDelete = function($index){
				// if($scope.names[$index].val === ''){
					// $scope.names.splice($index, 1);
				// }
			// };
		// };