<?php

use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator;

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::register('home', function(BreadcrumbsGenerator $crumbs){
    $crumbs->push('Home', route('home'));
});

Breadcrumbs::register('login', function(BreadcrumbsGenerator $crumbs){
    $crumbs->parent('home');
    $crumbs->push('Login', route('login'));
});

Breadcrumbs::register('password.request', function(BreadcrumbsGenerator $crumbs){

    $crumbs->parent('login');
    $crumbs->push('Password Reset', route('password.request'));
});

Breadcrumbs::register('register', function(BreadcrumbsGenerator $crumbs){
    $crumbs->parent('home');
    $crumbs->push('Register', route('login'));
});

Breadcrumbs::register('cabinet', function(BreadcrumbsGenerator $crumbs){
    $crumbs->parent('home');
    $crumbs->push('Cabinet', route('cabinet'));
});

Breadcrumbs::register('admin.home', function(BreadcrumbsGenerator $crumbs){
    $crumbs->parent('home');
    $crumbs->push('Admin', route('admin.home'));
});
