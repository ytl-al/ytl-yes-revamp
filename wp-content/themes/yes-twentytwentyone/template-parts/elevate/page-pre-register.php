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


<header class="white-top">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="title_checkout p-3">Pre-Register</h1>
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
                        <span>1. Slect Plan</span>
                    </li>
                    <li ui-sref="secondStep">
                        <span>2. Payment</span>
                    </li> 
                </ul>
            </div>
        </section>
    <!-- Banner End -->
	<input type="hidden" value="" id="displayOrderNumber"/>
    <section id="cart-body" style="display: none;">
        <div class="container " style="border: 0">
            <div id="main-vue">
                <div class="layer-invitationText">
                    <h3>Dear {{ deliveryInfo.name }},</h3>
                    <p>We are pleased to invite you to our special promotion, just for you. Please select a plan, and proceed.</p>
                </div>
                <div class="subtitle mb-4">Select Plan</div>

                <div class="layer-selectPlan">
                    <div class="row flex-nowrap flex-xl-wrap gx-5">
                        <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column productItem bundle896" >
                            <div class="layer-planDevice">
                                <h2>Infinite+ Basic 99</h2>
                                <h3>XIAOMI Redmi 10</h3>
                                <p class="panel-deviceImg"><img src="/wp-content/uploads/2021/09/Xiaomi-Redmi-10.jpg" /></p>
                                <p class="panel-btn"><a href="javascript:void(0)" class="btn btn-selectPlan" v-on:click="selectPlan(896)" data-productid="896">Select</a></p>
                            </div>
                        </div>
                        <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column productItem bundle898" >
                            <div class="layer-planDevice">
                                <h2>Infinite+ Standard 128</h2>
                                <h3>SAMSUNG A33</h3>
                                <p class="panel-deviceImg"><img src="/wp-content/uploads/2022/04/samsung-a33.jpg" /></p>
                                <p class="panel-btn"><a href="javascript:void(0)" class="btn btn-selectPlan" v-on:click="selectPlan(898)" data-productid="898">Select</a></p>
                            </div>
                        </div>
                        <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column productItem bundle900" >
                            <div class="layer-planDevice">
                                <h2>Infinite+ Premium 188</h2>
                                <h3>SAMSUNG S22 Ultra</h3>
                                <p class="panel-deviceImg"><img src="/wp-content/uploads/2022/04/samsung-s22-ultra-black.png" /></p>
                                <p class="panel-btn"><a href="javascript:void(0)" class="btn btn-selectPlan" v-on:click="selectPlan(900)" data-productid="900">Select</a></p>
                            </div>
                        </div>


                        <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column productItem bundle892" >
                            <div class="layer-planDevice">
                                <h2>Infinite+ Standard 128</h2>
                                <h3>Xiaomi 11T</h3>
                                <p class="panel-deviceImg"><img src="/wp-content/uploads/2021/12/xiaomi_11t.png?x41595" /></p>
                                <p class="panel-btn"><a href="javascript:void(0)" class="btn btn-selectPlan" v-on:click="selectPlan(892)" data-productid="892">Select</a></p>
                            </div>
                        </div>
                        <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column productItem bundle904" >
                            <div class="layer-planDevice">
                                <h2>Infinite+ Premium 188</h2>
                                <h3>Xiaomi Redmi 10</h3>
                                <p class="panel-deviceImg"><img src="/wp-content/uploads/2021/09/Xiaomi-Redmi-10.jpg" /></p>
                                <p class="panel-btn"><a href="javascript:void(0)" class="btn btn-selectPlan" v-on:click="selectPlan(904)" data-productid="904">Select</a></p>
                            </div>
                        </div>
                        <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column productItem bundle894">
                            <div class="layer-planDevice">
                                <h2>Infinite+ Basic 99</h2>
                                <h3>Xiaomi 11T </h3>
                                <p class="panel-deviceImg"><img src="/wp-content/uploads/2021/12/xiaomi_11t.png?x41595" /></p>
                                <p class="panel-btn"><a href="javascript:void(0)" class="btn btn-selectPlan" v-on:click="selectPlan(894)" data-productid="894">Select</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="layer-planDetails" id="section-planDetails" style="display: none;">
                    <div class="subtitle mb-4">Plan Details</div>
                    <div class="row gx-5">
                        <div class="col-lg-8 col-12">
                            <div class="border-box">
                                <div class="row">
                                    <div class="col-md-3 leftColor">
                                        <div class="p-3" v-if="orderSummary.product.selected"><img :src="getProductImage()" width="150"></div>
                                    </div>
                                    <div class="col-md-9 p-4">
                                        <div class="row mt-3" v-if="orderSummary.product.selected">
                                            <div class="col-md-9">
                                                <div class="text-20">
											<div class="subtitle2" style="margin-bottom: 0">{{orderSummary.product.selected.nameEN}}</div>
											<div class="subtitle2">{{orderSummary.product.selected.plan.nameEN}}</div>
											</div>
											<div class="hr_line"></div>
											<div class="text-bold">
												{{contractTitle}}
											</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 col-12">
                                    <div class="border-box" style="width: 100%; padding: 20px;" v-if="orderSummary.product.selected">
                                        <div class="accordion-wrap hlv_3">
										<div class="accordion-header" @click="showPlanDetail()"> {{orderSummary.product.selected.plan.nameEN}} <i
													class="icon icon_arrow_down"></i></div>
										<div class="text-description mt-3">{{orderSummary.product.selected.plan.shortDescriptionEN}}</div>
										<ul class="accordion-body list-1 mt-3">
											<li v-for="(list, index) in orderSummary.product.selected.plan.longDescriptionEN">{{list}}</li>
										</ul>
									</div>
									<div class="text-description mt-3">

									</div>
                                    </div>
                                </div>
                            </div>
                            <div class=" mt-3 mb-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row mt-3 item_info">
                                            <div class="label text-bold">To: {{ deliveryInfo.name }}</div>
                                            <div class="content">
                                                <div>{{ deliveryInfo.email }}</div>
                                                <div>+60 {{ deliveryInfo.phone }}</div>
                                            </div>
                                        </div>
                                        <div class="row mt-3 item_info">
                                            <div class="label">Delivery Address</div>
                                            <div class="content">
                                                {{deliveryInfo.addressLine1}}, <br />
                                                {{deliveryInfo.city}}, <br />
                                                {{deliveryInfo.state}}, <br />
                                                {{deliveryInfo.postCode}}, {{deliveryInfo.country}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- <div style="float: right;"><a href="/elevate/personal" class="btn-edit">(Edit)</a></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="summary-box">
                                <h1 class="subtitle">Order summary</h1>
                                <h3 class="plan_price">Monthly Payment</h3>
                                <div class="hr_line"></div>
                                <div class="row cart_total">
                                    <div class="col-6 pt-2 pb-2">
                                        <h3>TOTAL</h3>
                                    </div>
                                    <div class="col-6 pt-2 pb-2 text-end">
                                         <h3>RM{{ formatPrice(parseFloat(orderSummary.orderDetail.subtotal).toFixed(2)) }}/mth</h3>
                                    </div>
                                </div>
                                <div class="monthly mb-4">
                                    <div v-for="(item, index) in orderSummary.orderDetail.orderItems" class="row mt-2">
										<div class="col-6">
											<p>{{item.name}}</p>
										</div>
										<div class="col-6 text-end">
											<p>RM{{item.price}}/ mth</p>
										</div>
									</div>                                     
                                    <div class="hr_line"></div>
                                    <div class="row mt-2 ">
                                        <div class="col-1"><input type="checkbox" id="subscribe" name="subscribe" value="1" v-on:change="watchAllowNext" /></div>
                                        <div class="col-11 text-12">
                                            <label for="subscribe" style="cursor: pointer; font-size: 12px; line-height: 14px;">I here by agree to subscribe to the plan selected in the online form submitted by me, and to be bound by the First to 5G Campaign Terms and Conditions available at <a target="_blank" href="https://www.yes.my/tnc/ongoing-campaigns-tnc">www.yes.my/tnc/ongoing-campaigns-tnc</a>.</label>
                                        </div>
                                    </div>
                                    <div class="row mt-2 ">
                                        <div class="col-1"><input type="checkbox" id="consent" name="consent" value="1" v-on:change="watchAllowNext" /></div>
                                        <div class="col-11 text-12">
                                            <label for="consent" style="cursor: pointer; font-size: 12px; line-height: 14px;">I further give consent to YTLC to process my personal data in accordance with YTL Group Privacy Policy available at <a href="https://www.ytl.com/privacypolicy.asp" target="_blank">https://www.ytl.com/privacypolicy.asp</a> and also give consent to ORIX to process my personal data in accordance with ORIX Privacy Policy available at (<a href="https://www.orix.com.my/privacy-policy" target="_blank">https://www.orix.com.my/privacy-policy</a>) for the purposes of my agreement with ORIX.</label>
                                        </div>
                                    </div>
                                    <div class="row mt-3 ">
                                        <div class="col-12">
                                            <button class="pink-btn-disable d-block text-uppercase w-100" :class=" allowSubmit?'pink-btn':'pink-btn-disable'" v-on:click="goNext" type="button">Order</button>
                                            <div id="error" class="mt-3"></div>
											<div id="status_mesage"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                         Sorry, your request does not qualify for the Yes Elevate contract option, please select another contract option:
                                     </div></div> 
									 <div class="p-3 text-center"><a href="/infinite-phone-bundles/" class="pink-btn text-uppercase">Back to Infinite+</a></div> <div id="error" class="mt-3"></div></div></div>
	</div>

</main>

 <div class="modal fade" id="modal-alert" tabindex="-1" aria-labelledby="modal-alert" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="modal-titleLabel"></h5>
                </div>
                <div class="modal-body text-center">
                    <p id="modal-bodyText"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {         
        var pageCart = new Vue({
            el: '#main-vue',
            data: {
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
                    product: {},
                    orderDetail: {
                        total: 0.00,
                        color: null,
                        contract_id: null,
                        orderItems: []
                    },
                },
                allowSubmit: false
            },
            created: function() {
                var self = this;
                setTimeout(function() {
                    self.pageInit();
                }, 500);
            },
            methods: {
                pageInit: function() {
					var self = this;
					//$('.productItem').hide();
					setTimeout(function() {
						self.getUserInfor();
					}, 500);
                },
                selectPlan: function(productId = 0) {
                    var self = this;
					
                    self.productId = productId;
                    var dc = elevate.getCookie('paramDC');
					var duid = elevate.getCookie('paramDUID');
					var rc = elevate.getCookie('paramRC');

					if(!dc) dc = '';
					if(!duid) duid = '';
					if(!rc) rc = ''; 
					elevate.initLocalStorage(self.productId, dc, duid, rc);
					
					self.ajaxGetPlanData();
                },
				
				ajaxGetPlanData: function() {
                    var self = this;
                    toggleOverlay(); 
                    axios.get(apiEndpointURL_elevate + '/getProductByCode/?code=' + self.productId)
                        .then((response) => {
                            var data = response.data;
                            if (data.internetData == '∞') {
                                data.internetData = 'Unlimited';
                            }
							
							if(data.selected.plan){

								self.orderSummary.product = data;
								

								self.updatePlan(); 
								
								if(self.orderSummary.product.selected.contractName){
									self.contractTitle = self.orderSummary.product.selected.contractName;
								}else{
									self.contractTitle = 'Elevate ' + self.orderSummary.product.selected.contract +' months';
								}
								
								$('#main-vue').css({'height':'auto'});
								$('#section-planDetails').show();

								toggleOverlay(false);
								self.jumpToSection('section-planDetails');
							}else{
								toggleOverlay(false);
								self.toggleModalAlert('Error', "Sorry, Your product does not existed.");
							}

                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log('error', error);
                        })
                },
                updatePlan: function() {
                    var self = this;

                    self.updateSummary();
                    self.orderSummary.orderDetail.productCode = self.orderSummary.product.selected.productCode; 

                },
                updateSummary: function() {
                    var self = this;
                    var total = 0;

                    self.orderSummary.orderDetail.orderItems = [
                        {name: self.orderSummary.product.selected.nameEN + ' - ' + self.orderSummary.product.selected.color,price:parseFloat(self.orderSummary.product.selected.devicePriceMonth).toFixed(2)},
                        {name: self.orderSummary.product.selected.plan.nameEN,price:parseFloat(self.orderSummary.product.selected.plan.monthlyAmount).toFixed(2)},
                    ];
					
					

                    var subtotal = parseFloat(self.orderSummary.product.selected.devicePriceMonth) + parseFloat(self.orderSummary.product.selected.planPerMonth);
                    
					var amount = parseFloat(self.orderSummary.product.selected.plan.monthlyAmount);
                    var sstAmount = parseFloat(self.orderSummary.product.selected.plan.sstAmount);
                    var rounding = parseFloat(self.orderSummary.product.selected.plan.roundingAdjustment);
                    self.orderSummary.orderDetail.amount = amount.toFixed(2);
					var total =  amount +  sstAmount + rounding;
                    self.orderSummary.orderDetail.total = total.toFixed(2);
                    self.orderSummary.orderDetail.sstAmount = sstAmount.toFixed(2);
                    self.orderSummary.orderDetail.roundingAdjustment = rounding.toFixed(2);
					self.orderSummary.orderDetail.subtotal = subtotal.toFixed(2);
					
					self.orderSummary.orderDetail.color = self.orderSummary.product.selected.color; 
                     
                }, 
				
				getProductImage: function(){
					var self = this;
					if(!self.orderSummary.product.selected.imageURL) return;
					var url = self.orderSummary.product.selected.imageURL.split(';');
					console.log(url);
					return url[0];
					
				},
				
				getStateCode: function (stateVal) {
                    var self = this;
                    var objState = self.selectOptions.states.filter(state => state.value == stateVal);
                    return objState[0].stateCode;
                },
				
				updateCityCode: function () {
                    var self = this;
                    var stateCode = self.deliveryInfo.stateCode;

                    toggleOverlay();

                    self.allowSelectCity = false;

                    axios.get(apiEndpointURL + '/get-cities-by-state/' + stateCode)
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
                            if (objCity.length == 0) {
                                self.deliveryInfo.city = '';
                                self.deliveryInfo.cityCode = '';
                            }
                            
                        })
                        .catch((error) => {
                            // console.log(error);
                        })
                        .finally(() => {
                            self.watchAllowNext();
                            toggleOverlay(false);
                        });
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
						 axios.get(apiEndpointURL_elevate + '/getPreRegisterUser/?id=' + self.guid)
							.then((response) => {
								toggleOverlay(false);
								var data = response.data;
								console.log(data);
								if(data){
									self.deliveryInfo = data; 
									
									self.deliveryInfo.mykad = self.deliveryInfo.nric;
									self.deliveryInfo.address = self.deliveryInfo.addressLine1;
									self.deliveryInfo.postcode = self.deliveryInfo.postCode;
									
									self.deliveryInfo.stateCode = (self.deliveryInfo.state) ? self.getStateCode(self.deliveryInfo.state) : '';
									self.deliveryInfo.cityCode = self.deliveryInfo.city;
									
									self.deliveryInfo.phone = self.getPhone(self.deliveryInfo.mobile);
									self.productOffered(); 
									self.updateCityCode();
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
				
				getPhone: function(phone){
					if(phone.substring(0,1) == "6"){
						return phone.substring(1,11);
					}else{
						return phone;
					}
				},
				elevateCustomer: function () {
                    var self = this;
                    var params = self.deliveryInfo;
                    params.productId = self.orderSummary.product.selected.productCode;
 
                    toggleOverlay();
					$('#status_mesage').html('Process customer...');
					
					//console.log(params);return;

                    axios.post(apiEndpointURL_elevate + '/customer', params)
                        .then((response) => { 
                            var data = response.data;
                            if (data.status == 1) {
                                elevate.lsData.customer = data.data;
                                elevate.updateElevateLSData();
								self.customer =  data.data;
								
								//create order
								self.makeOrder();
								
                            } else {
                                toggleOverlay(false);
                                $('#error').html(data.error);
								$('#status_mesage').html('');
                            }
                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log(error, response);
                        });
                },
				
				makeOrder: function (){
                    var self = this;
                    var params = self.customer;
					params.productSelected = self.orderSummary.product.selected.plan.planId;
                    params.referralCode = "";
                    params.dealerUID = "";
                    params.dealerCode = "";
					$('#status_mesage').html('Process order...');
                    toggleOverlay();
                    axios.post(apiEndpointURL_elevate + '/order/create', params)
                        .then((response) => {
                            var data = response.data;
                            if(data.status == 1){
                                //save contract info
                                self.orderSummary.orderInfo = data.data;
                                elevate.lsData.orderInfo = data.data;
                                elevate.updateElevateLSData();
                                self.elevateContract();
                            }else{
                                toggleOverlay(false);
                                $('#error').html("System error, please try again.");
								$('#status_mesage').html('');
                                console.log(data);
                            } 

                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log(error, response);
                        });
                },

                updateElevateOrder: function (){
                        var self = this;

                        toggleOverlay();
                        var param = elevate.lsData.orderInfo;
						 
                        param.orderNumber = self.orderResponse.orderNumber;

                        axios.post(apiEndpointURL_elevate + '/order/update', param)
                            .then((response) => {
                                var data = response.data;
								
                                if(data.status == 1){
									//self.removePrequalifiedCustomer();
									elevate.redirectToPage('thanks?orderNumber='+$('#displayOrderNumber').val());
                                }else{
                                    toggleOverlay(false);
									$('#status_mesage').html('');
                                    $('#error').html("Systm error, please try again.");
                                    console.log(data);
                                }
                            })
                            .catch((error) => {
                                toggleOverlay(false);
                                console.log(error, response);
                            });

                    },

				cancelElevateOrder: function (error){
					var self = this;

					toggleOverlay();
					var param = elevate.lsData.orderInfo;
					param.orderNumber = self.orderResponse.orderNumber;
					param.error = error;

					axios.post(apiEndpointURL_elevate + '/order/cancel', param)
						.then((response) => {
							var data = response.data;
							if(data.status == 1){

							}else{
								toggleOverlay(false);
								$('#status_mesage').html('');
								$('#error').html("Systm error, please try again.");
								console.log(data);
							}
						})
						.catch((error) => {
							toggleOverlay(false);
							console.log(error, response);
						});

				},
				
				elevateContract: function () {
                    var self = this;
                    var params = {
						name: self.deliveryInfo.name,
						mykad: self.deliveryInfo.nric,
						phone: self.deliveryInfo.phone,
						alternative_name: self.deliveryInfo.name,
						alternative_phone:	self.deliveryInfo.phone					
					};
					
                    params.orderId = self.orderSummary.orderInfo.id;
                    params.contract = self.orderSummary.product.selected.contract;
                    toggleOverlay();
					$('#status_mesage').html('Process contract...');
					
                    axios.post(apiEndpointURL_elevate + '/contract', params)
                        .then((response) => {
                            var data = response.data;
                            if(data.status == 1){
                                //save contract info
                                self.contract = data.data;

                                elevate.lsData.contract = data.data;
                                elevate.updateElevateLSData();
								
								
                                if(self.deliveryInfo.isFree){ 
									self.ajaxCreateYOSOrderFree();
								}else{
									$('#status_mesage').html('Please make payment...');
									elevate.redirectToPage('paynow-pre-register');
								}
                            }else{
                                toggleOverlay(false);
                                $('#error').html("System error, please try again.");
								$('#status_mesage').html('');
                                console.log(data);
                            } 

                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log(error, response);
                        });

                },
				
				removePrequalifiedCustomer: function () {
                    var self = this;
                    var params = {
						id: self.deliveryInfo.id			
					};
					 
                    toggleOverlay();
					$('#status_mesage').html('Remove data...');
					
                    axios.post(apiEndpointURL_elevate + '/del-prequalified-customer', params)
                        .then((response) => {
                            var data = response.data;
                            if(data.status == 1){
                                 
                            }else{
                                toggleOverlay(false);
                                $('#error').html("System error, please try again.");
								$('#status_mesage').html('');
                                console.log(data);
                            } 

                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log(error, response);
                        });

                },
				
				getDOB: function (mykad){
                        var self = this;
                        var dateString =  mykad.substring(0, 6); 

                        var year = dateString.substring(0, 2); //year
                        var month = dateString.substring(2, 4); //month
                        var date = dateString.substring(4, 6); //date

                        if (year > 20) {
                            year = "19" + year;
                        }
                        else {
                            year = "20" + year;
                        }

                        var dob = date + "/" + month + "/" + year;
                        return dob;
                    },
					
				ajaxCreateYOSOrderFree: function() {
                        var self = this;
                        var params = {
                            "session_key": elevate.lsData.sessionKey,
                            "phone_number": self.deliveryInfo.phone,
                            "customer_name": self.deliveryInfo.name,
                            "dob": self.getDOB(self.deliveryInfo.nric),
                            "gender": self.deliveryInfo.gender,
                            "email": self.deliveryInfo.email,
                            "login_yes_id": "",
                            "security_type": "NRIC",
                            "security_id": self.deliveryInfo.nric,
                            "school_name": "",
                            "school_code": "",
                            "university_name": "",
                            "dealer_code": "",
                            "dealer_login_id": "",
                            "plan_name": self.orderSummary.product.selected.plan.planName,
                            "plan_type": self.orderSummary.product.selected.plan.planType,
                            "product_bundle_id": self.orderSummary.product.selected.productCode,
                            "referral_code": "",
                            "addon_name": "",
                            "address_line":  self.deliveryInfo.addressLine1,
                            "city": self.deliveryInfo.city,
                            "city_code": self.deliveryInfo.cityCode,
                            "postal_code": self.deliveryInfo.postCode,
                            "state": self.deliveryInfo.state,
                            "state_code": self.deliveryInfo.stateCode,
                            "country": self.deliveryInfo.country
                        }
						$('#status_mesage').html('Process payment...');
                        //console.log("params",params); return;
                        axios.post(apiEndpointURL_elevate + '/create-yos-free-order', params)
                            .then((response) => {
                                var data = response.data;
								 
								if(parseInt(data.status) == 1){
									 
								    console.log(data.data);
									self.orderResponse = data.data;

									elevate.lsData.YOSOrder = data.data;								
									elevate.updateElevateLSData(); 
									
									//update elevate Order
									
									$('#displayOrderNumber').val(data.data.displayOrderNumber);
									self.updateElevateOrder(); 
								 }else{
									 $('#status_mesage').html('');
									 $('#error').html('Sorry, you cannot make order. '+data.error);
								 }
								  
								
                            })
                            .catch((error) => {
                                var response = error.response;
                                if (typeof response != 'undefined') {
                                    var data = response.data;
                                    var errorMsg = '';
                                    if (error.response.status == 500 || error.response.status == 503) {
                                        errorMsg = "There's an error in creating your order.<br />Please try again later.";
                                    } else {
                                        errorMsg = data.message
                                    }
                                    toggleOverlay(false);
                                    self.toggleModalAlert('Error', errorMsg);

                                    self.cancelElevateOrder(errorMsg);
                                }
                                console.log(error, response);
                            })
                            .finally(() => {
                                // console.log('finally');
                            });

                        // console.log(JSON.stringify(params));
                    },
				
                jumpToSection: function(sectionID) {
                    var targetSection = $('#' + sectionID);
                    if (targetSection.length > 0) {
                        var targetOffset = $(targetSection).offset().top;
                        $('html, body').animate({
                            scrollTop: targetOffset
                        }, 100);
                    }
                    return false;
                },
				
				toggleModalAlert: function(modalHeader = '', modalText = '') {
					$('#modal-titleLabel').html(modalHeader);
					$('#modal-bodyText').html(modalText);
					$('#modal-alert').modal('show');
					$('#modal-alert').on('hidden.bs.modal', function() {
						$('#modal-titleLabel').html('');
						$('#modal-bodyText').html('');
					});
				},
				
                showPlanDetail: function() {
                    $('.accordion-wrap').toggleClass("active");
                    $(".accordion-body").slideToggle();
                },
                watchAllowNext: function() {
                    var self = this;
                    if ($('#subscribe').is(':checked') && $('#consent').is(':checked')) {
                        self.allowSubmit = true
                    } else {
                        self.allowSubmit = false
                    }
					
					if(!self.deliveryInfo.id){
						self.allowSubmit = false
					}
					
                },
                goNext: function() {
					
                    var self = this;
                    if (self.allowSubmit) {
						$('#status_mesage').html('');
						$('#error').html('');
					
						var LSData = JSON.parse(localStorage.getItem(elevateLSName));
						elevate.lsData = LSData;
						elevate.lsData.deliveryInfo =  self.deliveryInfo;
						elevate.lsData.product =  self.orderSummary.product;
						elevate.lsData.orderDetail =  self.orderSummary.orderDetail;
						elevate.updateElevateLSData();
						  		
						if(self.customer){
							if(self.orderSummary.orderInfo){
								if(self.contract){
									if(self.deliveryInfo.isFree){
										self.ajaxCreateYOSOrderFree();
									}else{
										elevate.redirectToPage('paynow-pre-register');
									}
								}else{
									self.elevateContract();
								}
							}else{
								self.makeOrder();
							}
						}else{
							self.elevateCustomer();
                        }
                    }
                }
            }
        });
    });
</script>

<?php require_once('includes/footer.php'); ?>