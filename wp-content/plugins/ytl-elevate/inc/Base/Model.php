<?php
/**
 * @package elevate
 */

namespace Inc\Base;

use \Inc\Base\BaseController;
use \Inc\Api\ElevateApi;

class Model extends BaseController
{
    private static $wpdb;

    public function __construct()
    {
        global $wpdb;
        self::$wpdb = $wpdb;
    }

    /**
     * Creating database tables
     */
    public static function plugin_install()
    {
        $table = self::$wpdb->prefix . "elevate_eligibility";
        $sql_create = "
		CREATE TABLE `$table` (
          `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
          `mykad` varchar(150) NOT NULL,
          `name` varchar(150) NOT NULL,
          `email` varchar(150) NOT NULL,
          `phone` varchar(150) NOT NULL, 
          `hash` varchar(200) NOT NULL,   
          `status` int(1) DEFAULT 0,   
          `created_at` timestamp NOT NULL,
          `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8;		 
		";
        self::$wpdb->query($sql_create);

    }

    public function updateAPISettings($data)
    {
        update_option('elevate_api_setting', serialize($data));
    }

    public function getAPISettings()
    {
        $options = array();
        $data = get_option('elevate_api_setting');
        if ($data) {
            $options = unserialize($data);
        }
        return $options;
    }

    public function getProductsData()
    {
        $products = array();
        $data = get_option('elevate_products_data');
        //die($data);
        if ($data) {
            $products = unserialize($data);
        }
        return $products;
    }

    public function pullProductData()
    {
        update_option('elevate_product_pull_date', date('Y-m-d H:i:s'));
        $products = \Inc\Api\ElevateApi::pullProducts();

        update_option('elevate_products_data', serialize($products));
    }

    public function getProductByCode($code='')
    {


        $product = array(
            'productID' => "p01",
            'code' => "c01",
            'nameEN' => "XIAOMI 11T 5G NE",
            'nameBM' => "XIAOMI 11T 5G NE",
            'shortDescriptionEN' => " ",
            'longDescriptionEN' => array(
                'PlanDetails'=> array(
                    ''
                )
            ),
            'planType' => "postpaid",
            'planID' => "695",
            'productBundleId' => "string",
            'planName' => "Yes Postpaid FT5G",
            'sku' => "sku01",
            'threshold' => "0",
            'balance' => "0",
            'status' => "1",
            'program' => "string",
            'capacity' => "8 RAM and 256 ROM",
            'color' => array("black","silver","white"),
            'contract' => array(
                array('id'=>848, 'name'=>'Elevate 24 months'),
                array('id'=>698, 'name'=>'Elevate 36 months'),
                array('id'=>695, 'name'=>'Normal contract'),
            ),
            'tnC' => "",
            'imageURL' => array(
                "p1.png",
                "p2.png",
                "p3.png",
            ),
            'devicePrice' => "100",
            'devicePriceMonth' => "50",
            'planPerMonth' => "50",
            'upFrontPayment' => "70",
            'isDeleted' => "",
            'deleterId' => "",
            'deletionTime' => "",
            'lastModificationTime' => "2022-03-09T11:14:41.627592",
            'lastModifierId' => "a278e69c-919b-3c62-b479-3a02485d1fa5",
            'creationTime' => "2022-03-02T08:01:13.301808",
            'creatorId' => "",
            'id' => "2ed171cf-a55b-86c0-fed4-3a025bd293d3",
        );
        return self::refinde($product);

        $products = self::getProductsData();
        foreach ($products['items'] as $k => $v) {
            if ($code == $v['code']) {
                return $v;
            }
        }
        return false;
    }

    public static function refinde($product){
        return $product;
    }

    public static function getEligibility($hash){
        $table = self::$wpdb->prefix . "elevate_eligibility";
        $sql = "SELECT * FROM `$table` WHERE hash='$hash'";

        $rows = self::$wpdb->get_results($sql);
        $item = $rows[0];
        return $item;
    }
    public static function addEligibility($data){
        $table = self::$wpdb->prefix . "elevate_eligibility";

        $sql = "INSERT INTO `".$table."` 
		(`mykad`,`name`,`email`,`phone`,`hash`,`status`,`created_at`)
		VALUES 
		('".$data['mykad']."','".$data['name']."','".$data['email']."','".$data['phone']."','".$data['hash']."',0,'".date("Y-m-d H:i:s")."')";

        self::$wpdb->query($sql);
        $lastid =  self::$wpdb->insert_id;
        return $lastid;
    }

    public static function updateEligibility($hash,$status) {
        $table = self::$wpdb->prefix . "elevate_eligibility";

        $sql = "UPDATE ".$table." 
		SET status='".intval($status)."' WHERE hash='".$hash."'";

        self::$wpdb->query($sql);
    }


}