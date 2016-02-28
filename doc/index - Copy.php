<!doctype html>
<html class="no-js" lang="" ng-app="cardApp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<link rel="stylesheet" href="http://vitalets.github.io/angular-xeditable/starter/angular-xeditable/css/xeditable.css" crossorigin="anonymous">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/custom.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
		
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-resource.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-route.min.js"></script>
		<script src="https://cdn.firebase.com/js/client/2.0.4/firebase.js"></script>
		<script src="https://cdn.firebase.com/libs/angularfire/0.9.0/angularfire.min.js"></script>
		<script src="http://vitalets.github.io/angular-xeditable/starter/angular-xeditable/js/xeditable.js"></script>
		<script src="http://vitalets.github.io/angular-xeditable/starter/angular-xeditable/js/xeditable.js"></script>
		
		
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
		<div class="container-fluid">
			<p>Hello world! This is HTML5 Boilerplate.</p>
			<div id="surface">
				<div id="content">
					<div class="board-wrapper">
						<div class="board-main-content">
							<div class="board-canvas">
								<div id="board" ng-view>
									<div ng-controller="CardListController as boxList" ng-cloak>
										<div class="js-list list-wrapper" ng-repeat="board in listCardsByBoard" ng-cloak>
											<div class="list js-list-content">
												<div class="list-header js-list-header non-empty u-clearfix editable">
													<h2 class="list-header-name hide-on-edit js-list-name current">{{board.boardname}}</h2>
													<!-- <div class="edit edit-heavy u-clearfix">
														<textarea class="field single-line" type="text" ng-model="yourName"></textarea>
														<div class="edit-controls u-clearfix">
															<input class="primary confirm js-save-edit" type="submit" value="Save">
															<a class="icon-lg icon-close dark-hover cancel js-cancel-edit" href="#"></a>
														</div>
													</div>
													-->
												</div>
												<div class="list-cards u-fancy-scrollbar u-clearfix js-list-cards js-sortable ui-sortable">
													<div class="list-card js-member-droppable ui-droppable" ng-repeat-reorder="card in board.card_data" ng-repeat-reorder-handle="i.fa.fa-bars" ng-cloak>
														<div class="list-card-details" ng-hide="editorEnabled">
															<div class="list-card-labels js-card-labels">
																<span class="card-label card-label-{{color}}" title="" ng-repeat="color in card.cardcolors">&nbsp;</span>
															</div>
															<!--ng-click="editorEnabled = !editorEnabled-->
															<a class="list-card-title js-card-name" href="javascript:;" editable-text="card.cardtext" tabindex="{{$index + 1}}" ng-change="checkForNameDelete($index)" ng-model="name.val" ng-class="{'last-player': $index == names.length-1}"><span class="card-short-id hide">{{card.card_id}}</span>{{card.cardtext}}</a>
													<!-- 		
															<div class="badges"><span></span></div>
															<div class="list-card-members js-list-card-members"></div>
															-->
														</div>
														<!--
														<div ng-show="editorEnabled" class="form-text">
															<input class="form-control" ng-model="editableTitle" ng-show="editorEnabled">
															<div class="edit-btns"><a href="javascript:;" class="btn btn-info btn-xs" ng-click="save()">save</a> &nbsp; <a href="javascript:;" class="btn btn-default btn-xs" ng-click="editorEnabled = !editorEnabled">cancel</a></div>
														</div>
														-->
													</div>
												</div>
											</div>
										</div>
									</div>
									<!--
									<div class="js-list list-wrapper">
										<div class="list js-list-content">
											<div class="list-header js-list-header non-empty u-clearfix editable">
												<h2 class="list-header-name hide-on-edit js-list-name current">{{yourName}}</h2>
												<div class="edit edit-heavy u-clearfix"><textarea class="field single-line" type="text" ng-model="yourName"></textarea></div>
											</div>
										</div>
									</div>
									<div class="js-list list-wrapper">
										<div class="list js-list-content">
											<div class="list-header js-list-header non-empty u-clearfix editable">
												<h2 class="list-header-name hide-on-edit js-list-name current">{{yourName}}</h2>
												<div class="edit edit-heavy u-clearfix"><textarea class="field single-line" type="text" ng-model="yourName"></textarea></div>
											</div>
										</div>
									</div>
									-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
		
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
