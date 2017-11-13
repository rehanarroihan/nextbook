<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/

require APPPATH .'third_party/vendor/autoload.php';

$config['google']['client_id']        = '611372966580-0uj2g5sq009k13t3l2bojic9ee5bf8om.apps.googleusercontent.com';
$config['google']['client_secret']    = 'ZpJYH6Cipv46FgBvEYG73rLP';
$config['google']['redirect_uri']     = 'http://localhost/nextbook/';
$config['google']['application_name'] = 'Nextbook';
$config['google']['api_key']          = 'AIzaSyCwquh1lh7TGzr5h5aOlbAxNgizQn-DBVE';
$config['google']['scopes']           = array('https://www.googleapis.com/auth/plus.login','https://www.googleapis.com/auth/plus.me','https://www.googleapis.com/auth/userinfo.email','https://www.googleapis.com/auth/userinfo.profile');