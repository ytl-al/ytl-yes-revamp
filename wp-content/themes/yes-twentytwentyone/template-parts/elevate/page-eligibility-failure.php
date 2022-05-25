<?php require_once('includes/header.php') ?>
<style>
#cart-body .nav-pills .nav-link.active {
    color: #FF0084 !important;
    border: 0 !important;
    border-bottom: 8px solid #FF0084 !important;
}
 .item-plans {
        align-items: center;
        justify-content: center;
        padding: 70px 0px;
        padding-top: 0px;
        background-color:#F7F8F9;
    }
    
    .item-plans h1 {
        font-size: 39px;
        font-weight: 800;
        line-height: 47px;
        color: #000;
        padding-top: 60px;
    }
    
    .item-plans .plan-table {
        border-spacing: 8px 0px;
        border-collapse: initial;
    }
    
    .item-plans .plan-table th {
        padding: 9px 30px;
        vertical-align: middle;
        background-color: #FFF;
border:none;
        border-radius: 10px;
width:20%;
text-align:center;
    }
    
    .item-plans .plan-table th .pink-btn {
        padding:.375rem .75rem;
    display: inline-block;
    }
    
    .item-plans .plan-table th.visual {
        background-color: transparent;
        border: none;
    }
    
    .item-plans .plan-table th h1 {
         color: #2B2B2B;
font-family: 'Open Sans', sans-serif;
        font-size: 16px;
        line-height: 24px;
        font-weight: 400;
        text-align: center;
        margin-bottom: 15px;
        padding-top: 0px;
    }
    
    .item-plans .plan-table th h2 {
        color: #000;
        font-size: 18px;
        line-height: 23px;
        font-weight: 800;
        text-align: center;
        margin-bottom: 15px;
    }
    
    .item-plans .plan-table tr td {
        padding: 20px;
        text-align: center;
        background-color: #FFF;
        border-bottom: solid 1.5px #d5d5d5;
        color: #2B2B2B;
        font-size: 15px;
        font-weight: 600;
        vertical-align: middle;
    }
    
    .item-plans .plan-table tr:last-child td {
        border-bottom: none;
    }
    
    .item-plans .plan-table tr td.blue-col {
        background-color:#1A1E47;
        border-bottom: none;
        position: relative;
        color: #F9F7F4;
        text-align: left;
    }
    
    .item-plans .plan-table tr td.blue-col .info-icon {
        /* position: absolute;
        right: 22px;
        top: 22px; */
        float: right;
    }

    .item-plans .plan-table tr td.blue-col:after {
        clear: both;
        content: '';
        display: block;
    }
    
    .item-plans .plan-table tr td.empty-row {
        background-color: transparent;
        border: none;
        padding: 0;
        height: 10px;
    }
	
	.plan-item {
		border: 3px solid transparent !important;
		box-sizing: border-box;
		border-radius: 8px;
		background: #FFFFFF;
		box-shadow: none;
		cursor: pointer;
		position: relative;
	}
	.plan-item-selected,
	.plan-item:hover{
		border: 3px solid blue !important;
	}
