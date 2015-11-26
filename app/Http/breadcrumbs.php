<?php 


Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

Breadcrumbs::register('send', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Send notification', route('send_notifs_page'));
});

Breadcrumbs::register('list_notif', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('List notifications', route('list_notifs'));
});

Breadcrumbs::register('list_receivers', function($breadcrumbs)
{
    $breadcrumbs->parent('list_notif');
    $breadcrumbs->push('Detail notification', route('view_notif'));
});

Breadcrumbs::register('login', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Login', action('Auth\AuthController@getLogin'));
});

Breadcrumbs::register('create_user', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Create user', route('create_user'));
});