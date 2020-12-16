<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

// if($_SERVER['HTTP_HOST'] == 'ecommerce.lawquestfoundation.org') {
//
//  $route['default_controller'] = "home/shop";
//
//
//  }
//  else{
//    $route['default_controller'] = "home";
//  }

//     default:
//         $route['default_controller'] = 'home';
//         $route['404_override'] = '';
//         $route['translate_uri_dashes'] = FALSE;
//         $route['login'] = "home/login";
//         $route['account_registered'] = "home/account_registered";
//         $route['register'] = "home/register";
//         $route['logout'] = "home/logout";
//         $route['shoplogout'] = "shop/shoplogout";
//         $route['reg_awareness'] = "home/reg_awareness";
//         $route['reg_partners'] = "home/reg_partners";
//         $route['reg_probono'] = "home/reg_probono";
//         $route['lqf_about'] = "home/lqf_about";
//         $route['e_commerce'] = "home/e_commerce";
//         $route['contact'] = "home/contact";
//         $route['requisition'] = "home/requisition";
//         $route['add_deal'] = "member/add_deal";
//         $route['reward_members'] = "member/reward_members";
//         $route['request_point'] = "member/request_point";
//         $route['bid_portal'] = "member/bid_portal";
//         $route['promoting_basic_legal_assistance'] = "home/promoting_basic_legal_assistance";
//         $route['promoting_employment_and_financial'] = "home/promoting_employment_and_financial";
//         $route['promotion_of_training_employment'] = "home/promotion_of_training_employment";
//         $route['promotion_of_basic_legal_education'] = "home/promotion_of_basic_legal_education";
//         $route['promotion_of_legal_aid_access'] = "home/promotion_of_legal_aid_access";
//         $route['promotion_of_continuing_legal_education'] = "home/promotion_of_continuing_legal_education";






//         $route['ecommerce'] = "shop/ecommerce";
//         $route['product'] = "shop/product";
//         $route['cart_summary'] = "shop/cart_summary";
//         $route['cart_checkout'] = "shop/cart_checkout";
//         $route['auth_login'] = "shop/auth_login";
//         $route['fetch_products'] = "member/fetch_products";
//         $route['orders'] = "member/orders";
//         $route['addcategories'] = "member/addcategories";
//         $route['add_delivery'] = "member/add_delivery";
//         $route['addnew_products'] = "member/addnew_products";
//         $route['process_order'] = "shop/process_order";
//         $route['update_total'] = "shop/update_total";
//         $route['update_total_pickup'] = "shop/update_total_pickup";
//         $route['complete_order/:any'] = 'shop/complete_order';
//         $route['paymentverificationsucceed'] = "shop/paymentverificationsucceed";
//         $route['paymentverificationsucceed'] = "shop/paymentverificationsucceed";



//         $route['getquote'] = "home/getquote";
//         $route['recentquotes'] = "home/recentquotes";
//         $route['add_products'] = "vendor/add_products";
//         $route['order'] = "member/order";
//         $route['billing'] = "member/billing";
//         //$route['paymentverificationsucceed'] = "member/paymentverificationsucceed";
//         $route['account_settings'] = "member/account_settings";
//         $route['cashout'] = "member/cashout";
//         $route['store'] = "member/store";
//         $route['sqbid'] = "member/sqbid";
//         $route['mystore'] = "vendor/mystore";
//         $route['checkusername'] = "member/checkusername";



//         $route['completereg'] = "home/completereg";
//         $route['blog'] = "home/blog";
//         $route['projects'] = "home/projects";
//         $route['admin'] = "home/admin";
//         $route['readmore'] = "home/readmore";
//         $route['choosepackage'] = "member/choosepackage";
//         $route['addbank'] = "member/addbank";
//         $route['chat'] = "member/chat";
//         $route['sma'] = "member/sma";
//         $route['submitticket'] = "member/submitticket";
//         $route['editprofile'] = "member/editprofile";

//         $route['collectors'] = "member/collectors";
//         $route['admin_bonus'] = "member/admin_bonus";
//         $route['transaction_history'] = "member/transaction_history";
//         $route['login'] = "home/login";
//         $route['forgotpassword'] = "home/forgotpassword";
//         $route['resetpassword'] = "home/resetpassword";
//         $route['forgotpassword'] = "home/forgotpassword";
//         //$route['verify'] = "home/verify";
//         $route['about'] = "home/about";
//         $route['addnews'] = "member/addnews";
//         $route['news'] = "member/news";

