<?php require_once('includes/header.php') ?>

<header class="white-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="mt-4">
                    <a href="/elevate/cart/" class="back-btn "><img
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
            <div class="border-box p-lg-5">
                <div class="mb-5 pad-mobile">
                    <h2 class="subtitle mt-3 mb-3">Yes Elevate Contract Permissions</h2>
                    <p>Read our contract conditions before proceeding.</p>
                    <div class="mt-3 content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sagittis in neque non rhoncus.
                            Sed efficitur, enim eu ultricies blandit, erat eros dapibus orci, eu finibus libero nisi et
                            turpis. Phasellus eu orci felis. Suspendisse potenti. Duis sagittis ipsum sit amet risus
                            pharetra vestibulum nec id diam. Vivamus felis augue, euismod vel tempus eu, varius sit amet
                            arcu. Aenean ultrices neque quis nulla aliquam volutpat id at quam. Integer aliquet turpis
                            venenatis commodo posuere.</p>

                        <p>Ut erat eros, hendrerit in diam nec, semper elementum leo. Aliquam condimentum elit vitae
                            pellentesque blandit. Vivamus malesuada nulla ut nulla cursus porttitor. Nulla finibus velit
                            a erat bibendum placerat. Phasellus nec laoreet massa, nec tempor dui. Nam ultrices elit a
                            dui vestibulum, sed porta ante vestibulum. Pellentesque a mauris sit amet urna consequat
                            pulvinar. Donec ullamcorper eget ante ultrices ullamcorper. Sed a pulvinar magna. Morbi
                            aliquet iaculis urna, at suscipit neque porta sit amet. Pellentesque a massa ante. Nullam
                            malesuada consequat aliquam. Nullam porta nisi id nisl tincidunt suscipit. Quisque sed
                            gravida eros. Nam venenatis ligula ex. Maecenas enim lorem, dictum at sodales rutrum,
                            malesuada quis dui.</p>

                        <p>Maecenas pellentesque at lorem quis eleifend. Phasellus nisi sapien, aliquam sed porttitor
                            nec, hendrerit quis diam. Curabitur malesuada felis mattis, elementum dolor vel, tristique
                            dui. Morbi ultricies dolor id vestibulum fringilla. Cras ac nunc eu augue venenatis
                            fermentum et vitae sapien. Nulla porttitor pharetra nulla, eu accumsan mauris. Duis nec
                            mauris diam. Nullam blandit, mauris in venenatis lacinia, dolor nisl congue ante, eget
                            iaculis lorem orci sit amet orci. Integer in vestibulum neque, sit amet consequat velit.
                            Integer et consectetur ligula. Quisque mollis venenatis nunc, sagittis pellentesque quam
                            vulputate non. Etiam felis metus, tristique non ex a, suscipit faucibus augue.</p>

                        <p>Nulla malesuada augue et arcu lobortis fermentum. Donec ac dui mi. Nulla facilisi.
                            Suspendisse sagittis, libero eget malesuada porttitor, magna leo sagittis odio, vel rutrum
                            augue elit in nunc. Phasellus pulvinar venenatis diam ac dignissim. Vestibulum porttitor
                            tincidunt massa, iaculis porttitor tortor pharetra a. Duis nec sem malesuada, bibendum velit
                            eget, rhoncus arcu.</p>
                    </div>
                    <div class="mt-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div>Customer Signature</div>
                                <div style="height: 50px;"></div>
                                <div><input type="text" @keyup="check_sign()" autocomplete="off"  v-model="contract_signed"  class="form-control user_sign" placeholder="Type your full name" id="fname"/></div>
                                <div></div>
                                <div class="mt-4">
                                    <a class="btn-signup" :class="allowSubmit?'btn-signed':'btn-signup'" @click="sign_contract"><i class="icon icon-signup2"></i> <span v-if="allowSubmit">Signed</span><span v-else>Fill and Sign</span></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>Date & Time</div>
                                <div class="mt-3 text-bold"><?php echo date("d/m/Y")?></div>
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
                        if (elevate.lsData.deliveryInfo) {
                            self.deliveryInfo = elevate.lsData.deliveryInfo;
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

                        if (elevate.lsData.orderInfo) {
                            self.orderSummary.orderInfo = elevate.lsData.orderInfo;
                        }

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

                    if(self.contract_signed && self.contract_signed == self.eligibility.name){
                        self.allowSubmit = true;
                    }else{
                        self.allowSubmit = false;
                    }

                },

                makeOrder: function (){
                    var self = this;
                    var params = self.customer;

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
                                $('#error').html("System error, please try again.");
                                console.log(data);
                            }
                            toggleOverlay(false);

                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log(error, response);
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
                                elevate.redirectToPage('thanks');
                            }else{
                                toggleOverlay(false);
                                $('#error').html("System error, please try again.");
                                console.log(data);
                            }
                            toggleOverlay(false);

                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log(error, response);
                        });

                },
                goNext: function (){
                    var self = this;
                    $('#error').html("");
                    if(self.allowSubmit){
                        if(self.orderSummary.orderInfo){
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