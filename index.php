<?php

require 'bets.php';
use iBetter\DB;
$bets = DB\get('bets',$conn,$limit=5);
//print_r(mysql_fetch_object($bets));
while( $bet=mysql_fetch_object($bets)){
	$checkStat = check_win($bet);
	if ( $checkStat != 2 ) 
	{
		$gameStatus = 0;

		if ($checkStat == 1) 
		{
			$payLink = "https://venmo.com?txn=Pay&recipients={$bet->name1}&amount={$bet->amount}&note=won%20the%20bet";
			iBetter\DB\query1(
				"UPDATE bets SET paylink='$payLink'  WHERE id={$bet->id}",
				$conn);
		}
		elseif ($checkStat == -1) 
		{
			$payLink = "https://venmo.com?txn=Pay&recipients={$bet->name2}&amount={$bet->amount}&note=won%20the%20bet";
			iBetter\DB\query1(
				"UPDATE bets SET paylink='$payLink'  WHERE id={$bet->id}",
				$conn);		
		}
		else {
			$payLink = "www.google.com";
			iBetter\DB\query1(
				"UPDATE bets SET paylink='$payLink'  WHERE id={$bet->id}",
				$conn);		
				}

	iBetter\DB\query1(
		"UPDATE bets SET active=0 WHERE id={$bet->id}",
		$conn);
}
}

$bets = DB\get('bets',$conn);


view('index', array (
	'bets' => $bets
	)
);