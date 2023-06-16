<?php require_once('includes/header.php') ?>

<header class="white-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="mt-4">
                    <a href="/elevate/verification/" class="back-btn "><img
                                src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/back-icon.png"
                                alt=""> Back to Cart</a>
                </div>
            </div>
            <div class="col-lg-4 col-6 text-lg-center text-end">
                <h1 class="title_checkout p-3"></h1>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </div>
</header>
<main>
    <section id="cart-body">
        <div class="container" style="border: 0">
            <div id="main-vue">
            <div class="border-box">
                <div class="row">
                    <div class="col-md-5 p-5 flex-column bg-checkout2">
                        <div class="title text-white checkout-left2">
                            You’re not elligible for Yes Infinite+, but here’s the next best thing!
                        </div>
                    </div>
                    <div class="col-md-7  p-5">
                        <div class="flex-container mt-5">
                            <div>
                                <div class="subtitle2">
                                    {{plan.displayName}}
                                </div>
                                <p></p>
                                <ul class="mt-3 mb-3 list-1" v-for="(item, index) in plan.features">
                                    <li>{{item}}</li>
                                </ul>
                                <div v-for="(item, index) in plan.notes">
                                <p>{{item}}</p>
                                </div>
                                <p class="mt-3">Would you like to proceed?</p>
                                <div class="p-3">
                                    <a class="pink-btn-disable text-uppercase mr-2" :class="(allowSubmit)?'pink-btn':'pink-btn-disable'" @click="goNext">choose plan</a>
                                    <a href="/infinite-phone-bundles/" class="btn-cancel text-uppercase">Cancel</a>
                                </div>
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
                productId: null,
                isCartEmpty: false,
                isCAEligibilityCheck: false,
                selectedPlan:0,
                taxRate: {
                    sst: 0.06
                },
                plan:{
                    displayName:'',
                    features:[],
                    notes:[],
                },
                eligibility: {
                    mykad: '',
                    name: '',
                    phone: '',
                    email: ''
                },
                customer:{
                    id:'',
                    securityNumber: '',
                    fullName: '',
                    productSelected:''
                },
                allowSubmit: false
            },

            created: function () {
                var self = this;

                setTimeout(function () {
                    self.pageInit();
                }, 500);

            },
            methods: {
                pageInit: function () {
                    var self = this;
                    if (elevate.validateSession(self.currentStep)) {
                        if (elevate.lsData.eligibility) {
                            self.eligibility = elevate.lsData.eligibility;
                        }
                        self.productId = elevate.lsData.product.selected.productCode;
                        self.selectedPlan = elevate.lsData.selectedPlan;
                        self.customer = elevate.lsData.customer;

                        if(self.selectedPlan){
                            self.pullPlan();
                        }else{
                            elevate.redirectToPage('eligibility-failure');
                        }
                    } else {
                        elevate.redirectToPage('cart');
                    }
                },
                pullPlan: function () {
                    var self = this;
                    var params = {};
                    toggleOverlay();
                    axios.get(apiEndpointURL + '/get-plan-by-id/'+ self.selectedPlan + '?nonce='+yesObj.nonce, params)
                        .then((response) => {
                            var data = response.data;
                            self.plan.displayName = data.displayName;
                            self.plan.features = data.internetSms.split('|');
                            self.plan.notes = data.notes.split('|');
                            self.allowSubmit = true;
                            toggleOverlay(false);
                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log(error);
                        });


                },
                CAEligibility: function () {
                    var self = this;
                    var params = {
                        mykad: self.eligibility.mykad,
                        name:self.eligibility.name,
                    };
                    toggleOverlay();
                    axios.post(apiEndpointURL_elevate + '/ca-verification'+ '?nonce='+yesObj.nonce  ,params)
                        .then((response) => {

                            var data = response.data;
                            if (data.status == 1) {
                                self.isCAEligibilityCheck = true;
                                self.redirectYWOS();
                            } else {
                                toggleOverlay(false);
                                $('#error').html("System error, please try again.");
                                console.log(data);
                            }
                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            $('#error').html("System error, please try again.");
                            console.log(error, response);
                        });
                },
                redirectYWOS:function (){
                    var self = this;
                    toggleOverlay();
                    ywos.buyPlan(self.selectedPlan);
                },
                renderText: function(strID) {
                    return elevate.renderText(strID, Elevate_lang);
                },
                goNext: function(){
                    $('#error').html('');
                    var self = this;
                    if(self.isCAEligibilityCheck){
                        self.redirectYWOS();
                    }else{
                        self.CAEligibility();
                    }

                }
            }
        });
    });
</script>