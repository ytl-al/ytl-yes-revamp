<?php require_once 'includes/header.php' ?>

    <style type="text/css">
        body{
            background: url(/wp-content/uploads/2021/09/amazing-things-bg.png);
            background-size: cover;
            background-repeat: no-repeat;
        }

        .layer-invitationText {
            margin: 0 0 30px;
        }

        .layer-invitationText h3 {
            margin: 0 0 15px;
        }

        .layer-invitationText p {
            margin-bottom: 0;
        }

        .layer-selectPlan {
            margin: 0 0 50px;
        }

        .layer-selectPlan .flex-nowrap {
            overflow-y: auto;
            padding: 0 0 15px;
        }

        .layer-planDevice {
            background-color: #FFF;
            border-radius: 10px;
            box-shadow: 0px 4px 10px 3px rgb(0 0 0 / 15%);
            height: 100%;
            padding: 40px 30px;
        }

        .layer-planDevice h2,
        .layer-planDevice h3 {
            font-size: 18px;
            line-height: 23px;
            letter-spacing: -0.02em;
            margin: 0 0 20px;
            text-align: center;
        }

        .layer-planDevice h3 {
            font-size: 20px;
            line-height: 22px;
        }

        .layer-planDevice p.panel-deviceImg {
            margin: 0 0 20px;
            text-align: center;
        }

        .layer-planDevice p.panel-deviceImg img {
            max-height: 148px;
        }

        .layer-planDevice p.panel-btn {
            margin: 0 0 20px;
            text-align: center;
        }

	#page_error{
		min-height:400px;
		padding-top: 50px;
	}

        .layer-planDevice p.panel-btn a,
        #cart-body .layer-planDevice p.panel-btn a {
            background-color: #2F3BF5;
            border-radius: 50px;
            color: #FFF !important;
            font-weight: 800;
            letter-spacing: 0.1em;
            padding: 8px 40px;
            text-transform: uppercase;
        }

        .text-12{
            font-size:12px!important;
        }

        @media only screen and (min-device-width: 375px) and (max-device-width: 667px) {
            #cart-body {
                padding: 30px 0;
            }
        }

        @media (min-width: 1200px) {
            .layer-selectPlan .flex-nowrap {
                overflow-y: visible;
                padding-bottom: 0;
            }

            .layer-planDevice h3 {
                font-size: 23px;
                line-height: 28px;
            }
        }
    </style>