//         $route['cronmatch'] = "member/cronmatch";
//         $route['testimonials'] = "member/testimonials";
//         $route['viewtestimonial'] = "home/viewtestimonial";
//     break;
// }


    $route['default_controller'] = 'home';
    $route['404_override'] = '';
    $route['translate_uri_dashes'] = FALSE;
    $route['login'] = "home/login";
    $route['/'] = "home/login";
    $route['account_registered'] = "home/account_registered";
    $route['register'] = "home/register";
    $route['logout'] = "home/logout";
    $route['shoplogout'] = "shop/shoplogout";
    $route['super_agents'] = "home/super_agents";
    $route['terms_privacy_policy'] = "home/terms_privacy_policy";
    $route['farm_estates_scheme'] = "home/farm_estates_scheme";
    $route['premium_discount_scheme'] = "home/premium_discount_scheme";
    $route['out_growers_scheme'] = "home/out_growers_scheme";
    $route['lqf_about'] = "home/lqf_about";
    $route['e_commerce'] = "home/e_commerce";
    $route['contact'] = "home/contact";
    $route['eoi'] = "home/eoi";
    $route['requisition'] = "home/requisition";
    $route['add_deal'] = "member/add_deal";
    $route['reward_members'] = "member/reward_members";
    $route['request_point'] = "member/request_point";
    $route['bid_portal'] = "member/bid_portal";
    $route['bid_charge'] = "member/bid_charge";
    $route['ver_usrs'] = "member/ver_usrs";
    $route['farm_to_home'] = "home/farm_to_home";
    $route['sub_aggregator'] = "home/sub_aggregator";
    $route['produce_aggregator'] = "home/produce_aggregator";
    $route['proxy_farmer'] = "home/proxy_farmer";
    $route['out_grower'] = "home/out_grower";
    $route['food_processor'] = "home/food_processor";
    $route['sub_consolidator'] = "home/sub_consolidator";
    $route['value_partners'] = "home/value_partners";






    //$route['ecommerce'] = "shop/ecommerce";
    $route['product'] = "shop/product";
    $route['cart_summary'] = "shop/cart_summary";
    $route['cart_checkout'] = "shop/cart_checkout";
    $route['auth_login'] = "shop/auth_login";
    $route['fetch_products'] = "member/fetch_products";
    $route['orders'] = "member/orders";
    $route['addcategories'] = "member/addcategories";
    $route['add_delivery'] = "member/add_delivery";
    $route['addnew_products'] = "member/addnew_products";
    $route['process_order'] = "shop/process_order";
    $route['update_total'] = "shop/update_total";
    $route['update_total_pickup'] = "shop/update_total_pickup";
    $route['complete_order/:any'] = 'shop/complete_order';
    $route['paymentverificationsucceed'] = "shop/paymentverificationsucceed";
    $route['paymentverificationsuc'] = "member/paymentverificationsuc";



    $route['getquote'] = "home/getquote";
    $route['recentquotes'] = "home/recentquotes";
    $route['add_products'] = "vendor/add_products";
    $route['order'] = "member/order";
    $route['billing'] = "member/billing";
    //$route['paymentverificationsucceed'] = "member/paymentverificationsucceed";
    $route['account_settings'] = "member/account_settings";
    $route['cashout'] = "member/cashout";
    $route['store'] = "member/store";
    $route['sqbid'] = "member/sqbid";
    $route['mystore'] = "vendor/mystore";
    $route['checkusername'] = "member/checkusername";



    $route['completereg'] = "home/completereg";
    $route['blog'] = "home/blog";
    $route['projects'] = "home/projects";
    $route['admin'] = "home/admin";
    $route['readmore'] = "home/readmore";
    $route['choosepackage'] = "member/choosepackage";
    $route['addbank'] = "member/addbank";
    $route['chat'] = "member/chat";
    $route['sma'] = "member/sma";
    $route['submitticket'] = "member/submitticket";
    $route['editprofile'] = "member/editprofile";

    $route['collectors'] = "member/collectors";
    $route['admin_bonus'] = "member/admin_bonus";
    $route['transaction_history'] = "member/transaction_history";
    $route['login'] = "home/login";
    $route['forgotpassword'] = "home/forgotpassword";
    $route['resetpassword'] = "home/resetpassword";
    $route['forgotpassword'] = "home/forgotpassword";
    //$route['verify'] = "home/verify";
    $route['about'] = "home/about";
    $route['addnews'] = "member/addnews";
    $route['news'] = "member/news";

    $route['cronmatch'] = "member/cronmatch";
    $route['testimonials'] = "member/testimonials";
    $route['viewtestimonial'] = "home/viewtestimonial";
