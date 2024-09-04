<?php
namespace App\Traits;

    trait permissionTrait{
        public function hasPermission()
        {
            //for category
        if (!isset(auth()->user()->role->permission['name']['service']['can-add']) &&
            \Route::is('categories.create')){
            return abort(401);
            }
            if (!isset(auth()->user()->role->permission['name']['service']['can-list']) &&
                \Route::is('categories.index')){
                return abort(401);
            }
            //for user
            if (!isset(auth()->user()->role->permission['name']['user']['can-list']) &&
                \Route::is('users.index')){
                return abort(401);
            }
            if (!isset(auth()->user()->role->permission['name']['user']['can-add']) &&
                \Route::is('users.create')){
                return abort(401);
            }
            //for admin
            if (!isset(auth()->user()->role->permission['name']['admin']['can-list']) &&
                \Route::is('admins.index')){
                return abort(401);
            }
            if (!isset(auth()->user()->role->permission['name']['admin']['can-add']) &&
                \Route::is('admins.create')){
                return abort(401);
            }
            //for industry
            if (!isset(auth()->user()->role->permission['name']['industry']['can-list']) &&
                \Route::is('industries.index')){
                return abort(401);
            }
            if (!isset(auth()->user()->role->permission['name']['industry']['can-edit']) &&
                \Route::is('industries.edit')){
                return abort(401);
            }

            //for role
            if (!isset(auth()->user()->role->permission['name']['role']['can-list']) &&
                \Route::is('roles.index')){
                return abort(401);
            }
            if (!isset(auth()->user()->role->permission['name']['role']['can-add']) &&
                \Route::is('roles.create')){
                return abort(401);
            }

            // for permission
            if (!isset(auth()->user()->role->permission['name']['permission']['can-list']) &&
                \Route::is('permissions.index')){
                return abort(401);
            }
            if (!isset(auth()->user()->role->permission['name']['permission']['can-add']) &&
                \Route::is('permissions.create')){
                return abort(401);
            }
            //for subcategories
            if (!isset(auth()->user()->role->permission['name']['subcategory']['can-add']) &&
                \Route::is('subcategories.create')){
                return abort(401);
            }
            if (!isset(auth()->user()->role->permission['name']['subcategory']['can-list']) &&
                \Route::is('subcategories.index')){
                return abort(401);
            }
            //for service
            if (!isset(auth()->user()->role->permission['name']['service']['can-add']) &&
                \Route::is('products.create')){
                return abort(401);
            }
            if (!isset(auth()->user()->role->permission['name']['service']['can-list']) &&
                \Route::is('products.index')){
                return abort(401);
            }

            //for slider
            if (!isset(auth()->user()->role->permission['name']['slider']['can-add']) &&
                \Route::is('slider.create')){
                return abort(401);
            }
            if (!isset(auth()->user()->role->permission['name']['slider']['can-list']) &&
                \Route::is('slider.index')){
                return abort(401);
            }

            //for Mail
            if (!isset(auth()->user()->role->permission['name']['mail']['can-add']) &&
                \Route::is('mail.create')){
                return abort(401);
            }

            //for Blog
            if (!isset(auth()->user()->role->permission['name']['blog']['can-add']) &&
                \Route::is('posts.create')){
                return abort(401);
            }
            if (!isset(auth()->user()->role->permission['name']['blog']['can-list']) &&
                \Route::is('posts.index')){
                return abort(401);
            }
            if (!isset(auth()->user()->role->permission['name']['blog']['can-add']) &&
                \Route::is('sections.create')){
                return abort(401);
            }
            if (!isset(auth()->user()->role->permission['name']['blog']['can-list']) &&
                \Route::is('sections.index')){
                return abort(401);
            }

            //for Sponsor
            if (!isset(auth()->user()->role->permission['name']['sponsor']['can-add']) &&
                \Route::is('sponsors.create')){
                return abort(401);
            }
            if (!isset(auth()->user()->role->permission['name']['sponsor']['can-list']) &&
                \Route::is('sponsors.index')){
                return abort(401);
            }
   }
}
