<?php 
/*
Name: CreateProxy Simple PHP API Class
Documentation and methods ca be found here: https://createproxy.com/api
Version: 1.0
*/

require_once "createproxy.class2.php";
$client = new CreateProxyClient('YOUR_API_KEY');

/***************************************************************************************************************************/

//EXAMPLE 0
//This will print all available API methods you can use
//More info: https://createproxy.com/api/general/list_methods/

/*
try {
$request = $client->request('general','list_methods');
} catch(CreateProxyException $e) {
print_r($e->getMessage());
exit;
}

echo '<pre>';
print_r($request);
echo '</pre>';
*/

/***************************************************************************************************************************/

//EXAMPLE 1
//This will return any random proxy from your Proxy list
//More info: https://createproxy.com/api/cloud/get_random_proxy/

/*
try {
$request = $client->request('cloud','get_random_proxy');
} catch(CreateProxyException $e) {
print_r($e->getMessage());
exit;
}

echo '<pre>';
print_r($request);
echo '</pre>';
*/

/***************************************************************************************************************************/

//EXAMPLE 2 
//This will print all your cloud proxies
//More info: https://createproxy.com/api/cloud/get_proxy_list/

/*
try {
$request = $client->request('cloud','get_proxy_list');
} catch(CreateProxyException $e) {
print_r($e->getMessage());
exit;
}

echo '<pre>';
print_r($request);
echo '</pre>';
*/

/***************************************************************************************************************************/

//EXAMPLE 3
//This will print all instances from cloud tools
//More info: https://createproxy.com/api/cloud/get_instance_list/

/*
try {
$request = $client->request('cloud','get_instance_list');
} catch(CreateProxyException $e) {
print_r($e->getMessage());
exit;
}

echo '<pre>';
print_r($request);
echo '</pre>';
*/

/***************************************************************************************************************************/

//EXAMPLE 4
//This will print all your Cloud Accounts
//More info: https://createproxy.com/api/cloud/get_account_list/

/*
try {
$request = $client->request('cloud','get_account_list');
} catch(CreateProxyException $e) {
print_r($e->getMessage());
exit;
}

echo '<pre>';
print_r($request);
echo '</pre>';
*/

/***************************************************************************************************************************/

//EXAMPLE 5
//This will delete all proxies for specific account, please use https://createproxy.com/api/cloud/get_account_list/ to retrive profile_id from your accounts!
//More info: https://createproxy.com/api/cloud/delete_account_proxy/
/*
$profile_id = 'YourProfileID';

try {
$request = $client->request('cloud','delete_account_proxy',array('profile_id' => $profile_id));
} catch(CreateProxyException $e) {
print_r($e->getMessage());
exit;
}

echo '<pre>';
print_r($request);
echo '</pre>';
*/
