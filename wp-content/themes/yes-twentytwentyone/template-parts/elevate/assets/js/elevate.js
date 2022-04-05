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

const elevateLSName = 'yesElevate';
const elevateLSData = JSON.parse(localStorage.getItem(elevateLSName));
const expiryelevateCart = 60; // in minute
const apiEndpointURL_elevate = window.location.origin + '/wp-json/elevate/v1';

$(document).ready(function() {
    $('.btn-elevate-buyplan').on('click', function() {
        var productId = $(this).attr('data-productId');
        elevate.buyPlan(productId);
    });
});

const elevate = {
    init: function() {},
    lsData: {},
    generateSessionKey: function() {
        return '_' + Math.random().toString(36).substr(2, 9);
    },
    initLocalStorage: function(productId) {
        var elevateLocalStorageData = elevateLSData;
        var storageData = {};
        var expiryLength = expiryelevateCart * 60000;
        var elevateCartExpiry = Date.now() + expiryLength;
        var sessionKey = this.generateSessionKey();
        if (elevateLocalStorageData === null) {
            storageData = {
                'expiry': elevateCartExpiry,
                'sessionKey': sessionKey,
                'meta': {
                    'productId': productId,
                    'sessionId': ''
                }
            };
            elevateLocalStorageData = storageData;
        } else {
            storageData = {
                'expiry': elevateCartExpiry,
                'sessionKey': sessionKey,
                'meta': {
                    'productId': productId,
                    'sessionId': ''
                }
            };
            elevateLocalStorageData = storageData;
        }
        localStorage.setItem(elevateLSName, JSON.stringify(elevateLocalStorageData));
    },
    redirectToCart: function() {
        window.location.href = window.location.origin + "/elevate/cart";
    },
    buyPlan: function(productId) {
        toggleOverlay();
        this.initLocalStorage(productId);
        this.redirectToCart();
    },
    checkExists: function() {
        if (elevateLSData === null) {
            return false;
        } else {
            this.lsData = elevateLSData;
            return true;
        }
    },
    checkExpiryValid: function() {
        if (elevateLSData !== null && typeof elevateLSData.expiry !== 'undefined') {
            if (Date.now() > elevateLSData.expiry) {
                return false;
            } else {
                this.updateElevateExpiry();
                return true;
            }
        }
        return false;
    },
    checkItems: function() {
        if (typeof this.lsData.meta !== 'undefined') {
            return (typeof this.lsData.meta.productId === 'undefined') ? false : true;
        } else {
            return false;
        }
    },
    updateElevateExpiry: function() {
        var expiryLength = expiryelevateCart * 60000;
        var elevateSessionExpiry = Date.now() + expiryLength;
        this.lsData.expiry = elevateSessionExpiry;
        this.updateElevateLSData();
    },
    removeElevateLSData: function() {
        localStorage.removeItem(elevateLSName);
    },
    updateElevateLSData: function() {
        localStorage.setItem(elevateLSName, JSON.stringify(this.lsData));
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
        window.location.href = window.location.origin + '/elevate/' + pageSlug;
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
            this.removeElevateLSData();
            return false;
        } else {
            // setTimeout(function() {
            //     toggleOverlay(false);
            // }, 500);
            return true;
        }
    }
};

function buyElevatePlan(productId) {
    elevate.buyPlan(productId);
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

function toggleOverlay(toggleShow = true) {
    if (toggleShow) {
        $('body').addClass('show-overlay');
        $('.layer-overlay').removeAttr('style');
    } else {
        $('.layer-overlay').fadeOut(500);
        setTimeout(function() {
            $('body').removeClass('show-overlay');
            $('.layer-overlay').removeAttr('style');
        }, 500)
    }
}

function checkInputFullName(event){
    event = (event) ? event : window.event;
    var charCode = (event.which) ? event.which : event.keyCode;

    var charNonAlpha = false;
    if (
        !(charCode > 64 && charCode < 91) && // uppercase alpha
        !(charCode > 96 && charCode < 123)   // lowercase alpha
    ) {
        charNonAlpha = true;
    }

    var specialchar = false;
    if(charCode == 47 || charCode == 64 || charCode == 32){
        specialchar = true;
    }

    if(charNonAlpha && !specialchar){
        event.preventDefault();
    }else{
        return true;
    }

}