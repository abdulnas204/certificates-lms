<?php
/*
* 	IPN handler that processes new student registrations. 
*   Created on 10 June 2013
*/
	
	//This allows us to use wordpress to handle the ipn request. 
	add_action( 'template_redirect', 'nb_queryVarsListener' );
	add_filter( 'query_vars',  'addIPNQueryVar' );

	function addIPNQueryVar($public_query_vars) {
		$public_query_vars[] = 'foo';
		return $public_query_vars;
	}

	function nb_queryVarsListener() {
		//Check that the query var is set and is the correct value.
		if (isset($_GET['foo']) && $_GET['foo'] == 'bar') //These should be updated to be unique
		{

			include "ipn_relay.php";
			//Stop WordPress entirely
			exit;
		}
	}

?>