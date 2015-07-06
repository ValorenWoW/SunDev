<?php

use Symfony\Component\HttpFoundation\Request;

$app->get('/', function() use($app) {
	$manager	= new \SUN\DAO\ReviewDAO($app);
	$scripts	= $manager->getReview();

	return $app['twig']->render('index.html.twig', array(
		"scripts" => $scripts,
	));
});

$app->get('/login', function(Request $request) use ($app) {
	return $app['twig']->render('auth/login.html.twig', array(
		'error'         => $app['security.last_error']($request),
		'last_username' => $app['session']->get('_security.last_username'),
	));
})->bind('login');