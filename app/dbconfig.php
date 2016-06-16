<?php

use Illuminate\Database\Capsule\Manager as Capsule;



$capsule = new Capsule();

$capsule -> addConnection([
	'driver' => 'mysql',
	'host' => 'localhost',
	'username' => '',
	'password' => '',
	'database' => '',
	'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
],'default');

$capsule -> addConnection([
	'driver' => 'mysql',
	'host' => '',
	'username' => '',
	'password' => '',
	'database' => '',
	'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
],'jira');

$capsule->setFetchMode(PDO::FETCH_ASSOC);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$automationConnections = Capsule::table("automation_connection")
								-> select("*")
								-> get();

foreach($automationConnections as $ac) {
	$capsule -> addConnection([
		'driver' => $ac['driver'],
		'host' => $ac['host'],
		'username' => $ac['username'],
		'password' => $ac['password'],
		'database' => $ac['database_name'],
		'charset' => $ac['charset'],
		'collation' => $ac['collation'],
		'prefix' => $ac['prefix']
	], $ac["connection_name"]);
}

/*$capsule->addConnection([
	'driver' => 'mysql',
	'host' => 'VPNA-QAT-DBX003.ad-dev.issgovernance.com',
	'username' => 'rmsmoketest',
	'password' => 'rmsmok3t3st',
	'database' => 'RecoverMaxAutomation',
	'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
],'rmautomation');*/


//$test = Capsule::connection('jira')->table('project')->select('pname')->get();


?>