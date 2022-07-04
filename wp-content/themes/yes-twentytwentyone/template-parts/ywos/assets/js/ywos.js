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
    $('.btn-buyplan').on('click', function() {
        var planID = $(this).attr('data-planid');
        ywos.buyPlan(planID);
    });
});

const ywos = {
    init: function() {},
    lsData: {},
    generateSessionKey: function() {
        return '_' + Math.random().toString(36).substr(2, 9);
    },
    initLocalStorage: function(planID) {
        var ywosLocalStorageData = ywosLSData;
        var storageData = {};
        var expiryLength = expiryYWOSCart * 60000;
        var ywosCartExpiry = Date.now() + expiryLength;
        var sessionKey = this.generateSessionKey();
        var siteLang = document.getElementsByTagName('html')[0].getAttribute('lang');
        if (ywosLocalStorageData === null) {
            storageData = {
                'expiry': ywosCartExpiry,
                'sessionKey': sessionKey,
                'meta': {
                    'planID': planID,
                    'sessionId': ''
                },
                'siteLang': siteLang
            };
            ywosLocalStorageData = storageData;
        } else {
            storageData = {
                'expiry': ywosCartExpiry,
                'sessionKey': sessionKey,
                'meta': {
                    'planID': planID,
                    'sessionId': ''
                },
                'siteLang': siteLang
            };
            ywosLocalStorageData = storageData;
        }
        localStorage.setItem(ywosLSName, JSON.stringify(ywosLocalStorageData));
    },
    redirectToCart: function() {
        window.location.href = window.location.origin + "/ywos/cart";
    },
    buyPlan: function(planID) {
        toggleOverlay();
        var self = this;
        this.initLocalStorage(planID);
        $.ajax({
            url: apiEndpointURL + '/get-plan-by-id/' + planID,
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
                self.redirectToCart();
            }
        });
    },
    checkExists: function() {
        if (ywosLSData === null) {
            return false;
        } else {
            this.lsData = ywosLSData;
            return true;
        }
    },
    checkExpiryValid: function() {
        if (ywosLSData !== null && typeof ywosLSData.expiry !== 'undefined') {
            if (Date.now() > ywosLSData.expiry) {
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
    validateSession: function(curStep = 0) {
        var isValid = true;
        if (!this.checkExists()) {
            console.log('Local storage data not found!');
            isValid = false;
        } else if (!this.checkExpiryValid()) {
            console.log('Local storage data is expired!');
            isValid = false;
        } else if (!this.checkItems()) {
            console.log('Plan ID is not found!');
            isValid = false;
        } else if (this.checkPurchaseCompleted(curStep)) {
            console.log('Purchase has been completed!');
            isValid = false;
        } else if (!this.checkStep(curStep)) {
            console.log('Previous step not yet completed!');
            // isValid = false;
            // return false;
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

        var siteLang = this.lsData.siteLang;
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