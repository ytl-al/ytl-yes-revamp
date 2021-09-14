/* 
    JavaScript Name : Yes TwentyTwentyOne 
    Created on      : September 09, 2021, 03:04:23 PM
    Last edited on  : September 13, 2021, 03:52:31 PM
    Author          : [YTL Digital Design] - AL
*/
const yesLocalStorageName   = 'yesSession';
const yesLocalStorage       = JSON.parse(localStorage.getItem(yesLocalStorageName));

$(document).ready(function() {
    checkTopPageBannerTimestamp();
});


/**
 * Function close
 */
function closeTopPageBanner() {
    $('.top-pink-bar').slideUp('fast');

    var topPageBannerExpired    = Date.now() + 60000;
    var getYesLocalStorage      = yesLocalStorage;

    if (getYesLocalStorage === null) {
        getYesLocalStorage  = { 'closeTopPageBannerClose': topPageBannerExpired };
    } else {
        getYesLocalStorage.closeTopPageBannerClose  = topPageBannerExpired;
    }
    localStorage.setItem(yesLocalStorageName, JSON.stringify(getYesLocalStorage));
}

function checkTopPageBannerTimestamp() {
    var curTimestamp            = Date.now();
    if (yesLocalStorage !== null) {
        if (curTimestamp > yesLocalStorage.closeTopPageBannerClose) {
            $('.top-pink-bar').show();
        }
    } else {
        $('.top-pink-bar').show();
    }
}