<div id="main-vue">
    <header class="white-top">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="title_checkout p-3">{{ renderText('pre-qualified') }}</h1>
                </div>
            </div>
        </div>
    </header>

    <main class="clearfix site-main">

        <!-- Banner Start -->
        <section id="grey-innerbanner">
            <div class="container">
                <ul class="wizard">
                    <li ui-sref="firstStep" class="completed">
                        <span>{{ renderText('pre-qualified_step1') }}</span>
                    </li>
					  <li ui-sref="firstStep">
                        <span>{{ renderText('pre-qualified_step2') }}</span>
                    </li>
                    <li ui-sref="secondStep">
                        <span>{{ renderText('pre-qualified_step3') }}</span>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Banner End -->
        <input type="hidden" value="" id="displayOrderNumber"/>

        <section id="cart-body" style="display: none;">
            <div class="container " style="border: 0">
                <div >
                    <div class="layer-invitationText text-center">
                        <h3>{{ renderText('dear') }} {{ deliveryInfo.name }},</h3>
                        <p>{{ renderText('invite_promotion_msg') }}</p>
                    </div>
                    <div class="border-box">
                <div class="row">
                    <div class="col-md-5 p-5 flex-column bg-checkout">
                        <div class="title text-white checkout-left">
                            {{ renderText('MyKAD_verification') }}
                            <div class="mt-3" style="font-size: 14px;line-height: 20px;" v-html="renderText('verify_label_1')">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 p-5">
                        <div class="verify-body mt-3">
                            <h3 class="subtitle2 d-none d-md-block">{{ renderText('verify_label_2') }}</h3>
                            <div class="mt-5 mb-5">
                                <div class="d-none d-md-block" id="qrcode"></div>
                                <div class="text-center d-block d-md-none">
                                    <a id="cmdVerify" target="_blank" class="btn btn-danger mt-3">{{ renderText('verify_now') }}</a>
                                </div>
                            </div>
                            <h3 class="subtitle2">{{ renderText('verify_label_3') }}</h3>

							<!-- button type="button" @click="doPass">Go</button -->

                            <ul class="list-2 mt-5">
                                <li><div><span class="number">1</span></div>
                                    <div>
                                        <div class="subtitle2">{{ renderText('verify_label_4') }}</div>
                                        <p>{{ renderText('verify_label_5') }}</p>
                                    </div></li>
                                <li class="mt-3"><div><span class="number">2</span></div>
                                    <div>
                                        <div class="subtitle2">{{ renderText('verify_label_6') }}</div>
                                        <p>{{ renderText('verify_label_7') }}</p>
                                    </div></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <div id="page_error" style="display:none;">
            <div class="flex-container mt-3">
                <div><div class="row">
                        <div class="col-1"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.721 5.14645L2.42767 23.9998C2.19483 24.403 2.07163 24.8602 2.07032 25.3258C2.06902 25.7914 2.18966 26.2493 2.42024 26.6538C2.65082 27.0583 2.98331 27.3954 3.38461 27.6316C3.78592 27.8677 4.24207 27.9947 4.70767 27.9998H27.2943C27.7599 27.9947 28.2161 27.8677 28.6174 27.6316C29.0187 27.3954 29.3512 27.0583 29.5818 26.6538C29.8124 26.2493 29.933 25.7914 29.9317 25.3258C29.9304 24.8602 29.8072 24.403 29.5743 23.9998L18.281 5.14645C18.0433 4.75459 17.7086 4.43061 17.3093 4.20576C16.9099 3.98092 16.4593 3.86279 16.001 3.86279C15.5427 3.86279 15.0921 3.98092 14.6927 4.20576C14.2934 4.43061 13.9587 4.75459 13.721 5.14645V5.14645Z" stroke="#EF4444" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M16 12V17.3333" stroke="#EF4444" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M16 22.6665H16.0133" stroke="#EF4444" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path></svg></div> <div class="col-11 text-bold">
                            {{ renderText('request_does_not_qualify') }}
                        </div></div>
                    <div class="p-3 text-center"><a href="/infinite-phone-bundles/" class="pink-btn text-uppercase"> {{ renderText('back_to_infinite') }}</a></div> <div id="error" class="mt-3"></div></div></div>
        </div>

    </main>
</div>
<?php require_once('includes/footer.php'); ?>
<?php $apiSetting = \Inc\Base\Model::getAPISettings();?>
<script type="text/javascript"
        src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/qrcodejs/qrcode.min.js"></script>