</style>
<header class="white-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="mt-4">
                    <a href="/elevate/cart/" class="back-btn "><img
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
    <section id="grey-innerbanner">
        <div class="container">
            <ul class="wizard">
                <li ui-sref="firstStep" class="completed">
                    <span>1. Eligibility check</span>
                </li>
                <li ui-sref="secondStep" class="completed">
                    <span>2. MyKAD verification</span>
                </li>
                <li ui-sref="thirdStep">
                    <span>3. Delivery details</span>
                </li>
                <li ui-sref="fourthStep">
                    <span>4. Review and order</span>
                </li>
            </ul>
        </div>
    </section>
    <section id="cart-body">
        <div class="container" style="border: 0">
            <div id="main-vue">
                <div class="border-box pad-mobile">
                    <div class="text-center p-lg-5">
                        <h2 class="subtitle mt-3">Sorry! We ran a check and you did not pass our ID verification</h2>
                        <p style="max-width: 750px; margin: auto">
                            It seems like you did not qualify, however we’ve picked out some other<br> plans that you might be interested in.
                        </p>
                    </div>
                    <div class="tabs_content">
                        <div class="plan_tabs">
                            <ul class="nav nav-pills nav-fill">
                                <li class="nav-item">
                                    <a class="nav-link active" onclick="changeTab(this,'postpaid')">Postpaid</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="changeTab(this,'prepaid')">Prepaid</a>
                                </li>
                            </ul>
                        </div>
                        <div id="tab-postpaid" class="item-plans mt-3 p-lg-5 tabcontent">
                             <div class="table-responsive">
                    <table class="table plan-table">
                        <thead>
                            <tr>
                                <th class="text-center visual"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/09/kasiup-postpaid-visual.png" class="img-fluid d-none"></th>
                                <th class="plan-item p-3" data-planid="915">
									<div >
                                    <h1>Yes Infinite Basic</h1>
                                    <h2>RM58/mth <span class="circle"><i class=""></i></span></h2>
                                    <a href="javascript:void(0)" class="btn pink-btn">Select<span class="d-none d-lg-inline-block">&nbsp;Plan</span></a>
									</div>
                                </th>
                                <th class="plan-item p-3" data-planid="916">
									<div >
                                    <h1>Yes Infinite Standard</h1>
                                    <h2>RM88/mth<span class="circle"><i class=""></i></span></h2>
                                    <a href="javascript:void(0)" class="btn pink-btn">Select<span class="d-none d-lg-inline-block">&nbsp;Plan</span></a>
									</div>
                                </th>
                                <th class="plan-item p-3" data-planid="917">
									<div >
                                    <h1>Yes Infinite Premium</h1>
                                    <h2>RM118/mth<span class="circle"><i class=""></i></span></h2>
                                    <a href="javascript:void(0)" class="btn pink-btn">Select<span class="d-none d-lg-inline-block">&nbsp;Plan</span></a>
									</div>
                                </th>

                                <th class="plan-item p-3" data-planid="918">
									<div >
                                    <h1>Yes Infinite Ultra</h1>
                                    <h2>RM178/mth<span class="circle"><i class=""></i></span></h2>
                                    <a href="javascript:void(0)" class="btn pink-btn">Select<span class="d-none d-lg-inline-block">&nbsp;Plan</span></a>
									</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="4" class="empty-row"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/09/spacer.gif" height="10px"></td>
                            </tr>
                            <tr>
                                <td class="blue-col rounded-top">Data
                                    <a href="javascript:void(0)" class="info-icon"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/09/icon-info-circle.png"></a>
                                </td>
                                <td class="rounded-top">Unlimited 5G + 4G<sup>*</sup></td>
                                <td class="rounded-top">Unlimited 5G + 4G<sup>*</sup></td>
                                <td class="rounded-top">Unlimited 5G + 4G<sup>*</sup></td>
                                <td class="rounded-top">Unlimited 5G + 4G<sup>*</sup></td>
                            </tr>
                            <tr>
                                <td class="blue-col">Speed
                                    <a href="javascript:void(0)" class="info-icon"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/09/icon-info-circle.png"></a>
                                </td>
                                <td>Infinite</td>
                                <td>Infinite</td>
                                <td>Infinite</td>
                                <td>Infinite</td>
                            </tr>
                            <tr>
                                <td class="blue-col">Calls
                                    <a href="javascript:void(0)" class="info-icon"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/09/icon-info-circle.png"></a>
                                </td>
                                <td>Infinite</td>
                                <td>Infinite</td>
                                <td>Infinite</td>
                                <td>Infinite</td>
                            </tr>
                            <tr>
                                <td class="blue-col">Validity
                                    <a href="javascript:void(0)" class="info-icon"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/09/icon-info-circle.png"></a>
                                </td>
                                <td>30 days</td>
                                <td>30 days</td>
                                <td>30 days</td>
                                <td>30 days</td>
                            </tr>
                            <tr>
                                <td class="blue-col rounded-bottom">Hotspot
                                    <a href="javascript:void(0)" class="info-icon"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/09/icon-info-circle.png"></a>
                                </td>
                                <td class="rounded-bottom">10GB</td>
                                <td class="rounded-bottom">40GB</td>
                                <td class="rounded-bottom">70GB</td>
                                <td class="rounded-bottom">100GB</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                        </div>
                        <div id="tab-prepaid" class="item-plans mt-3 p-lg-5 tabcontent" style="display: none">
							  <div  class="table-responsive">
                            <table class="table plan-table">
							
                            <thead>
                                <tr>
                                    <th class="text-center visual"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/10/kasiup-prepaid-visual.png" class="img-fluid d-none"></th>
                                    <th class="plan-item p-3" data-planid="710">
										<div >
                                        <h1>Yes Prepaid FT5G Unlimited <span class="circle"><i class=""></i></span></h1>
                                        <h2>RM30</h2>
                                        <a href="javascript:void(0)" class="pink-btn">Select<span class="d-none d-lg-inline-block">&nbsp;Plan</span></a>
										</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4" class="empty-row"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/09/spacer.gif" height="10px"></td>
                                </tr>
                                <tr>
                                    <td class="blue-col rounded-top">Data
                                        <a href="javascript:void(0)" class="info-icon"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/09/icon-info-circle.png"></a>
                                    </td>
                                    <td class="rounded-top">Unlimited 5G<sup>*</sup> + 4G<sup>**</sup></td>
                                </tr>
                                <tr>
                                    <td class="blue-col">Speed
                                        <a href="javascript:void(0)" class="info-icon"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/09/icon-info-circle.png"></a>
                                    </td>
                                    <td>Uncapped</td>
                                </tr>
                                <tr>
                                    <td class="blue-col">Calls
                                        <a href="javascript:void(0)" class="info-icon"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/09/icon-info-circle.png"></a>
                                    </td>
                                    <td>Unlimited</td>
                                </tr>
                                <tr>
                                    <td class="blue-col">Validity
                                        <a href="javascript:void(0)" class="info-icon"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/09/icon-info-circle.png"></a>
                                    </td>
                                    <td>30 days</td>
                                </tr>
                                <tr>
                                    <td class="blue-col rounded-bottom">Hotspot
                                        <a href="javascript:void(0)" class="info-icon"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/09/icon-info-circle.png"></a>
                                    </td>
                                    <td>9GB</td>
                                </tr>
                            </tbody>
                        </table> 
							 
							</div>
                        </div>
                        <div class="p-lg-5 text-end">
                            <a id="btnChoosePlan" @click="goNext" class="pink-btn-disable mr-2 text-uppercase">choose plan</a>
                            <a href="/infinite-phone-bundles/" id class="btn-cancel text-uppercase ">Cancel</a>

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
                selectedPlan:0,
                taxRate: {
                    sst: 0.06
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

                    } else {
                        elevate.redirectToPage('cart');
                    }
                },
                redirectYWOS:function (){
                    var self = this;
                    toggleOverlay();
                    ywos.buyPlan(self.selectedPlan);
                },
                goNext: function(){
                    var self = this;
                    self.selectedPlan = selectedPlan;
                    if(self.selectedPlan){
                        self.redirectYWOS()
                    }
                }
            }
        });
    });
</script>

<script type="text/javascript">
    var selectedPlan = 0;
    $(document).ready(function () {
        $(document).on('click', '.plan-item', function () {
            selectedPlan = $(this).data('planid');
            $('#btnChoosePlan').removeClass('pink-btn-disable');
            $('#btnChoosePlan').addClass('pink-btn');
            $('.plan-item-selected').removeClass('plan-item-selected');
            $(this).addClass('plan-item-selected');
        });

    });

    function changeTab(obj, tab) {
        $('.plan_tabs .active').removeClass('active');
        $(obj).addClass('active');
        $('.tabs_content .tabcontent').hide();
        $('#tab-' + tab).show();
    }
</script>