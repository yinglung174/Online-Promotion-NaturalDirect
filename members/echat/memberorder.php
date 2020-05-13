<?php
session_start();
date_default_timezone_set("Asia/Hong_Kong");
include("../echat/connect.php");
include '../db.php';
?>
<?php
if (isset($_GET["order"]) && !empty($_GET["order"])) {
    $No = $_SESSION['No'];
    $date = date("d/m/Y");
    $code1 = $_GET['code1'];
    $num = $_GET['num'];
    $item_total = $_GET['item_total'];
    $order = "INSERT INTO product_order VALUES('','$code1','$num','$No','$item_total','$date') ";
    $resultQ = mysql_query($order) or die(mysql_error());
    if ($order) {
        echo "Order successfully!";
        unset($_SESSION['carts'][$code1]);
    }
}
// check if action is set and not empty
if (isset($_GET["action"]) && !empty($_GET["action"])) {

    if (!isset($_SESSION['carts'])) {
        $_SESSION['carts'] = array();
    }
    $action = $_GET["action"];
    switch ($action) { //decide what to do 
        case "add":
            // get the code from  input form using $_GET
            $code = $_GET["code"];
            // get the quantity from the input form using $_GET
            $quantity = $_GET["quantity"];
            if (!isset($_SESSION['carts'][$code])) {
                $_SESSION['carts'][$code] = "0";
            }
            // add the quantity of the product with id $code 
            $_SESSION['carts'][$code] += $quantity;
            break;

        case "remove":
            // get the code from  input form using $_GET
            $code = $_GET["code"];
            // get the quantity from the input form using $_GET
            $quantity = $_GET["quantity"];
            // remove  from the quantity of the product with id $code
            // if the quantity less than zero, remove it completely (using the 'unset' function) 
            // - otherwise is will show zero, then -1, -2 etc when the user keeps removing items. 

            $_SESSION['carts'][$code] -= $quantity;


            if ($_SESSION['carts'][$code] < 1) {
                unset($_SESSION['carts'][$code]);
            }
            break;
    }
}
?>
<html class="">

    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">


        <meta charset="utf-8">
        <title>online | Profile</title>
        <meta name="fb_admins_meta_tag" content="">
        <link rel="shortcut icon" href="../image/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="../image/favicon.ico" type="image/x-icon">
        <meta http-equiv="X-Wix-Renderer-Server" content="app203.vae.aws">
        <meta http-equiv="X-Wix-Meta-Site-Id" content="3e2b07b3-025b-4cdf-980a-d42eaebe49aa">
        <meta http-equiv="X-Wix-Application-Instance-Id" content="6473730b-435a-4672-9c22-a84f847d1fe3">
        <meta http-equiv="X-Wix-Published-Version" content="18">

        <meta http-equiv="etag" content="5da9e34a7ae1c33e31cfd4e3dd2b60ee">
        <meta property="og:title" content="online">
        <meta property="og:type" content="article">
        <meta property="og:url" content="home.php">
        <meta property="og:site_name" content="online">
        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">

        <meta id="wixMobileViewport" name="viewport" content="width=980, user-scalable=yes">





        <script>
            // BEAT MESSAGE
            try {
                window.wixBiSession = {
                    initialTimestamp: Date.now(),
                    viewerSessionId: 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
                        var r = Math.random() * 16 | 0,
                                v = c == 'x' ? r : (r & 0x3 | 0x8);
                        return v.toString(16);
                    })
                };
                (new Image()).src = 'http://frog.wix.com/bt?src=29&evid=3&pn=1&et=1&v=1.1800.14&msid=3e2b07b3-025b-4cdf-980a-d42eaebe49aa&vsi=' + wixBiSession.viewerSessionId +
                        '&url=' + encodeURIComponent(location.href.replace(/^http(s)?:\/\/(www\.)?/, '')) +
                        '&isp=0&st=2&ts=0&c=' + wixBiSession.initialTimestamp;
            } catch (e) {
            }
            // BEAT MESSAGE END
        </script>



        <!-- META DATA -->
        <script type="text/javascript">
            var serviceTopology = {
                "serverName": "app203.vae.aws",
                "cacheKillerVersion": "1",
                "staticServerUrl": "http://static.parastorage.com/",
                "usersScriptsRoot": "http://static.parastorage.com/services/wix-users/2.643.0",
                "biServerUrl": "http://frog.wix.com/",
                "userServerUrl": "http://users.wix.com/",
                "billingServerUrl": "http://premium.wix.com/",
                "mediaRootUrl": "http://static.wixstatic.com/",
                "logServerUrl": "http://frog.wix.com/plebs",
                "monitoringServerUrl": "http://TODO/",
                "usersClientApiUrl": "https://users.wix.com/wix-users",
                "publicStaticBaseUri": "http://static.parastorage.com/services/wix-public/1.215.0",
                "basePublicUrl": "http://www.wix.com/",
                "postLoginUrl": "http://www.wix.com/my-account",
                "postSignUpUrl": "http://www.wix.com/new/account",
                "baseDomain": "wix.com",
                "staticMediaUrl": "https://static.wixstatic.com/media",
                "staticAudioUrl": "https://media.wix.com/mp3",
                "emailServer": "http://assets.wix.com/common-services/notification/invoke",
                "blobUrl": "https://static.parastorage.com/wix_blob",
                "htmlEditorUrl": "http://editor.wix.com/html",
                "siteMembersUrl": "https://users.wix.com/wix-sm",
                "scriptsLocationMap": {
                    "wixapps": "https://static.parastorage.com/services/wixapps/2.486.0",
                    "tpa": "https://static.parastorage.com/services/tpa/2.1062.0",
                    "santa-resources": "https://static.parastorage.com/services/santa-resources/1.2.0",
                    "wix-code-sdk": "https://static.parastorage.com/services/js-wixcode-sdk/1.43.0",
                    "bootstrap": "https://static.parastorage.com/services/bootstrap/2.1229.56",
                    "ck-editor": "https://static.parastorage.com/services/ck-editor/1.87.3",
                    "it": "https://static.parastorage.com/services/experiments/it/1.37.0",
                    "santa": "https://static.parastorage.com/services/santa/1.1800.14",
                    "dbsm-editor-app": "https://static.parastorage.com/services/dbsm-editor-app/1.86.0",
                    "skins": "https://static.parastorage.com/services/skins/2.1229.56",
                    "core": "https://static.parastorage.com/services/core/2.1229.56",
                    "sitemembers": "https://static.parastorage.com/services/sm-js-sdk/1.31.0",
                    "automation": "https://static.parastorage.com/services/automation/1.23.0",
                    "web": "https://static.parastorage.com/services/web/2.1229.56",
                    "dbsm-viewer-app": "https://static.parastorage.com/services/dbsm-viewer-app/1.30.0",
                    "ecommerce": "https://static.parastorage.com/services/ecommerce/1.203.0",
                    "hotfixes": "https://static.parastorage.com/services/experiments/hotfixes/1.15.0",
                    "langs": "https://static.parastorage.com/services/langs/2.568.0",
                    "santa-versions": "https://static.parastorage.com/services/santa-versions/1.419.0",
                    "ut": "https://static.parastorage.com/services/experiments/ut/1.2.0"
                },
                "developerMode": false,
                "productionMode": true,
                "staticServerFallbackUrl": "https://sslstatic.wix.com/",
                "staticVideoUrl": "http://video.wixstatic.com/",
                "scriptsDomainUrl": "https://static.parastorage.com/",
                "userFilesUrl": "http://static.parastorage.com/",
                "staticHTMLComponentUrl": "http://hkwepaint.wixsite.com.usrfiles.com/",
                "secured": false,
                "ecommerceCheckoutUrl": "https://www.safer-checkout.com/",
                "premiumServerUrl": "https://premium.wix.com/",
                "appRepoUrl": "http://assets.wix.com/wix-lists-ds-webapp",
                "digitalGoodsServerUrl": "http://dgs.wixapps.net/",
                "wixCloudBaseDomain": "wix-code.com",
                "mailServiceSuffix": "/_api/common-services/notification/invoke",
                "staticVideoHeadRequestUrl": "http://storage.googleapis.com/video.wixstatic.com",
                "protectedPageResolverUrl": "https://site-pages.wix.com/_api/wix-public-html-info-webapp/resolve_protected_page_urls",
                "publicStaticsUrl": "http://static.parastorage.com/services/wix-public/1.215.0",
                "staticDocsUrl": "http://media.wix.com/ugd"
            };
            var santaModels = true;
            var rendererModel = {
                "metaSiteId": "3e2b07b3-025b-4cdf-980a-d42eaebe49aa",
                "siteInfo": {
                    "documentType": "UGC",
                    "applicationType": "HtmlWeb",
                    "siteId": "6473730b-435a-4672-9c22-a84f847d1fe3",
                    "siteTitleSEO": "online"
                },
                "clientSpecMap": {
                    "17": {
                        "type": "public",
                        "applicationId": 17,
                        "appDefinitionId": "1375baa8-8eca-5659-ce9d-455b2009250d",
                        "appDefinitionName": "Wix Get Subscribers",
                        "instance": "xHhGVxR5GRx_2DV1hLPZmE3aBwxUzrvWRiM9ASX9WVM.eyJpbnN0YW5jZUlkIjoiOWExOGY0YjgtNGM5MC00MmY1LWEwNTUtOTY1MWU0NjZlYjc1Iiwic2lnbkRhdGUiOiIyMDE2LTEwLTE1VDA1OjA5OjUwLjAwNloiLCJ1aWQiOm51bGwsImlwQW5kUG9ydCI6IjEyMy4yMDMuNjIuMjIxLzQxMTM2IiwidmVuZG9yUHJvZHVjdElkIjpudWxsLCJkZW1vTW9kZSI6ZmFsc2UsIm9yaWdpbkluc3RhbmNlSWQiOiIzZmI1ZmQ4Zi1mMzZhLTQyODQtODdlYS0zYmEwYzY2ZDY3ODkiLCJhaWQiOiI4ZmNlNTZkNS1hZTljLTRlNWEtOWQ1OC04YjQ2MDY4ZmU4ODAiLCJiaVRva2VuIjoiYTQzM2YzMGItNGVjYi0wZTJhLTM4NWYtNDI3ZjRhZDhhMmRmIiwic2l0ZU93bmVySWQiOiI0MjUxYTlhNy1hMTVjLTQzNWUtYjBkNS0zNGIwNjUzZTZmMDIifQ",
                        "sectionPublished": true,
                        "sectionMobilePublished": false,
                        "sectionSeoEnabled": true,
                        "widgets": {
                            "1375babd-6f2b-87ed-ff19-5778602c8b86": {
                                "widgetUrl": "http:\/\/apps.wix.com\/shoutout-get-subscriber-server-webapp\/statics\/index",
                                "widgetId": "1375babd-6f2b-87ed-ff19-5778602c8b86",
                                "refreshOnWidthChange": true,
                                "mobileUrl": "http:\/\/apps.wix.com\/shoutout-get-subscriber-server-webapp\/statics\/index",
                                "published": true,
                                "mobilePublished": true,
                                "seoEnabled": true,
                                "preFetch": false
                            }
                        },
                        "appRequirements": {
                            "requireSiteMembers": false
                        },
                        "isWixTPA": true,
                        "installedAtDashboard": false,
                        "permissions": {
                            "revoked": false
                        }
                    },
                    "2": {
                        "type": "appbuilder",
                        "applicationId": 2,
                        "appDefinitionId": "3d590cbc-4907-4cc4-b0b1-ddf2c5edf297",
                        "instanceId": "147c5ec4-f5aa-7f34-3ce1-36c7e08eb938",
                        "state": "Initialized"
                    },
                    "13": {
                        "type": "sitemembers",
                        "applicationId": 13,
                        "collectionType": "Open",
                        "collectionFormFace": "Register",
                        "smcollectionId": "5cea1e03-abbc-4dd1-8c7d-41fb0670dd0a"
                    },
                    "16": {
                        "type": "public",
                        "applicationId": 16,
                        "appDefinitionId": "1380b703-ce81-ff05-f115-39571d94dfcd",
                        "appDefinitionName": "Wix Stores",
                        "instance": "48K1g4JxoSdi5ukjbcNO9LZDA_gh6EaQpJ4oS1z_ZXc.eyJpbnN0YW5jZUlkIjoiMDM3YmQ0MWItNTA5ZC00NzEzLWExMTUtMzg2NTA5ZWExZWRjIiwic2lnbkRhdGUiOiIyMDE2LTEwLTE1VDA1OjA5OjUwLjAwNloiLCJ1aWQiOm51bGwsImlwQW5kUG9ydCI6IjEyMy4yMDMuNjIuMjIxLzQxMTM2IiwidmVuZG9yUHJvZHVjdElkIjpudWxsLCJkZW1vTW9kZSI6ZmFsc2UsIm9yaWdpbkluc3RhbmNlSWQiOiI1NTUwODk3YS00MTNhLTRkNGMtYjc4Ny03NGZiYjQyMTU4M2IiLCJhaWQiOiJkMTYzNWRiYy1hMzNjLTQ5OGYtOTQ1Yi1iMmMyN2Q0NGZiNDkiLCJiaVRva2VuIjoiM2Q1MGQzYTgtNTJjNi0wYmNjLTM5MWYtZWM0YmE3NTQ1Nzc2Iiwic2l0ZU93bmVySWQiOiI0MjUxYTlhNy1hMTVjLTQzNWUtYjBkNS0zNGIwNjUzZTZmMDIifQ",
                        "sectionUrl": "http:\/\/ecom.wix.com\/storefront\/gallery",
                        "sectionMobileUrl": "http:\/\/ecom.wix.com\/storefront\/gallery",
                        "sectionPublished": true,
                        "sectionMobilePublished": true,
                        "sectionSeoEnabled": true,
                        "sectionDefaultPage": "",
                        "sectionRefreshOnWidthChange": true,
                        "widgets": {
                            "13ec7a61-52e3-a405-9dd4-89c2ef3420a6": {
                                "widgetUrl": "http:\/\/ecom.wix.com\/storefront\/product-banner-regular",
                                "widgetId": "13ec7a61-52e3-a405-9dd4-89c2ef3420a6",
                                "refreshOnWidthChange": true,
                                "mobileUrl": "http:\/\/ecom.wix.com\/storefront\/product-banner-regular",
                                "published": false,
                                "mobilePublished": false,
                                "seoEnabled": true
                            },
                            "13afb094-84f9-739f-44fd-78d036adb028": {
                                "widgetUrl": "http:\/\/ecom.wix.com\/storefront\/gallery",
                                "widgetId": "13afb094-84f9-739f-44fd-78d036adb028",
                                "refreshOnWidthChange": true,
                                "mobileUrl": "http:\/\/ecom.wix.com\/storefront\/gallery",
                                "published": true,
                                "mobilePublished": true,
                                "seoEnabled": true,
                                "preFetch": false
                            },
                            "13ec3e79-e668-cc0c-2d48-e99d53a213dd": {
                                "widgetUrl": "http:\/\/ecom.wix.com\/storefront\/product-widget-view",
                                "widgetId": "13ec3e79-e668-cc0c-2d48-e99d53a213dd",
                                "refreshOnWidthChange": true,
                                "mobileUrl": "http:\/\/ecom.wix.com\/storefront\/product-widget-view",
                                "published": true,
                                "mobilePublished": true,
                                "seoEnabled": true,
                                "preFetch": false
                            },
                            "13ec7ad8-9a18-c559-44a9-ecf8750c184f": {
                                "widgetUrl": "http:\/\/ecom.wix.com\/storefront\/product-widget-regular",
                                "widgetId": "13ec7ad8-9a18-c559-44a9-ecf8750c184f",
                                "refreshOnWidthChange": true,
                                "mobileUrl": "http:\/\/ecom.wix.com\/storefront\/product-widget-regular",
                                "published": false,
                                "mobilePublished": false,
                                "seoEnabled": true
                            },
                            "13ec7a69-3da8-f412-5372-af1d6216c4eb": {
                                "widgetUrl": "http:\/\/ecom.wix.com\/storefront\/categories-gallery-regular",
                                "widgetId": "13ec7a69-3da8-f412-5372-af1d6216c4eb",
                                "refreshOnWidthChange": true,
                                "mobileUrl": "http:\/\/ecom.wix.com\/storefront\/categories-gallery-regular",
                                "published": false,
                                "mobilePublished": false,
                                "seoEnabled": true
                            },
                            "13ec7a26-976e-4d09-9dd4-89c2ef3420a6": {
                                "widgetUrl": "http:\/\/ecom.wix.com\/storefront\/product-widget-thin",
                                "widgetId": "13ec7a26-976e-4d09-9dd4-89c2ef3420a6",
                                "refreshOnWidthChange": true,
                                "mobileUrl": "http:\/\/ecom.wix.com\/storefront\/product-widget-thin",
                                "published": false,
                                "mobilePublished": false,
                                "seoEnabled": true
                            },
                            "13ec7a13-9fd0-4194-9dd4-89c2ef3420a6": {
                                "widgetUrl": "http:\/\/ecom.wix.com\/storefront\/categories-gallery-view",
                                "widgetId": "13ec7a13-9fd0-4194-9dd4-89c2ef3420a6",
                                "refreshOnWidthChange": true,
                                "mobileUrl": "http:\/\/ecom.wix.com\/storefront\/categories-gallery-view",
                                "published": false,
                                "mobilePublished": false,
                                "seoEnabled": true
                            },
                            "13ec7acf-70d4-73ba-5372-af1d6216c4eb": {
                                "widgetUrl": "http:\/\/ecom.wix.com\/storefront\/categories-gallery-thin",
                                "widgetId": "13ec7acf-70d4-73ba-5372-af1d6216c4eb",
                                "refreshOnWidthChange": true,
                                "mobileUrl": "http:\/\/ecom.wix.com\/storefront\/categories-gallery-thin",
                                "published": false,
                                "mobilePublished": false,
                                "seoEnabled": true
                            },
                            "13ec7a3b-2784-914a-5372-af1d6216c4eb": {
                                "widgetUrl": "http:\/\/ecom.wix.com\/storefront\/product-banner-thin",
                                "widgetId": "13ec7a3b-2784-914a-5372-af1d6216c4eb",
                                "refreshOnWidthChange": true,
                                "mobileUrl": "http:\/\/ecom.wix.com\/storefront\/product-banner-thin",
                                "published": false,
                                "mobilePublished": false,
                                "seoEnabled": true
                            },
                            "13ec79cc-0045-e157-5372-af1d6216c4eb": {
                                "widgetUrl": "http:\/\/ecom.wix.com\/storefront\/category-widget-empty",
                                "widgetId": "13ec79cc-0045-e157-5372-af1d6216c4eb",
                                "refreshOnWidthChange": true,
                                "mobileUrl": "http:\/\/static.parastorage.com\/services\/wix-ecommerce-category-widget\/1.0.0\/empty.html",
                                "published": false,
                                "mobilePublished": false,
                                "seoEnabled": true
                            },
                            "1380bbb4-8df0-fd38-a235-88821cf3f8a4": {
                                "widgetUrl": "http:\/\/ecom.wix.com\/storefront\/success",
                                "widgetId": "1380bbb4-8df0-fd38-a235-88821cf3f8a4",
                                "refreshOnWidthChange": true,
                                "mobileUrl": "http:\/\/ecom.wix.com\/storefront\/success",
                                "appPage": {
                                    "id": "thank_you_page",
                                    "name": "Thank You Page",
                                    "defaultPage": "",
                                    "hidden": true,
                                    "multiInstanceEnabled": false,
                                    "order": 4,
                                    "indexable": false,
                                    "fullPage": false,
                                    "hideFromMenu": false
                                },
                                "published": true,
                                "mobilePublished": true,
                                "seoEnabled": true,
                                "preFetch": false
                            },
                            "139a41fd-0b1d-975f-6f67-e8cbdf8ccc82": {
                                "widgetUrl": "http:\/\/ecom.wix.com\/storefront\/minigallery",
                                "widgetId": "139a41fd-0b1d-975f-6f67-e8cbdf8ccc82",
                                "refreshOnWidthChange": true,
                                "mobileUrl": "http:\/\/ecom.wix.com\/storefront\/minigallery",
                                "published": true,
                                "mobilePublished": true,
                                "seoEnabled": true,
                                "preFetch": false
                            },
                            "13ec7a58-49e1-f10f-2d48-e99d53a213dd": {
                                "widgetUrl": "http:\/\/ecom.wix.com\/storefront\/category-widget-regular",
                                "widgetId": "13ec7a58-49e1-f10f-2d48-e99d53a213dd",
                                "refreshOnWidthChange": true,
                                "mobileUrl": "http:\/\/ecom.wix.com\/storefront\/category-widget-regular",
                                "published": false,
                                "mobilePublished": false,
                                "seoEnabled": true
                            },
                            "13a94f09-2766-3c40-4a32-8edb5acdd8bc": {
                                "widgetUrl": "http:\/\/ecom.wix.com\/storefront\/product",
                                "widgetId": "13a94f09-2766-3c40-4a32-8edb5acdd8bc",
                                "refreshOnWidthChange": true,
                                "mobileUrl": "http:\/\/ecom.wix.com\/storefront\/product",
                                "appPage": {
                                    "id": "product_page",
                                    "name": "Product Page",
                                    "defaultPage": "",
                                    "hidden": true,
                                    "multiInstanceEnabled": false,
                                    "order": 2,
                                    "indexable": true,
                                    "fullPage": false,
                                    "hideFromMenu": false
                                },
                                "published": true,
                                "mobilePublished": true,
                                "seoEnabled": true,
                                "preFetch": false
                            },
                            "13ec7a2c-c280-2068-887b-67305ea43f16": {
                                "widgetUrl": "http:\/\/ecom.wix.com\/storefront\/category-widget-thin",
                                "widgetId": "13ec7a2c-c280-2068-887b-67305ea43f16",
                                "refreshOnWidthChange": true,
                                "mobileUrl": "http:\/\/ecom.wix.com\/storefront\/category-widget-thin",
                                "published": false,
                                "mobilePublished": false,
                                "seoEnabled": true
                            },
                            "1380bbc4-1485-9d44-4616-92e36b1ead6b": {
                                "widgetUrl": "http:\/\/ecom.wix.com\/storefront\/cartwidget",
                                "widgetId": "1380bbc4-1485-9d44-4616-92e36b1ead6b",
                                "refreshOnWidthChange": true,
                                "mobileUrl": "http:\/\/ecom.wix.com\/storefront\/cartwidget",
                                "published": true,
                                "mobilePublished": true,
                                "seoEnabled": true
                            },
                            "13ec7a19-a077-b7cd-9dd4-89c2ef3420a6": {
                                "widgetUrl": "http:\/\/ecom.wix.com\/storefront\/categories-gallery-empty",
                                "widgetId": "13ec7a19-a077-b7cd-9dd4-89c2ef3420a6",
                                "refreshOnWidthChange": true,
                                "mobileUrl": "http:\/\/ecom.wix.com\/storefront\/categories-gallery-empty",
                                "published": false,
                                "mobilePublished": false,
                                "seoEnabled": true
                            },
                            "1380bbab-4da3-36b0-efb4-2e0599971d14": {
                                "widgetUrl": "http:\/\/ecom.wix.com\/storefront\/cart",
                                "widgetId": "1380bbab-4da3-36b0-efb4-2e0599971d14",
                                "refreshOnWidthChange": true,
                                "mobileUrl": "http:\/\/ecom.wix.com\/storefront\/cart",
                                "appPage": {
                                    "id": "shopping_cart",
                                    "name": "Cart",
                                    "defaultPage": "",
                                    "hidden": true,
                                    "multiInstanceEnabled": false,
                                    "order": 3,
                                    "indexable": false,
                                    "fullPage": false,
                                    "hideFromMenu": false
                                },
                                "published": true,
                                "mobilePublished": true,
                                "seoEnabled": true,
                                "preFetch": false
                            },
                            "14666402-0bc7-b763-e875-e99840d131bd": {
                                "widgetUrl": "http:\/\/ecom.wix.com\/storefront\/add-to-cart",
                                "widgetId": "14666402-0bc7-b763-e875-e99840d131bd",
                                "refreshOnWidthChange": true,
                                "published": true,
                                "mobilePublished": false,
                                "seoEnabled": true,
                                "preFetch": false
                            },
                            "13ec7a01-822b-8e56-887b-67305ea43f16": {
                                "widgetUrl": "http:\/\/ecom.wix.com\/storefront\/product-banner-empty",
                                "widgetId": "13ec7a01-822b-8e56-887b-67305ea43f16",
                                "refreshOnWidthChange": true,
                                "mobileUrl": "http:\/\/ecom.wix.com\/storefront\/product-banner-empty",
                                "published": false,
                                "mobilePublished": false,
                                "seoEnabled": true
                            },
                            "1380bba0-253e-a800-a235-88821cf3f8a4": {
                                "widgetUrl": "http:\/\/ecom.wix.com\/storefront\/gallery",
                                "widgetId": "1380bba0-253e-a800-a235-88821cf3f8a4",
                                "refreshOnWidthChange": true,
                                "mobileUrl": "http:\/\/ecom.wix.com\/storefront\/gallery",
                                "appPage": {
                                    "id": "product_gallery",
                                    "name": "Shop",
                                    "defaultPage": "",
                                    "hidden": false,
                                    "multiInstanceEnabled": true,
                                    "order": 1,
                                    "indexable": true,
                                    "fullPage": false,
                                    "hideFromMenu": false
                                },
                                "published": true,
                                "mobilePublished": true,
                                "seoEnabled": true,
                                "preFetch": false
                            },
                            "13ec79fb-5a69-34d9-887b-67305ea43f16": {
                                "widgetUrl": "http:\/\/ecom.wix.com\/storefront\/product-banner-view",
                                "widgetId": "13ec79fb-5a69-34d9-887b-67305ea43f16",
                                "refreshOnWidthChange": true,
                                "mobileUrl": "http:\/\/ecom.wix.com\/storefront\/product-banner-view",
                                "published": false,
                                "mobilePublished": false,
                                "seoEnabled": true
                            },
                            "13ec79b8-602c-882f-44a9-ecf8750c184f": {
                                "widgetUrl": "http:\/\/ecom.wix.com\/storefront\/category-widget-view",
                                "widgetId": "13ec79b8-602c-882f-44a9-ecf8750c184f",
                                "refreshOnWidthChange": true,
                                "mobileUrl": "http:\/\/ecom.wix.com\/storefront\/category-widget-view",
                                "published": false,
                                "mobilePublished": false,
                                "seoEnabled": true
                            }
                        },
                        "appRequirements": {
                            "requireSiteMembers": false
                        },
                        "isWixTPA": true,
                        "installedAtDashboard": true,
                        "permissions": {
                            "revoked": false
                        }
                    }
                },
                "premiumFeatures": [],
                "geo": "HKG",
                "languageCode": "en",
                "previewMode": false,
                "userId": "4251a9a7-a15c-435e-b0d5-34b0653e6f02",
                "siteMetaData": {
                    "preloader": {
                        "enabled": false
                    },
                    "adaptiveMobileOn": true,
                    "quickActions": {
                        "socialLinks": [],
                        "colorScheme": "dark",
                        "configuration": {
                            "quickActionsMenuEnabled": false,
                            "navigationMenuEnabled": true,
                            "phoneEnabled": false,
                            "emailEnabled": false,
                            "addressEnabled": false,
                            "socialLinksEnabled": false
                        }
                    },
                    "contactInfo": {
                        "companyName": "",
                        "phone": "",
                        "fax": "",
                        "email": "",
                        "address": ""
                    }
                },
                "runningExperiments": {
                    "sv_blogRealPagination": "new",
                    "viewerGeneratedAnchors": "new",
                    "sv_popups": "new",
                    "blogItemProp": "new",
                    "sv_blogMobileFeed": "new",
                    "clickToAction_email": "new",
                    "noDynamicModelOnFirstLoad": "new",
                    "clickToAction_url": "new",
                    "ds_pageTransition": "new",
                    "tpaHideFromMenu": "new",
                    "sv_blogSocialCounters": "new",
                    "sv_boxSlideShow": "new",
                    "clickToAction_phone": "new",
                    "updateOgTags": "new",
                    "blogQueryProjection": "new",
                    "sv_googleMapsDesigns": "new",
                    "sv_stripMigrationViewer": "new",
                    "deepLinking": "new",
                    "sv_faviconFromServer": "new",
                    "sv_obMigrationFlow": "new",
                    "sv_fontsRefactor": "new",
                    "specs.users.NewLoginVelocityTemplateFT": "true",
                    "pageListNewFormat": "new",
                    "se_ignoreBottomBottomAnchors": "new",
                    "sv_passwordPages": "new",
                    "sv_buttonUsesFlex": "new",
                    "operationsQAllAsync": "new",
                    "remove_mobile_props_and_design_if_really_deleted": "new",
                    "sv_stripToColumnMigration": "new",
                    "duplicatedDesignItemsDataFixer": "new",
                    "sv_blogNotifySocialCounters": "new",
                    "newSiteMembersEndPoint": "new",
                    "sv_blogNewSocialShareButtonsInTemplates": "new",
                    "sv_ignoreBottomBottomAnchors": "new",
                    "sv_allowStripToColumnMigration": "new",
                    "sv_NewFacebookConversionPixel": "new",
                    "wixCodeBinding": "new",
                    "mobileAppBannerOnMobile": "new",
                    "contactFormActivity": "old"
                },
                "urlFormatModel": {
                    "format": "slash",
                    "forbiddenPageUriSEOs": ["app", "apps", "_api", "robots.txt", "sitemap.xml", "feed.xml", "sites"],
                    "pageIdToResolvedUriSEO": {}
                },
                "passwordProtectedPages": [],
                "useSandboxInHTMLComp": true
            };
            var publicModel = {
                "domain": "wixsite.com",
                "externalBaseUrl": "http:\/\/hkwepaint.wixsite.com\/online",
                "unicodeExternalBaseUrl": "http:\/\/hkwepaint.wixsite.com\/online",
                "pageList": {
                    "masterPage": ["https:\/\/static.wixstatic.com\/sites\/4251a9_cd9043281eb43f1fbbbb1ad9caf1f1f4_18.json.z?v=3", "https:\/\/staticorigin.wixstatic.com\/sites\/4251a9_cd9043281eb43f1fbbbb1ad9caf1f1f4_18.json.z?v=3", "https:\/\/fallback.wix.com\/wix-html-editor-pages-webapp\/page\/4251a9_cd9043281eb43f1fbbbb1ad9caf1f1f4_18.json"],
                    "pages": [{
                            "pageId": "w99fw",
                            "title": "Chat Room",
                            "pageUriSEO": "chat-room",
                            "urls": ["https:\/\/static.wixstatic.com\/sites\/4251a9_f9db024b66e69c838bb224b31a965a7e_10.json.z?v=3", "https:\/\/staticorigin.wixstatic.com\/sites\/4251a9_f9db024b66e69c838bb224b31a965a7e_10.json.z?v=3", "https:\/\/fallback.wix.com\/wix-html-editor-pages-webapp\/page\/4251a9_f9db024b66e69c838bb224b31a965a7e_10.json"],
                            "pageJsonFileName": "4251a9_f9db024b66e69c838bb224b31a965a7e_10.json"
                        }, {
                            "pageId": "oz4m7",
                            "title": "Services",
                            "pageUriSEO": "services",
                            "urls": ["https:\/\/static.wixstatic.com\/sites\/4251a9_e62312caba4cc28030d818d19455cdb8_16.json.z?v=3", "https:\/\/staticorigin.wixstatic.com\/sites\/4251a9_e62312caba4cc28030d818d19455cdb8_16.json.z?v=3", "https:\/\/fallback.wix.com\/wix-html-editor-pages-webapp\/page\/4251a9_e62312caba4cc28030d818d19455cdb8_16.json"],
                            "pageJsonFileName": "4251a9_e62312caba4cc28030d818d19455cdb8_16.json"
                        }, {
                            "pageId": "xu9wc",
                            "title": "Comment",
                            "pageUriSEO": "comment",
                            "urls": ["https:\/\/static.wixstatic.com\/sites\/4251a9_2f792a728e03a5b5e2c2a925616074c2_12.json.z?v=3", "https:\/\/staticorigin.wixstatic.com\/sites\/4251a9_2f792a728e03a5b5e2c2a925616074c2_12.json.z?v=3", "https:\/\/fallback.wix.com\/wix-html-editor-pages-webapp\/page\/4251a9_2f792a728e03a5b5e2c2a925616074c2_12.json"],
                            "pageJsonFileName": "4251a9_2f792a728e03a5b5e2c2a925616074c2_12.json"
                        }, {
                            "pageId": "o3ekx",
                            "title": "Members",
                            "pageUriSEO": "members",
                            "urls": ["https:\/\/static.wixstatic.com\/sites\/4251a9_2037fa19e140d99836bc19dc59136e7a_9.json.z?v=3", "https:\/\/staticorigin.wixstatic.com\/sites\/4251a9_2037fa19e140d99836bc19dc59136e7a_9.json.z?v=3", "https:\/\/fallback.wix.com\/wix-html-editor-pages-webapp\/page\/4251a9_2037fa19e140d99836bc19dc59136e7a_9.json"],
                            "pageJsonFileName": "4251a9_2037fa19e140d99836bc19dc59136e7a_9.json"
                        }, {
                            "pageId": "co68",
                            "title": "Products & Services",
                            "pageUriSEO": "order",
                            "urls": ["https:\/\/static.wixstatic.com\/sites\/4251a9_e04aea6b3f9eb0e34de1619db050024a_16.json.z?v=3", "https:\/\/staticorigin.wixstatic.com\/sites\/4251a9_e04aea6b3f9eb0e34de1619db050024a_16.json.z?v=3", "https:\/\/fallback.wix.com\/wix-html-editor-pages-webapp\/page\/4251a9_e04aea6b3f9eb0e34de1619db050024a_16.json"],
                            "pageJsonFileName": "4251a9_e04aea6b3f9eb0e34de1619db050024a_16.json"
                        }, {
                            "pageId": "c6np",
                            "title": "Product Page",
                            "pageUriSEO": "product-page",
                            "urls": ["https:\/\/static.wixstatic.com\/sites\/4251a9_8d9c42a71a1b346ad2404b355a9028bb_6.json.z?v=3", "https:\/\/staticorigin.wixstatic.com\/sites\/4251a9_8d9c42a71a1b346ad2404b355a9028bb_6.json.z?v=3", "https:\/\/fallback.wix.com\/wix-html-editor-pages-webapp\/page\/4251a9_8d9c42a71a1b346ad2404b355a9028bb_6.json"],
                            "pageJsonFileName": "4251a9_8d9c42a71a1b346ad2404b355a9028bb_6.json"
                        }, {
                            "pageId": "czpg",
                            "title": "About Us",
                            "pageUriSEO": "about-us",
                            "urls": ["https:\/\/static.wixstatic.com\/sites\/4251a9_dfe2c8a9d82c5336c001d88b151841b7_18.json.z?v=3", "https:\/\/staticorigin.wixstatic.com\/sites\/4251a9_dfe2c8a9d82c5336c001d88b151841b7_18.json.z?v=3", "https:\/\/fallback.wix.com\/wix-html-editor-pages-webapp\/page\/4251a9_dfe2c8a9d82c5336c001d88b151841b7_18.json"],
                            "pageJsonFileName": "4251a9_dfe2c8a9d82c5336c001d88b151841b7_18.json"
                        }, {
                            "pageId": "c1y3k",
                            "title": "Cart",
                            "pageUriSEO": "cart",
                            "urls": ["https:\/\/static.wixstatic.com\/sites\/4251a9_5099250cc04e755d98d8bd209a2f78cc_6.json.z?v=3", "https:\/\/staticorigin.wixstatic.com\/sites\/4251a9_5099250cc04e755d98d8bd209a2f78cc_6.json.z?v=3", "https:\/\/fallback.wix.com\/wix-html-editor-pages-webapp\/page\/4251a9_5099250cc04e755d98d8bd209a2f78cc_6.json"],
                            "pageJsonFileName": "4251a9_5099250cc04e755d98d8bd209a2f78cc_6.json"
                        }, {
                            "pageId": "bz1l9",
                            "title": "Orders",
                            "pageUriSEO": "orders",
                            "urls": ["https:\/\/static.wixstatic.com\/sites\/4251a9_252d17aca7991b2d13fc6a8b7e08bd41_12.json.z?v=3", "https:\/\/staticorigin.wixstatic.com\/sites\/4251a9_252d17aca7991b2d13fc6a8b7e08bd41_12.json.z?v=3", "https:\/\/fallback.wix.com\/wix-html-editor-pages-webapp\/page\/4251a9_252d17aca7991b2d13fc6a8b7e08bd41_12.json"],
                            "pageJsonFileName": "4251a9_252d17aca7991b2d13fc6a8b7e08bd41_12.json"
                        }, {
                            "pageId": "x2px7",
                            "title": "Products",
                            "pageUriSEO": "products",
                            "urls": ["https:\/\/static.wixstatic.com\/sites\/4251a9_4f5bdb17dd6fa0ae207d93da7310a33f_16.json.z?v=3", "https:\/\/staticorigin.wixstatic.com\/sites\/4251a9_4f5bdb17dd6fa0ae207d93da7310a33f_16.json.z?v=3", "https:\/\/fallback.wix.com\/wix-html-editor-pages-webapp\/page\/4251a9_4f5bdb17dd6fa0ae207d93da7310a33f_16.json"],
                            "pageJsonFileName": "4251a9_4f5bdb17dd6fa0ae207d93da7310a33f_16.json"
                        }, {
                            "pageId": "c1o2l",
                            "title": "Thank You Page",
                            "pageUriSEO": "thank-you-page",
                            "urls": ["https:\/\/static.wixstatic.com\/sites\/4251a9_b85e4ce99c8110b877213d042caa9ae8_6.json.z?v=3", "https:\/\/staticorigin.wixstatic.com\/sites\/4251a9_b85e4ce99c8110b877213d042caa9ae8_6.json.z?v=3", "https:\/\/fallback.wix.com\/wix-html-editor-pages-webapp\/page\/4251a9_b85e4ce99c8110b877213d042caa9ae8_6.json"],
                            "pageJsonFileName": "4251a9_b85e4ce99c8110b877213d042caa9ae8_6.json"
                        }, {
                            "pageId": "ccfcu",
                            "title": "Messages",
                            "pageUriSEO": "messages",
                            "urls": ["https:\/\/static.wixstatic.com\/sites\/4251a9_00ee88758b4fd551531ace86ead59b02_11.json.z?v=3", "https:\/\/staticorigin.wixstatic.com\/sites\/4251a9_00ee88758b4fd551531ace86ead59b02_11.json.z?v=3", "https:\/\/fallback.wix.com\/wix-html-editor-pages-webapp\/page\/4251a9_00ee88758b4fd551531ace86ead59b02_11.json"],
                            "pageJsonFileName": "4251a9_00ee88758b4fd551531ace86ead59b02_11.json"
                        }, {
                            "pageId": "rm562",
                            "title": "Games",
                            "pageUriSEO": "contact",
                            "urls": ["https:\/\/static.wixstatic.com\/sites\/4251a9_94d13a4fcf0b4c5321d4c43f582a5eec_9.json.z?v=3", "https:\/\/staticorigin.wixstatic.com\/sites\/4251a9_94d13a4fcf0b4c5321d4c43f582a5eec_9.json.z?v=3", "https:\/\/fallback.wix.com\/wix-html-editor-pages-webapp\/page\/4251a9_94d13a4fcf0b4c5321d4c43f582a5eec_9.json"],
                            "pageJsonFileName": "4251a9_94d13a4fcf0b4c5321d4c43f582a5eec_9.json"
                        }, {
                            "pageId": "c1dxd",
                            "title": "Home",
                            "pageUriSEO": "home",
                            "urls": ["https:\/\/static.wixstatic.com\/sites\/4251a9_a50855f4604a170ea3d2840b3db9e846_14.json.z?v=3", "https:\/\/staticorigin.wixstatic.com\/sites\/4251a9_a50855f4604a170ea3d2840b3db9e846_14.json.z?v=3", "https:\/\/fallback.wix.com\/wix-html-editor-pages-webapp\/page\/4251a9_a50855f4604a170ea3d2840b3db9e846_14.json"],
                            "pageJsonFileName": "4251a9_a50855f4604a170ea3d2840b3db9e846_14.json"
                        }, {
                            "pageId": "cx7t",
                            "title": "Contact",
                            "pageUriSEO": "joint-partnership",
                            "urls": ["https:\/\/static.wixstatic.com\/sites\/4251a9_d0f6cbc0e1b0ada7b9bba8e5a1a8c3e3_17.json.z?v=3", "https:\/\/staticorigin.wixstatic.com\/sites\/4251a9_d0f6cbc0e1b0ada7b9bba8e5a1a8c3e3_17.json.z?v=3", "https:\/\/fallback.wix.com\/wix-html-editor-pages-webapp\/page\/4251a9_d0f6cbc0e1b0ada7b9bba8e5a1a8c3e3_17.json"],
                            "pageJsonFileName": "4251a9_d0f6cbc0e1b0ada7b9bba8e5a1a8c3e3_17.json"
                        }, {
                            "pageId": "c1one",
                            "title": "Q&A",
                            "pageUriSEO": "q-a",
                            "urls": ["https:\/\/static.wixstatic.com\/sites\/4251a9_9082e664b9843f8086c4771044cc885d_16.json.z?v=3", "https:\/\/staticorigin.wixstatic.com\/sites\/4251a9_9082e664b9843f8086c4771044cc885d_16.json.z?v=3", "https:\/\/fallback.wix.com\/wix-html-editor-pages-webapp\/page\/4251a9_9082e664b9843f8086c4771044cc885d_16.json"],
                            "pageJsonFileName": "4251a9_9082e664b9843f8086c4771044cc885d_16.json"
                        }, {
                            "pageId": "hbrt3",
                            "title": "Autism Tests",
                            "pageUriSEO": "autistic-test",
                            "urls": ["https:\/\/static.wixstatic.com\/sites\/4251a9_0f45e77a17ba1662ff4c71ff86224388_11.json.z?v=3", "https:\/\/staticorigin.wixstatic.com\/sites\/4251a9_0f45e77a17ba1662ff4c71ff86224388_11.json.z?v=3", "https:\/\/fallback.wix.com\/wix-html-editor-pages-webapp\/page\/4251a9_0f45e77a17ba1662ff4c71ff86224388_11.json"],
                            "pageJsonFileName": "4251a9_0f45e77a17ba1662ff4c71ff86224388_11.json"
                        }, {
                            "pageId": "nkfrl",
                            "title": "Profile",
                            "pageUriSEO": "profile",
                            "urls": ["https:\/\/static.wixstatic.com\/sites\/4251a9_ad323e03822f2d814528efdc78c5418f_11.json.z?v=3", "https:\/\/staticorigin.wixstatic.com\/sites\/4251a9_ad323e03822f2d814528efdc78c5418f_11.json.z?v=3", "https:\/\/fallback.wix.com\/wix-html-editor-pages-webapp\/page\/4251a9_ad323e03822f2d814528efdc78c5418f_11.json"],
                            "pageJsonFileName": "4251a9_ad323e03822f2d814528efdc78c5418f_11.json"
                        }],
                    "mainPageId": "c1dxd",
                    "masterPageJsonFileName": "4251a9_cd9043281eb43f1fbbbb1ad9caf1f1f4_18.json",
                    "topology": [{
                            "baseUrl": "https:\/\/static.wixstatic.com\/",
                            "parts": "sites\/{filename}.z?v=3"
                        }, {
                            "baseUrl": "https:\/\/staticorigin.wixstatic.com\/",
                            "parts": "sites\/{filename}.z?v=3"
                        }, {
                            "baseUrl": "https:\/\/fallback.wix.com\/",
                            "parts": "wix-html-editor-pages-webapp\/page\/{filename}"
                        }]
                },
                "timeSincePublish": 608042,
                "favicon": "",
                "deviceInfo": {
                    "deviceType": "Desktop",
                    "browserType": "Firefox",
                    "browserVersion": 47
                },
                "siteRevision": 18,
                "sessionInfo": {
                    "hs": -88063915,
                    "svSession": "3d208a71c43aac4823b00c958bf2b824ac56cac7018b643d3441229c0e6080cd0283f86837ff86e1d0e9d6aa8edd28121e60994d53964e647acf431e4f798bcd4ddba9504df79352a9656d36ea84f93cbc14e509f6c5b7ee19b5a280e33fdb19",
                    "ctToken": "MXg4dWYxMkkyVWQwLTBadDFjMlNsbnZfSVdwWHdqT2pURWxPby1scEJhWXx7InVzZXJBZ2VudCI6Ik1vemlsbGEvNS4wIChXaW5kb3dzIE5UIDYuMTsgV09XNjQ7IHJ2OjQ3LjApIEdlY2tvLzIwMTAwMTAxIEZpcmVmb3gvNDcuMCIsInZhbGlkVGhyb3VnaCI6MTQ3NzExMjk5MDAwNn0",
                    "isAnonymous": false
                },
                "metaSiteFlags": []
            };


            var googleAnalytics = "UA-2117194-61";

            var googleRemarketing = "";
            var facebookRemarketing = "";
            var yandexMetrika = "";
        </script>



        <meta name="fragment" content="!">

        <!-- DATA -->
        <script type="text/javascript">
            var adData = {
                "topLabel": "<span class=\"smallMusa\">(Wix-Logo) </span>Create a <span class=\"smallLogo\">Wix</span> site!",
                "topContent": "100s of templates<br />No coding needed<br /><span class=\"emphasis spacer\">Start now >></span>",
                "footerLabel": "<div class=\"adFootBox\"><div class=\"siteBanner\" ><div class=\"siteBanner\"><div class=\"wrapper\"><div class=\"bigMusa\">(Wix Logo)</div><div class=\"txt shd\" style=\"color:#fff\">This site was created using </div> <div class=\"txt shd\"><a  href=\"http://www.wix.com?utm_campaign=vir_wixad_live&experiment_id=abtestbanner122400001\" style=\"color:#fff\"> WIX.com. </a></div> <div class=\"txt shd\" style=\"color:#fff\"> Create your own for FREE <span class=\"emphasis\"> >></span></div></div></div></div></div>",
                "adUrl": "http://www.wix.com/lpviral/enviral?utm_campaign=vir_wixad_live&experiment_id=abtestbanner122400001"
            };
            var mobileAdData = {
                "footerLabel": "7c3dbd_67131d7bd570478689be752141d4e28a.jpg",
                "adUrl": "http://www.wix.com?utm_campaign=vir_wixad_live&experiment_id=abtestbanner122400001"
            };
            var usersDomain = "https://users.wix.com/wix-users";
        </script>
        <script type="text/javascript">
            var santaBase = 'https://static.parastorage.com/services/santa/1.1800.14';
            var clientSideRender = true;
        </script>
        <script src="https://static.parastorage.com/services/third-party/requirejs/2.1.15/require.min.js"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/app/main-r.min.js"></script>
        <link href="//fonts.googleapis.com" rel="preconnect">
        <link rel="stylesheet" href="https://static.parastorage.com/services/santa/1.1800.14/static/css/viewer.css">

        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/wixCodeInit/wixCodeInit.min.js" data-requiremodule="wixCodeInit" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/third-party/lodash/3.10.1/lodash.min.js" data-requiremodule="lodash" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/coreUtils/coreUtils.min.js" data-requiremodule="coreUtils" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/skins/skins.min.js" data-requiremodule="skins" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/components/components.min.js" data-requiremodule="components" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/core/core.min.js" data-requiremodule="core" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/third-party/tweenmax/1.18.2/minified/TweenMax.min.js" data-requiremodule="TimelineMax" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/animations/animations.min.js" data-requiremodule="animations" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/third-party/react/0.14.3/react-with-addons.min.js" data-requiremodule="react" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/layout/layout.min.js" data-requiremodule="layout" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/wixappsCore/wixappsCore.min.js" data-requiremodule="wixappsCore" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/wixappsBuilder/wixappsBuilder.min.js" data-requiremodule="wixappsBuilder" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/tpa/tpa.min.js" data-requiremodule="tpa" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/dataFixer/dataFixer.min.js" data-requiremodule="dataFixer" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/siteUtils/siteUtils.min.js" data-requiremodule="siteUtils" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/translationsUtils/translationsUtils.min.js" data-requiremodule="translationsUtils" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/third-party/hammerjs/2.0.8/hammer.min.js" data-requiremodule="hammer" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/fonts/fonts.min.js" data-requiremodule="fonts" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/static/wixcode/static/RMI/rmi-bundle.min.js" data-requiremodule="RemoteModelInterface" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/loggingUtils/loggingUtils.min.js" data-requiremodule="loggingUtils" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/utils/utils.min.js" data-requiremodule="utils" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/imageClientApi/imageClientApi.min.js" data-requiremodule="imageClientApi" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/third-party/swfobject/2.3.20130521/swfobject.min.js" data-requiremodule="swfobject" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/santaProps/santaProps.min.js" data-requiremodule="santaProps" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/displayer/displayer.min.js" data-requiremodule="displayer" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/wixUrlParser/wixUrlParser.min.js" data-requiremodule="wixUrlParser" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/tweenEngine/tweenEngine.min.js" data-requiremodule="tweenEngine" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/third-party/mousetrap/1.4.6/mousetrap.min.js" data-requiremodule="mousetrap" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/third-party/tweenmax/1.18.2/minified/plugins/DrawSVGPlugin.min.js" data-requiremodule="DrawSVGPlugin" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/third-party/react/0.14.3/react-dom.min.js" data-requiremodule="reactDOM" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/third-party/tweenmax/1.18.2/minified/plugins/ScrollToPlugin.min.js" data-requiremodule="ScrollToPlugin" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/widgets/widgets.min.js" data-requiremodule="widgets" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/js/plugins/experiment/experiment.js" data-requiremodule="experiment" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/render/render.min.js" data-requiremodule="render" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/third-party/react/0.14.3/react-dom-server.min.js" data-requiremodule="reactDOMServer" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/paginatedGridGallery/paginatedGridGallery.min.js" data-requiremodule="paginatedGridGallery" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/matrixGallery/matrixGallery.min.js" data-requiremodule="matrixGallery" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/galleriesCommon/galleriesCommon.min.js" data-requiremodule="galleriesCommon" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/textCommon/textCommon.min.js" data-requiremodule="textCommon" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/wPhoto/wPhoto.min.js" data-requiremodule="wPhoto" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/buttonCommon/buttonCommon.min.js" data-requiremodule="buttonCommon" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/siteButton/siteButton.min.js" data-requiremodule="siteButton" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/imageCommon/imageCommon.min.js" data-requiremodule="imageCommon" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/image/image.min.js" data-requiremodule="image" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/zoomedImage/zoomedImage.min.js" data-requiremodule="zoomedImage" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/pinItPinWidget/pinItPinWidget.min.js" data-requiremodule="pinItPinWidget" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/wRichText/wRichText.min.js" data-requiremodule="wRichText" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/popupCloseTextButton/popupCloseTextButton.min.js" data-requiremodule="popupCloseTextButton" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/clipArt/clipArt.min.js" data-requiremodule="clipArt" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/containerCommon/containerCommon.min.js" data-requiremodule="containerCommon" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/container/container.min.js" data-requiremodule="container" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/headerContainer/headerContainer.min.js" data-requiremodule="headerContainer" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/footerContainer/footerContainer.min.js" data-requiremodule="footerContainer" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/screenWidthContainer/screenWidthContainer.min.js" data-requiremodule="screenWidthContainer" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/radioButton/radioButton.min.js" data-requiremodule="radioButton" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/datePicker/datePicker.min.js" data-requiremodule="datePicker" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/santa/1.1800.14/packages-bin/radioGroup/radioGroup.min.js" data-requiremodule="radioGroup" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/third-party/zepto/1.1.3/zepto.min.js" data-requiremodule="zepto" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/third-party/xss/0.2.12/xss.min.js" data-requiremodule="xss" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <script src="https://static.parastorage.com/services/third-party/color-convert/0.2.0/color.min.js" data-requiremodule="color" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
        <link id="font_googleFonts" href="//fonts.googleapis.com/css?family=Anton:n,b,i,bi|Basic:n,b,i,bi|Caudex:n,b,i,bi|Chelsea+Market:n,b,i,bi|Corben:n,b,i,bi|EB+Garamond:n,b,i,bi|Enriqueta:n,b,i,bi|Forum:n,b,i,bi|Fredericka+the+Great:n,b,i,bi|Jockey+One:n,b,i,bi|Josefin+Slab:n,b,i,bi|Jura:n,b,i,bi|Kelly+Slab:n,b,i,bi|Marck+Script:n,b,i,bi|Lobster:n,b,i,bi|Mr+De+Haviland:n,b,i,bi|Niconne:n,b,i,bi|Noticia+Text:n,b,i,bi|Overlock:n,b,i,bi|Patrick+Hand:n,b,i,bi|Play:n,b,i,bi|Sarina:n,b,i,bi|Signika:n,b,i,bi|Spinnaker:n,b,i,bi|Monoton:n,b,i,bi|Sacramento:n,b,i,bi|Cookie:n,b,i,bi|Raleway:n,b,i,bi|Open+Sans+Condensed:300:n,b,i,bi|Amatic+SC:n,b,i,bi|Cinzel:n,b,i,bi|Sail:n,b,i,bi|Playfair+Display:n,b,i,bi|Libre+Baskerville:n,b,i,bi|&amp;subset=latin-ext,cyrillic,japanese,korean,arabic,hebrew,latin" rel="stylesheet">
        <link id="font_latin-ext" href="https://static.parastorage.com/services/santa-resources/resources/viewer/user-site-fonts/v3/latin-ext.css" rel="stylesheet">
        <link id="font_cyrillic" href="https://static.parastorage.com/services/santa-resources/resources/viewer/user-site-fonts/v3/cyrillic.css" rel="stylesheet">
        <link id="font_japanese" href="https://static.parastorage.com/services/santa-resources/resources/viewer/user-site-fonts/v3/japanese.css" rel="stylesheet">
        <link id="font_korean" href="https://static.parastorage.com/services/santa-resources/resources/viewer/user-site-fonts/v3/korean.css" rel="stylesheet">
        <link id="font_arabic" href="https://static.parastorage.com/services/santa-resources/resources/viewer/user-site-fonts/v3/arabic.css" rel="stylesheet">
        <link id="font_hebrew" href="https://static.parastorage.com/services/santa-resources/resources/viewer/user-site-fonts/v3/hebrew.css" rel="stylesheet">
        <link id="font_latin" href="https://static.parastorage.com/services/santa-resources/resources/viewer/user-site-fonts/v3/latin.css" rel="stylesheet">
        <script src="//www.google-analytics.com/analytics.js" data-requiremodule="//www.google-analytics.com/analytics.js" data-requirecontext="_" async="" charset="utf-8" type="text/javascript"></script>
    </head>

    <body style="" class="">
        <?php
        $query = "SELECT * FROM product ORDER BY productID ASC";
        // execute the query 
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $code = $row["code"];
            // created an associative array.
            // the key is the $code and value is detail of details row
            $product_array [$code] = $row;
        }
        ?>
        <div id="SITE_CONTAINER">
            <div class="noop" data-reactid=".0">
                <div data-reactid=".0.0">
                    <style type="text/css" data-reactid=".0.0.$theme_fonts">
                        .font_0 {
                            font: normal normal bold 20px/1.4em raleway, sans-serif;
                            color: #D3D3D3;
                        }

                        .font_1 {
                            font: normal normal normal 15px/1.4em raleway, sans-serif;
                            color: #303132;
                        }

                        .font_2 {
                            font: normal normal bold 19px/1.4em raleway, sans-serif;
                            color: #303132;
                        }

                        .font_3 {
                            font: normal normal normal 55px/1.4em 'times new roman', times, serif;
                            color: #303132;
                        }

                        .font_4 {
                            font: normal normal normal 30px/1.4em raleway, sans-serif;
                            color: #303132;
                        }

                        .font_5 {
                            font: normal normal normal 20px/1.4em 'eb garamond', serif;
                            color: #303132;
                        }

                        .font_6 {
                            font: normal normal bold 19px/1.4em raleway, sans-serif;
                            color: #303132;
                        }

                        .font_7 {
                            font: normal normal normal 18px/1.4em raleway, sans-serif;
                            color: #303132;
                        }

                        .font_8 {
                            font: normal normal normal 15px/1.4em raleway, sans-serif;
                            color: #303132;
                        }

                        .font_9 {
                            font: normal normal normal 13px/1.4em raleway, sans-serif;
                            color: #303132;
                        }

                        .font_10 {
                            font: normal normal normal 10px/1.4em Arial, 'ｍｓ ｐゴシック', 'ms pgothic', '돋움', dotum, helvetica, sans-serif;
                            color: #303132;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$theme_colors">
                        .color_0 {
                            color: #FFFFFF;
                        }

                        .backcolor_0 {
                            background-color: #FFFFFF;
                        }

                        .color_1 {
                            color: #FFFFFF;
                        }

                        .backcolor_1 {
                            background-color: #FFFFFF;
                        }

                        .color_2 {
                            color: #000000;
                        }

                        .backcolor_2 {
                            background-color: #000000;
                        }

                        .color_3 {
                            color: #ED1C24;
                        }

                        .backcolor_3 {
                            background-color: #ED1C24;
                        }

                        .color_4 {
                            color: #0088CB;
                        }

                        .backcolor_4 {
                            background-color: #0088CB;
                        }

                        .color_5 {
                            color: #FFCB05;
                        }

                        .backcolor_5 {
                            background-color: #FFCB05;
                        }

                        .color_6 {
                            color: #727272;
                        }

                        .backcolor_6 {
                            background-color: #727272;
                        }

                        .color_7 {
                            color: #B0B0B0;
                        }

                        .backcolor_7 {
                            background-color: #B0B0B0;
                        }

                        .color_8 {
                            color: #FFFFFF;
                        }

                        .backcolor_8 {
                            background-color: #FFFFFF;
                        }

                        .color_9 {
                            color: #727272;
                        }

                        .backcolor_9 {
                            background-color: #727272;
                        }

                        .color_10 {
                            color: #B0B0B0;
                        }

                        .backcolor_10 {
                            background-color: #B0B0B0;
                        }

                        .color_11 {
                            color: #FFFFFF;
                        }

                        .backcolor_11 {
                            background-color: #FFFFFF;
                        }

                        .color_12 {
                            color: #D3D3D3;
                        }

                        .backcolor_12 {
                            background-color: #D3D3D3;
                        }

                        .color_13 {
                            color: #777777;
                        }

                        .backcolor_13 {
                            background-color: #777777;
                        }

                        .color_14 {
                            color: #535151;
                        }

                        .backcolor_14 {
                            background-color: #535151;
                        }

                        .color_15 {
                            color: #303132;
                        }

                        .backcolor_15 {
                            background-color: #303132;
                        }

                        .color_16 {
                            color: #DFC9CC;
                        }

                        .backcolor_16 {
                            background-color: #DFC9CC;
                        }

                        .color_17 {
                            color: #BEA3A6;
                        }

                        .backcolor_17 {
                            background-color: #BEA3A6;
                        }

                        .color_18 {
                            color: #9E7076;
                        }

                        .backcolor_18 {
                            background-color: #9E7076;
                        }

                        .color_19 {
                            color: #694B4E;
                        }

                        .backcolor_19 {
                            background-color: #694B4E;
                        }

                        .color_20 {
                            color: #352527;
                        }

                        .backcolor_20 {
                            background-color: #352527;
                        }

                        .color_21 {
                            color: #CAD6DB;
                        }

                        .backcolor_21 {
                            background-color: #CAD6DB;
                        }

                        .color_22 {
                            color: #9AAFB8;
                        }

                        .backcolor_22 {
                            background-color: #9AAFB8;
                        }

                        .color_23 {
                            color: #74838A;
                        }

                        .backcolor_23 {
                            background-color: #74838A;
                        }

                        .color_24 {
                            color: #4D575C;
                        }

                        .backcolor_24 {
                            background-color: #4D575C;
                        }

                        .color_25 {
                            color: #272C2E;
                        }

                        .backcolor_25 {
                            background-color: #272C2E;
                        }

                        .color_26 {
                            color: #C7DFE4;
                        }

                        .backcolor_26 {
                            background-color: #C7DFE4;
                        }

                        .color_27 {
                            color: #A2C2C9;
                        }

                        .backcolor_27 {
                            background-color: #A2C2C9;
                        }

                        .color_28 {
                            color: #6CA1AD;
                        }

                        .backcolor_28 {
                            background-color: #6CA1AD;
                        }

                        .color_29 {
                            color: #486C74;
                        }

                        .backcolor_29 {
                            background-color: #486C74;
                        }

                        .color_30 {
                            color: #24363A;
                        }

                        .backcolor_30 {
                            background-color: #24363A;
                        }

                        .color_31 {
                            color: #E2D3D1;
                        }

                        .backcolor_31 {
                            background-color: #E2D3D1;
                        }

                        .color_32 {
                            color: #C4ABA7;
                        }

                        .backcolor_32 {
                            background-color: #C4ABA7;
                        }

                        .color_33 {
                            color: #93807D;
                        }

                        .backcolor_33 {
                            background-color: #93807D;
                        }

                        .color_34 {
                            color: #625553;
                        }

                        .backcolor_34 {
                            background-color: #625553;
                        }

                        .color_35 {
                            color: #312B2A;
                        }

                        .backcolor_35 {
                            background-color: #312B2A;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$s0">
                        .s0screenWidthBackground {
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                        }

                        .s0[data-state~="mobileView"] {
                            position: absolute !important;
                        }

                        .s0[data-state~="fixedPosition"] {
                            position: fixed !important;
                            left: auto !important;
                            z-index: 50;
                        }

                        .s0[data-state~="fixedPosition"].s0_footer {
                            top: auto;
                            bottom: 0;
                        }

                        .s0bg {
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                        }

                        .s0inlineContent {
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                        }

                        .s0centeredContent {
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$s1">
                        .s1inlineContent {
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$s2">
                        .s2 {
                            word-wrap: break-word;
                        }

                        .s2_override-left * {
                            text-align: left !important;
                        }

                        .s2_override-right * {
                            text-align: right !important;
                        }

                        .s2_override-center * {
                            text-align: center !important;
                        }

                        .s2_override-justify * {
                            text-align: justify !important;
                        }

                        .s2 li {
                            font-style: inherit;
                            font-weight: inherit;
                            line-height: inherit;
                            letter-spacing: normal;
                        }

                        .s2 ol,
                        .s2 ul {
                            padding-left: 1.3em;
                            padding-right: 0;
                            margin-left: 0.5em;
                            margin-right: 0;
                            line-height: normal;
                            letter-spacing: normal;
                        }

                        .s2 ol[class~="wix-list"],
                        .s2 ul[class~="wix-list"] {
                            padding-left: 0;
                            padding-right: 0;
                        }

                        .s2 ol[class~="wix-list"] li,
                        .s2 ul[class~="wix-list"] li {
                            margin-left: 1.3em;
                            margin-right: 0;
                        }

                        .s2 ol[class~="wix-list"][dir="rtl"],
                        .s2 ul[class~="wix-list"][dir="rtl"] {
                            padding-left: 0;
                            padding-right: 0;
                        }

                        .s2 ol[class~="wix-list"][dir="rtl"] li,
                        .s2 ul[class~="wix-list"][dir="rtl"] li {
                            margin-left: 0;
                            margin-right: 1.3em;
                        }

                        .s2 ul {
                            list-style-type: disc;
                        }

                        .s2 ol {
                            list-style-type: decimal;
                        }

                        .s2 ul ul,
                        .s2 ol ul {
                            list-style-type: circle;
                        }

                        .s2 ul ul ul,
                        .s2 ol ul ul {
                            list-style-type: square;
                        }

                        .s2 ul ol ul,
                        .s2 ol ol ul {
                            list-style-type: square;
                        }

                        .s2 ul[dir="rtl"],
                        .s2 ol[dir="rtl"] {
                            padding-left: 0;
                            padding-right: 1.3em;
                            margin-left: 0;
                            margin-right: 0.5em;
                        }

                        .s2 ul[dir="rtl"] ul,
                        .s2 ul[dir="rtl"] ol,
                        .s2 ol[dir="rtl"] ul,
                        .s2 ol[dir="rtl"] ol {
                            padding-left: 0;
                            padding-right: 1.3em;
                            margin-left: 0;
                            margin-right: 0.5em;
                        }

                        .s2 p {
                            margin: 0;
                            line-height: normal;
                            letter-spacing: normal;
                        }

                        .s2 h1 {
                            margin: 0;
                            line-height: normal;
                            letter-spacing: normal;
                        }

                        .s2 h2 {
                            margin: 0;
                            line-height: normal;
                            letter-spacing: normal;
                        }

                        .s2 h3 {
                            margin: 0;
                            line-height: normal;
                            letter-spacing: normal;
                        }

                        .s2 h4 {
                            margin: 0;
                            line-height: normal;
                            letter-spacing: normal;
                        }

                        .s2 h5 {
                            margin: 0;
                            line-height: normal;
                            letter-spacing: normal;
                        }

                        .s2 h6 {
                            margin: 0;
                            line-height: normal;
                            letter-spacing: normal;
                        }

                        .s2 a {
                            color: inherit;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$s3">
                        .s3 {
                            overflow: hidden;
                        }

                        .s3 iframe {
                            position: absolute;
                            width: 100%;
                            height: 100%;
                            overflow: hidden;
                        }

                        .s3preloaderOverlay {
                            position: absolute;
                            top: 0;
                            left: 0;
                            color: #373737;
                            width: 100%;
                            height: 100%;
                        }

                        .s3preloaderOverlaycontent {
                            width: 100%;
                            height: 100%;
                        }

                        .s3unavailableMessageOverlay {
                            position: absolute;
                            top: 0;
                            left: 0;
                            color: #373737;
                            width: 100%;
                            height: 100%;
                        }

                        .s3unavailableMessageOverlaycontent {
                            width: 100%;
                            height: 100%;
                            background: rgba(255, 255, 255, 0.9);
                            font-size: 0;
                            margin-top: 5px;
                        }

                        .s3unavailableMessageOverlaytextContainer {
                            color: #373737;
                            font-family: "Helvetica Neue", "HelveticaNeueW01-55Roma", "HelveticaNeueW02-55Roma", "HelveticaNeueW10-55Roma", Helvetica, Arial, sans-serif;
                            font-size: 14px;
                            display: inline-block;
                            vertical-align: middle;
                            width: 100%;
                            margin-top: 10px;
                            text-align: center;
                        }

                        .s3unavailableMessageOverlay a {
                            color: #0099FF;
                            text-decoration: underline;
                            cursor: pointer;
                        }

                        .s3unavailableMessageOverlayiconContainer {
                            display: none;
                        }

                        .s3unavailableMessageOverlaydismissButton {
                            display: none;
                        }

                        .s3unavailableMessageOverlaytextTitle {
                            font-family: "Helvetica Neue", "HelveticaNeueW01-55Roma", "HelveticaNeueW02-55Roma", "HelveticaNeueW10-55Roma", Helvetica, Arial, sans-serif;
                            display: none;
                        }

                        .s3unavailableMessageOverlay[data-state~="hideIframe"] .s3unavailableMessageOverlay_buttons {
                            opacity: 1;
                        }

                        .s3unavailableMessageOverlay[data-state~="hideOverlay"] {
                            display: none;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$s4">
                        .s4itemsContainer {
                            position: absolute;
                            width: 100%;
                            height: 100%;
                            white-space: nowrap;
                        }

                        .s4itemsContainer > div:last-child {
                            margin: 0 !important;
                        }

                        .s4[data-state~="mobileView"] .s4itemsContainer {
                            position: absolute;
                            width: 100%;
                            height: 100%;
                            white-space: normal;
                        }

                        .s4imageItemlink {
                            cursor: pointer;
                        }

                        .s4imageItemimageimage {
                            position: static;
                            box-shadow: #000 0 0 0;
                            -webkit-user-select: none;
                            -moz-user-select: none;
                            -ms-user-select: none;
                            user-select: none;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$s5">
                        .s5screenWidthBackground {
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                        }

                        .s5[data-state~="mobileView"] {
                            position: absolute !important;
                        }

                        .s5[data-state~="fixedPosition"] {
                            position: fixed !important;
                            left: auto !important;
                            z-index: 50;
                        }

                        .s5[data-state~="fixedPosition"].s5_footer {
                            top: auto;
                            bottom: 0;
                        }

                        .s5bg {
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                        }

                        .s5inlineContent {
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                        }

                        .s5centeredContent {
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$s6">
                        .s6 {
                            height: 100px;
                            width: 100px;
                        }

                        .s6overlay {
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                            background-color: rgba(0, 0, 0, 0.664);
                        }

                        .s6inlineContent {
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$s7">
                        .s7screenWidthBackground {
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                        }

                        .s7[data-state~="mobileView"] {
                            position: absolute !important;
                        }

                        .s7[data-state~="fixedPosition"] {
                            position: fixed !important;
                            left: auto !important;
                            z-index: 50;
                        }

                        .s7[data-state~="fixedPosition"].s7_footer {
                            top: auto;
                            bottom: 0;
                        }

                        .s7_bg {
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                            background-color: rgba(83, 81, 81, 1);
                            border-top: 0px solid rgba(83, 81, 81, 1);
                            border-bottom: 0px solid rgba(83, 81, 81, 1);
                        }

                        .s7[data-state~="mobileView"] .s7bg {
                            left: 10px;
                            right: 10px;
                        }

                        .s7bg {
                            position: absolute;
                            top: 0px;
                            right: 0;
                            bottom: 0px;
                            left: 0;
                            background-color: rgba(83, 81, 81, 1);
                            border-radius: 0;
                        }

                        .s7inlineContent {
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                        }

                        .s7centeredContent {
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$s8">
                        .s8itemsContainer {
                            width: calc(100% - 0px);
                            white-space: nowrap;
                            position: relative;
                            overflow: hidden;
                        }

                        .s8moreContainer {
                            overflow: visible;
                            display: inherit;
                            white-space: nowrap;
                            width: auto;
                            background-color: rgba(83, 81, 81, 1);
                            border-radius: 0;
                        }

                        .s8dropWrapper {
                            z-index: 99999;
                            display: block;
                            opacity: 1;
                            visibility: hidden;
                            position: absolute;
                            margin-top: 7px;
                        }

                        .s8dropWrapper[data-dropMode="dropUp"] {
                            margin-top: 0;
                            margin-bottom: 7px;
                        }

                        .s8repeaterButton {
                            height: 100%;
                            position: relative;
                            box-sizing: border-box;
                            display: inline-block;
                            cursor: pointer;
                            font: normal normal normal 15px/1.4em raleway, sans-serif;
                        }

                        .s8repeaterButton[data-state~="header"] a,
                        .s8repeaterButton[data-state~="header"] div {
                            cursor: default !important;
                        }

                        .s8repeaterButton_gapper {
                            padding: 0 5px;
                        }

                        .s8repeaterButtonlabel {
                            display: inline-block;
                            padding: 0 10px;
                            color: #D3D3D3;
                            transition: color 0.4s ease 0s;
                        }

                        .s8repeaterButton[data-state~="drop"] {
                            width: 100%;
                            display: block;
                        }

                        .s8repeaterButton[data-state~="drop"] .s8repeaterButtonlabel {
                            padding: 0 .5em;
                        }

                        .s8repeaterButton[data-state~="over"] .s8repeaterButtonlabel {
                            color: #A2C2C9;
                            transition: color 0.4s ease 0s;
                        }

                        .s8repeaterButton[data-state~="selected"] .s8repeaterButtonlabel {
                            color: #FFFFFF;
                            transition: color 0.4s ease 0s;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$s9">
                        .s9 {
                            overflow: hidden;
                        }

                        .s9 iframe {
                            position: absolute;
                            width: 100%;
                            height: 100%;
                            overflow: hidden;
                        }

                        .s9preloaderOverlay {
                            position: absolute;
                            top: 0;
                            left: 0;
                            color: #373737;
                            width: 100%;
                            height: 100%;
                        }

                        .s9preloaderOverlaycontent {
                            width: 100%;
                            height: 100%;
                        }

                        .s9unavailableMessageOverlay {
                            position: absolute;
                            top: 0;
                            left: 0;
                            color: #373737;
                            width: 100%;
                            height: 100%;
                        }

                        .s9unavailableMessageOverlaycontent {
                            width: 100%;
                            height: 100%;
                            background: rgba(255, 255, 255, 0.9);
                            font-size: 0;
                            margin-top: 5px;
                        }

                        .s9unavailableMessageOverlaytextContainer {
                            color: #373737;
                            font-family: "Helvetica Neue", "HelveticaNeueW01-55Roma", "HelveticaNeueW02-55Roma", "HelveticaNeueW10-55Roma", Helvetica, Arial, sans-serif;
                            font-size: 14px;
                            display: inline-block;
                            vertical-align: middle;
                            width: 100%;
                            margin-top: 10px;
                            text-align: center;
                        }

                        .s9unavailableMessageOverlay a {
                            color: #0099FF;
                            text-decoration: underline;
                            cursor: pointer;
                        }

                        .s9unavailableMessageOverlayiconContainer {
                            display: none;
                        }

                        .s9unavailableMessageOverlaydismissButton {
                            display: none;
                        }

                        .s9unavailableMessageOverlaytextTitle {
                            font-family: "Helvetica Neue", "HelveticaNeueW01-55Roma", "HelveticaNeueW02-55Roma", "HelveticaNeueW10-55Roma", Helvetica, Arial, sans-serif;
                            display: none;
                        }

                        .s9unavailableMessageOverlay[data-state~="hideIframe"] .s9unavailableMessageOverlay_buttons {
                            opacity: 1;
                        }

                        .s9unavailableMessageOverlay[data-state~="hideOverlay"] {
                            display: none;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$s10">
                        .s10bg {
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                        }

                        .s10[data-state~="mobileView"] .s10bg {
                            left: 10px;
                            right: 10px;
                        }

                        .s10inlineContent {
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$s11">
                        .s11bg {
                            overflow: hidden;
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                            background-color: rgba(255, 255, 255, 0.5);
                        }

                        .s11inlineContent {
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$s12">
                        .s12[data-state~="shouldUseFlex"] .s12link,
                        .s12[data-state~="shouldUseFlex"] .s12labelwrapper {
                            text-align: initial;
                            display: -webkit-box;
                            display: -webkit-flex;
                            display: flex;
                            -webkit-box-align: center;
                            -webkit-align-items: center;
                            align-items: center;
                        }

                        .s12[data-state~="shouldUseFlex"][data-state~="center"] .s12link,
                        .s12[data-state~="shouldUseFlex"][data-state~="center"] .s12labelwrapper {
                            -webkit-box-pack: center;
                            -webkit-justify-content: center;
                            justify-content: center;
                        }

                        .s12[data-state~="shouldUseFlex"][data-state~="left"] .s12link,
                        .s12[data-state~="shouldUseFlex"][data-state~="left"] .s12labelwrapper {
                            -webkit-box-pack: start;
                            -webkit-justify-content: flex-start;
                            justify-content: flex-start;
                        }

                        .s12[data-state~="shouldUseFlex"][data-state~="right"] .s12link,
                        .s12[data-state~="shouldUseFlex"][data-state~="right"] .s12labelwrapper {
                            -webkit-box-pack: end;
                            -webkit-justify-content: flex-end;
                            justify-content: flex-end;
                        }

                        .s12link {
                            border-radius: 0;
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                            transition: border-color 0.4s ease 0s, background-color 0.4s ease 0s;
                        }

                        .s12label {
                            font: normal normal normal 18px/1.4em raleway, sans-serif;
                            transition: color 0.4s ease 0s;
                            color: #FFFFFF;
                            display: inline-block;
                            margin: calc(-1 * 2px) 2px 0;
                            position: relative;
                            white-space: nowrap;
                        }

                        .s12[data-state~="shouldUseFlex"] .s12label {
                            margin: 0;
                        }

                        .s12[data-disabled="false"] .s12link {
                            background-color: rgba(48, 49, 50, 1);
                            border: solid rgba(48, 49, 50, 1) 2px;
                            cursor: pointer !important;
                        }

                        .s12[data-disabled="false"]:active[data-state~="mobile"] .s12link,
                        .s12[data-disabled="false"]:hover[data-state~="desktop"] .s12link {
                            background-color: rgba(255, 255, 255, 1);
                            border-color: rgba(255, 255, 255, 1);
                        }

                        .s12[data-disabled="false"]:active[data-state~="mobile"] .s12label,
                        .s12[data-disabled="false"]:hover[data-state~="desktop"] .s12label {
                            color: #303132;
                        }

                        .s12[data-disabled="true"] .s12link {
                            background-color: rgba(204, 204, 204, 1);
                            border-color: rgba(204, 204, 204, 1);
                        }

                        .s12[data-disabled="true"] .s12label {
                            color: #FFFFFF;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$s13">
                        .s13 {
                            border-bottom: 1px solid rgba(48, 49, 50, 1);
                            height: 0 !important;
                            min-height: 0 !important;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$s14">
                        .s14_zoomedin {
                            cursor: url(https://static.parastorage.com/services/skins/2.1229.56/images/wysiwyg/core/themes/base/cursor_zoom_out.png), url(https://static.parastorage.com/services/skins/2.1229.56/images/wysiwyg/core/themes/base/cursor_zoom_out.cur), auto;
                            overflow: hidden;
                            display: block;
                        }

                        .s14_zoomedout {
                            cursor: url(https://static.parastorage.com/services/skins/2.1229.56/images/wysiwyg/core/themes/base/cursor_zoom_in.png), url(https://static.parastorage.com/services/skins/2.1229.56/images/wysiwyg/core/themes/base/cursor_zoom_in.cur), auto;
                        }

                        .s14link {
                            display: block;
                            overflow: hidden;
                        }

                        .s14img {
                            overflow: hidden;
                        }

                        .s14imgimage {
                            position: static;
                            box-shadow: #000 0 0 0;
                            -webkit-user-select: none;
                            -moz-user-select: none;
                            -ms-user-select: none;
                            user-select: none;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$s15">
                        .s15 {
                            background: #fff;
                            overflow: hidden;
                            z-index: 100000;
                            box-shadow: 4px 4px 15px rgba(0, 0, 0, 0.4);
                            border-radius: 3px;
                        }

                        .s15iframe {
                            position: absolute;
                            width: 100%;
                            height: 100%;
                            z-index: 1000;
                        }

                        .s15closeButton {
                            position: absolute;
                            z-index: 1001;
                            top: 10px;
                            right: 10px;
                            cursor: pointer;
                            background: transparent url(https://static.parastorage.com/services/skins/2.1229.56/images/wysiwyg/core/themes/base/popup_close_x.png) no-repeat right top;
                            height: 24px;
                            width: 24px;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$s16">
                        .s16bg {
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                        }

                        .s16[data-state~="mobileView"] .s16bg {
                            left: 10px;
                            right: 10px;
                        }

                        .s16inlineContent {
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$s17">
                        .s17iframe {
                            overflow: hidden;
                            position: absolute;
                            width: 100%;
                            height: 100%;
                            display: block;
                        }

                        .s17[data-state~="iframeNotShown"] .s17iframe {
                            display: none;
                        }

                        .s17[data-state~="iframeRenderedInvisible"] .s17iframe {
                            visibility: hidden;
                        }

                        .s17preloaderOverlay {
                            position: absolute;
                            top: 0;
                            left: 0;
                            color: #373737;
                            width: 100%;
                            height: 100%;
                        }

                        .s17preloaderOverlaycontent {
                            width: 100%;
                            height: 100%;
                        }

                        .s17unavailableMessageOverlay {
                            position: absolute;
                            top: 0;
                            left: 0;
                            color: #373737;
                            width: 100%;
                            height: 100%;
                        }

                        .s17unavailableMessageOverlaycontent {
                            width: 100%;
                            height: 100%;
                            background: rgba(255, 255, 255, 0.9);
                            font-size: 0;
                            margin-top: 5px;
                        }

                        .s17unavailableMessageOverlaytextContainer {
                            color: #373737;
                            font-family: "Helvetica Neue", "HelveticaNeueW01-55Roma", "HelveticaNeueW02-55Roma", "HelveticaNeueW10-55Roma", Helvetica, Arial, sans-serif;
                            font-size: 14px;
                            display: inline-block;
                            vertical-align: middle;
                            width: 100%;
                            margin-top: 10px;
                            text-align: center;
                        }

                        .s17unavailableMessageOverlay a {
                            color: #0099FF;
                            text-decoration: underline;
                            cursor: pointer;
                        }

                        .s17unavailableMessageOverlayiconContainer {
                            display: none;
                        }

                        .s17unavailableMessageOverlaydismissButton {
                            display: none;
                        }

                        .s17unavailableMessageOverlaytextTitle {
                            font-family: "Helvetica Neue", "HelveticaNeueW01-55Roma", "HelveticaNeueW02-55Roma", "HelveticaNeueW10-55Roma", Helvetica, Arial, sans-serif;
                            display: none;
                        }

                        .s17unavailableMessageOverlay[data-state~="hideIframe"] .s17unavailableMessageOverlay_buttons {
                            opacity: 1;
                        }

                        .s17unavailableMessageOverlay[data-state~="hideOverlay"] {
                            display: none;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$wixAds">
                        .wixAdsmobileAd {
                            width: 100%;
                            height: 30px;
                            position: relative;
                            display: block;
                            text-align: center;
                            background-image: url(https://static.parastorage.com/services/skins/2.1229.56/images/wysiwyg/core/themes/base/wixads/BG91x1.jpg);
                            background-repeat: repeat;
                            background-size: 100% 30px;
                            z-index: 999;
                        }

                        .wixAdsdesktopWADBottom {
                            position: fixed;
                            z-index: 999;
                            width: 100%;
                            bottom: 0;
                            max-height: 10vh;
                        }

                        .wixAdsdesktopWADBottomContent {
                            width: 100%;
                            height: 40px;
                            text-align: center;
                            background-color: #404040;
                            border-radius: 6px 6px 0 0;
                            pointer-events: all;
                            cursor: pointer;
                        }

                        .wixAdsdesktopWADBottomContent:hover {
                            background-color: #222;
                        }

                        .wixAds[data-state~="facebook"] .wixAdsdesktopWADBottomContent {
                            width: 500px;
                            margin: 0 auto;
                        }

                        .wixAdsdesktopWADTop {
                            position: fixed;
                            z-index: 999;
                            height: 26px;
                            top: 0;
                            right: 50px;
                            overflow: hidden;
                            background-color: #404040;
                            border-radius: 0 0 6px 6px;
                            pointer-events: all;
                            cursor: pointer;
                            -webkit-transition: all .3s ease-in-out;
                            transition: all .3s ease-in-out;
                        }

                        .wixAdsdesktopWADTop:hover {
                            height: 97px;
                            background-color: rgba(50, 50, 50, 0.8);
                        }

                        .wixAdsdesktopWADTop:hover .wixAdsdesktopWADTopLabel {
                            background-color: #222;
                        }

                        .wixAdsdesktopWADTopLabel {
                            padding: 6px;
                            font-size: 13px;
                            line-height: 1.3em;
                            color: #FFF;
                            width: 100%;
                            font-size: 13px;
                            color: #FFF;
                            font-weight: bold;
                            line-height: 18px;
                            text-align: justify;
                            padding: 5px 10px;
                        }

                        .wixAds[data-state~="desktop"] .wixAdsmobileAd {
                            display: none;
                        }

                        .wixAds[data-state~="mobile"] .wixAdsdesktopWADTop {
                            display: none;
                        }

                        .wixAds[data-state~="mobile"] .wixAdsdesktopWADBottom {
                            display: none;
                        }

                        .wixAdsdesktopWADTopLabel .wixAds_smallMusa {
                            display: inline-block;
                            text-indent: -9999px;
                            width: 16px;
                            height: 16px;
                            margin-right: 5px;
                            background-image: url(https://static.parastorage.com/services/skins/2.1229.56/images/wysiwyg/core/themes/base/wixads/wf_label_static.png);
                            background-repeat: no-repeat;
                            background-position: 0% 0%;
                        }

                        .wixAdsdesktopWADTopLabel .wixAds_smallLogo {
                            display: inline-block;
                            text-indent: -9999px;
                            width: 29px;
                            height: 16px;
                            background-image: url(https://static.parastorage.com/services/skins/2.1229.56/images/wysiwyg/core/themes/base/wixads/wf_label_static.png);
                            background-repeat: no-repeat;
                            background-position: -16px top;
                        }

                        .wixAdsdesktopWADTopContent {
                            font-size: 13px;
                            line-height: 1.3em;
                            color: #ffffff;
                            font-weight: bold;
                            line-height: 18px;
                            text-align: justify;
                            padding: 5px 10px;
                            width: 100%;
                        }

                        .wixAdsdesktopWADBottomContent .wixAds_faceBanner {
                            background-color: rgba(64, 64, 64, 1);
                            width: 500px;
                            height: 100%;
                            margin: 0 auto;
                            border-radius: 6px 6px 0 0;
                            padding: 5px 0 0 0;
                        }

                        .wixAdsdesktopWADBottomContent .wixAds_faceBanner div {
                            display: inline-block;
                            height: 30px;
                        }

                        .wixAdsdesktopWADBottomContent .wixAds_faceBanner .wixAds_txt {
                            color: #fff;
                            font-weight: bold;
                            font-size: 15px;
                            text-align: justify;
                            margin: -2px 10px 0 19px;
                        }

                        .wixAdsdesktopWADBottomContent .wixAds_faceBanner .wixAds_logoDot {
                            position: static;
                            margin: 0 3px;
                        }

                        .wixAdsdesktopWADBottomContent .wixAds_faceBanner .wixAds_emphasis {
                            font-weight: bold;
                            position: relative;
                            top: -6px;
                        }

                        .wixAdsdesktopWADTopContent .wixAds_spacer {
                            line-height: 26px;
                        }

                        .wixAdsdesktopWADTopContent .wixAds_emphasis {
                            color: #ffcc00;
                        }

                        .wixAdsdesktopWADTopContent .wixAds_cap {
                            font-size: 16px;
                            line-height: 1.3em;
                            text-transform: uppercase;
                        }

                        .wixAdsdesktopWADTopContent .wixAds_face {
                            display: block;
                            line-height: 18px;
                            text-align: justify;
                            padding: 0 20px;
                            width: 120px;
                        }

                        .wixAdsdesktopWADBottomContent .wixAds_adFootBox {
                            height: 40px;
                            width: 100%;
                            text-align: center;
                        }

                        .wixAdsdesktopWADBottomContent .wixAds_siteBanner {
                            background-color: rgba(64, 64, 64, 1);
                            border-radius: 6px 6px 0 0;
                            width: 100%;
                            height: 100%;
                            text-align: center;
                        }

                        .wixAdsdesktopWADBottomContent:hover .wixAds_siteBanner {
                            background-color: #222;
                        }

                        .wixAdsdesktopWADBottomContent .wixAds_siteBanner .wixAds_wrapper {
                            padding: 5px 0;
                        }

                        .wixAdsdesktopWADBottomContent .wixAds_siteBanner .wixAds_wrapper div {
                            display: inline-block;
                            height: 30px;
                        }

                        .wixAdsdesktopWADBottomContent .wixAds_bigMusa {
                            text-indent: -9999px;
                            width: 36px;
                            background-image: url(https://static.parastorage.com/services/skins/2.1229.56/images/wysiwyg/core/themes/base/wixads/wf_label_static.png);
                            background-repeat: no-repeat;
                            background-position: left bottom;
                            position: relative;
                            top: -19px;
                        }

                        .wixAdsdesktopWADBottomContent.wixAds_nativeAndroid .wixAds_bigMusa {
                            overflow: hidden;
                        }

                        .wixAdsdesktopWADBottomContent .wixAds_logoDot {
                            text-indent: -9999px;
                            width: 39px;
                            height: 15px;
                            position: relative;
                            top: -4px;
                            margin: 0 5px;
                            background-image: url(https://static.parastorage.com/services/skins/2.1229.56/images/wysiwyg/core/themes/base/wixads/wf_label_static.png);
                            background-repeat: no-repeat;
                            background-position: right -17px;
                        }

                        .wixAdsdesktopWADBottomContent .wixAds_emphasis {
                            color: #ffcc00;
                            font-size: 16px;
                            text-transform: uppercase;
                        }

                        .wixAdsdesktopWADBottomContent .wixAds_txt {
                            color: #fff;
                            font-weight: bold;
                            font-size: 15px;
                        }

                        .wixAdsdesktopWADBottomContent .wixAds_siteBanner .wixAds_txt {
                            line-height: 47px;
                        }

                        @media (orientation: landscape) {
                            .wixAdsmobileAd {
                                display: none;
                            }
                        }

                        @media (orientation: landscape) {
                            .wixAds_wixAds[data-state~="mobile"] {
                                display: none;
                            }
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$mobileAppBanner">
                        .mobileAppBannercontainer {
                            position: relative;
                            overflow: hidden;
                            z-index: 99;
                            height: 70px;
                            background-color: #f2f2f2;
                            border-bottom: 1px solid #d7d7d7;
                        }

                        .mobileAppBannercontainer > div {
                            float: left;
                            margin-left: 10px;
                        }

                        .mobileAppBannerclose > a {
                            color: #777777;
                            line-height: 70px;
                            font-family: Helvetica, sans-serif, Arial;
                            font-size: 14px;
                        }

                        .mobileAppBannericonbody {
                            width: 40px;
                            height: 40px;
                            margin-top: 15px;
                            border-radius: 10px;
                            display: inline-block;
                            background-size: cover;
                            background-position: center;
                            background-repeat: no-repeat;
                        }

                        .mobileAppBannercontainer[data-device~="android"] .mobileAppBannericonbody {
                            border-radius: 3px;
                        }

                        .mobileAppBannertext {
                            color: #0d0d0d;
                            line-height: 20px;
                            margin-top: 15px;
                        }

                        .mobileAppBannerappname {
                            font-family: "Helvetica Neue", Helvetica, sans-serif, Arial;
                            font-size: 13px;
                            font-weight: 600;
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                            max-width: 175px;
                        }

                        .mobileAppBannertagline {
                            font-family: "HelveticaNeue-Light", "Helvetica Neue Light", Helvetica, sans-serif-light, Arial;
                            font-size: 13px;
                            font-weight: normal;
                        }

                        .mobileAppBannergetlink {
                            color: #3798eb;
                            line-height: normal;
                            font-family: "HelveticaNeue-Medium", Helvetica, sans-serif, Arial;
                            font-weight: 600;
                            font-size: 13px;
                        }

                        .mobileAppBannercontainer[data-device~="apple"] .mobileAppBannergetlink {
                            font-weight: 500;
                        }

                        .mobileAppBannerbaselinehack {
                            height: 14px;
                            line-height: 0px;
                            display: inline-block;
                        }

                        .mobileAppBannerget {
                            border: 1px solid #3798eb;
                            border-radius: 3px;
                            padding: 3px 10px;
                            display: inline-block;
                        }

                        @media all and (max-width: 400px) and (min-width: 0px) {
                            .mobileAppBannerget {
                                position: absolute;
                                top: 22.5px;
                                right: 10px;
                                float: none !important;
                            }
                        }

                        @media all and (min-width: 401px) {
                            .mobileAppBannerget {
                                margin-top: 22.5px;
                                margin-left: 30px !important;
                            }
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$deadComp">
                        .deadComp {
                            background: transparent;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$siteBackground">
                        .siteBackground {
                            width: 100%;
                            position: absolute;
                        }

                        .siteBackgroundbgBeforeTransition {
                            position: absolute;
                            top: 0;
                        }

                        .siteBackgroundbgAfterTransition {
                            position: absolute;
                            top: 0;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$loginDialog">
                        .loginDialog {
                            position: fixed;
                            width: 100%;
                            height: 100%;
                            z-index: 99;
                            font-family: Arial, sans-serif;
                            font-size: 1em;
                            color: #9C9C9C;
                        }

                        .loginDialogblockingLayer {
                            background-color: rgba(85, 85, 85, 0.75);
                            position: fixed;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                            visibility: visible;
                            zoom: 1;
                            overflow: auto;
                        }

                        .loginDialogdialog {
                            background-color: rgba(170, 170, 170, 0.7);
                            width: 455px;
                            position: fixed;
                            padding: 20px;
                        }

                        .loginDialog_wrapper {
                            background-color: rgba(255, 255, 255, 1);
                            padding: 45px 40px 0 40px;
                        }

                        .loginDialogxButton {
                            position: absolute;
                            top: -14px;
                            right: -14px;
                            cursor: pointer;
                            background: transparent url(https://static.parastorage.com/services/skins/2.1229.56/images/wysiwyg/core/themes/base/viewer_login_sprite.png) no-repeat right top;
                            height: 30px;
                            width: 30px;
                        }

                        .loginDialogxButton:hover {
                            background-position: right -80px;
                        }

                        .loginDialogheader {
                            padding-bottom: 25px;
                            line-height: 30px;
                        }

                        .loginDialogfavIcon {
                            float: left;
                            margin: 7px 7px 0 0;
                            width: 16px;
                            height: 16px;
                        }

                        .loginDialogtitle {
                            font-size: 20px;
                            font-weight: bold;
                            color: #555555;
                        }

                        .loginDialog[data-state~="mobile"] {
                            position: absolute;
                            width: 100%;
                            height: 100%;
                            z-index: 99;
                            font-family: Arial, sans-serif;
                            font-size: 1em;
                            color: #9C9C9C;
                            top: 0;
                        }

                        .loginDialog[data-state~="mobile"] .loginDialogheader {
                            padding-bottom: 10px;
                            line-height: 30px;
                        }

                        .loginDialog[data-state~="mobile"] .loginDialogfavIcon {
                            display: none;
                        }

                        .loginDialog[data-state~="mobile"] .loginDialogtitle {
                            font-size: 14px;
                        }

                        .loginDialog[data-state~="mobile"] .loginDialogdialog {
                            width: 260px;
                            padding: 10px;
                            position: absolute;
                        }

                        .loginDialog[data-state~="mobile"] .loginDialog_footer {
                            margin-top: 0;
                            padding-bottom: 10px;
                        }

                        .loginDialog[data-state~="mobile"] .loginDialogcancel {
                            font-size: 14px;
                            line-height: 30px;
                        }

                        .loginDialog[data-state~="mobile"] .loginDialog_wrapper {
                            padding: 14px 12px 0 12px;
                        }

                        .loginDialog[data-state~="mobile"] .loginDialogsubmitButton {
                            height: 30px;
                            width: 100px;
                            font-size: 14px;
                        }

                        .loginDialog_forgot {
                            text-align: left;
                            font-size: 12px;
                        }

                        .loginDialog_forgot a {
                            color: #0198ff;
                            border-bottom: 1px solid #0198ff;
                        }

                        .loginDialog_forgot a:hover {
                            color: #0044ff;
                            border-bottom: 1px solid #0044ff;
                        }

                        .loginDialog_error {
                            font-size: 12px;
                            color: #d74401;
                            text-align: right;
                        }

                        .loginDialog_footer {
                            width: 100%;
                            margin-top: 27px;
                            padding-bottom: 40px;
                        }

                        .loginDialogcancel {
                            color: #9C9C9C;
                            font-size: 18px;
                            text-decoration: underline;
                            line-height: 36px;
                        }

                        .loginDialogcancel:hover {
                            color: #9c3c3c;
                        }

                        .loginDialogpasswordInput label {
                            font-size: 14px;
                        }

                        .loginDialogpasswordInput label[data-type="password"] {
                            font-size: 14px;
                            line-height: 30px;
                            height: 30px;
                        }

                        .loginDialogsubmitButton {
                            float: right;
                            cursor: pointer;
                            border: solid 2px #0064a8;
                            height: 36px;
                            width: 143px;
                            background: transparent url(https://static.parastorage.com/services/skins/2.1229.56/images/wysiwyg/core/themes/base/viewer_login_sprite.png) repeat-x right -252px;
                            color: #ffffff;
                            font-size: 24px;
                            font-weight: bold;
                            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
                        }

                        .loginDialogsubmitButton:hover {
                            background-position: right -352px;
                            border-color: #004286;
                        }

                        .loginDialog[data-state="normal"] .loginDialogerror {
                            display: none;
                        }

                        .loginDialog[data-state="error"] .loginDialogerror {
                            display: block;
                            font-size: 12px;
                            color: #d74401;
                            text-align: right;
                        }

                        .loginDialog[data-state="error"] .loginDialogpasswordInput {
                            border-color: #d74401;
                        }

                        .loginDialogpasswordInput {
                            font-size: 1em;
                        }

                        .loginDialogpasswordInput label {
                            float: none;
                            font-size: 17px;
                            line-height: 25px;
                            color: #585858;
                        }

                        .loginDialogpasswordInput[data-state~="mobile"] label {
                            float: none;
                            font-size: 14px;
                            line-height: 20px;
                            color: #585858;
                        }

                        .loginDialogpasswordInputinput {
                            padding: 0 15px;
                            width: 100%;
                            height: 42px;
                            font-size: 19px;
                            line-height: 42px;
                            color: #0198ff;
                            margin: 0 -3px;
                            background: transparent url(https://static.parastorage.com/services/skins/2.1229.56/images/wysiwyg/core/themes/base/viewer_login_sprite.png) repeat-x right -170px;
                            border: solid 1px #a1a1a1;
                            box-sizing: border-box;
                        }

                        .loginDialogpasswordInput[data-state~="mobile"] .loginDialogpasswordInputinput {
                            padding: 0 15px;
                            width: 100%;
                            height: 30px;
                            font-size: 14px;
                            line-height: 30px;
                            color: #0198ff;
                            margin: 0 -3px;
                            background: transparent url(https://static.parastorage.com/services/skins/2.1229.56/images/wysiwyg/core/themes/base/viewer_login_sprite.png) repeat-x right -170px;
                            border: solid 1px #a1a1a1;
                            box-sizing: border-box;
                        }

                        .loginDialogpasswordInputinput[data-type="password"] {
                            font-size: 38px;
                        }

                        .loginDialogpasswordInput[data-state~="mobile"] .loginDialogpasswordInputinput[data-type="password"] {
                            font-size: 14px;
                        }

                        .loginDialogpasswordInputerrorMessage {
                            display: block;
                            font-size: 12px;
                            color: #d74401;
                            text-align: right;
                            height: 15px;
                        }

                        .loginDialogpasswordInput:not([data-state~="invalid"]) .loginDialogpasswordInputerrorMessage {
                            visibility: hidden;
                        }

                        .loginDialogpasswordInput[data-state~="invalid"] .loginDialogpasswordInputerrorMessage {
                            visibility: visible;
                        }

                        .loginDialogpasswordInput[data-state~="invalid"] input {
                            border-color: #d74401;
                        }

                        .loginDialogpasswordInput[data-state~="invalid"] .loginDialogpasswordInputinput {
                            border-color: red;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$strc1">
                        .strc1inlineContent {
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                        }
                    </style>
                    <style type="text/css" data-reactid=".0.0.$testStyle">
                        .testStyles {
                            position: absolute;
                            display: none;
                            z-index: 18
                        }
                    </style>
                    <div class="testStyles" data-reactid=".0.0.r"></div>
                    <style type="text/css" data-reactid=".0.0.$uploadedFonts"></style>
                    <div style="overflow:hidden;visibility:hidden;max-height:0;max-width:0;position:absolute;" data-reactid=".0.0.$fontsLoader">
                        <style data-reactid=".0.0.$fontsLoader.0">
                            .font-ruler-content::after {
                                content: "@#$%%^&*~IAO"
                            }
                        </style>
                        <div style="position: absolute; overflow: hidden; font-size: 1200px; left: -2000px; visibility: hidden; width: 0px; height: 0px;" data-reactid=".0.0.$fontsLoader.$times new roman">
                            <div style="position:relative;white-space:nowrap;font-family:serif;" data-reactid=".0.0.$fontsLoader.$times new roman.0">
                                <div style="position:absolute;width:100%;height:100%;overflow:hidden;" data-reactid=".0.0.$fontsLoader.$times new roman.0.0">
                                    <div style="width: 1px; height: 1px;" data-reactid=".0.0.$fontsLoader.$times new roman.0.0.0"></div>
                                </div><span style="font-family: times new roman,serif;" class="font-ruler-content" data-reactid=".0.0.$fontsLoader.$times new roman.0.1"></span></div>
                        </div>
                        <div style="position: absolute; overflow: hidden; font-size: 1200px; left: -2000px; visibility: hidden; width: 0px; height: 0px;" data-reactid=".0.0.$fontsLoader.$eb garamond">
                            <div style="position:relative;white-space:nowrap;font-family:serif;" data-reactid=".0.0.$fontsLoader.$eb garamond.0">
                                <div style="position:absolute;width:100%;height:100%;overflow:hidden;" data-reactid=".0.0.$fontsLoader.$eb garamond.0.0">
                                    <div style="width: 1px; height: 1px;" data-reactid=".0.0.$fontsLoader.$eb garamond.0.0.0"></div>
                                </div><span style="font-family: eb garamond,serif;" class="font-ruler-content" data-reactid=".0.0.$fontsLoader.$eb garamond.0.1"></span></div>
                        </div>
                    </div>
                </div>
                <div style="position: absolute; top: 0px; height: 0px;" class="wixAds" data-state="desktop " id="WIX_ADS" data-reactid=".0.$WIX_ADS">
                    <div style="visibility:visible;" id="WIX_ADSdesktopWADTop" class="wixAdsdesktopWADTop" data-reactid=".0.$WIX_ADS.0">
                        <div id="WIX_ADSdesktopWADTopLabel" class="wixAdsdesktopWADTopLabel" data-reactid=".0.$WIX_ADS.0.0"><span class="wixAds_smallMusa">(Wix-Logo) </span>Other <span></span>Languages </div>
                        <div id="WIX_ADSdesktopWADTopContent" class="wixAdsdesktopWADTopContent" data-reactid=".0.$WIX_ADS.0.1"><a href="../tc/profile.php" style="color:#fff">中文(繁體)</a>
                            <br><a href="../sc/profile.php" style="color:#fff">中文(簡體)</a>
                        </div>
                    </div>
                    <div style="visibility:visible;display:block !important;" id="WIX_ADSdesktopWADBottom" class="wixAdsdesktopWADBottom" data-reactid=".0.$WIX_ADS.1">
                        <div class="wixAdsdesktopWADBottomContent" id="WIX_ADSdesktopWADBottomContent" data-reactid=".0.$WIX_ADS.1.0">
                            <div class="adFootBox">
                                <div class="wixAds_siteBanner">
                                    <div class="wixAds_siteBanner">
                                        <div class="wixAds_wrapper">
                                            <div class="wixAds_bigMusa">(Wix Logo)</div>
                                            <div class="wixAds_txt wixAds_shd" style="color:#fff">Welcome to </div>
                                            <div class="wixAds_txt wixAds_shd"><a href="home.php" style="color:#fff"> wePaint </a></div>
                                            <div class="wixAds_txt wixAds_shd" style="color:#fff"> Create your account for FREE <span class="wixAds_emphasis"> &gt;&gt;</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="WIX_ADSmobileAd" class="wixAdsmobileAd" data-reactid=".0.$WIX_ADS.2">
                        <a id="WIX_ADSmobileAdLink" class="wixAdsmobileAdLink" data-reactid=".0.$WIX_ADS.2.0"><img id="WIX_ADSmobileAdImg" class="wixAdsmobileAdImg" data-reactid=".0.$WIX_ADS.2.0.0"></a>
                    </div>
                </div>
                <div id="SITE_BACKGROUND" class="siteBackground" style="position: absolute; top: 0px; height: 883px; width: 1263px;" data-reactid=".0.$SITE_BACKGROUND">
                    <div id="SITE_BACKGROUND_previous_" class="siteBackgroundprevious" data-reactid=".0.$SITE_BACKGROUND.$noPrev">
                        <div id="SITE_BACKGROUND_previousImage_" class="siteBackgroundpreviousImage" data-reactid=".0.$SITE_BACKGROUND.$noPrev.0"></div>
                        <div id="SITE_BACKGROUNDpreviousVideo" class="siteBackgroundpreviousVideo" data-reactid=".0.$SITE_BACKGROUND.$noPrev.1"></div>
                        <div id="SITE_BACKGROUND_previousOverlay_" class="siteBackgroundpreviousOverlay" data-reactid=".0.$SITE_BACKGROUND.$noPrev.2"></div>
                    </div>
                    <div id="SITE_BACKGROUND_current_c1dxd" style="top:0;height:100%;width:100%;background-color:rgba(255, 255, 255, 1);display:;position:absolute;" class="siteBackgroundcurrent" data-reactid=".0.$SITE_BACKGROUND.$c1dxd">
                        <div data-image-css="{&quot;backgroundSize&quot;:&quot;&quot;,&quot;backgroundPosition&quot;:&quot;&quot;,&quot;backgroundRepeat&quot;:&quot;&quot;}" id="SITE_BACKGROUND_currentImage_c1dxd" style="position: absolute; top: 0px; height: 100%; width: 100%;" data-type="bgimage" class="siteBackgroundcurrentImage" data-reactid=".0.$SITE_BACKGROUND.$c1dxd.$background_currentImage_scroll"></div>
                        <div style="position: relative; min-width: 0px; min-height: 0px; top: 0px; left: 0px;" id="SITE_BACKGROUNDcurrentVideo" class="siteBackgroundcurrentVideo" data-reactid=".0.$SITE_BACKGROUND.$c1dxd.1"></div>
                        <div id="SITE_BACKGROUND_currentOverlay_c1dxd" style="position:absolute;top:0;width:100%;height:100%;background-attachment:scroll;" class="siteBackgroundcurrentOverlay" data-reactid=".0.$SITE_BACKGROUND.$c1dxd.2"></div>
                    </div>
                </div>
                <div class="SITE_ROOT" id="SITE_ROOT" style="width:980px;padding-bottom:40px;" data-reactid=".0.$SITE_ROOT">
                    <div id="masterPage" style="width: 980px; position: static; top: 0px; height: 883px;" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot">
                        <div style="width: 980px; position: absolute; left: 0px; height: 296px; bottom: auto; top: 587px;" class="s0_footer s0" data-state=" " id="SITE_FOOTER" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER">
                            <div style="width: 1263px; left: -142px;" id="SITE_FOOTERscreenWidthBackground" class="s0screenWidthBackground" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.0"></div>
                            <div id="SITE_FOOTERcenteredContent" class="s0centeredContent" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1">
                                <div id="SITE_FOOTERbg" class="s0bg" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.0"></div>
                                <div id="SITE_FOOTERinlineContent" class="s0inlineContent" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1">
                                    <div style="width: 980px; position: absolute; top: 52px; height: 244px; left: 0px;" class="s1" id="comp-igqnaj0k" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k">
                                        <div style="position: absolute; top: 0px; width: calc(100vw - 0px - 0px); height: 100%; pointer-events: none; bottom: 0px; left: calc(490px - (100vw - 0px - 0px) / 2); right: calc(490px + (100vw - 0px - 0px) / 2); overflow: hidden; clip: rect(0px, 1263px, 244px, 0px);" class="s1balata" id="comp-igqnaj0kbalata" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.0">
                                            <div style="width:100%;height:100%;top:;bottom:;left:;right:;position:absolute;" class="bgColor" id="comp-igqnaj0kbalatabgcolor" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.0.$comp-igqnaj0kbalatabgcolor">
                                                <div style="width:100%;height:100%;position:absolute;background-color:transparent;" id="comp-igqnaj0kbalatabgcoloroverlay" class="bgColoroverlay" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.0.$comp-igqnaj0kbalatabgcolor.0"></div>
                                            </div>
                                            <div id="comp-igqnaj0kbalatamedia" style="position: absolute; pointer-events: none; top: 0px; width: 1263px; left: 0px; height: 244px;" data-effect="none" data-fitting="fill" data-align="center" class="balataMedia" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.0.$media_preview"></div>
                                        </div>
                                        <div id="comp-igqnaj0kinlineContent" class="s1inlineContent" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1">
                                            <div style="position: absolute; left: calc((100vw - 0px - 0px) * 0.5 + (980px - (100vw - 0px - 0px)) / 2 + 0px + -490px); width: 980px; top: 0px; height: 244px;" class="s1" id="mediaiu4ys3wj1" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1">
                                                <div style="position: absolute; top: 0px; width: calc((100vw - 0px - 0px) * 1 + 1px); height: 100%; pointer-events: none; left: calc(((100vw - 0px - 0px) * 1 - 980px) * -0.5 - 1px); bottom: 0px; overflow: hidden; clip: rect(0px, 1264px, 244px, 0px);" class="s1balata" id="mediaiu4ys3wj1balata" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.0">
                                                    <div style="width:100%;height:100%;top:;bottom:;left:;right:;position:absolute;" class="bgColor" id="mediaiu4ys3wj1balatabgcolor" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.0.$mediaiu4ys3wj1balatabgcolor">
                                                        <div style="width:100%;height:100%;position:absolute;background-color:rgba(48, 49, 50, 1);" id="mediaiu4ys3wj1balatabgcoloroverlay" class="bgColoroverlay" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.0.$mediaiu4ys3wj1balatabgcolor.0"></div>
                                                    </div>
                                                    <div id="mediaiu4ys3wj1balatamedia" style="position: absolute; pointer-events: none; top: 0px; width: 1264px; left: 0px; height: 244px;" data-effect="none" data-fitting="fill" data-align="center" class="balataMedia" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.0.$media_preview"></div>
                                                </div>
                                                <div style="position:absolute;width:980px;top:0;bottom:0;left:calc((100% - 980px) * 0.5);" id="mediaiu4ys3wj1inlineContent" class="s1inlineContent" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1">
                                                    <div style="left: 203px; width: 578px; position: absolute; top: 206px;" class="s2" id="WRchTxt0-16wb" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$WRchTxt0-16wb">
                                                        <p class="font_9" style="text-align:center"><span style="letter-spacing:0.1em"><span class="color_12">© 2016&nbsp;by Natural Driect. Proudly created with <span style="text-decoration:underline"><a href="home.php" target="_blank" data-content="http://wix.com?utm_campaign=vir_created_with" data-type="external">wePaint</a></span></span>
                                                            </span>
                                                        </p>
                                                    </div>

                                                    <div style="left: 746px; width: 184px; position: absolute; top: 28px;" class="s2" id="i1vtp4uj_2" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uj_2">
                                                        <p class="font_9" style="line-height:1.6em; text-align:center"><span class="color_12"><span><span style="letter-spacing:0.1em">NEED ASSISTANCE?</span></span>
                                                            </span>
                                                        </p>

                                                        <p class="font_9" style="line-height:1.6em; text-align:center">&nbsp;</p>

                                                        <p class="font_9" style="line-height:1.6em; text-align:center"><span style="letter-spacing:0.1em"><span class="color_11">81068068</span></span>
                                                        </p>

                                                        <p class="font_9" style="line-height:1.6em; text-align:center"><span style="letter-spacing:0.1em"><span class="color_11"><object height="0"><a data-type="mail" href="mailto:natdir@naturaldirect.org" data-content="natdir@naturaldirect.org" data-auto-recognition="true" class="auto-generated-link">natdir@naturaldirect.org</a></object></span></span>
                                                        </p>

                                                        <p class="font_8">&nbsp;</p>
                                                    </div>
                                                    <div style="left: 341px; width: 298px; position: absolute; top: 28px;" class="s2" id="icn2jp7x" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$icn2jp7x">
                                                        <p class="font_9" style="text-align: center;"><span style="letter-spacing:0.1em;"><span class="color_12">BE OUR FRIEND</span></span>
                                                        </p>
                                                    </div>
                                                    <div style="left: 49px; width: 185px; position: absolute; top: 29px;" class="s2" id="i1vtp4uk" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uk">
                                                        <p style="text-align: center;" class="font_9"><span class="color_12"><span style="letter-spacing:0.1em;">STAY CONNECTED</span></span>
                                                        </p>
                                                    </div>
                                                    <div style="width: 129px; left: 74px; position: absolute; top: 74px; height: 18px;" class="s4" id="i1vtp4uk_0" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uk_0">
                                                        <div id="i1vtp4uk_0itemsContainer" class="s4itemsContainer" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uk_0.0">
                                                            <div style="width:18px;height:18px;margin-bottom:0;margin-right:19px;display:inline-block;" class="s4imageItem" id="i1vtp4uk_0i0ji6" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uk_0.0.0">
                                                                <a href="https://zh-hk.facebook.com/WePaint-950298961684277/" target="_blank" data-content="https://zh-hk.facebook.com/WePaint-950298961684277/" data-type="external" id="i1vtp4uk_0i0ji6link" class="s4imageItemlink" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uk_0.0.0.0">
                                                                    <div style="position:absolute;width:18px;height:18px;" id="i1vtp4uk_0i0ji6image" class="s4imageItemimage" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uk_0.0.0.0.0">
                                                                        <div class="s4imageItemimagepreloader" id="i1vtp4uk_0i0ji6imagepreloader" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uk_0.0.0.0.0.0"></div><img id="i1vtp4uk_0i0ji6imageimage" alt="" src="https://static.wixstatic.com/media/4f857b2e8a316c4e1ed16717a3d4ec8c.png/v1/fill/w_18,h_18,al_c,usm_0.66_1.00_0.01/4f857b2e8a316c4e1ed16717a3d4ec8c.png" style="width:18px;height:18px;object-fit:cover;" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uk_0.0.0.0.0.$image"></div>
                                                                </a>
                                                            </div>
                                                            <div style="width:18px;height:18px;margin-bottom:0;margin-right:19px;display:inline-block;" class="s4imageItem" id="i1vtp4uk_0i119ni" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uk_0.0.1">
                                                                <a href="https://twitter.com/HK_wePaint" target="_blank" data-content="https://twitter.com/HK_wePaint" data-type="external" id="i1vtp4uk_0i119nilink" class="s4imageItemlink" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uk_0.0.1.0">
                                                                    <div style="position:absolute;width:18px;height:18px;" id="i1vtp4uk_0i119niimage" class="s4imageItemimage" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uk_0.0.1.0.0">
                                                                        <div class="s4imageItemimagepreloader" id="i1vtp4uk_0i119niimagepreloader" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uk_0.0.1.0.0.0"></div><img id="i1vtp4uk_0i119niimageimage" alt="" src="https://static.wixstatic.com/media/89b1d2497b29ccbb7d37be1ec6ef0052.png/v1/fill/w_18,h_18,al_c,usm_0.66_1.00_0.01/89b1d2497b29ccbb7d37be1ec6ef0052.png" style="width:18px;height:18px;object-fit:cover;" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uk_0.0.1.0.0.$image"></div>
                                                                </a>
                                                            </div>
                                                            <div style="width:18px;height:18px;margin-bottom:0;margin-right:19px;display:inline-block;" class="s4imageItem" id="i1vtp4uk_0i21qe5" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uk_0.0.2">
                                                                <a href="https://www.pinterest.com/hkwepaint/" target="_blank" data-content="https://www.pinterest.com/hkwepaint/" data-type="external" id="i1vtp4uk_0i21qe5link" class="s4imageItemlink" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uk_0.0.2.0">
                                                                    <div style="position:absolute;width:18px;height:18px;" id="i1vtp4uk_0i21qe5image" class="s4imageItemimage" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uk_0.0.2.0.0">
                                                                        <div class="s4imageItemimagepreloader" id="i1vtp4uk_0i21qe5imagepreloader" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uk_0.0.2.0.0.0"></div><img id="i1vtp4uk_0i21qe5imageimage" alt="" src="https://static.wixstatic.com/media/7a47b4f9746168811c85d801bc3e300a.png/v1/fill/w_18,h_18,al_c,usm_0.66_1.00_0.01/7a47b4f9746168811c85d801bc3e300a.png" style="width:18px;height:18px;object-fit:cover;" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uk_0.0.2.0.0.$image"></div>
                                                                </a>
                                                            </div>
                                                            <div style="width:18px;height:18px;margin-bottom:0;margin-right:19px;display:inline-block;" class="s4imageItem" id="i1vtp4uk_0i3mht" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uk_0.0.3">
                                                                <a href="https://www.instagram.com/hkwepaint/" target="_blank" data-content="https://www.instagram.com/hkwepaint/" data-type="external" id="i1vtp4uk_0i3mhtlink" class="s4imageItemlink" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uk_0.0.3.0">
                                                                    <div style="position:absolute;width:18px;height:18px;" id="i1vtp4uk_0i3mhtimage" class="s4imageItemimage" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uk_0.0.3.0.0">
                                                                        <div class="s4imageItemimagepreloader" id="i1vtp4uk_0i3mhtimagepreloader" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uk_0.0.3.0.0.0"></div><img id="i1vtp4uk_0i3mhtimageimage" alt="" src="https://static.wixstatic.com/media/81af6121f84c41a5b4391d7d37fce12a.png/v1/fill/w_18,h_18,al_c,usm_0.66_1.00_0.01/81af6121f84c41a5b4391d7d37fce12a.png" style="width:18px;height:18px;object-fit:cover;" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_FOOTER.1.1.$comp-igqnaj0k.1.$mediaiu4ys3wj1/=1$mediaiu4ys3wj1.1.$i1vtp4uk_0.0.3.0.0.$image"></div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="width: 980px; position: absolute; top: 86px; height: 501px; left: 0px;" class="s5" data-state="" id="PAGES_CONTAINER" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER">
                            <div style="width: 1263px; left: -142px;" id="PAGES_CONTAINERscreenWidthBackground" class="s5screenWidthBackground" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.0"></div>
                            <div id="PAGES_CONTAINERcenteredContent" class="s5centeredContent" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1">
                                <div id="PAGES_CONTAINERbg" class="s5bg" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.0"></div>
                                <div id="PAGES_CONTAINERinlineContent" class="s5inlineContent" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1">
                                    <div style="left: 0px; width: 980px; position: absolute; top: 0px; height: 501px;" class="s6" id="SITE_PAGES" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES">
                                        <div style="left: 0px; width: 980px; position: absolute; top: 0px; height: 1291px; display: none;" class="s10" id="c1dxd" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$c1dxd">
                                            <div id="c1dxdbg" class="s10bg" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$c1dxd.0"></div>
                                            <div id="c1dxdinlineContent" class="s10inlineContent" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$c1dxd.1"></div>
                                        </div>
                                        <div style="left: 0px; width: 980px; position: absolute; top: 0px; height: 1046px; display: none;" class="s16" id="czpg" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$czpg">
                                            <div id="czpgbg" class="s16bg" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$czpg.0"></div>
                                            <div id="czpginlineContent" class="s16inlineContent" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$czpg.1"></div>
                                        </div>
                                        <div style="left: 0px; width: 980px; position: absolute; top: 0px; height: 501px;" class="s16" id="co68" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$co68">
                                            <div id="co68bg" class="s16bg" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$co68.0"></div>
                                            <div id="co68inlineContent" class="s16inlineContent" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$co68.1">
                                                <div style="min-height: 300px; min-width: 973px; visibility: visible; left: 3px; width: 973px; position: absolute; top: 201px; height: 300px;" class="s17" id="i418uphz" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$co68.1.$i418uphz">
                                                    <iframe src="http://ecom.wix.com/storefront/gallery?cacheKiller=1476508284331&amp;compId=i418uphz&amp;deviceType=desktop&amp;instance=48K1g4JxoSdi5ukjbcNO9LZDA_gh6EaQpJ4oS1z_ZXc.eyJpbnN0YW5jZUlkIjoiMDM3YmQ0MWItNTA5ZC00NzEzLWExMTUtMzg2NTA5ZWExZWRjIiwic2lnbkRhdGUiOiIyMDE2LTEwLTE1VDA1OjA5OjUwLjAwNloiLCJ1aWQiOm51bGwsImlwQW5kUG9ydCI6IjEyMy4yMDMuNjIuMjIxLzQxMTM2IiwidmVuZG9yUHJvZHVjdElkIjpudWxsLCJkZW1vTW9kZSI6ZmFsc2UsIm9yaWdpbkluc3RhbmNlSWQiOiI1NTUwODk3YS00MTNhLTRkNGMtYjc4Ny03NGZiYjQyMTU4M2IiLCJhaWQiOiJkMTYzNWRiYy1hMzNjLTQ5OGYtOTQ1Yi1iMmMyN2Q0NGZiNDkiLCJiaVRva2VuIjoiM2Q1MGQzYTgtNTJjNi0wYmNjLTM5MWYtZWM0YmE3NTQ1Nzc2Iiwic2l0ZU93bmVySWQiOiI0MjUxYTlhNy1hMTVjLTQzNWUtYjBkNS0zNGIwNjUzZTZmMDIifQ&amp;locale=en&amp;section-url=http%3A%2F%2Fhkwepaint.wixsite.com%2Fonline%2Forder%2F&amp;target=_top&amp;viewMode=site&amp;width=973" scrolling="no" allowtransparency="true" allowfullscreen="" name="i418uphz" style="display:block;width:100%;height:100%;overflow:hidden;position:absolute;" id="i418uphziframe" class="s17iframe" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$co68.1.$i418uphz.$http=2//ecom=1wix=1com/storefront/gallery?cacheKiller=01476508284331&amp;compId=0i418uphz&amp;deviceType=0desktop&amp;instance=048K1g4JxoSdi5ukjbcNO9LZDA_gh6EaQpJ4oS1z_ZXc=1eyJpbnN0YW5jZUlkIjoiMDM3YmQ0MWItNTA5ZC00NzEzLWExMTUtMzg2NTA5ZWExZWRjIiwic2lnbkRhdGUiOiIyMDE2LTEwLTE1VDA1OjA5OjUwLjAwNloiLCJ1aWQiOm51bGwsImlwQW5kUG9ydCI6IjEyMy4yMDMuNjIuMjIxLzQxMTM2IiwidmVuZG9yUHJvZHVjdElkIjpudWxsLCJkZW1vTW9kZSI6ZmFsc2UsIm9yaWdpbkluc3RhbmNlSWQiOiI1NTUwODk3YS00MTNhLTRkNGMtYjc4Ny03NGZiYjQyMTU4M2IiLCJhaWQiOiJkMTYzNWRiYy1hMzNjLTQ5OGYtOTQ1Yi1iMmMyN2Q0NGZiNDkiLCJiaVRva2VuIjoiM2Q1MGQzYTgtNTJjNi0wYmNjLTM5MWYtZWM0YmE3NTQ1Nzc2Iiwic2l0ZU93bmVySWQiOiI0MjUxYTlhNy1hMTVjLTQzNWUtYjBkNS0zNGIwNjUzZTZmMDIifQ&amp;locale=0en&amp;section-url=0http%3A%2F%2Fhkwepaint=1wixsite=1com%2Fonline%2Forder%2F&amp;target=0_top&amp;viewMode=0site&amp;width=0973" frameborder="0"></iframe>
                                                    <div id="i418uphzoverlay" class="s17overlay" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$co68.1.$i418uphz.1"></div>
                                                </div>
                                                <div style="left: 342px; width: 296px; position: absolute; top: 80px;" class="s2" id="i418v9bj" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$co68.1.$i418v9bj">
                                                    <h2 class="font_2" style="text-align:center"><span style="letter-spacing:0.3em">MEMBERS</span></h2>
                                                    <br>

                                                    <?php
                                                    if (isset($_SESSION['No'])) {
                                                        if (isset($_SESSION['carts']) && !empty($_SESSION['carts'])) {
                                                            $carts = $_SESSION['carts'];
                                                            $item_total = "0";
                                                            echo "<div style=\"border: 1px dotted red; width: 450px; margin: 5px; padding:5px\">";
                                                            echo "<h2>Your shopping cart contain the following item:<br></h2>";

                                                            // use foreach to print out each elements in the $carts 
                                                            // code and quantity
                                                            foreach ($carts as $code1 => $num) {
                                                                ?>

                                                                <form method="GET" action="memberorder.php">
                                                                    <img src="<?php echo $product_array[$code1]["productUrl"]; ?>" width="100" height="100">
                                                                    <?php
                                                                    echo "x       " . $num;
                                                                    echo "<input type=\"hidden\" name=\"code\" value=\"$code1\"/>";
                                                                    $item_total = ($product_array[$code1]["price"] * $num);
                                                                    echo "<b>subtotal:   $item_total</b>";
                                                                    ?>
                                                                    <input type="hidden" name="code1" value="<?php echo $code1; ?>"/>
                                                                    <input type="hidden" name="num" value="<?php echo $num; ?>"/>
                                                                    <input type="hidden" name="item_total" value="<?php echo $item_total; ?>"/>
                                                                    <input type="hidden" name="action" value="remove"/>
                                                                    <input type="text" name="quantity" value="1" size="2" />
                                                                    <input type="submit" value="remove"/><br>
                                                                    <input type="submit" name="order" value="order"/>
                                                                </form>

                                                                <?php
                                                            }
                                                            echo "<a href='order.php'>Back</a>";
                                                            echo "</div>";
                                                        }
                                                    } else {
                                                        echo "<center>Please Login First!</center><br>";
                                                    }
                                                    echo "<a href='members.php'>Back</a>";
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="width: 980px; position: fixed; z-index: 50; top: 0px; height: 86px; left: 0px;" class="s7" data-state=" fixedPosition" id="SITE_HEADER" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER">
                            <div style="width: 1263px; left: -142px;" id="SITE_HEADERscreenWidthBackground" class="s7screenWidthBackground" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.0">
                                <div class="s7_bg" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.0.0"></div>
                            </div>
                            <div id="SITE_HEADERcenteredContent" class="s7centeredContent" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1">
                                <div id="SITE_HEADERbg" class="s7bg" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.0"></div>
                                <div id="SITE_HEADERinlineContent" class="s7inlineContent" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1">
                                    <div data-dropmode="dropDown" id="i1ltay0q" data-menuborder-y="0" data-menubtn-border="0" data-ribbon-els="0" data-label-pad="0" data-ribbon-extra="0" style="left: 217px; width: 697px; position: absolute; top: 28px; height: 30px;" class="s8" data-state="center notMobile" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q">
                                        <div style="display: inline-block; text-align: center; overflow: visible; height: 30px;" id="i1ltay0qitemsContainer" class="s8itemsContainer" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0">
                                            <a data-original-gap-between-text-and-btn="10" style="display: inherit; color: grey; width: 91px; height: 30px; position: relative; box-sizing: border-box; overflow: visible;" data-listposition="left" href="home.php" target="_self" class="s8repeaterButton" data-state="menu  idle link notMobile" id="i1ltay0q0" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$0">
                                                <div class="s8repeaterButton_gapper" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$0.0">
                                                    <div style="text-align:center;" id="i1ltay0q0bg" class="s8repeaterButtonbg" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$0.0.0">
                                                        <p style="text-align: center; line-height: 30px;" id="i1ltay0q0label" class="s8repeaterButtonlabel" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$0.0.0.0">Home</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a data-original-gap-between-text-and-btn="10" style="display: inherit; color: grey; width: 112px; height: 30px; position: relative; box-sizing: border-box; overflow: visible;" data-listposition="center" href="about-us.php" target="_self" class="s8repeaterButton" data-state="menu  idle link notMobile" id="i1ltay0q1" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$1">
                                                <div class="s8repeaterButton_gapper" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$1.0">
                                                    <div style="text-align:center;" id="i1ltay0q1bg" class="s8repeaterButtonbg" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$1.0.0">
                                                        <p style="text-align: center; line-height: 30px;" id="i1ltay0q1label" class="s8repeaterButtonlabel" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$1.0.0.0">About Us</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a data-original-gap-between-text-and-btn="10" style="display: inherit; color: grey; width: 184px; height: 30px; position: relative; box-sizing: border-box; overflow: visible;" data-listposition="center" href="order.php" target="_self" class="s8repeaterButton" data-state="menu  idle link notMobile" id="i1ltay0q2" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$2">
                                                <div class="s8repeaterButton_gapper" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$2.0">
                                                    <div style="text-align:center;" id="i1ltay0q2bg" class="s8repeaterButtonbg" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$2.0.0">
                                                        <p style="text-align: center; line-height: 30px;" id="i1ltay0q2label" class="s8repeaterButtonlabel" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$2.0.0.0">Products &amp; Services</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a data-original-gap-between-text-and-btn="10" style="display: inherit; color: grey; width: 96px; height: 30px; position: relative; box-sizing: border-box; overflow: visible;" data-listposition="center" href="game.php" target="_self" class="s8repeaterButton" data-state="menu  idle link notMobile" id="i1ltay0q3" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$3">
                                                <div class="s8repeaterButton_gapper" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$3.0">
                                                    <div style="text-align:center;" id="i1ltay0q3bg" class="s8repeaterButtonbg" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$3.0.0">
                                                        <p style="text-align: center; line-height: 30px;" id="i1ltay0q3label" class="s8repeaterButtonlabel" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$3.0.0.0">Games</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a data-original-gap-between-text-and-btn="10" style="display: inherit; color: grey; width: 113px; height: 30px; position: relative; box-sizing: border-box; overflow: visible;" data-listposition="center" href="members.php" target="_self" class="s8repeaterButton" data-state="menu  idle link notMobile" id="i1ltay0q4" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$4">
                                                <div class="s8repeaterButton_gapper" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$4.0">
                                                    <div style="text-align:center;" id="i1ltay0q4bg" class="s8repeaterButtonbg" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$4.0.0">
                                                        <p style="text-align: center; line-height: 30px;" id="i1ltay0q4label" class="s8repeaterButtonlabel" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$4.0.0.0">Members</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a data-original-gap-between-text-and-btn="10" style="display: inherit; color: grey; width: 101px; height: 30px; position: relative; box-sizing: border-box; overflow: visible;" data-listposition="right" href="contact.php" target="_self" class="s8repeaterButton" data-state="menu  idle link notMobile" id="i1ltay0q5" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$5">
                                                <div class="s8repeaterButton_gapper" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$5.0">
                                                    <div style="text-align:center;" id="i1ltay0q5bg" class="s8repeaterButtonbg" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$5.0.0">
                                                        <p style="text-align: center; line-height: 30px;" id="i1ltay0q5label" class="s8repeaterButtonlabel" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.$5.0.0.0">Contact</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a data-original-gap-between-text-and-btn="10" style="display: inline-block; box-sizing: border-box; color: grey; height: 0px; overflow: hidden; position: absolute;" data-listposition="right" class="s8repeaterButton" data-state="menu  idle header notMobile" id="i1ltay0q__more__" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.6">
                                                <div class="s8repeaterButton_gapper" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.6.0">
                                                    <div style="text-align:center;" id="i1ltay0q__more__bg" class="s8repeaterButtonbg" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.6.0.0">
                                                        <p style="line-height:30px;text-align:center;" id="i1ltay0q__more__label" class="s8repeaterButtonlabel" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.0.6.0.0.0">More</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="i1ltay0qmoreButton" class="s8moreButton" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.1"></div>
                                        <div style="visibility: hidden; left: 203px; right: auto; bottom: auto;" data-drophposition="" data-dropalign="center" id="i1ltay0qdropWrapper" class="s8dropWrapper" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.2">
                                            <div style="visibility: hidden; left: 203px; right: auto;" id="i1ltay0qmoreContainer" class="s8moreContainer" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1ltay0q.2.0"></div>
                                        </div>
                                    </div>
                                    <div style="left: 31px; width: 186px; position: absolute; top: 31px;" class="s2" id="i1lt909p" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i1lt909p">
                                        <h1 class="font_0"><a href="home.php" target="_self"><span style="letter-spacing:0.3em">WE PAINT</span></a></h1>
                                    </div>
                                    <div style="min-height: 25px; min-width: 20px; visibility: visible; left: 928px; width: 20px; position: absolute; top: 28px; height: 25px;" class="s9" id="i418upp1" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i418upp1">
                                        <iframe src="http://ecom.wix.com/storefront/cartwidget?cacheKiller=1476508284331&amp;compId=i418upp1&amp;deviceType=desktop&amp;instance=48K1g4JxoSdi5ukjbcNO9LZDA_gh6EaQpJ4oS1z_ZXc.eyJpbnN0YW5jZUlkIjoiMDM3YmQ0MWItNTA5ZC00NzEzLWExMTUtMzg2NTA5ZWExZWRjIiwic2lnbkRhdGUiOiIyMDE2LTEwLTE1VDA1OjA5OjUwLjAwNloiLCJ1aWQiOm51bGwsImlwQW5kUG9ydCI6IjEyMy4yMDMuNjIuMjIxLzQxMTM2IiwidmVuZG9yUHJvZHVjdElkIjpudWxsLCJkZW1vTW9kZSI6ZmFsc2UsIm9yaWdpbkluc3RhbmNlSWQiOiI1NTUwODk3YS00MTNhLTRkNGMtYjc4Ny03NGZiYjQyMTU4M2IiLCJhaWQiOiJkMTYzNWRiYy1hMzNjLTQ5OGYtOTQ1Yi1iMmMyN2Q0NGZiNDkiLCJiaVRva2VuIjoiM2Q1MGQzYTgtNTJjNi0wYmNjLTM5MWYtZWM0YmE3NTQ1Nzc2Iiwic2l0ZU93bmVySWQiOiI0MjUxYTlhNy1hMTVjLTQzNWUtYjBkNS0zNGIwNjUzZTZmMDIifQ&amp;locale=en&amp;viewMode=site&amp;width=20" scrolling="no" allowtransparency="true" allowfullscreen="" name="i418upp1" style="display:block;width:100%;height:100%;overflow:hidden;position:absolute;" id="i418upp1iframe" class="s9iframe" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i418upp1.$http=2//ecom=1wix=1com/storefront/cartwidget?cacheKiller=01476508284331&amp;compId=0i418upp1&amp;deviceType=0desktop&amp;instance=048K1g4JxoSdi5ukjbcNO9LZDA_gh6EaQpJ4oS1z_ZXc=1eyJpbnN0YW5jZUlkIjoiMDM3YmQ0MWItNTA5ZC00NzEzLWExMTUtMzg2NTA5ZWExZWRjIiwic2lnbkRhdGUiOiIyMDE2LTEwLTE1VDA1OjA5OjUwLjAwNloiLCJ1aWQiOm51bGwsImlwQW5kUG9ydCI6IjEyMy4yMDMuNjIuMjIxLzQxMTM2IiwidmVuZG9yUHJvZHVjdElkIjpudWxsLCJkZW1vTW9kZSI6ZmFsc2UsIm9yaWdpbkluc3RhbmNlSWQiOiI1NTUwODk3YS00MTNhLTRkNGMtYjc4Ny03NGZiYjQyMTU4M2IiLCJhaWQiOiJkMTYzNWRiYy1hMzNjLTQ5OGYtOTQ1Yi1iMmMyN2Q0NGZiNDkiLCJiaVRva2VuIjoiM2Q1MGQzYTgtNTJjNi0wYmNjLTM5MWYtZWM0YmE3NTQ1Nzc2Iiwic2l0ZU93bmVySWQiOiI0MjUxYTlhNy1hMTVjLTQzNWUtYjBkNS0zNGIwNjUzZTZmMDIifQ&amp;locale=0en&amp;viewMode=0site&amp;width=020" frameborder="0"></iframe>
                                        <div id="i418upp1overlay" class="s9overlay" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i418upp1.1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <noscript data-reactid=".0.5"></noscript>
                <div data-reactid=".0.$siteAspectsContainer">
                    <div style="position:fixed;display:block;width:0%;height:100%;right:0px;top:0px;background:none;box-shadow:none;border-radius:0;bottom:;left:;" class="s15" data-state="desktop" id="iuar1tdh" data-reactid=".0.$siteAspectsContainer.$iuar1tdh">
                        <div id="iuar1tdhframeWrap" class="s15frameWrap" data-reactid=".0.$siteAspectsContainer.$iuar1tdh.0">
                            <div style="display:none;" id="iuar1tdhcloseButton" class="s15closeButton" data-reactid=".0.$siteAspectsContainer.$iuar1tdh.0.0"></div>
                            <iframe src="http://ecom.wix.com/storefront/cartwidgetPopup?cacheKiller=1476508284331&amp;compId=iuar1tdh&amp;deviceType=desktop&amp;instance=48K1g4JxoSdi5ukjbcNO9LZDA_gh6EaQpJ4oS1z_ZXc.eyJpbnN0YW5jZUlkIjoiMDM3YmQ0MWItNTA5ZC00NzEzLWExMTUtMzg2NTA5ZWExZWRjIiwic2lnbkRhdGUiOiIyMDE2LTEwLTE1VDA1OjA5OjUwLjAwNloiLCJ1aWQiOm51bGwsImlwQW5kUG9ydCI6IjEyMy4yMDMuNjIuMjIxLzQxMTM2IiwidmVuZG9yUHJvZHVjdElkIjpudWxsLCJkZW1vTW9kZSI6ZmFsc2UsIm9yaWdpbkluc3RhbmNlSWQiOiI1NTUwODk3YS00MTNhLTRkNGMtYjc4Ny03NGZiYjQyMTU4M2IiLCJhaWQiOiJkMTYzNWRiYy1hMzNjLTQ5OGYtOTQ1Yi1iMmMyN2Q0NGZiNDkiLCJiaVRva2VuIjoiM2Q1MGQzYTgtNTJjNi0wYmNjLTM5MWYtZWM0YmE3NTQ1Nzc2Iiwic2l0ZU93bmVySWQiOiI0MjUxYTlhNy1hMTVjLTQzNWUtYjBkNS0zNGIwNjUzZTZmMDIifQ&amp;locale=en&amp;origCompId=i418upp1&amp;viewMode=site" scrolling="no" allowtransparency="true" allowfullscreen="" name="iuar1tdh" id="iuar1tdhiframe" class="s15iframe" data-reactid=".0.$siteAspectsContainer.$iuar1tdh.0.1" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
                <noscript data-reactid=".0.7"></noscript>
            </div>
        </div>




        <div comp="wysiwyg.viewer.components.WixAds" skin="wysiwyg.viewer.skins.wixadsskins.WixAdsWebSkin" id="wixFooter"></div>







    </body>﷯

</html>