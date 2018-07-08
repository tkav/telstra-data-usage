<?php

//  Export Telstra Group Usage Data to CSV
//  By Tom Kavanagh https://github.com/tkav/telstra-data-usage

include('telstra.php');

//Telstra Account
$Username = 'telstrausername';
$Password = 'telstrapassword';

//Login and create session
$login = Telstra::login($Username, $Password);

//Get Summary of Group Data
$csv = Telstra::getGroupUsage('group_summary.csv');

//Get Detailed Usage Summary
$csv = Telstra::getGroupUsage('detailed_summary.csv', 1);

?>
