$(document).ready(function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
    if (typeof selectpicker === 'function') {
        $('.form-select').selectpicker({
            liveSearch: true
        });
    }
});

const ywosLSName = 'yesYWOS';
const ywosLSData = JSON.parse(localStorage.getItem(ywosLSName));
const expiryYWOSCart = 60; // in minute
const apiEndpointURL = window.location.origin + '/wp-json/ywos/v1';


$(document).ready(function() {
	if(window.location.pathname=='/ywos/delivery/'){
        let backButton = document.querySelector('.back-btn');
        if (ywosLSData.meta.orderSummary.plan.eSim != true) {
            backButton.href  = '/ywos/verification';
        } else {
            backButton.href  = '/ywos/cart';
        }
    }
    //backbuttom upfront payment page
    if(window.location.pathname=='/ywos/sim-type/'){
        let backButton = document.querySelector('.back-btn');
        if (ywosLSData.meta.customerDetails.upFrontPayment=="true" && ywosLSData.meta.orderSummary.plan.eSim != true) {
            backButton.href  = '/ywos/sim-type';
        } else if(ywosLSData.meta.orderSummary.plan.eSim != true) {
            backButton.href  = '/ywos/verification';
        }else{
            backButton.href  = '/ywos/sim-type';
        }
    }

    $('.btn-buyplan').on('click', function() {
        var planID = $(this).attr('data-planid');
        ywos.buyPlan(planID);
    });

    $('.btn-buytpplan').on('click', function() {
        var planID = $(this).attr('data-planid');
        ywos.buyPlan(planID, true);
    });

    $('.btn-buyInfinityPlan').on('click', function() {
        var bundleid = $(this).attr('data-bundleid');
        ywos.buyBundlePlan(bundleid);
        // const planType = $(this).attr('data-planType');
        // if( planType == "mixed" ) {
        //     const deviceType = $(this).parents('.layer-planDevice').find('.deviceType:radio:checked').val();
        //     planID = $(this).parents('.layer-planDevice').find('.deviceType:radio:checked').attr('data-planid');
        //     console.log(deviceType);
        //     console.log(planID);
        //     if( deviceType == 'installment' ) {
        //         return elevate.buyPlan(planID);
        //     }else if( deviceType == 'upfront' ) {
        //         return ywos.buyBundlePlan(planID);
        //     }
        // }
    });
});

