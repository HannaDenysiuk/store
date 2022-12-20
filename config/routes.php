<?php
return [
  'user/register' => 'user/register', //UserController, actionregister
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
  'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', //CatalogController, actionCategory
  'category/([0-9]+)' => 'catalog/category/$1', //CatalogController, actionCategory
  'product/([0-9]+)' => 'product/view/$1', //ProductController, actionView
  'catalog' => 'catalog/index', //CatalogController, actionindex
  'head' => 'site/index', //SiteController, actionindex
  'about' => 'about/index', //AboutController, actionindex
  'contacts' => 'contacts/index', //ContactsController, actionindex
 
  'cart/checkout' => 'cart/checkout',  //CartController, actioncheckout
  'cart/add/([0-9]+)' => 'cart/add/$1',  //CartController, actionadd
  'cart/addAjax/([0-9]+)/([0-9]+)' => 'cart/addAjax/$1/$2',
  'cart/delete/([0-9]+)' => 'cart/delete/$1',
  'cart' => 'cart/index',

  '' => 'site/index'  //SiteControler, actionindex
];
