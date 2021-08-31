<?php

use App\Entity\Adverts\Category;
use App\Entity\Adverts\Attribute;
use App\Entity\User;
use App\Entity\Region;
use Illuminate\Support\Facades\Auth;

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


Breadcrumbs::register('cabinet.profile.index', function(BreadcrumbsGenerator $crumbs){
    $crumbs->parent('home');
    $crumbs->push('Profile', route('cabinet.profile.index'));
});


Breadcrumbs::register('cabinet.profile.edit', function(BreadcrumbsGenerator $crumbs){
    $user = Auth::user();
    $crumbs->parent('cabinet.profile.index');
    $crumbs->push('Edit profile: '.$user->last_name, route('cabinet.profile.edit'));
});


// Breadcrumbs::register('cabinet.profile.edit', function(BreadcrumbsGenerator $crumbs, User $user){
//     $crumbs->parent('cabinet');
//     $crumbs->push($user->last_name, route('cabinet.profile.edit', $user->id));
// });


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
    $crumbs->push($user->name, route('admin.users.show',$user->id));
});

Breadcrumbs::register('admin.users.edit', function(BreadcrumbsGenerator $crumbs, User $user){
    $crumbs->parent('admin.users.index');
    $crumbs->push($user->name, route('admin.users.edit', $user->id));
});

Breadcrumbs::register('admin.users.index', function(BreadcrumbsGenerator $crumbs){
    $crumbs->parent('admin.home');
    $crumbs->push('Users', route('admin.users.index'));
});

//////////////////

Breadcrumbs::register('admin.regions.create', function(BreadcrumbsGenerator $crumbs){
    $crumbs->parent('admin.regions.index');
    $crumbs->push('Create', route('admin.regions.create'));
});

Breadcrumbs::register('admin.regions.show', function(BreadcrumbsGenerator $crumbs, Region $region){
    $crumbs->parent('admin.regions.index');
    $crumbs->push($region->name, route('admin.regions.show',$region->id));
});

Breadcrumbs::register('admin.regions.edit', function(BreadcrumbsGenerator $crumbs, Region $region){
    $crumbs->parent('admin.regions.index');
    $crumbs->push($region->name, route('admin.users.edit', $region->id));
});

Breadcrumbs::register('admin.regions.index', function(BreadcrumbsGenerator $crumbs){
    $crumbs->parent('admin.home');
    $crumbs->push('Regions', route('admin.regions.index'));
});

//////////////////

Breadcrumbs::register('admin.adverts.categories.create', function(BreadcrumbsGenerator $crumbs){
    $crumbs->parent('admin.adverts.categories.index');
    $crumbs->push('Create', route('admin.adverts.categories.create'));
});

Breadcrumbs::register('admin.adverts.categories.show', function(BreadcrumbsGenerator $crumbs, Category $category){
    $crumbs->parent('admin.adverts.categories.index');
    $crumbs->push($category->name, route('admin.adverts.categories.show',$category->id));
});

Breadcrumbs::register('admin.adverts.categories.edit', function(BreadcrumbsGenerator $crumbs, Category $category){
    $crumbs->parent('admin.adverts.categories.index');
    $crumbs->push($category->name, route('admin.adverts.categories.edit', $category->id));
});

Breadcrumbs::register('admin.adverts.categories.index', function(BreadcrumbsGenerator $crumbs){
    $crumbs->parent('admin.home');
    $crumbs->push('Cetegories', route('admin.adverts.categories.index'));
});




/////////

Breadcrumbs::register('admin.adverts.categories.attributes.create', function (BreadcrumbsGenerator $crumbs, $id) {
    $category = Category::findOrFail($id);
    $crumbs->parent('admin.adverts.categories.show',$category);
    $crumbs->push('Create attribute', route('admin.adverts.categories.attributes.create', $category->id));
});



Breadcrumbs::register('admin.adverts.categories.attributes.show', function (BreadcrumbsGenerator $crumbs,
    $category_id,
    $attribute_id)
    {
    $category = Category::findOrFail($category_id);
    $attribute = Attribute::findOrFail($attribute_id);

    $crumbs->parent('admin.adverts.categories.show',$category);
    $crumbs->push('Show attribute: '.$attribute->name, route('admin.adverts.categories.attributes.show', [$category, $attribute]));
});


Breadcrumbs::register('admin.adverts.categories.attributes.edit', function (BreadcrumbsGenerator $crumbs,
    $category_id,
    $attribute_id)
    {
    $category = Category::findOrFail($category_id);
    $attribute = Attribute::findOrFail($attribute_id);

    $crumbs->parent('admin.adverts.categories.show',$category);
    $crumbs->push('Edit attribute: '.$attribute->name, route('admin.adverts.categories.attributes.edit', [$category, $attribute]));
});
