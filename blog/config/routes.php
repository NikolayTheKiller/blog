<?php

return array(    
    'user/register'=>'user/register',
    'user/login'=>'user/login',
    'user/logout'=>'user/logout',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',
    'admincategory/create'=>'admincategory/create',
    'admincategory/delete'=>'admincategory/delete',    
    'admincategory/delete/([0-9]+)'=>'admincategory/delete/$1',
    'admincategory/update'=>'admincategory/update',
    'admincategory/update/([0-9]+)'=>'admincategory/update/$1',
    'adminpost/add/([0-9]+)'=>'adminpost/create/$1',
    'adminpost/add'=>'adminpost/createnew',
    'adminpost/index'=>'adminpost/index',
    'adminpost/delete/([0-9]+)'=>'adminpost/delete/$1',
    'adminpost/update/([0-9]+)'=>'adminpost/update/$1',
    'adminpost/extra/([0-9]+)'=>'adminpost/extra/$1',
   
    'admin' => 'admin/index',
    'category/([0-9]+)/page-([0-9]+)' => 'post/index/$1/$2',    
    'category/([0-9]+)' => 'post/index/$1',
    'category' => 'category/category',    
    'post/([0-9]+)'=>'post/full/$1',
    'showcomm/([0-9]+)'=>'post/comments/$1',
    'newcomm/([0-9]+)'=>'post/create/$1',
     'preply/([0-9]+)'=>'post/reply/$1',
 
    
    ''=>'site/index'


   
);

