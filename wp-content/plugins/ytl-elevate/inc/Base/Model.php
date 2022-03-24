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

    public function getProductByCode($code = '')
    {


        $product = '[
    {
        "product": {
            "code": "768",
            "nameEN": "Xiaomi 11T 5G NE",
            "nameBM": "Xiaomi 11T 5G NE",
            "shortDescriptionEN": "Xiaomi 11T 5G NE",
            "longDescriptionEN": "Enjoy 24 month installment on your new smart phone.; *RM0 upfront payment and 0% interest.;*Subject to eligibility and only for MyKad holders",
            "shortDescriptionBM": "Xiaomi 11T 5G NE",
            "longDescriptionBM": "Enjoy 24 month installment on your new smart phone.; *RM0 upfront payment and 0% interest.;*Subject to eligibility and only for MyKad holders",
            "threshold": 0,
            "balance": 10,
            "status": 1,
            "productBundleId": 100,
            "planId": "eb7bf095-fff6-d799-fd6a-3a02ad58eb13",
            "deviceId": "6e15d821-40fb-dc73-c66c-3a02ad5c6c3f",
            "isDeleted": false,
            "deleterId": null,
            "deletionTime": null,
            "lastModificationTime": null,
            "lastModifierId": null,
            "creationTime": "2022-03-18T04:42:43.9332194",
            "creatorId": "a278e69c-919b-3c62-b479-3a02485d1fa5",
            "extraProperties": {},
            "concurrencyStamp": "ca2426f4460342988e2eb5a3ad724304",
            "id": "3b26ed35-d931-b521-45fb-3a02ad829a1e"
        },
        "plan": {
            "planId": "POST99",
            "planName": "YES Postpaid FT5G RM99",
            "code": "POST99",
            "nameEN": "YES Postpaid FT5G RM99",
            "nameBM": "YES Postpaid FT5G RM99",
            "shortDescriptionEN": "Enjoy 100GB data and unlimited 5G Data in Kuala Lumpur, Cyberjaya and Putrajaya",
            "longDescriptionEN": "250GB 4G Data;Bonus: Unlimited 5G Data until 31st March 2022;Unlimited On-net Voice and Off-net Voice;Unlimited On-net SMS and pay-as-you-use Offnet SMS",
            "shortDescriptionBM": "Enjoy 100GB data and unlimited 5G Data in Kuala Lumpur, Cyberjaya and Putrajaya",
            "longDescriptionBM": "250GB 4G Data;Bonus: Unlimited 5G Data until 31st March 2022;Unlimited On-net Voice and Off-net Voice;Unlimited On-net SMS and pay-as-you-use Offnet SMS",
            "planType": "POSTPAID",
            "productBundleId": "P99",
            "isDeleted": false,
            "deleterId": null,
            "deletionTime": null,
            "lastModificationTime": null,
            "lastModifierId": null,
            "creationTime": "2022-03-18T03:57:11.4331778",
            "creatorId": "a278e69c-919b-3c62-b479-3a02485d1fa5",
            "extraProperties": {},
            "concurrencyStamp": "037f3db181a449c48236d83624d7950b",
            "id": "eb7bf095-fff6-d799-fd6a-3a02ad58eb13"
        },
        "device": {
            "code": "XIAOMI_11T_5G_NE",
            "nameEN": "Xiaomi 11T 5G NE",
            "nameBM": "Xiaomi 11T 5G NE",
            "shortDescriptionEN": "Xiaomi 11T 5G NE",
            "longDescriptionEN": "Xiaomi 11T 5G NE",
            "shortDescriptionBM": "Xiaomi 11T 5G NE",
            "longDescriptionBM": "Xiaomi 11T 5G NE",
            "sku": "string",
            "threshold": 0,
            "balance": 10,
            "status": true,
            "capacity": "8GB RAM and 256 ROM",
            "color": "Black",
            "contract": "24",
            "contractName": null,
            "tnC": "None",
            "imageURL": "https://cdn.yes.my/site/wp-content/uploads/2021/12/xiaomi_11t.png?x41595",
            "devicePriceMonth": "10",
            "planPerMonth": "10",
            "upFrontPayment": "0",
            "isDeleted": false,
            "deleterId": null,
            "deletionTime": null,
            "lastModificationTime": null,
            "lastModifierId": null,
            "creationTime": "2022-03-18T04:01:01.2225504",
            "creatorId": "a278e69c-919b-3c62-b479-3a02485d1fa5",
            "extraProperties": {},
            "concurrencyStamp": "618c7febdc9d4cef8be568e32ca110f2",
            "id": "6e15d821-40fb-dc73-c66c-3a02ad5c6c3f"
        }
    },
    {
        "product": {
            "code": "769",
            "nameEN": "Xiaomi 11T 5G NE Black",
            "nameBM": "Xiaomi 11T 5G NE Black",
            "shortDescriptionEN": "Xiaomi 11T 5G NE Black",
            "longDescriptionEN": "Enjoy 24 month installment on your new smart phone.; *RM0 upfront payment and 0% interest.;*Subject to eligibility and only for MyKad holders",
            "shortDescriptionBM": "Xiaomi 11T 5G NE Black",
            "longDescriptionBM": "Enjoy 24 month installment on your new smart phone.; *RM0 upfront payment and 0% interest.;*Subject to eligibility and only for MyKad holders",
            "threshold": 0,
            "balance": 10,
            "status": 1,
            "productBundleId": 100,
            "planId": "eb7bf095-fff6-d799-fd6a-3a02ad58eb13",
            "deviceId": "c3fd673a-7c88-21e2-76cb-3a02ae984f7c",
            "isDeleted": false,
            "deleterId": null,
            "deletionTime": null,
            "lastModificationTime": null,
            "lastModifierId": null,
            "creationTime": "2022-03-18T09:47:22.9779124",
            "creatorId": "a278e69c-919b-3c62-b479-3a02485d1fa5",
            "extraProperties": {},
            "concurrencyStamp": "7db8710d522f473d928ffa7550870199",
            "id": "1574736d-b249-d6a7-943f-3a02ae9987d7"
        },
        "plan": {
            "planId": "POST99",
            "planName": "YES Postpaid FT5G RM99",
            "code": "POST99",
            "nameEN": "YES Postpaid FT5G RM99",
            "nameBM": "YES Postpaid FT5G RM99",
            "shortDescriptionEN": "Enjoy 100GB data and unlimited 5G Data in Kuala Lumpur, Cyberjaya and Putrajaya",
            "longDescriptionEN": "250GB 4G Data;Bonus: Unlimited 5G Data until 31st March 2022;Unlimited On-net Voice and Off-net Voice;Unlimited On-net SMS and pay-as-you-use Offnet SMS",
            "shortDescriptionBM": "Enjoy 100GB data and unlimited 5G Data in Kuala Lumpur, Cyberjaya and Putrajaya",
            "longDescriptionBM": "250GB 4G Data;Bonus: Unlimited 5G Data until 31st March 2022;Unlimited On-net Voice and Off-net Voice;Unlimited On-net SMS and pay-as-you-use Offnet SMS",
            "planType": "POSTPAID",
            "productBundleId": "P99",
            "isDeleted": false,
            "deleterId": null,
            "deletionTime": null,
            "lastModificationTime": null,
            "lastModifierId": null,
            "creationTime": "2022-03-18T03:57:11.4331778",
            "creatorId": "a278e69c-919b-3c62-b479-3a02485d1fa5",
            "extraProperties": {},
            "concurrencyStamp": "037f3db181a449c48236d83624d7950b",
            "id": "eb7bf095-fff6-d799-fd6a-3a02ad58eb13"
        },
        "device": {
            "code": "XIAOMI_11T_5G_NE",
            "nameEN": "Xiaomi 11T 5G NE",
            "nameBM": "Xiaomi 11T 5G NE",
            "shortDescriptionEN": "Xiaomi 11T 5G NE",
            "longDescriptionEN": "Xiaomi 11T 5G NE",
            "shortDescriptionBM": "Xiaomi 11T 5G NE",
            "longDescriptionBM": "Xiaomi 11T 5G NE",
            "sku": "string",
            "threshold": 0,
            "balance": 10,
            "status": true,
            "capacity": "8GB RAM and 256 ROM",
            "color": "Blue",
            "contract": "24",
            "contractName": null,
            "tnC": "None",
            "imageURL": "https://cdn.yes.my/site/wp-content/uploads/2021/12/xiaomi_11t.png?x41595",
            "devicePriceMonth": "10",
            "planPerMonth": "10",
            "upFrontPayment": "0",
            "isDeleted": false,
            "deleterId": null,
            "deletionTime": null,
            "lastModificationTime": null,
            "lastModifierId": null,
            "creationTime": "2022-03-18T09:46:03.1445417",
            "creatorId": "a278e69c-919b-3c62-b479-3a02485d1fa5",
            "extraProperties": {},
            "concurrencyStamp": "60e1ff1d738242089d56ecfcf735f668",
            "id": "c3fd673a-7c88-21e2-76cb-3a02ae984f7c"
        }
    },
    {
        "product": {
            "code": "770",
            "nameEN": "Xiaomi 11T 5G NE",
            "nameBM": "Xiaomi 11T 5G NE",
            "shortDescriptionEN": "Xiaomi 11T 5G NE 36 Months",
            "longDescriptionEN": "Enjoy 24 month installment on your new smart phone.; *RM0 upfront payment and 0% interest.;*Subject to eligibility and only for MyKad holders",
            "shortDescriptionBM": "Xiaomi 11T 5G NE 36 Months",
            "longDescriptionBM": "Enjoy 24 month installment on your new smart phone.; *RM0 upfront payment and 0% interest.;*Subject to eligibility and only for MyKad holders",
            "threshold": 0,
            "balance": 5,
            "status": 1,
            "productBundleId": 100,
            "planId": "eb7bf095-fff6-d799-fd6a-3a02ad58eb13",
            "deviceId": "e2dc5629-8d69-f7fa-2744-3a02aebc610b",
            "isDeleted": false,
            "deleterId": null,
            "deletionTime": null,
            "lastModificationTime": null,
            "lastModifierId": null,
            "creationTime": "2022-03-18T10:27:23.7585152",
            "creatorId": "a278e69c-919b-3c62-b479-3a02485d1fa5",
            "extraProperties": {},
            "concurrencyStamp": "c47597b32bc241e290988f84a21c80db",
            "id": "c3d0a192-7bcb-5e25-b10c-3a02aebe29e5"
        },
        "plan": {
            "planId": "POST99",
            "planName": "YES Postpaid FT5G RM99",
            "code": "POST99",
            "nameEN": "YES Postpaid FT5G RM99",
            "nameBM": "YES Postpaid FT5G RM99",
            "shortDescriptionEN": "Enjoy 100GB data and unlimited 5G Data in Kuala Lumpur, Cyberjaya and Putrajaya",
            "longDescriptionEN": "250GB 4G Data;Bonus: Unlimited 5G Data until 31st March 2022;Unlimited On-net Voice and Off-net Voice;Unlimited On-net SMS and pay-as-you-use Offnet SMS",
            "shortDescriptionBM": "Enjoy 100GB data and unlimited 5G Data in Kuala Lumpur, Cyberjaya and Putrajaya",
            "longDescriptionBM": "250GB 4G Data;Bonus: Unlimited 5G Data until 31st March 2022;Unlimited On-net Voice and Off-net Voice;Unlimited On-net SMS and pay-as-you-use Offnet SMS",
            "planType": "POSTPAID",
            "productBundleId": "P99",
            "isDeleted": false,
            "deleterId": null,
            "deletionTime": null,
            "lastModificationTime": null,
            "lastModifierId": null,
            "creationTime": "2022-03-18T03:57:11.4331778",
            "creatorId": "a278e69c-919b-3c62-b479-3a02485d1fa5",
            "extraProperties": {},
            "concurrencyStamp": "037f3db181a449c48236d83624d7950b",
            "id": "eb7bf095-fff6-d799-fd6a-3a02ad58eb13"
        },
        "device": {
            "code": "XIAOMI_11T_5G_NE_36",
            "nameEN": "Xiaomi 11T 5G NE",
            "nameBM": "Xiaomi 11T 5G NE",
            "shortDescriptionEN": "Xiaomi 11T 5G NE",
            "longDescriptionEN": "Xiaomi 11T 5G NE",
            "shortDescriptionBM": "Xiaomi 11T 5G NE",
            "longDescriptionBM": "Xiaomi 11T 5G NE",
            "sku": "string",
            "threshold": 0,
            "balance": 10,
            "status": true,
            "capacity": "8GB RAM and 256 ROM",
            "color": "Black",
            "contract": "36",
            "contractName": null,
            "tnC": "None",
            "imageURL": "https://cdn.yes.my/site/wp-content/uploads/2021/12/xiaomi_11t.png?x41595",
            "devicePriceMonth": "10",
            "planPerMonth": "10",
            "upFrontPayment": "0",
            "isDeleted": false,
            "deleterId": null,
            "deletionTime": null,
            "lastModificationTime": null,
            "lastModifierId": null,
            "creationTime": "2022-03-18T10:25:26.8275158",
            "creatorId": "a278e69c-919b-3c62-b479-3a02485d1fa5",
            "extraProperties": {},
            "concurrencyStamp": "1d507fcd10084b7389d33bfb941a96ec",
            "id": "e2dc5629-8d69-f7fa-2744-3a02aebc610b"
        }
    },
    {
        "product": {
            "code": "771",
            "nameEN": "Xiaomi 11T 5G NE",
            "nameBM": "Xiaomi 11T 5G NE",
            "shortDescriptionEN": "Xiaomi 11T 5G NE",
            "longDescriptionEN": "",
            "shortDescriptionBM": "Xiaomi 11T 5G NE",
            "longDescriptionBM": "",
            "threshold": 0,
            "balance": 10,
            "status": 1,
            "productBundleId": 100,
            "planId": "eb7bf095-fff6-d799-fd6a-3a02ad58eb13",
            "deviceId": "fd391e67-671b-4398-da2a-3a02c182ad18",
            "isDeleted": false,
            "deleterId": null,
            "deletionTime": null,
            "lastModificationTime": null,
            "lastModifierId": null,
            "creationTime": "2022-03-22T01:57:42.0588198",
            "creatorId": "a278e69c-919b-3c62-b479-3a02485d1fa5",
            "extraProperties": {},
            "concurrencyStamp": "e348d88ae44843b2ac844c16f6fb677b",
            "id": "b636faf9-4fe4-6642-4a94-3a02c184f60d"
        },
        "plan": {
            "planId": "POST99",
            "planName": "YES Postpaid FT5G RM99",
            "code": "POST99",
            "nameEN": "YES Postpaid FT5G RM99",
            "nameBM": "YES Postpaid FT5G RM99",
            "shortDescriptionEN": "Enjoy 100GB data and unlimited 5G Data in Kuala Lumpur, Cyberjaya and Putrajaya",
            "longDescriptionEN": "250GB 4G Data;Bonus: Unlimited 5G Data until 31st March 2022;Unlimited On-net Voice and Off-net Voice;Unlimited On-net SMS and pay-as-you-use Offnet SMS",
            "shortDescriptionBM": "Enjoy 100GB data and unlimited 5G Data in Kuala Lumpur, Cyberjaya and Putrajaya",
            "longDescriptionBM": "250GB 4G Data;Bonus: Unlimited 5G Data until 31st March 2022;Unlimited On-net Voice and Off-net Voice;Unlimited On-net SMS and pay-as-you-use Offnet SMS",
            "planType": "POSTPAID",
            "productBundleId": "P99",
            "isDeleted": false,
            "deleterId": null,
            "deletionTime": null,
            "lastModificationTime": null,
            "lastModifierId": null,
            "creationTime": "2022-03-18T03:57:11.4331778",
            "creatorId": "a278e69c-919b-3c62-b479-3a02485d1fa5",
            "extraProperties": {},
            "concurrencyStamp": "037f3db181a449c48236d83624d7950b",
            "id": "eb7bf095-fff6-d799-fd6a-3a02ad58eb13"
        },
        "device": {
            "code": "XIAOMI_11T_5G_NE_36",
            "nameEN": "Xiaomi 11T 5G NE",
            "nameBM": "Xiaomi 11T 5G NE",
            "shortDescriptionEN": "Xiaomi 11T 5G NE",
            "longDescriptionEN": "Xiaomi 11T 5G NE",
            "shortDescriptionBM": "Xiaomi 11T 5G NE",
            "longDescriptionBM": "Xiaomi 11T 5G NE",
            "sku": "string",
            "threshold": 0,
            "balance": 10,
            "status": true,
            "capacity": "8GB RAM and 256 ROM",
            "color": "Black",
            "contract": "12",
            "contractName": "Normal",
            "tnC": "None",
            "imageURL": "https://cdn.yes.my/site/wp-content/uploads/2021/12/xiaomi_11t.png?x41595",
            "devicePriceMonth": "10",
            "planPerMonth": "10",
            "upFrontPayment": "0",
            "isDeleted": false,
            "deleterId": null,
            "deletionTime": null,
            "lastModificationTime": null,
            "lastModifierId": null,
            "creationTime": "2022-03-22T01:55:12.411568",
            "creatorId": "a278e69c-919b-3c62-b479-3a02485d1fa5",
            "extraProperties": {},
            "concurrencyStamp": "95a00bff91c34e099dc2aceddf79fb69",
            "id": "fd391e67-671b-4398-da2a-3a02c182ad18"
        }
    },
    {
        "product": {
            "code": "772",
            "nameEN": "Xiaomi 11T 5G NE",
            "nameBM": "Xiaomi 11T 5G NE",
            "shortDescriptionEN": "Xiaomi 11T 5G NE",
            "longDescriptionEN": "",
            "shortDescriptionBM": "Xiaomi 11T 5G NE",
            "longDescriptionBM": "",
            "threshold": 0,
            "balance": 10,
            "status": 1,
            "productBundleId": 100,
            "planId": "eb7bf095-fff6-d799-fd6a-3a02ad58eb13",
            "deviceId": "2febd9d6-011e-8e86-ae84-3a02c18368e5",
            "isDeleted": false,
            "deleterId": null,
            "deletionTime": null,
            "lastModificationTime": null,
            "lastModifierId": null,
            "creationTime": "2022-03-22T01:58:01.2979311",
            "creatorId": "a278e69c-919b-3c62-b479-3a02485d1fa5",
            "extraProperties": {},
            "concurrencyStamp": "00d86f3a01d94a2488125c74c8ffde08",
            "id": "8b9692f4-e24c-38c0-7121-3a02c185414b"
        },
        "plan": {
            "planId": "POST99",
            "planName": "YES Postpaid FT5G RM99",
            "code": "POST99",
            "nameEN": "YES Postpaid FT5G RM99",
            "nameBM": "YES Postpaid FT5G RM99",
            "shortDescriptionEN": "Enjoy 100GB data and unlimited 5G Data in Kuala Lumpur, Cyberjaya and Putrajaya",
            "longDescriptionEN": "250GB 4G Data;Bonus: Unlimited 5G Data until 31st March 2022;Unlimited On-net Voice and Off-net Voice;Unlimited On-net SMS and pay-as-you-use Offnet SMS",
            "shortDescriptionBM": "Enjoy 100GB data and unlimited 5G Data in Kuala Lumpur, Cyberjaya and Putrajaya",
            "longDescriptionBM": "250GB 4G Data;Bonus: Unlimited 5G Data until 31st March 2022;Unlimited On-net Voice and Off-net Voice;Unlimited On-net SMS and pay-as-you-use Offnet SMS",
            "planType": "POSTPAID",
            "productBundleId": "P99",
            "isDeleted": false,
            "deleterId": null,
            "deletionTime": null,
            "lastModificationTime": null,
            "lastModifierId": null,
            "creationTime": "2022-03-18T03:57:11.4331778",
            "creatorId": "a278e69c-919b-3c62-b479-3a02485d1fa5",
            "extraProperties": {},
            "concurrencyStamp": "037f3db181a449c48236d83624d7950b",
            "id": "eb7bf095-fff6-d799-fd6a-3a02ad58eb13"
        },
        "device": {
            "code": "XIAOMI_11T_5G_NE_36",
            "nameEN": "Xiaomi 11T 5G NE",
            "nameBM": "Xiaomi 11T 5G NE",
            "shortDescriptionEN": "Xiaomi 11T 5G NE",
            "longDescriptionEN": "Xiaomi 11T 5G NE",
            "shortDescriptionBM": "Xiaomi 11T 5G NE",
            "longDescriptionBM": "Xiaomi 11T 5G NE",
            "sku": "string",
            "threshold": 0,
            "balance": 10,
            "status": true,
            "capacity": "8GB RAM and 256 ROM",
            "color": "Blue",
            "contract": "12",
            "contractName": "Normal",
            "tnC": "None",
            "imageURL": "https://cdn.yes.my/site/wp-content/uploads/2021/12/xiaomi_11t.png?x41595",
            "devicePriceMonth": "10",
            "planPerMonth": "10",
            "upFrontPayment": "0",
            "isDeleted": false,
            "deleterId": null,
            "deletionTime": null,
            "lastModificationTime": null,
            "lastModifierId": null,
            "creationTime": "2022-03-22T01:56:00.3633228",
            "creatorId": "a278e69c-919b-3c62-b479-3a02485d1fa5",
            "extraProperties": {},
            "concurrencyStamp": "2f9067dbafa7455493f652ee2cefd113",
            "id": "2febd9d6-011e-8e86-ae84-3a02c18368e5"
        }
    },
    {
        "product": {
            "code": "768",
            "nameEN": "Xiaomi 11T 5G NE",
            "nameBM": "Xiaomi 11T 5G NE",
            "shortDescriptionEN": "Xiaomi 11T 5G NE",
            "longDescriptionEN": "Enjoy 24 month installment on your new smart phone.;*RM0 upfront payment and 0% interest.;*Subject to eligibility and only for MyKad holders",
            "shortDescriptionBM": "Xiaomi 11T 5G NE",
            "longDescriptionBM": "Enjoy 24 month installment on your new smart phone.;*RM0 upfront payment and 0% interest.;*Subject to eligibility and only for MyKad holders",
            "threshold": 0,
            "balance": 10,
            "status": 1,
            "productBundleId": 100,
            "planId": "eb7bf095-fff6-d799-fd6a-3a02ad58eb13",
            "deviceId": "fcf52d27-e52b-6b3a-d970-3a02c31f65e1",
            "isDeleted": false,
            "deleterId": null,
            "deletionTime": null,
            "lastModificationTime": null,
            "lastModifierId": null,
            "creationTime": "2022-03-22T09:28:12.6652394",
            "creatorId": "a278e69c-919b-3c62-b479-3a02485d1fa5",
            "extraProperties": {},
            "concurrencyStamp": "69452dc83916450f930c64b7e20202bc",
            "id": "45888c32-1dbb-d135-a5f0-3a02c3216a73"
        },
        "plan": {
            "planId": "POST99",
            "planName": "YES Postpaid FT5G RM99",
            "code": "POST99",
            "nameEN": "YES Postpaid FT5G RM99",
            "nameBM": "YES Postpaid FT5G RM99",
            "shortDescriptionEN": "Enjoy 100GB data and unlimited 5G Data in Kuala Lumpur, Cyberjaya and Putrajaya",
            "longDescriptionEN": "250GB 4G Data;Bonus: Unlimited 5G Data until 31st March 2022;Unlimited On-net Voice and Off-net Voice;Unlimited On-net SMS and pay-as-you-use Offnet SMS",
            "shortDescriptionBM": "Enjoy 100GB data and unlimited 5G Data in Kuala Lumpur, Cyberjaya and Putrajaya",
            "longDescriptionBM": "250GB 4G Data;Bonus: Unlimited 5G Data until 31st March 2022;Unlimited On-net Voice and Off-net Voice;Unlimited On-net SMS and pay-as-you-use Offnet SMS",
            "planType": "POSTPAID",
            "productBundleId": "P99",
            "isDeleted": false,
            "deleterId": null,
            "deletionTime": null,
            "lastModificationTime": null,
            "lastModifierId": null,
            "creationTime": "2022-03-18T03:57:11.4331778",
            "creatorId": "a278e69c-919b-3c62-b479-3a02485d1fa5",
            "extraProperties": {},
            "concurrencyStamp": "037f3db181a449c48236d83624d7950b",
            "id": "eb7bf095-fff6-d799-fd6a-3a02ad58eb13"
        },
        "device": {
            "code": "XIAOMI_11T_5G_NE_36",
            "nameEN": "Xiaomi 11T 5G NE",
            "nameBM": "Xiaomi 11T 5G NE",
            "shortDescriptionEN": "Xiaomi 11T 5G NE",
            "longDescriptionEN": "Xiaomi 11T 5G NE",
            "shortDescriptionBM": "Xiaomi 11T 5G NE",
            "longDescriptionBM": "Xiaomi 11T 5G NE",
            "sku": "string",
            "threshold": 0,
            "balance": 10,
            "status": true,
            "capacity": "8GB RAM and 256 ROM",
            "color": "Blue",
            "contract": "36",
            "contractName": null,
            "tnC": "None",
            "imageURL": "https://cdn.yes.my/site/wp-content/uploads/2021/12/xiaomi_11t.png?x41595",
            "devicePriceMonth": "10",
            "planPerMonth": "10",
            "upFrontPayment": "0",
            "isDeleted": false,
            "deleterId": null,
            "deletionTime": null,
            "lastModificationTime": null,
            "lastModifierId": null,
            "creationTime": "2022-03-22T09:26:00.5687054",
            "creatorId": "a278e69c-919b-3c62-b479-3a02485d1fa5",
            "extraProperties": {},
            "concurrencyStamp": "d029a9fc2afb4a25881baa95fe624164",
            "id": "fcf52d27-e52b-6b3a-d970-3a02c31f65e1"
        }
    }
]';
        $product = self::refinde($product);
