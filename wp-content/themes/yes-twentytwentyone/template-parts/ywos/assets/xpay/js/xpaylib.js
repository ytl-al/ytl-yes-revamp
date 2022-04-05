var scripts=[];
//https://paymentuat.ytlcomms.my
//http://localhost:8080
//https://payment.yes.my
//selfcareiot.ytlcomms.my
scripts.push('https://selfcareiot.ytlcomms.my/xpay/js/jquery-1.7.2.js');

for(src in scripts){
document.writeln('<scri'+'pt src="'+scripts[src]+'" type="text/javascript"></sc'+'ript>')
}


var xpayWindow;


function postPayment(request){	
	
	var orderId = request['order_id'];
	var encryptedString = request['encrypted_string'];	

	if(encryptedString == null || encryptedString == undefined){
		encryptedString = "";
	}else{
		encryptedString = encryptedString.replace(/\+/g,"%2B");
	}
	
	count = 0;
	// Xpay PDC
	var features = 'scrollbars=yes,status=1,toolbar=no,menubar=no,locationbar=no,resizeable=yes,width=800,height=500,top=100,left=250';
	// M2U PDC
	//'scrollbars=no,status=1,toolbar=no,personalbar=no,menubar=no,locationbar=no,resizable=no,width=800,height=500,top=100,left=250';	
	// Corrected properties from w3c
	//'scrollbars=no,status=1,toolbar=no,menubar=no,location=yes,resizable=yes,width=800,height=500,top=100,left=250';

	var xpayUrl = "https://selfcareiot.ytlcomms.my/xpay/paymentRouting.do?jCryption="+encryptedString;

	
	xpayWindow = window.open(xpayUrl,'_blank','XPAYWINDOW', features);
	var requeryMethod = "reQueryCall('"+orderId+"','"+count+"')";
	window.setTimeout(requeryMethod,100000);
	
	try{
		xpayWindow.focus();
	}catch(err){
	}
	return xpayWindow;
}


var count;
function reQueryCall(orderId){
	//alert("inside reQueryCall");
	count=count+1;
	var requeryParms = "order_id:"+orderId+",requery_count:"+count;		

	var jqxhr = $.getJSON("https://selfcareiot.ytlcomms.my/xpay/reQuery.do?callback=?",
							{jCryption: requeryParms},
							function(response) {
								//alert("inside callbacnk");	
								if (response.error){
									// todo: need to think what can be done
								}else{
									if(response['response']=="false" && count != 3) {
										try {
											var requeryMethod = "reQueryCall('"+orderId+"','"+count+"')";
											window.setTimeout(requeryMethod,100000); // need to change to 100000
										}catch(ex) {
										}
									}else{
										//alert("Inside processing block");
										try{
											xpayWindow.close();
										}catch(err){
										}
										var features = 'scrollbars=yes,status=1,toolbar=no,menubar=no,locationbar=no,resizeable=yes,width=800,height=500,top=100,left=250';

										window.open("https://selfcareiot.ytlcomms.my/xpay/paymentResponse.do?orderId="+orderId, 'XPAYWINDOW', features);

									}
								}								
							});
	
	jqxhr.success(function() { /*alert("success");*/ });
	jqxhr.error(function(jqXHR, textStatus, errorThrown) { /*alert(errorThrown);*/ });
	jqxhr.complete(function() {  /*alert("complete");*/ });
	
}


function validateCard(cardnumber, cardname){
	var ccErrorNo = 0;
	var ccErrors = new Array ()

	ccErrors [0] = "Unknown card type";
	ccErrors [1] = "No card number provided";
	ccErrors [2] = "Credit card number is invalid"; //"Credit card number is in invalid format";
	ccErrors [3] = "Credit card number is invalid";
	ccErrors [4] = "Credit card number has an inappropriate number of digits";
	
	// Array to hold the permitted card characteristics
	var cards = new Array();

	cards [0] = {name: "Visa", 
					length: "13,16", 
					prefixes: "4",
					checkdigit: true};
	cards [1] = {name: "Master", 
					length: "16", 
					prefixes: "51,52,53,54,55",
					checkdigit: true};
				   
	// Establish card type
	var cardType = -1;
	for (var i=0; i<cards.length; i++) {
		// See if it is this card (ignoring the case of the string)
		if (cardname.toLowerCase () == cards[i].name.toLowerCase()) {
			cardType = i;
			break;
		}
	}
	  
	// If card type not found, report an error
	if (cardType == -1) {
		ccErrorNo = 0;
		return ccErrors [0]; 

	}
	   
	// Ensure that the user has provided a credit card number
	if (cardnumber.length == 0)  {
		ccErrorNo = 1;
		return ccErrors [1];
	}
		
	// Now remove any spaces from the credit card number
	cardnumber = cardnumber.replace (/\s/g, "");
	  
	// Check that the number is numeric
	var cardNo = cardnumber
	var cardexp = /^[0-9]{13,19}$/;
	if (!cardexp.exec(cardNo))  {
		ccErrorNo = 2;
		return ccErrors [2];
	}
		   
	// Now check the modulus 10 check digit - if required
	if (cards[cardType].checkdigit) {
		var checksum = 0;                                  // running checksum total
		var mychar = "";                                   // next char to process
		var j = 1;                                         // takes value of 1 or 2
	  
		// Process each digit one by one starting at the right
		var calc;
		for (i = cardNo.length - 1; i >= 0; i--) {
		
		  // Extract the next digit and multiply by 1 or 2 on alternative digits.
		  calc = Number(cardNo.charAt(i)) * j;
		
		  // If the result is in two digits add 1 to the checksum total
		  if (calc > 9) {
			checksum = checksum + 1;
			calc = calc - 10;
		  }
		
		  // Add the units element to the checksum total
		  checksum = checksum + calc;
		
		  // Switch the value of j
		  if (j ==1) {j = 2} else {j = 1};
		} 
	  
		// All done - if checksum is divisible by 10, it is a valid modulus 10.
		// If not, report an error.
		if (checksum % 10 != 0)  {
		 ccErrorNo = 3;
		 return ccErrors [3];
		}
	}  

	var LengthValid = false;
	var PrefixValid = false; 
	var undefined; 

	var prefix = new Array ();
	var lengths = new Array ();

	prefix = cards[cardType].prefixes.split(",");
	  
	for (i=0; i<prefix.length; i++) {
	var exp = new RegExp ("^" + prefix[i]);
	if (exp.test (cardNo)) PrefixValid = true;
	}
	  
	if (!PrefixValid) {
	 ccErrorNo = 3;
	 return ccErrors [3];
	}

	lengths = cards[cardType].length.split(",");
	for (j=0; j<lengths.length; j++) {
	if (cardNo.length == lengths[j]) LengthValid = true;
	}

	if (!LengthValid) {
	 ccErrorNo = 4;
	 return ccErrors [4]; 
	};   

	return "";	
}
