<?php

    $response = array();
    $res = array();
    $cards_by_board = array();
	
	$boards = array('backlog', 'in-progress', 'done');
	
	// retrieve saved session cards
    $saved_cards = (isset($_COOKIE['savedcards']) and !empty($_COOKIE['savedcards'])) ? $_COOKIE['savedcards'] : array();
    if($saved_cards) {
        $cards = explode('|', $saved_cards);
	}
	else {
		$cards = array( 
			array( 'board' => 'backlog', 
					'cards' => array( 'card_id' => 1, 'cardtext' => 'Story #1', 'cardcolors' => array('red', 'blue') ) 
			), 
			array( 'board' => 'in-progress', 
					'cards' => array('card_id' => 2, 'cardtext' => 'sample card 011', 'cardcolors' => array('yellow') )
			),
			array( 'board' => 'in-progress', 
					'cards' => array('card_id' => 22, 'cardtext' => 'sample card 0121', 'cardcolors' => array('green') ) 
			), 
			array( 'board' => 'done', 
					'cards' => array( 'card_id' => 3, 'cardtext' => 'sample card 012', 'cardcolors' => array('orange') ) 
			) 
		);
	}

    for ($i = 0; $i < count($boards); $i++ ) {
		foreach( $cards as $board_key => $board_val ) {

			if( $board_val['board'] == $boards[$i] ) {
				$res[] = $board_val['cards'];
			}
		}

        $cards_by_board[] = array(
        	// 'card_catid' => $boards[$i],
            'boardname' => htmlspecialchars_decode($boards[$i]),
            'card_data' => $res
        );

        $res = array();

    }

    $response['boards'] = $cards_by_board;

    echo json_encode($response);

    die();

?>