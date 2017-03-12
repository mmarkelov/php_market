<?php

return array(
    'product/([0-9]+)' => 'product/view/$1', // actionView ProductController
    
    'catalog/page-([0-9]+)' => 'catalog/index/$1',
    'catalog' => 'catalog/index', // actionIndex CatalogController
    
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory CatalogController
    'category/([0-9]+)' => 'catalog/category/$1',  // actionCategory CatalogController
    
    'cart/checkout' => 'cart/checkout', // actionCheckOut в CartController    
    'cart/delete/([0-9]+)' => 'cart/delete/$1', // actionDelete в CartController   
    'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd в CartController   
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', // actionAdd в CartController
    //'cart/decr/([0-9]+)' => 'cart/decr/$1',
    'cart/change/([0-9]+)' => 'cart/change/$1',
    'cart' => 'cart/index', // actionIndex в CartController
    
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',
 
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',
 
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',

    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',
    
    'admin' => 'admin/index',
    
    'blog/view/([0-9]+)' => 'blog/view/$1',
    'blog/author/([[:word:]])' => 'blog/author/$1',
    'blog/create' => 'blog/create',
    'blog/update/([0-9]+)' => 'blog/update/$1',
    'blog/delete/([0-9]+)' => 'blog/delete/$1',
    'blog/newsAjax' => 'blog/newsAjax',
    'blog' => 'blog/index',
    
    'contacts' => 'site/contact',
    'search' => 'site/search',
 
    '' => 'site/index', //actionIndex SiteController
);

