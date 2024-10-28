var clevertap = {event:[], profile:[], account:[], onUserLogin:[], region:'sg1', notifications:[], privacy:[]};
// replace with the CLEVERTAP_ACCOUNT_ID with the actual ACCOUNT ID value from your Dashboard -> Settings page
clevertap.account.push({"id": "4WK-8Z6-5R7Z"});
clevertap.privacy.push({optOut: false}); //set the flag to true, if the user of the device opts out of sharing their data
clevertap.privacy.push({useIP: true}); //set the flag to true, if the user agrees to share their IP data
(function () {
        var wzrk = document.createElement('script');
        wzrk.type = 'text/javascript';
        wzrk.async = true;
        wzrk.src = ('https:' == document.location.protocol ? 'https://d2r1yp2w7bby2u.cloudfront.net' : 'http://static.clevertap.com') + '/js/clevertap.min.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wzrk, s);
})();

function stripQueryParameters(url) {
    return url.split('?')[0];
  }
  

const currentURL = window.location.href;
var page = '';
// Define the homepage URL (without query parameters)
const homepageURL = 'https://yes.my/';

// Check if the current URL matches the homepage URL without query parameters
if ((stripQueryParameters(currentURL) === homepageURL) ) {
  // console.log('This is the homepage.');
  page = 'Home Page';
} else {
  console.log('This is not the homepage.');
    const urlParts = currentURL.split('/');
  page = stripQueryParameters(urlParts[urlParts.length - 1]);
    // console.log(page);

}

// Get the language of the document
var documentLanguage = document.documentElement.lang;
clevertap.profile.push({
  "Site": {
    "Prefered Language": documentLanguage
  }
});



// if (window.location.href.indexOf("devices") > -1) {
//   document.addEventListener('DOMContentLoaded', function () {
  
//       var buyNowButtons = document.querySelectorAll('#ct_btn-getplan');

//       // Add click event listener to each Buy Now button
//       buyNowButtons.forEach(function (button) {
//           button.addEventListener('click', function (event) {
//               var parentLayer = event.target.closest('.layer-planDevice');
//               var parentLayerPro = event.target.closest('.storegrid');
//               var promotion = parentLayerPro.getAttribute('data-promotion');
//               console.log(promotion,'promotion');
//               if (promotion.trim()=="Yes 5G RAHMAH") {
//                 var h2Element = parentLayer.querySelector('h2');
//                 var deviceName = h2Element.textContent.trim();
//                 clevertap.event.push("Rahmah/Broadband - Get Plan", {
//                     "Package Chosen": deviceName
//                 });
//               } else {
//                   var h2Element = parentLayer.querySelector('h2');
//                   var deviceName = h2Element.textContent.trim();
//                   clevertap.event.push("Device  - Buy Now", {
//                       "Device Model Name": deviceName
//                   });
//               }
//           });
//       });


//   });
// }




// for RAHMAH plan
// if(window.location.href.indexOf("Pakej-rahmah-plan") > -1){
//       document.addEventListener('DOMContentLoaded', function () {
//         // Get all elements with the class bt_getPlanCt
//         const buttons = document.querySelectorAll('.bt_getPlanCt');
//         buttons.forEach(button => {
//           button.addEventListener('click', function() {
//             const deviceContainer = this.closest('.layer-planDevice');
//             console.log(deviceContainer);
//             const deviceName = deviceContainer.querySelector('h3');
//             const deviceNameText = deviceName.textContent;
//             console.log(deviceNameText);
//             if(deviceNameText){
//               clevertap.event.push("Rahmah/Broadband - Get Plan", {
//                 "Package Chosen": deviceNameText
//               });
//             }
//           });
//         });
//     });

// }


//Samsung and Iphone page
// document.addEventListener('DOMContentLoaded', function() {
//   var buyButtons = document.querySelectorAll('.btn-getplan');

//   buyButtons.forEach(function(button) {
//       button.addEventListener('click', function() {
//           var deviceTitleName = this.closest('.layer-planDevice').querySelector('h2').textContent;
//           console.log('Closest H2 text:', deviceTitleName);
//           if(deviceTitleName){
//             clevertap.event.push("Device  - Buy Now", {
//                 "Phone Model Chosen": deviceTitleName
//             });
//            }
//       });
//   });
// });




