<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Storybox',

	// preloading 'log' component
	'preload'=>array(
	  'log',
	  'bootstrap',
	),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	  'ext.giix-components.*',
	  'ext.eoauth.*',
	  'ext.eoauth.lib.*',
	  'ext.lightopenid.*',
	  'ext.eauth.*',
	  'ext.eauth.services.*',
	  'ext.bootstrap.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('14.39.156.111','::1'),
		  'generatorPaths' => array(
		    'ext.giix-core', // giix generators
		    'bootstrap.gii',
		  ),
		),
		
	),

	// application components
	'components'=>array(
			'navergeocode' => array(
					'class' => 'application.extensions.navergeocode.NaverGeocode',
			),
			'loid' => array(
			  //alias to dir, where you unpacked extension
			  'class' => 'application.extensions.lightopenid.loid',
			),
			'bootstrap'=>array(
			  'class'=>'ext.bootstrap.components.Bootstrap',
			),				
			'eauth' => array(
			  'class' => 'ext.eauth.EAuth',
			  'popup' => true, // Use the popup window instead of redirecting.
			  'cache' => false, // Cache component name or false to disable cache. Defaults to 'cache'.
			  'cacheExpire' => 0, // Cache lifetime. Defaults to 0 - means unlimited.
			  'services' => array( // You can change the providers and their classes.
			    'google' => array(
			      'class' => 'GoogleOpenIDService',
			      //'realm' => '*.example.org',
			    ),
			    'twitter' => array(
			      // register your app here: https://dev.twitter.com/apps/new
			      'class' => 'TwitterOAuthService',
			      'key' => '...',
			      'secret' => '...',
			    ),
			    'google_oauth' => array(
			      // register your app here: https://code.google.com/apis/console/
			      'class' => 'GoogleOAuthService',
			      'client_id' => '...',
			      'client_secret' => '...',
			      'title' => 'Google (OAuth)',
			    ),
			    'facebook' => array(
			      // register your app here: https://developers.facebook.com/apps/
			      'class' => 'FacebookOAuthService',
			      'client_id' => '632942866776797',
			      'client_secret' => '51ec789cc1458acc8e1913cd802672c8',
			    ),
			  ),
			),
			
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=storybox',
			'emulatePrepare' => true,
			'username' => 'lepl',
			'password' => 'lepl',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				
				// uncomment the following to show log messages on web pages
				
				array(
					 'class'=>'CWebLogRoute',
				        //
				        // I include *trace* for the 
				        // sake of the example, you can include
				        // more levels separated by commas
				    'levels'=>'trace',
				        //
				        // I include *vardump* but you
				        // can include more separated by commas
				    'categories'=>'vardump',
				        //
				        // This is self-explanatory right?
				    'showInFireBug'=>true
				),
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'therichu@gmail.com',
	),
);