const ywos = {
    init: function() {},
    lsData: {},
    generateSessionKey: function() {
        return '_' + Math.random().toString(36).substr(2, 9);
    },
    initLocalStorage: function(planID, isTargetedPromo = false, type = '') {
        var url_string = window.location.href;
        var url = new URL(url_string);
        dc = url.searchParams.get('dc');
        duid = url.searchParams.get('duid');
        rc = url.searchParams.get('rc');
        trxType = (url.searchParams.get('trx_type')) ?? null;

        var ywosLocalStorageData = ywosLSData;
        var storageData = {};
        var expiryLength = expiryYWOSCart * 60000;
        var ywosCartExpiry = Date.now() + expiryLength;
        var sessionKey = this.generateSessionKey();
        var siteLang = document.getElementsByTagName('html')[0].getAttribute('lang');
        var url_string = window.location.href;
        var url = new URL(url_string);
        var refCode = '';

        if (url.searchParams.get('rc') != null) {
            refCode = url.searchParams.get('rc');
        } else if (url.searchParams.get('referralCode') != null) {
            refCode = url.searchParams.get('referralCode');
        }
        
        let deviceID = '';
        if( type == 'bundle_plan' ) {
            if (localStorage.getItem(ywosLSName) !== null) {
                deviceID = JSON.parse(localStorage.getItem(ywosLSName)).meta.deviceID;
            }else{
                deviceID = planID;
                planID = '';
            }
        }else if( type == 'new_bundle_plan' ) {
            deviceID = planID;
            planID = '';
        }

        storageData = {
            'expiry': ywosCartExpiry,
            'sessionKey': sessionKey,
            'meta': {
                'completedStep' : 0,
                'planID': planID,
                'sessionId': '',
                'deviceID': deviceID,
                'dealer': {
                    'dealer_code': dc,
                    'dealer_id': duid,
                    'referral_code': rc,
                }
            },
            'siteLang': siteLang,
            'isTargetedPromo': false,
            'tpMeta': {},
            'type' : type,
            'trxType': trxType
        };

        if (refCode) {
            storageData.meta.refCode = refCode;
        }

        if (isTargetedPromo) {
            var segments = url.pathname.split('/');
            var userID = url.searchParams.get('id');
            var promoID = segments.pop() || segments.pop();
            
            var tpMeta = { 'userID': userID, 'promoID': promoID };
            storageData.isTargetedPromo = true;
            storageData.tpMeta = tpMeta;
        }

        if (trxType == 'roving') {
            storageData.meta.completedStep = 2;
        }

        ywosLocalStorageData = storageData;
        localStorage.setItem(ywosLSName, JSON.stringify(ywosLocalStorageData));
    },
    redirectToCart: function() {
        window.location.href = window.location.origin + "/ywos/cart";
    },
    buyPlan: function(planID, isTargetedPromo = false, type = false) {
        toggleOverlay();
        var self = this;
        self.initLocalStorage(planID, isTargetedPromo, type);
        $.ajax({
            url: apiEndpointURL + '/get-plan-by-id/' + planID+'?nonce='+yesObj.nonce,
            method: 'GET',
            success: function(data) {
                var pushData = [{
                    'name': data.planName,
                    'id': planID,
                    'category': data.planType,
                    'price': data.totalAmountWithoutSST,
                    'list_name': 'Product Page'
                }];
                pushAnalytics('impressions', pushData);
            },
            complete: function() {
                var storageData = JSON.parse(localStorage.getItem(ywosLSName));
                var trxType = storageData.trxType;
                if (trxType == 'roving') {
                    self.redirectToPage('roving-delivery');
                } else {
                    self.redirectToCart();
                }
            }
        });
    },
    mapSessionData: function(planData = '') {

        var planPriceBreakdown = [];
        var planDevicePriceBreakdown = [];
        var planSimplifiedBreakdown = [];
        for (var key in planData) {
            var keyPricingComponentList = 'pricingComponentList';
            if (key == keyPricingComponentList) {
                var pricingComponentList = planData[keyPricingComponentList];
                pricingComponentList.map(function(pricingComponent) {
                    var componentName = pricingComponent.pricingComponentName;
                    var componentValue = formatPrice(pricingComponent.pricingComponentValue);
                    var objArr = {
                        name: componentName,
                        value: componentValue
                    };
                    if (['Postpaid Device Price', 'Postpaid Device Upfront Payment'].includes(componentName)) {
                        planDevicePriceBreakdown.push(objArr);
                    } else if (['Postpaid Foreigner Deposit'].includes(componentName)) {
                        // self.orderSummary.plan.foreignerDeposit = componentValue;
                    } else {
                        planPriceBreakdown.push(objArr);
                    }
                });
            }
            var keySimplifiedItemPricingList = 'simplifiedItemPricingList';
            if (key == keySimplifiedItemPricingList) {
                planSimplifiedBreakdown = planData[keySimplifiedItemPricingList];
            }
          
        };
        var priceBreakdown = {
            plan: planPriceBreakdown,
            device: planDevicePriceBreakdown,
            simplified: planSimplifiedBreakdown
        };

        var storageData = JSON.parse(localStorage.getItem(ywosLSName));
        var yesElevate = JSON.parse(localStorage.getItem('yesElevate'));
        storageData.meta.loginType = 'guest';
        const ElevateDate = yesElevate.eligibility.dob;


        storageData.meta.customerDetails = {
            'securityType' : 'nric',
            'securityId' : yesElevate.eligibility.mykad,
            'msisdn' : yesElevate.eligibility.phone,
            // 'nric': yesElevate.customer.securityType,
            'gender' : '',
            'mobileNumber': yesElevate.eligibility.inphone,
            'homeNumber': yesElevate.eligibility.phone,
            'officeNumber' : yesElevate.eligibility.phone,
            'name' : yesElevate.eligibility.name,
            'email': yesElevate.eligibility.email,
            'address': '',
            'state' : '',
            'city' : '',
            'postcode' :'',
            'country': '',
            'citizenship': '',
            'yesId': '',
            'accountNumber': '',
            'dateOfBirth':yesElevate.eligibility.dob ,
            'salutation' : '',
            'preferredLanguage' : '',
            'upFrontPayment':'true'
        },

        storageData.meta.orderSummary = {
            'plan' : planData,
            'due' : {
                'amount'            : (parseFloat(planData.totalAmountWithoutSST.replace(/,/g, ''))).toFixed(2),
                'addOns'            : 0,
                'planAmount'        : (parseFloat(planData.totalAmount)).toFixed(2),
                'taxesSST'          : (parseFloat(planData.totalSST)).toFixed(2),
                'shippingFees'      : 0.00,
                'rounding'          : (parseFloat(planData.roundingAdjustment)).toFixed(2),
                'foreignerDeposit'  : (parseFloat(planData.foreignerDeposit)).toFixed(2),
                'total'             : roundAmount(parseFloat(planData.totalAmountWithoutSST.replace(/,/g, '')) + parseFloat(planData.totalSST) + 0.00 + parseFloat(planData.foreignerDeposit) + parseFloat(planData.roundingAdjustment)).toFixed(2),
                'priceBreakdown'    : priceBreakdown,
                'addOn'             : null                
            }
        };
        // storageData.meta.orderSummary.plan = planData;
        storageData.meta.isLoggedIn = false;
        storageData.meta.completedStep = 2;
        localStorage.setItem(ywosLSName, JSON.stringify(storageData));
        console.log(storageData);
    },
    creditCheckFailedPlan: function(planID, isTargetedPromo = false, type = false) {
        toggleOverlay();
        var self = this;
        self.initLocalStorage(planID, isTargetedPromo, type);
        $.ajax({
            url: apiEndpointURL + '/get-plan-by-id/' + planID + '?nonce='+yesObj.nonce,
            method: 'GET',
            success: function(data) {
                var pushData = [{
                    'name': data.planName,
                    'id': planID,
                    'category': data.planType,
                    'price': data.totalAmountWithoutSST,
                    'list_name': 'Product Page'
                }];
                self.mapSessionData(data);
                // pushAnalytics('impressions', pushData);
            },
            complete: function() {
                self.redirectToYwosPage('sim-type');
            }
        });
    },
    redirectToPlanSelection: function() {
        window.location.href = window.location.origin + "/ywos/device-type";
    },
    redirectToYwosPage: function(pageSlug) {
        window.location.href = window.location.origin + "/ywos/"+pageSlug+"/";
    },
    buyBundlePlan: function( deviceID, isTargetedPromo = false ) {
        toggleOverlay();
        var self = this;
        self.initLocalStorage(deviceID, isTargetedPromo, 'new_bundle_plan');
        $.ajax({
            url: apiEndpointURL + '/get-bundlePlan-by-id/' + deviceID + '?nonce='+yesObj.nonce,
            method: 'GET',
            success: function(data) {
                var pushData = [{
                    'name': data.device_name,
                    'id': deviceID,
                    'category': '',
                    'price': data.price,
                    'list_name': 'Product Page'
                }];
                pushAnalytics('impressions', pushData);
            },
            complete: function() {
                self.redirectToPlanSelection();
            }
        });
    },

    checkExists: function(CheckLocalStorageData = false, curStep) {
        if (CheckLocalStorageData) {
            var ywosLocalStorageData =JSON.parse(localStorage.getItem('yesYWOS'));
            if( ywosLocalStorageData !== null && typeof ywosLocalStorageData !== 'undefined' ) { 
                this.lsData = ywosLocalStorageData;
                this.lsData.meta.completedStep  = 4;
                return true;
            }
        }else if(ywosLSData === null){
            return false;
        } else {
            this.lsData = ywosLSData;
            return true;
        }
    },
    checkExpiryValid: function(CheckLocalStorageData = false) {
        if ((ywosLSData !== null && typeof ywosLSData.expiry !== 'undefined') || (CheckLocalStorageData && this.lsData !== null && typeof this.lsData.expiry !== 'undefined')) {
            if ((Date.now() > ywosLSData?.expiry) && (!CheckLocalStorageData && (Date.now() > this.lsData.expiry))) {
                return false;
            } else {
                this.updateYWOSExpiry();
                return true;
            }
        }
        return false;
    },
    checkItems: function() {
        if (typeof this.lsData.meta !== 'undefined') {
            return (typeof this.lsData.meta.planID === 'undefined') ? false : true;
        } else {
            return false;
        }
    },
    updateYWOSExpiry: function() {
        var expiryLength = expiryYWOSCart * 60000;
        var ywosSessionExpiry = Date.now() + expiryLength;
        this.lsData.expiry = ywosSessionExpiry;
        this.updateYWOSLSData();
    },
    removeYWOSLSData: function() {
        localStorage.removeItem(ywosLSName);
    },
    updateYWOSLSData: function() {
        localStorage.setItem(ywosLSName, JSON.stringify(this.lsData));
    },
    checkStep: function(currentStep) {
        // console.log(typeof this.lsData.meta.completedStep, this.lsData.meta.completedStep, currentStep, toPage);
        // console.log(this.lsData.meta.completedStep, currentStep);
        if (typeof this.lsData.meta.completedStep !== 'undefined') {
            if (
                currentStep == 0 ||
                (this.lsData.meta.completedStep == 0 && currentStep == 0) ||
                (this.lsData.meta.completedStep == 0 && currentStep == 1) ||
                (this.lsData.meta.completedStep == currentStep) ||
                (this.lsData.meta.completedStep == currentStep - 1) ||
                (this.lsData.meta.completedStep > currentStep)
            ) {
                return true;
            } else if (this.lsData.meta.completedStep < currentStep) {
                switch (this.lsData.meta.completedStep) {
                    case 0:
                        toPage = 'cart';
                        break;
                    case 1:
                        toPage = 'verification';
                        break;
                    case 2:
                        toPage = 'delivery';
                        break;
                    case 3:
                        toPage = 'review';
                        break;
                    default:
                        toPage = 'cart';
                }
                (toPage != null) ? this.redirectToPage(toPage): '';
                return false;
            }
        } else if (currentStep == 0) {
            return true;
        }
        this.redirectToPage('cart');
    },
    checkStepRoving: function (currentStep) {
        if (typeof this.lsData.meta.completedStep !== 'undefined') {
            if (
                // currentStep == 0 ||
                // (this.lsData.meta.completedStep == 0 && currentStep == 0) ||
                // (this.lsData.meta.completedStep == 0 && currentStep == 1) ||
                (this.lsData.meta.completedStep == currentStep) ||
                (this.lsData.meta.completedStep == currentStep - 1) ||
                (this.lsData.meta.completedStep > currentStep)
            ) {
                return true;
            } else if (this.lsData.meta.completedStep < currentStep) {
                switch (this.lsData.meta.completedStep) {
                    case 0:
                        toPage = 'cart';
                        break;
                    case 1:
                        toPage = 'verification';
                        break;
                    case 2:
                        toPage = 'delivery';
                        break;
                    case 3:
                        toPage = 'review';
                        break;
                    case 4:
                        toPage = 'payment';
                        break;
                    default:
                        toPage = 'cart';
                }
                (toPage != null) ? this.redirectToPage(toPage): '';
                return false;
            }
        } else if (currentStep == 0) {
            return true;
        }
        history.back();
    },
    checkPurchaseCompleted: function(currentStep = 0) {
        if (
            typeof this.lsData.meta.purchaseCompleted != 'undefined' &&
            this.lsData.meta.purchaseCompleted &&
            typeof this.lsData.meta.purchaseInfo != 'undefined'
        ) {
            return true;
        }
        return false;
    },
    redirectToPage: function(pageSlug) {
        window.location.href = window.location.origin + '/ywos/' + pageSlug;
    },
    validateSession: function(curStep = 0, isSkipCart = false) {
        var isValid = true;
        if (!this.checkExists()) {
            console.log('Local storage data not found!');
            isValid = false;
        } else if (!this.checkExpiryValid()) {
            alert(1);
            console.log('Local storage data is expired!');
            isValid = false;
        } else if (!this.checkItems()) {
            alert(2);
            console.log('Plan ID is not found!');
            isValid = false;
        } else if (this.checkPurchaseCompleted(curStep)) {
            alert(3);
            console.log('Purchase has been completed!');
            isValid = false;
        } else if (!isSkipCart && !this.checkStep(curStep)) {
            alert(4);
            console.log('Previous step not yet completed!');
            // isValid = false;
            // return false;
        } else if (isSkipCart) {
            alert(5);
            if (!this.checkStepRoving(curStep)) {
                
            }
        }
        
        $('#main-vue').show();
        if (!isValid) {
            this.removeYWOSLSData();
            return false;
        } else {
            // setTimeout(function() {
            //     toggleOverlay(false);
            // }, 500);
            return true;
        }
    },
    validateSessionRoving: function (curStep = 0, CheckLocalStorageData = false) {
        var isValid = true;
        if (!this.checkExists(CheckLocalStorageData)) {
            console.log('Local storage data not found!');
            isValid = false;
        } else if (!this.checkExpiryValid(CheckLocalStorageData)) {
            console.log('Local storage data is expired!');
            isValid = false;
        } else if (!this.checkItems()) {
            console.log('Plan ID is not found!');
            isValid = false;
        } else if (this.checkPurchaseCompleted(curStep)) {
            console.log('Purchase has been completed!');
            isValid = false;
        } else if (!this.checkStepRoving(curStep)) {
            console.log('Previous step not yet completed!');
        }
        
        $('#main-vue').show();
        if (!isValid) {
            this.removeYWOSLSData();
            return false;
        } else {
            // setTimeout(function() {
            //     toggleOverlay(false);
            // }, 500);
            return true;
        }
    },
    renderText: function(strID, objText) {
        // if (objText) {
        //     var siteLang = this.lsData.siteLang;
        //     if (siteLang) {
        //         if (objText[strID] && objText[strID][siteLang]) {
        //             return objText[strID][siteLang];
        //         } 
        //     } else if (strID) {
        //         return objText[strID]['en-US'];
        //     }
        // }

        var siteLang = (this.lsData.siteLang) ? this.lsData.siteLang : 'en-US';
        if (siteLang && objText) {
            if (objText[strID] && objText[strID][siteLang]) {
                return objText[strID][siteLang];
            } 
        }
        return;
    }
};

