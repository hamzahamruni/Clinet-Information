<?php
function GET_IP_ADDRESS()
{
    $IP_ADDRESS = '';
	if (getenv('HTTP_CLIENT_IP'))
		$IP_ADDRESS = getenv('HTTP_CLIENT_IP');
	else if(getenv('HTTP_X_FORWARDED_FOR'))
		$IP_ADDRESS = getenv('HTTP_X_FORWARDED_FOR');
	else if(getenv('HTTP_X_FORWARDED'))
		$IP_ADDRESS = getenv('HTTP_X_FORWARDED');
	else if(getenv('HTTP_FORWARDED_FOR'))
		$IP_ADDRESS = getenv('HTTP_FORWARDED_FOR');
	else if(getenv('HTTP_FORWARDED'))
	$IP_ADDRESS = getenv('HTTP_FORWARDED');
	else if(getenv('REMOTE_ADDR'))
		$IP_ADDRESS = getenv('REMOTE_ADDR');
	else
		$IP_ADDRESS = 'UNKNOWN';
    return $IP_ADDRESS;
}
function save_info_user() // OK
{

	$IP_ADDRESS = GET_IP_ADDRESS();
    //__________________________________________________
	if(isset($_SERVER['REMOTE_PORT'])){
        $REMOTE_PORT = $_SERVER['REMOTE_PORT'];
    }
    else
	{
		$REMOTE_PORT = '';
	}
    //____________________________________________________________
	if(isset($_SERVER['HTTP_USER_AGENT']))
	{
		$HTTP_USER_AGENT = $_SERVER['HTTP_USER_AGENT'];
	}
    else
	{
		$HTTP_USER_AGENT = '';
	}
    //____________________________________________________________
	if(isset($_SERVER['HTTP_SEC_CH_UA_PLATFORM']))
	{
		$HTTP_SEC_CH_UA_PLATFORM = $_SERVER['HTTP_SEC_CH_UA_PLATFORM'];
	}
    else
	{
		$HTTP_SEC_CH_UA_PLATFORM = '';
	}
    //____________________________________________________________
	if(isset($_SERVER['WINDIR']))
	{
		$WINDIR = $_SERVER['WINDIR'];
	}
	else
	{
		$WINDIR = '';
	}
//________________________________________________________________
    if(isset($_SERVER['REQUEST_URI']))
	{
		$REQUEST_URI = $_SERVER['REQUEST_URI'];
	}
	else
	{
		$REQUEST_URI = '';
	}

    $myFile = fopen(date('Y-m-d h:m:s A'),'w');
    $information =
    "IP_ADDRESS:".$IP_ADDRESS.
    "\nREMOTE_PORT:".$REMOTE_PORT.
    "\nHTTP_USER_AGENT:".$HTTP_USER_AGENT.
    "\nHTTP_SEC_CH_UA_PLATFORM:".$HTTP_SEC_CH_UA_PLATFORM.
    "\nWINDIR:".$WINDIR.
    "\nREQUEST_URI:".$REQUEST_URI.
    "\nlat:".$GET['lar']."\nlong:".$GET['long'].
    "\nuserAgent:".$GET['useragent'];

    fwrite($myFile,$information);
    fclose($myFile);
}

save_info_user();
?>