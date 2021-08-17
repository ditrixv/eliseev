<?php

use App\Entity\User;
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

//////////////////

Breadcrumbs::register('admin.users.create', function(BreadcrumbsGenerator $crumbs){
    $crumbs->parent('admin.users.index');
    $crumbs->push('Create', route('admin.users.create'));
});

Breadcrumbs::register('admin.users.show', function(BreadcrumbsGenerator $crumbs, User $user){
    $crumbs->parent('admin.users.index');
    $crumbs->push('Show', route('admin.users.show',$user->id));
});

Breadcrumbs::register('admin.users.edit', function(BreadcrumbsGenerator $crumbs, User $user){
    $crumbs->parent('admin.users.index');
    $crumbs->push('Edit', route('admin.users.edit', $user->id));
});

Breadcrumbs::register('admin.users.index', function(BreadcrumbsGenerator $crumbs){
    $crumbs->parent('admin.home');
    $crumbs->push('Users', route('admin.users.index'));
});
