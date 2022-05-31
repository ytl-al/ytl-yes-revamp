<?php require_once('includes/header.php') ?>
<style>
	body{
		background: url(/wp-content/uploads/2021/09/amazing-things-bg.png);
		background-size: cover;
		background-repeat: no-repeat;
	}
	.contract_section{
		margin-top:30px;
	}
	.contract_term{max-height:350px; overflow-y:auto;border:1px solid #ccc; padding:15px; border-radius:3px; margin-bottom:10px;}
	.contract_term{ margin-top:20px;}

	:root {
        --code-color: darkred;
        --code-bg-color: #aaaaaa;
        --code-font-size: 14px;
        --code-line-height: 1.4;
        --scroll-bar-color: #c5c5c5;
        --scroll-bar-bg-color: #fff;
    }

	*{
        scrollbar-width: thin;
        scrollbar-color: var(--scroll-bar-color) var(--scroll-bar-bg-color);
    }


    *::-webkit-scrollbar {
        width: 12px;
    }

    *::-webkit-scrollbar-track {
        background: var(--scroll-bar-bg-color);
    }

    *::-webkit-scrollbar-thumb {
        background-color: var(--scroll-bar-color);
        border-radius: 20px;
        border: 3px solid var(--scroll-bar-bg-color);
    }
</style>
<header class="white-top">
    <div class="container"">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="mt-4">
                    <a href="/elevate/review/" class="back-btn "><img
                                src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/back-icon.png"
                                alt=""> Back</a>
                </div>
            </div>
            <div class="col-lg-4 col-6 text-lg-center text-end">
                <h1 class="title_checkout p-3">Contract</h1>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </div>
</header>
<main class="clearfix site-main">
    <section id="cart-body">
        <div class="container" style="border: 0">
            <div id="main-vue">
            <div class="p-lg-5">
                <div class="mb-5 pad-mobile">
                    <h2 class="subtitle mt-3 mb-3">Yes Infinite+ Contract Permissions</h2>
                    <p>Read our contract conditions before proceeding.</p>
                    <div class="mt-3 content">
						<div class="contract_section">
							<h3>YES Terms and Condition</h3>
							<div class="contract_term">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sagittis in neque non rhoncus.
								Sed efficitur, enim eu ultricies blandit, erat eros dapibus orci, eu finibus libero nisi et
								turpis. Phasellus eu orci felis. Suspendisse potenti. Duis sagittis ipsum sit amet risus
								pharetra vestibulum nec id diam. Vivamus felis augue, euismod vel tempus eu, varius sit amet
								arcu. Aenean ultrices neque quis nulla aliquam volutpat id at quam. Integer aliquet turpis
								venenatis commodo posuere.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sagittis in neque non rhoncus.
								Sed efficitur, enim eu ultricies blandit, erat eros dapibus orci, eu finibus libero nisi et
								turpis. Phasellus eu orci felis. Suspendisse potenti. Duis sagittis ipsum sit amet risus
								pharetra vestibulum nec id diam. Vivamus felis augue, euismod vel tempus eu, varius sit amet
								arcu. Aenean ultrices neque quis nulla aliquam volutpat id at quam. Integer aliquet turpis
								venenatis commodo posuere.</p>

							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sagittis in neque non rhoncus.
								Sed efficitur, enim eu ultricies blandit, erat eros dapibus orci, eu finibus libero nisi et
								turpis. Phasellus eu orci felis. Suspendisse potenti. Duis sagittis ipsum sit amet risus
								pharetra vestibulum nec id diam. Vivamus felis augue, euismod vel tempus eu, varius sit amet
								arcu. Aenean ultrices neque quis nulla aliquam volutpat id at quam. Integer aliquet turpis
								venenatis commodo posuere.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sagittis in neque non rhoncus.
								Sed efficitur, enim eu ultricies blandit, erat eros dapibus orci, eu finibus libero nisi et
								turpis. Phasellus eu orci felis. Suspendisse potenti. Duis sagittis ipsum sit amet risus
								pharetra vestibulum nec id diam. Vivamus felis augue, euismod vel tempus eu, varius sit amet
								arcu. Aenean ultrices neque quis nulla aliquam volutpat id at quam. Integer aliquet turpis
								venenatis commodo posuere.</p>
							</div>
							<div><label><input type="checkbox" id="term1" name="term1" @click="check_sign" value="agree" checked/> I Agree</label></div>
						</div>
						<div class="contract_section">
							<h3>Tera Optimus Pearl Terms and Condition</h3>
							<div class="contract_term">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sagittis in neque non rhoncus.
								Sed efficitur, enim eu ultricies blandit, erat eros dapibus orci, eu finibus libero nisi et
								turpis. Phasellus eu orci felis. Suspendisse potenti. Duis sagittis ipsum sit amet risus
								pharetra vestibulum nec id diam. Vivamus felis augue, euismod vel tempus eu, varius sit amet
								arcu. Aenean ultrices neque quis nulla aliquam volutpat id at quam. Integer aliquet turpis
								venenatis commodo posuere.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sagittis in neque non rhoncus.
								Sed efficitur, enim eu ultricies blandit, erat eros dapibus orci, eu finibus libero nisi et
								turpis. Phasellus eu orci felis. Suspendisse potenti. Duis sagittis ipsum sit amet risus
								pharetra vestibulum nec id diam. Vivamus felis augue, euismod vel tempus eu, varius sit amet
								arcu. Aenean ultrices neque quis nulla aliquam volutpat id at quam. Integer aliquet turpis
								venenatis commodo posuere.</p>

							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sagittis in neque non rhoncus.
								Sed efficitur, enim eu ultricies blandit, erat eros dapibus orci, eu finibus libero nisi et
								turpis. Phasellus eu orci felis. Suspendisse potenti. Duis sagittis ipsum sit amet risus
								pharetra vestibulum nec id diam. Vivamus felis augue, euismod vel tempus eu, varius sit amet
								arcu. Aenean ultrices neque quis nulla aliquam volutpat id at quam. Integer aliquet turpis
								venenatis commodo posuere.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sagittis in neque non rhoncus.
								Sed efficitur, enim eu ultricies blandit, erat eros dapibus orci, eu finibus libero nisi et
								turpis. Phasellus eu orci felis. Suspendisse potenti. Duis sagittis ipsum sit amet risus
								pharetra vestibulum nec id diam. Vivamus felis augue, euismod vel tempus eu, varius sit amet
								arcu. Aenean ultrices neque quis nulla aliquam volutpat id at quam. Integer aliquet turpis
								venenatis commodo posuere.</p>
							</div>
							<div><label><input type="checkbox" id="term2" name="term2" @click="check_sign" value="agree" checked/> I Agree</label></div>
						</div>

                    </div>
                    <div class="mt-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div>Customer Signature</div>
                                <div style="height: 50px;"></div>
                                <div><input type="text" @keyup="check_sign()" autocomplete="off"  v-model="contract_signed"  class="form-control user_sign text-uppercase" placeholder="Type your full name as per MyKAD" id="fname"/></div>
                                <div></div>
                                <div class="mt-4">
                                    <a class="btn-signup" :class="allowSubmit?'btn-signed':'btn-signup'" @click="sign_contract"><i class="icon icon-signup2"></i> <span v-if="allowSubmit">Signed</span><span v-else>Fill and Sign</span></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>Date & Time</div>
                                <div class="mt-3 text-bold text-uppercase" id="contract_time" style="display:none"><span>{{ time }}</span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <button class="mt-3 pink-btn-disable text-uppercase w300" :class="allowSubmit?'pink-btn':'pink-btn-disable'" @click="goNext" type="button">Submit Contract</button>
                                <div id="error" class="mt-3"></div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            </div>
        </div>
    </section>

</main>
<?php require_once('includes/footer.php'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        var pageCart = new Vue({
            el: '#main-vue',
            data: {
                qrcode: null,
				interval: null,
				time: null,
				dealer:{
					dealer_code: '',
					dealer_id: '',
					referral_code: ''
				},
                contract:{},
                contract_signed:"",
                eligibility: {
                    uid: '',
                    mykad: '',
                    name: '',
                    phone: '',
                    email: ''
                },
                deliveryInfo: {
                    uid: '',
                    mykad: '',
                    name: '',
                    phone: '',
                    email: '',
                    address: '',
                    addressMore: '',
                    addressLine: '',
                    postcode: '',
                    state: '',
                    stateCode: '',
                    city: '',
                    cityCode: '',
                    country: '',
                    deliveryNotes: '',
                    sanitize: {
                        address: '',
                        addressMore: '',
                        addressLine: '',
                        city: '',
                        country: '',
                        state: ''
                    }
                },
                orderSummary: {
                    product: {},
                    orderDetail: {
                        total: 0.00,
                        color: null,
                        contract_id: null,
                        orderItems: []
                    },
                    orderInfo:{}
                },
                currentStep: 0,
                allowSubmit: false
            },

			beforeDestroy() {
				// prevent memory leak
				clearInterval(this.interval)
			},

            created: function () {
                var self = this;
                setTimeout(function () {
                    self.pageInit();
                }, 500);
				$('#contract_time').show();
				this.interval = setInterval(() => {
				  // Concise way to format time according to system locale.
				  this.time = Intl.DateTimeFormat('en-GB', {
					day: '2-digit',
					month: '2-digit',
					year: 'numeric',
					hour: 'numeric',
					minute: 'numeric',
					hourCycle: 'h11',
				  }).format()
				}, 1000);
            },
            methods: {
                pageInit: function () {
                    var self = this;
                    if (elevate.validateSession(self.currentStep)) {
                        if (elevate.lsData.eligibility) {
                            self.eligibility = elevate.lsData.eligibility;
                        }else{
							 elevate.redirectToPage('eligibilitycheck');
						}
                        if (elevate.lsData.deliveryInfo) {
                            self.deliveryInfo = elevate.lsData.deliveryInfo;
                        }else{
							 elevate.redirectToPage('personal');
						}
                        if (elevate.lsData.customer) {
                            self.customer = elevate.lsData.customer;
                        }

                        if (elevate.lsData.orderSummary) {
                            self.orderSummary = elevate.lsData.orderSummary;
                        }

                        if (elevate.lsData.product) {
                            self.orderSummary.product = elevate.lsData.product;
                        }

                        self.dealer = elevate.lsData.meta.dealer;

                    } else {
                        elevate.redirectToPage('cart');
                    }


                },
                sign_contract: function () {
                    var self = this;
                    $('#fname').focus();
                },
                check_sign: function (){
                    var self = this;
					self.allowSubmit = true;

					if(!self.contract_signed){
						self.allowSubmit = false;
					}

					if(!$('#term1').is(':checked') || !$('#term2').is(':checked')){
                        self.allowSubmit = false
                    }

                    if(!self.contract_signed.toUpperCase() || (self.contract_signed && self.contract_signed.toUpperCase()!= self.eligibility.name.toUpperCase())){
                         self.allowSubmit = false;
                    }

                },

                makeOrder: function (){
                    var self = this;
                    var params = self.customer;
					params.productSelected = self.orderSummary.product.selected.plan.planId;
                    params.referralCode = self.dealer.referral_code;
                    params.dealerUID = self.dealer.dealer_id;
                    params.dealerCode = self.dealer.dealer_code;

                    toggleOverlay();
                    axios.post(apiEndpointURL_elevate + '/order/create', params)
                        .then((response) => {
                            var data = response.data;
                            if(data.status == 1){
                                //save contract info
                                self.orderSummary.orderInfo = data.data;
                                elevate.lsData.orderInfo = data.data;
                                elevate.updateElevateLSData();

                                self.submit_contract();
                            }else{
                                toggleOverlay(false);
                                toggleModalAlert('Error','Dear valued customer,<br>Unfortunately, your submission was not successful due to the system that is currently unavailable.')
                            }
                            toggleOverlay(false);

                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log(error);
                        });
                },

                updateElevateOrder: function (){
                    var self = this;

                    toggleOverlay();
                    var param = elevate.lsData.orderInfo;

                    axios.post(apiEndpointURL_elevate + '/order/update', param)
                        .then((response) => {
                            var data = response.data;
                            if(data.status == 1){
                                elevate.redirectToPage('thanks');
                            }else{
                                toggleOverlay(false);
                                toggleModalAlert('Error','Dear valued customer,<br>Unfortunately, your submission was not successful due to the system that is currently unavailable.')
                            }
                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log(error);
                        });

                },

                submit_contract: function () {
                    var self = this;
                    var params = self.eligibility;
                    params.orderId = self.orderSummary.orderInfo.id;
                    params.contract = self.orderSummary.product.selected.contract;
                    toggleOverlay();
                    axios.post(apiEndpointURL_elevate + '/contract', params)
                        .then((response) => {
                            var data = response.data;
                            if(data.status == 1){
                                //save contract info
                                self.contract = data.data;

                                elevate.lsData.contract = data.data;
                                elevate.updateElevateLSData();
                                toggleOverlay();
                                elevate.redirectToPage('paynow');
                            }else{
                                toggleOverlay(false);
                                toggleModalAlert('Error','Dear valued customer,<br>Unfortunately, your submission was not successful due to the system that is currently unavailable.')
                            }
                            toggleOverlay(false);

                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log(error);
                        });

                },
                goNext: function (){
                    var self = this;
                    $('#error').html("");
                    if(self.allowSubmit){

                        if(self.orderSummary.orderInfo.id){
                            self.submit_contract();
                        }else{
                            self.makeOrder();
                        }

                    }

                }
            }
        });
    });
</script>