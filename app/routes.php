<?php

    $app->get('/', function($request, $response){
        return $this->view->render($response, 'home.twig');
    });

    $app->get('/home', 'HomeController:index')->setName('home');

    $app->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');
    $app->post('/auth/signup', 'AuthController:postSignUp');

    $app->get('/auth/signin', 'AuthController:getSignIn')->setName('auth.signin');
    $app->post('/auth/signin', 'AuthController:postSignIn');

    $app->get('/auth/signout', 'AuthController:getSignOut')->setName('auth.signout');