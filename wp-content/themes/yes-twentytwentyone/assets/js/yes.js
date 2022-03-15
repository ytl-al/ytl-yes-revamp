/* 
    JavaScript Name : Yes TwentyTwentyOne 
    Created on      : September 09, 2021, 03:04:23 PM
    Last edited on  : March     15, 2022, 03:52:31 PM
    Author          : [YTL Digital Design] - AL
*/
const yesLocalStorageName = 'yesSession';
const yesLocalStorage = JSON.parse(localStorage.getItem(yesLocalStorageName));

const expiryTopPageBanner = 10; // in minute
const expiryPageModal = 60; // in minute

const pageLoadTimestamp = Date.now();

$(document).ready(function() {
    checkTopPageBannerExpiry();
    checkPageModalExpiry();

    eventListenPageModalClose();

    initBootstrapTooltip();

    initBetterDocsCustomize();

    $('.link-jumpSection').on('click', function() {
        jumpSection(this);
    });

    AOS.init({
        once: true
    });
});


/**
 * Function closeTopPageBanner()
 * Function to close the top page banner
 * 
 * @since    1.0.0
 */
function closeTopPageBanner() {
    $('.top-pink-bar').slideUp('fast');

    var expiryLength = expiryTopPageBanner * 60000;
    var topPageBannerExpiry = Date.now() + expiryLength;
    var getYesLocalStorage = yesLocalStorage;

    if (getYesLocalStorage === null) {
        getYesLocalStorage = { 'topPageBannerClose': topPageBannerExpiry };
    } else {
        getYesLocalStorage.topPageBannerClose = topPageBannerExpiry;
    }
    localStorage.setItem(yesLocalStorageName, JSON.stringify(getYesLocalStorage));
}


/**
 * Function checkTopPageBannerExpiry()
 * Function to check the expiry of closed top page banner and show if expired
 * 
 * @since    1.0.0
 */
function checkTopPageBannerExpiry() {
    var topPageBanner = $('.top-pink-bar');
    if ($(topPageBanner).length) {
        if (yesLocalStorage !== null && typeof yesLocalStorage.topPageBannerClose !== 'undefined') {
            if (pageLoadTimestamp > yesLocalStorage.topPageBannerClose) {
                $(topPageBanner).show();
            }
        } else {
            $(topPageBanner).show();
        }
    }
}


/**
 * Function eventListenPageModalClose()
 * Function add event listener to page modal on close
 * 
 * @since    1.0.0
 */
function eventListenPageModalClose() {
    var pageModal = $('#page-modal');
    if ($(pageModal).length) {
        $(pageModal).on('hide.bs.modal', function() {
            var expiryLength = expiryPageModal * 60000;
            var pageModalExpiry = Date.now() + expiryLength;
            var getYesLocalStorage = yesLocalStorage;

            if (getYesLocalStorage === null) {
                getYesLocalStorage = { 'pageModalClose': pageModalExpiry };
            } else {
                getYesLocalStorage.pageModalClose = pageModalExpiry;
            }
            localStorage.setItem(yesLocalStorageName, JSON.stringify(getYesLocalStorage));
        });
    }
}


/**
 * Function checkPageModalExpiry()
 * Function to check the expiry of closed page modal and show if expired
 * 
 * @since    1.0.0
 */
function checkPageModalExpiry() {
    var pageModal = $('#page-modal');

    if ($(pageModal).length) {
        if (yesLocalStorage !== null && typeof yesLocalStorage.pageModalClose !== 'undefined') {
            if (pageLoadTimestamp > yesLocalStorage.pageModalClose) {
                $(pageModal).modal('show');
            }
        } else {
            $(pageModal).modal('show');
        }
    }
}


/**
 * Function initBootstrapTooltip()
 * Function to initialize Bootstrap tooltip everywhere
 * 
 * @since    1.0.0
 */
function initBootstrapTooltip() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
}


/**
 * Function jumpSection()
 * Function to trigger the jumpToSection by passing sectionID
 * 
 * @since    1.0.1
 */
function jumpSection(el) {
    var sectionID = $(el).attr('data-targetsection');
    jumpToSection(sectionID);
}


/**
 * Function jumpToSection()
 * Function to scroll page to section
 * 
 * @since    1.0.2
 */
function jumpToSection(sectionID) {
    var targetSection = $('#' + sectionID);
    if (targetSection.length > 0) {
        var targetOffset = $(targetSection).offset().top;
        $('html, body').animate({
            scrollTop: targetOffset
        }, 100);
    }
    return false;
}


/**
 * Function toggleOverlay()
 * Function to toggle the overlay
 * 
 * @since    1.0.2
 */
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


/**
 * Function initBetterDocsCustomize()
 * Function to init the BetterDocs customization functions
 * 
 * @since    1.0.2
 */
function initBetterDocsCustomize() {
    initBetterDocsSearchForm();
    // initBetterDocsSearchPlaceholder();
    initBetterDocsSearch5G();
}


/**
 * Function initBetterDocsSearchForm()
 * Function to check the page and show the default hidden BetterDocs Live Search form
 * 
 * @since    1.0.2
 */
function initBetterDocsSearchForm() {
    if ($('.betterdocs-live-search')) {
        var urlPath = window.location.pathname;
        var regex = /docs\/$/;
        var matches = regex.test(urlPath);
        if (!matches) {
            $('.betterdocs-live-search').show();
        }
    }
}


/**
 * Function initBetterDocsSearchPlaceholder()
 * Function to change the BetterDocs search field
 * 
 * @since    1.0.2
 */
function initBetterDocsSearchPlaceholder() {
    if ($('.betterdocs-search-field')) {
        var placeholderText = 'Please enter more than 2 characters';
        var docLang = document.documentElement.lang;
        if (docLang == 'ms-MY') {
            placeholderText = 'Sila masukkan lebih daripada 2 aksara ';
        } else if (docLang == 'zh-hans') {
            placeholderText = '请输入超过 2 个字符';
        }
        $('.betterdocs-search-field').attr('placeholder', placeholderText);
    }
}


/**
 * Function initBetterDocsSearch5G()
 * Function to init the 5g string search in BetterDocs Advanced Search
 * 
 * @since    1.0.2
 */
function initBetterDocsSearch5G() {
    var bdSearchField = $('.betterdocs-search-field');
    if ($(bdSearchField).length) {
        $(bdSearchField).on('input propertychange paste', function() {
            var bdSearchFieldVal = $(bdSearchField).val();
            if (bdSearchFieldVal == '5g' || bdSearchFieldVal == '4g') {
                $(bdSearchField).val(bdSearchFieldVal + ' ');
                $(bdSearchField).trigger('input').trigger('propertychange').trigger('paste').trigger('keyup').trigger('keypress');
            }
        });
    }
}