<script type="text/javascript">
 var windows = [];
 $(document).ready(function () {
        var pageCart = new Vue({
            el: '#main-vue',
            data: {
                ekyc_url: '<?php echo $apiSetting["ekyc_url"]?>',
                ekyc_uid: '',
                ekycPassed:false,
                totalAttempt:0,
                maxAttempts:60,
                interval: null,
                qrcode: null,
                verifyWindow: null,
                productId: '',
				contractTitle: '',
				guid: '',
				deliveryInfo: {
					"name": "",
					"nric": "",
					"age": "",
					"gender": "",
					"email": "",
					"mobile": "",
					"addressLine1": "",
					"postCode": "",
					"city": "",
					"state": "",
					"country": "",
					"productOffered": "",
					"currentPlan": "",
					"isFree": false,
					"msisdnToUpgrade": "",
					"isDeleted": false,
					"deleterId": null,
					"deletionTime": null,
					"lastModificationTime": null,
					"lastModifierId": null,
					"creationTime": "",
					"creatorId": null,
					"id": ""
				},
				selectOptions: {
                        states: [{
                            'stateCode': 'KUL',
                            'value': 'WILAYAH PERSEKUTUAN-KUALA LUMPUR',
                            'name': 'Wilayah Persekutuan Kuala Lumpur'
                        },
                            {
                                'stateCode': 'PJY',
                                'value': 'WILAYAH PERSEKUTUAN-PUTRAJAYA',
                                'name': 'Wilayah Persekutuan Putrajaya'
                            },
                            {
                                'stateCode': 'LBN',
                                'value': 'WILAYAH PERSEKUTUAN-LABUAN',
                                'name': 'Wilayah Persekutuan Labuan'
                            },
                            {
                                'stateCode': 'JHR',
                                'value': 'JOHOR',
                                'name': 'Johor'
                            },
                            {
                                'stateCode': 'KDH',
                                'value': 'KEDAH',
                                'name': 'Kedah'
                            },
                            {
                                'stateCode': 'KTN',
                                'value': 'KELANTAN',
                                'name': 'Kelantan'
                            },
                            {
                                'stateCode': 'MLK',
                                'value': 'MELAKA',
                                'name': 'Melaka'
                            },
                            {
                                'stateCode': 'NSN',
                                'value': 'NEGERI SEMBILAN',
                                'name': 'Negeri Sembilan'
                            },
                            {
                                'stateCode': 'PHG',
                                'value': 'PAHANG',
                                'name': 'Pahang'
                            },
                            {
                                'stateCode': 'PNG',
                                'value': 'PULAU PINANG',
                                'name': 'Pulau Pinang'
                            },
                            {
                                'stateCode': 'PRK',
                                'value': 'PERAK',
                                'name': 'Perak'
                            },
                            {
                                'stateCode': 'PLS',
                                'value': 'PERLIS',
                                'name': 'Perlis'
                            },
                            {
                                'stateCode': 'SBH',
                                'value': 'SABAH',
                                'name': 'Sabah'
                            },
                            {
                                'stateCode': 'SRW',
                                'value': 'SARAWAK',
                                'name': 'Sarawak'
                            },
                            {
                                'stateCode': 'SGR',
                                'value': 'SELANGOR',
                                'name': 'Selangor'
                            },
                            {
                                'stateCode': 'TRG',
                                'value': 'TERENGGANU',
                                'name': 'Terengganu'
                            }
                        ],
                        cities: []
                    },
                orderSummary: {
                    product: {
                        selected:{
                            productCode:'',
                            code:'',
                            nameEN:'',
                            shortDescriptionEN:'',
                            productBundleId:'',
                            extraProperties:'',
                            contractName:'',
                            capacity:'',
                            color:'',
                            contract:'',
                            devicePriceMonth:'',
                            planPerMonth:'',
                            upFrontPayment:0.0,
                            plan:{
                                planId:'',
                                nameEN:'',
                                shortDescriptionEN:'',
                            }
                        },
                        colors:[]
                    },
                    orderDetail: {
                        total: 0.00,
                        color: null,
                        productCode: null,
                        orderItems:[]
                    },
                },
            },

            created: function () {
                var self = this;
				self.ekyc_uid = self.generateUUID();
                setTimeout(function () {
                    self.pageInit();

                }, 500);
            },
            methods: {
                pageInit: function () {
                    var self = this;
                    if (elevate.validateSession(self.currentStep)) {
                        self.dealer = elevate.lsData.meta.dealer;
						self.getUserInfor();
                    }else{
						elevate.initLocalStorage(-1, '', '', '');
						self.getUserInfor();
					}
                },
                eKYC_init: function () {
                    var self = this;

                    self.makeCode();
                    self.interval = setInterval(function (){
                        self.eKYC_check();
                    },5000);

					$('#cmdVerify').click(function(){
						var url = $('#cmdVerify').data('url');
						windows.push(window.open(url, '_blank'));
					})

					$('#cmdVerifyClose').click(function(){
						for(var i = 0; i < windows.length; i++){
							windows[i].close()
						}
					})

                },
                eKYC_check: function () {
                    var self = this;

                    self.totalAttempt++;
                    if( self.totalAttempt <= self.maxAttempts){
                        var params = {
                            uid: self.ekyc_uid,
                            mykad: self.deliveryInfo.mykad,
                            fname: self.deliveryInfo.name
                        };
                        axios.post(apiEndpointURL_elevate + '/ekyc-check' + '?nonce='+yesObj.nonce, params)
                            .then((response) => {
                                var data = response.data;

                                if(data.status == 1){

                                    if(data.data.processStatus && data.data.processStatus && data.data.processStatus.toUpperCase() == "EKYC_DONE"){
                                        //success
                                        clearInterval(self.interval);
										for(var i = 0; i < windows.length; i++){
											windows[i].close()
										}
                                        self.CAVerification(data.data);
                                    }

                                    if(data.data.processStatus && data.data.processStatus.toUpperCase() == "EKYC_FAILED"){
                                        //failure
                                        clearInterval(self.interval);
										for(var i = 0; i < windows.length; i++){
											windows[i].close()
										}
                                        toggleModalAlert('Error',this.renderText('eKYC_rejected'))

                                    }
                                }
                            })
                            .catch((error) => {
                                console.log(error);
                            });

                    }else{
                        clearInterval(self.interval);
                        toggleModalAlert('Error',this.renderText('eKYC_time_limit'))

                    }
                },

				doPass: function(){
					var self = this;
					elevate.lsData.ekycPassed = true;
					elevate.updateElevateLSData();

					elevate.redirectToPage('pre-qualified-plan');
				},

                CAVerification: function (response) {

                    var self = this;
                    var params = {
                        mykad: self.deliveryInfo.mykad,
                        name:self.deliveryInfo.name,
                        email:self.deliveryInfo.email,
                        phone:self.deliveryInfo.phone,
                        PartneReferenceID:response.uid,
                        OCRConfidenceScore:response.sim,
                    };

                    axios.post(apiEndpointURL_elevate + '/ca-verification' + '?nonce='+yesObj.nonce, params)
                        .then((response) => {

                            var data = response.data;

                            if (data.status == 1) {
								//todo
								self.doPass();
                            } else {
                                toggleOverlay(false);
                                toggleModalAlert('Error',this.renderText('NRIC_is_not_eligible'));
                            }
                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            //alert(error.message);
                        });
                },
				productOffered: function(){
					var self = this;
					if(self.deliveryInfo.productOffered){
						var aryBundle = self.deliveryInfo.productOffered.split(',');
						var found = false;
						for(var i = 0; i< aryBundle.length; i++){
							var tmp = '.bundle'+aryBundle[i].trim();
							$(tmp).show();
							if($(tmp)){
								found = true;
							}
						}

						if(!found){
							$('#cart-body').hide();
							$('#page_error').show();
						}
					}else{
						$('#cart-body').hide();
						$('#page_error').show();
					}
				},

				getStateCode: function (stateVal) {
					var self = this;
					var objState = self.selectOptions.states.filter(state => state.value == stateVal);
					if (!objState.length) {
						objState = self.selectOptions.states.filter(state => state.value == stateVal.toUpperCase());
					}
					return objState[0].stateCode;
				},

				updateCityCode: function () {
					var self = this;
					var stateCode = self.deliveryInfo.stateCode;

					toggleOverlay();

					self.allowSelectCity = false;

					axios.get(apiEndpointURL + '/get-cities-by-state/' + stateCode + '?nonce='+yesObj.nonce)
						.then((response) => {
							var options = [];
							var data = response.data;
							var masterlist = data.masterDataList[0].masterList;
							masterlist.map((value, index) => {
								options.push({
									value: value.masterCode,
									name: value.masterValue
								});
								if(value.masterValue == self.deliveryInfo.city){
									self.deliveryInfo.cityCode = value.masterCode;
								}
							})
							self.selectOptions.cities = options;
							self.allowSelectCity = true;

							var objCity = self.selectOptions.cities.filter(city => city.value == self.deliveryInfo.city);

						})
						.catch((error) => {
							console.log(error);
						})
						.finally(() => {
							toggleOverlay(false);
						});
				},

				getPhone: function(phone){
					var phone = phone.replaceAll(' ', '')
					var c = phone.substring(0,1);
					var tel = '';
					switch(c){
						case '+':
							tel = phone.substring(2,11);
							break;
						case '6':
							tel = phone.substring(1,11);
							break;
						case '1':
							tel = '0'+phone;
							break;
						default:
							tel = phone;
							break;
					}
					return tel;

				},

				getMsisdn: function(msisdn){

					var tmp = msisdn.split('@');
					return tmp[0];
				},

				getUserInfor: function(){
					var self = this;

					var url_string = window.location.href;
					var url = new URL(url_string);
					var guid = url.searchParams.get('id');
					if(guid){
						$('#page_error').hide();
						$('#cart-body').show();
						self.guid = guid;

						toggleOverlay();
						axios.get(apiEndpointURL_elevate + '/getPreRegisterUser/?id=' + self.guid + '&nonce='+yesObj.nonce)
							.then((response) => {
								toggleOverlay(false);
								var data = response.data;
								
								if(data){
									self.deliveryInfo = data;
									self.allowSubmit = true;
									self.deliveryInfo.mykad = self.deliveryInfo.nric;
									self.deliveryInfo.address = self.deliveryInfo.addressLine1;
									self.deliveryInfo.postcode = self.deliveryInfo.postCode;

									self.deliveryInfo.msisdnToUpgrade = self.getMsisdn(self.deliveryInfo.msisdnToUpgrade);

									self.deliveryInfo.stateCode = (self.deliveryInfo.state) ? self.getStateCode(self.deliveryInfo.state) : '';
									self.deliveryInfo.cityCode = self.deliveryInfo.city;

									self.deliveryInfo.phone = self.getPhone(self.deliveryInfo.mobile);
									self.productOffered();
									self.updateCityCode();

									elevate.lsData.meta.guid = self.guid;
									elevate.lsData.deliveryInfo = self.deliveryInfo;
									elevate.updateElevateLSData();


									self.eKYC_init();
								}else{
									$('#cart-body').hide();
									$('#page_error').show();
								}

							})
							.catch((error) => {
								toggleOverlay(false);
								$('#cart-body').hide();
								$('#page_error').show()
								console.log('error', error);
							})

					}else{
						$('#cart-body').hide();
						$('#page_error').show();
					}


				},

                redirectYWOS:function (){
                    var self = this;
                    toggleOverlay();
                    ywos.buyPlan(self.selectedPlan);
                },

				generateUUID: function() {
					var d = new Date().getTime();//Timestamp
					var d2 = ((typeof performance !== 'undefined') && performance.now && (performance.now()*1000)) || 0;//Time in microseconds since page-load or 0 if unsupported
					return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
						var r = Math.random() * 16;
						if(d > 0){
							r = (d + r)%16 | 0;
							d = Math.floor(d/16);
						} else {
							r = (d2 + r)%16 | 0;
							d2 = Math.floor(d2/16);
						}
						return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
					});
				},

                makeCode: function () {
                    var self = this;
                    var url_verification = self.ekyc_url + 'EKYC/?fullName=' + encodeURIComponent (self.deliveryInfo.name) + '&nric=' + self.deliveryInfo.mykad + '&guid=' + encodeURIComponent(self.ekyc_uid);
                    $('#cmdVerify').data('url', url_verification);

					const qrcode = new QRCode(document.getElementById('qrcode'), {
					  text: url_verification,
					  width: 128,
					  height: 128,
					  colorDark : '#000',
					  colorLight : '#fff',
					  correctLevel : QRCode.CorrectLevel.H
					});
                },

                renderText: function(strID) {
                    return elevate.renderText(strID, Elevate_lang);
                }
            }
        });
    });
</script>