//        print_r($product);die();

        return $product;

        $products = self::getProductsData();
        foreach ($products['items'] as $k => $v) {
            if ($code == $v['code']) {
                return $v;
            }
        }
        return false;
    }

    public static function refinde($product)
    {

        $products = json_decode($product, true);

        foreach ($products as $k=>$v){
            $products[$k]['product']['longDescriptionEN'] = explode(';',$products[$k]['product']['longDescriptionEN']);
            $products[$k]['product']['longDescriptionBM'] = explode(';',$products[$k]['product']['longDescriptionBM']);

            $products[$k]['plan']['longDescriptionEN'] = explode(';',$products[$k]['plan']['longDescriptionEN']);
            $products[$k]['plan']['longDescriptionBM'] = explode(';',$products[$k]['plan']['longDescriptionBM']);

            $products[$k]['device']['longDescriptionEN'] = explode(';',$products[$k]['device']['longDescriptionEN']);
            $products[$k]['device']['longDescriptionBM'] = explode(';',$products[$k]['device']['longDescriptionBM']);

            $products[$k]['device']['productNoteEN'] = $products[$k]['product']['longDescriptionEN'];
            $products[$k]['device']['productNoteBM'] = $products[$k]['product']['longDescriptionBM'];
        }

        $first = $products[0]['device'];
        $first ['productCode'] = $products[0]['product']['code'];
        $first ['plan'] = $products[0]['plan'];

        $processed = array();
        $processed['selected'] = $first;

        $colors = array();
        $images = array();
        foreach ($products as $k => $v) {
            $c = self::createSlug($v['device']['color']);
            $tmp = $v['device'];
            $tmp['productCode'] = $v['product']['code'];
            $tmp['plan'] =  $v['plan'];
            $colors[$c][] = $tmp;

        }
        $processed['colors'] = $colors;

        foreach ($processed['colors'] as $k=>$c){
            $img = $tmp['imageURL'];
            if(!in_array($img,$images)){
                $images[] = array('color'=>$k,'img'=>$img);
            }
        }

        $processed['images'] = $images;

        return $processed;
    }

    public static function getEligibility($hash)
    {
        $table = self::$wpdb->prefix . "elevate_eligibility";
        $sql = "SELECT * FROM `$table` WHERE hash='$hash'";

        $rows = self::$wpdb->get_results($sql);
        $item = $rows[0];
        return $item;
    }

    public static function addEligibility($data)
    {
        $table = self::$wpdb->prefix . "elevate_eligibility";

        $sql = "INSERT INTO `" . $table . "` 
		(`mykad`,`name`,`email`,`phone`,`hash`,`status`,`created_at`)
		VALUES 
		('" . $data['mykad'] . "','" . $data['name'] . "','" . $data['email'] . "','" . $data['phone'] . "','" . $data['hash'] . "',0,'" . date("Y-m-d H:i:s") . "')";

        self::$wpdb->query($sql);
        $lastid = self::$wpdb->insert_id;
        return $lastid;
    }

    public static function updateEligibility($hash, $status)
    {
        $table = self::$wpdb->prefix . "elevate_eligibility";

        $sql = "UPDATE " . $table . " 
		SET status='" . intval($status) . "' WHERE hash='" . $hash . "'";

        self::$wpdb->query($sql);
    }

    public static function createSlug($str, $delimiter = '-')
    {

        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return strtolower($slug);

    }


}