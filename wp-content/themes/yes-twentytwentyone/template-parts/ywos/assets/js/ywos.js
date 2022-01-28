$(document).ready(function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
    $('.form-select').selectpicker({
        liveSearch: true
    });
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
        if (ywosLocalStorageData === null) {
            var sessionKey = this.generateSessionKey();
            storageData = {
                'expiry': ywosCartExpiry,
                'sessionKey': sessionKey,
                'meta': {
                    'planID': planID,
                    'sessionId': ''
                }
            };
            ywosLocalStorageData = storageData;
        } else {
            storageData = {
                'expiry': ywosCartExpiry,
                'sessionKey': ywosLocalStorageData.sessionKey,
                'meta': {
                    'planID': planID,
                    'sessionId': ''
                }
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
        this.initLocalStorage(planID);
        this.redirectToCart();
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
        if (typeof this.lsData.meta.completedStep !== 'undefined') {
            if (currentStep == 0 || this.lsData.meta.completedStep <= currentStep) {
                return true;
            } else {
                var toPage = 'cart';
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
                }
                (toPage != null) ? this.redirectToPage(toPage): '';
                return false;
            }
        } else if (currentStep == 0) {
            return true;
        }
        this.redirectToPage('cart');
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
        } else if (!this.checkStep(curStep)) {
            console.log('Previous step not yet completed!');
            // isValid = false;
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