function buyPlan(planID) {
    ywos.buyPlan(planID);
}

function buyTPPlan(planID) {
    ywos.buyPlan(planID, true);
}

function roundAmount(amount, decimals = 2) {
    return Number(Math.round(amount + 'e' + decimals) + 'e-' + decimals);
}

function getRoundingAdjustmentAmount(amount) {
    var fixAmount = parseFloat(roundAmount(amount)).toFixed(2);
    var baseAmount = amount.toString().slice(0, -1);
    var balance = fixAmount - baseAmount;
    balance = parseFloat(balance.toFixed(2));
    var roundingAmount = 0.00;
    if (balance !== 0.00) {
        if (balance > 0.05 || balance == 0.00) {
            roundingAmount = 0.1 - balance;
        } else {
            roundingAmount = 0.05 - balance;
        }
    }
    return parseFloat(roundingAmount).toFixed(2);
}

String.prototype.toCamelCase = function(str) {
    return this.split(' ').map(function(word, index) {
        return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
    }).join(' ');
}

function getCreditCardType(ccNumber) {
    let amex = new RegExp('^3[47][0-9]{13}$');
    let visa = new RegExp('^4[0-9]{12}(?:[0-9]{3})?$');
    let cup1 = new RegExp('^62[0-9]{14}[0-9]*$');
    let cup2 = new RegExp('^81[0-9]{14}[0-9]*$');

    let mastercard = new RegExp('^5[1-5][0-9]{14}$');
    let mastercard2 = new RegExp('^2[2-7][0-9]{14}$');

    let disco1 = new RegExp('^6011[0-9]{12}[0-9]*$');
    let disco2 = new RegExp('^62[24568][0-9]{13}[0-9]*$');
    let disco3 = new RegExp('^6[45][0-9]{14}[0-9]*$');

    let diners = new RegExp('^3[0689][0-9]{12}[0-9]*$');
    let jcb = new RegExp('^35[0-9]{14}[0-9]*$');


    if (visa.test(ccNumber)) {
        return 'VISA';
    }
    if (amex.test(ccNumber)) {
        return 'AMEX';
    }
    if (mastercard.test(ccNumber) || mastercard2.test(ccNumber)) {
        return 'MASTERCARD';
    }
    if (disco1.test(ccNumber) || disco2.test(ccNumber) || disco3.test(ccNumber)) {
        return 'DISCOVER';
    }
    if (diners.test(ccNumber)) {
        return 'DINERS';
    }
    if (jcb.test(ccNumber)) {
        return 'JCB';
    }
    if (cup1.test(ccNumber) || cup2.test(ccNumber)) {
        return 'CHINA_UNION_PAY';
    }
    return undefined;
}

function formatPrice(amount) {
    return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function checkInputCharacters(event, type = 'alphanumeric', withSpace = true) {
    event = (event) ? event : window.event;
    var charCode = (event.which) ? event.which : event.keyCode;
    var charNonNumeric = false;
    var charNonAlpha = false;
    var charNonSpace = (withSpace && charCode == 32) ? false : true;
    if (
        (charCode > 31 && (charCode < 48 || charCode > 57)) // numeric (0-9)
    ) {
        charNonNumeric = true;
    }
    if (!(charCode > 64 && charCode < 91) && // uppercase alpha
        !(charCode > 96 && charCode < 123) // lowercase alpha
    ) {
        charNonAlpha = true;
    }

    if (charCode == 46) {
        event.preventDefault();
    } else if (type == 'alphanumeric' && charNonNumeric && charNonAlpha && charNonSpace) {
        event.preventDefault();
    } else if (type == 'numeric' && charNonNumeric && charNonSpace) {
        event.preventDefault();
    } else if (type == 'alpha' && charNonAlpha && charNonSpace) {
        event.preventDefault();
    } else {
        return true;
    }
}
