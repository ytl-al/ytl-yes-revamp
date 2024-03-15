var clevertap = {event:[], profile:[], account:[], onUserLogin:[], region:'sg1', notifications:[], privacy:[]};
// replace with the CLEVERTAP_ACCOUNT_ID with the actual ACCOUNT ID value from your Dashboard -> Settings page
clevertap.account.push({"id": "TEST-7ZW-87W-796Z"});
clevertap.privacy.push({optOut: false}); //set the flag to true, if the user of the device opts out of sharing their data
clevertap.privacy.push({useIP: false}); //set the flag to true, if the user agrees to share their IP data
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
const homepageURL = 'https://yesmy-dev.azurewebsites.net/';

// Check if the current URL matches the homepage URL without query parameters
if ((stripQueryParameters(currentURL) === homepageURL) ) {
  console.log('This is the homepage.');
  page = 'Home Page';
} else {
  console.log('This is not the homepage.');
    const urlParts = currentURL.split('/');
  page = stripQueryParameters(urlParts[urlParts.length - 1]);
    console.log(page);

}
if (window.location.href.indexOf("devices") > -1) {
  document.addEventListener('DOMContentLoaded', function () {
  
      var buyNowButtons = document.querySelectorAll('#ct_btn-getplan');

      // Add click event listener to each Buy Now button
      buyNowButtons.forEach(function (button) {
          button.addEventListener('click', function (event) {
              var parentLayer = event.target.closest('.layer-planDevice');
              var parentLayerPro = event.target.closest('.storegrid');
              var promotion = parentLayerPro.getAttribute('data-promotion');
              if (promotion.trim()=="Yes 5G RAHMAH") {
                var h2Element = parentLayer.querySelector('h2');
                var deviceName = h2Element.textContent.trim();
                clevertap.event.push("Rahmah/Broadband - Get Plan", {
                    "Package Chosen": deviceName
                });
              } else {
                  var h2Element = parentLayer.querySelector('h2');
                  var deviceName = h2Element.textContent.trim();
                  clevertap.event.push("Device  - Buy Now", {
                      "Device Model Name": deviceName
                  });
              }
          });
      });


  });
}




// for RAHMAH plan
if(window.location.href.indexOf("Pakej-rahmah-plan") > -1 || window.location.href.indexOf("yes5gwirelessbroadband") > -1 ){
      document.addEventListener('DOMContentLoaded', function () {
        // Get all elements with the class bt_getPlanCt
        const buttons = document.querySelectorAll('.bt_getPlanCt');
        buttons.forEach(button => {
          button.addEventListener('click', function() {
            const deviceContainer = this.closest('.layer-planDevice');
            console.log(deviceContainer);
            const deviceName = deviceContainer.querySelector('h3');
            const deviceNameText = deviceName.textContent;
            console.log(deviceNameText);
            if(deviceNameText){
              clevertap.event.push("Rahmah/Broadband - Get Plan", {
                "Package Chosen": deviceNameText
              });
            }
          });
        });
    });


  //   document.addEventListener('DOMContentLoaded', function () {
  //     // Get all elements with the class bt_getPlanCt
  //     const buttons = document.querySelectorAll('.bt_getPlanCt');
      
  //     // Loop through each button
  //     buttons.forEach(button => {
  //         // Add click event listener to each button
  //         button.addEventListener('click', function() {
  //             // Find the closest ancestor with class .card-body
  //             const cardBody = this.closest('.card-body');
  
  //             // Check if the cardBody is found
  //             if (cardBody) {
  //                 // Find the closest ancestor with class .layer-planDevice within cardBody
  //                 const deviceContainer = cardBody.querySelector('.layer-planDevice');
                  
  //                 // Check if the deviceContainer is found
  //                 if (deviceContainer) {
  //                     const deviceName = deviceContainer.querySelector('h3');
                      
  //                     // Check if the deviceName is found
  //                     if (deviceName) {
  //                         const deviceNameText = deviceName.textContent.trim();
  //                         console.log(deviceNameText);
  //                         clevertap.event.push("Rahmah/Broadband - Get Plan", {
  //                             "Package Chosen": deviceNameText
  //                         });
  //                     } else {
  //                         console.error("h3 element not found within the device container.");
  //                     }
  //                 } else {
  //                     console.error(".layer-planDevice container not found within .card-body.");
  //                 }
  //             } else {
  //                 console.error(".card-body container not found.");
  //             }
  //         });
  //     });
  // });
  
}




