<?php include('header-no-menu.php'); ?>


<style type="text/css">
	.nav-container { background-color: #1A1E47; }
    .nav-container .navbar { padding-top: 8px; padding-bottom: 8px; }
    .nav-container .navbar-brand { padding-top: 0; padding-bottom: 0; }
    .nav-container a, .nav-container .login-btn {}
    .logo-top { width: 35px; }
</style>


<!-- Vue Wrapper STARTS -->
<div id="main-vue" style="display: none;">
	<!-- Banner Start -->
	<section id="grey-innerbanner">
		<div class="container">
			<ul class="wizard">
				<li ui-sref="firstStep" class="completed">
					<span>1. {{ renderText('strDelivery') }}</span>
				</li>
				<li ui-sref="secondStep">
					<span>2. {{ renderText('strReview') }}</span>
				</li>
			</ul>
		</div>
	</section>
	<!-- Banner End -->

	<!-- Body STARTS -->
	<section id="cart-body">
		<div class="container p-lg-5 p-3">
			<div class="row d-lg-none mb-3">
				<div class="col">
					<h1>{{ renderText('strDelivery') }}</h1>
					<p class="sub mb-0">{{ renderText('strDeliverySub') }}</p>
				</div>
			</div>
			<div class="row gx-5" v-if="pageValid">
				<div class="col-lg-5 col-12 order-lg-2">
					<?php include('section-order-summary.php'); ?>
					<div class="summary-box mt-3" v-if="referralCode.applicable">
						<div class="row">
							<div class="col">
								<div class="referral-box">
									<input type="text" class="form-control referral" id="input-referralCode" maxlength="11" v-model="referralCode.code" :placeholder="renderText('placeholderReferral')" @keypress="checkIsNumber(event)" />
									<img src="/wp-content/uploads/2022/02/referral-tick.png" class="referral-check" v-if="referralCode.verified" />
								</div>
								<div class="invalid-feedback mt-1" id="em-referralCode"></div>
								<div class="valid-feedback mt-1" id="sm-referralCode"></div>
								<button type="button" class="btn-sm pink-btn mt-2 w-100" v-on:click="verifyReferralCode">{{ renderText('strBtnReferral') }}</button>
							</div>
						</div>
					</div>
				</div>
				<form class="col-lg-7 col-12 order-lg-1 mt-4 mt-lg-0" @submit="deliveryDetailsSubmit">
					<div class="row gx-5">
						<div class="col-lg-8">
							<div class="layer-delivery">
								<div class="d-none d-lg-block">
									<h1>{{ renderText('strDelivery') }}</h1>
									<p class="sub mb-4">{{ renderText('strDeliverySub') }}</p>
								</div>
								<div class="form-group mb-4 mt-3">
									<label class="form-label" for="input-name">* {{ renderText('labelFullName') }}</label>
									<div class="input-group align-items-center">
										<input type="text" class="form-control" id="input-name" name="name" v-model="deliveryInfo.name" @input="watchAllowNext" placeholder="" required />
									</div>
									<div class="invalid-feedback mt-1" id="em-name"></div>
								</div>
								<div class="form-group mb-4 mt-3">
									<label class="form-label" for="input-name">* {{ renderText('labelMobileNumber') }}</label>
									<div class="row">
										<div class="col-lg-4 col-5">
											<div class="form-group">
												<input type="text" class="form-control text-center" value="MY +60" disabled="disabled" />
											</div>
										</div>
										<div class="col-lg-8 col-7">
											<div class="form-group">
												<input type="text" class="form-control" id="input-mobileNumber" maxlength="10" v-model="deliveryInfo.mobileNumber" @input="watchAllowNext" @keypress="checkInputCharacters(event, 'numeric', false)" placeholder="181234567" />
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group mb-4">
											<label class="form-label" for="select-securityType">* {{ renderText('labelSecurityType') }}</label>
											<div class="input-group align-items-center">
												<select class="form-select" id="select-securityType" v-model="deliveryInfo.securityType" @change="watchSecurityType">
													<option value="" disabled="disabled" selected="selected">Select ID Type</option>
													<option value="NRIC">{{ renderText('strIDNRIC') }} </option>
													<option value="PASSPORT">{{ renderText('strIDPassport') }}</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group mb-4">
											<label class="form-label" for="input-securityId">* {{ renderText('labelIDNumber') }}</label>
											<div class="input-group align-items-center">
												<input type="text" class="form-control" id="input-securityId" v-model="deliveryInfo.securityId" @input="watchSecurityIdInput" @keypress="checkInput(event)" maxlength="14" placeholder="" />
												<div class="invalid-feedback mt-1" id="em-securityID"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group mb-4">
											<label class="form-label" for="input-dob">* {{ renderText('labelDOB') }}</label>
											<div class="input-group date align-items-center">
												<input type="text" class="form-control input-datepicker" id="input-dob" name="dob" v-model="deliveryInfo.dob" @input="watchAllowNext" placeholder="" :disabled="!allowDOB" required />
											</div>
											<div class="invalid-feedback mt-1" id="em-dob"></div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group mb-4">
											<label class="form-label" for="select-gender">* {{ renderText('labelGender') }}</label>
											<div class="input-group align-items-center">
												<select class="form-select" id="select-gender" name="gender" data-live-search="true" v-model="deliveryInfo.gender" @change="watchAllowNext" :disabled="!allowGender" required>
													<option value="" selected="selected" disabled="disabled">{{ renderText('selectGender') }}</option>
													<option value="MALE">{{ renderText('selectGenderMale') }}</option>
													<option value="FEMALE">{{ renderText('selectGenderFemale') }}</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group mb-4" id="field-email">
									<label class="form-label" for="input-email">* {{ renderText('labelEmail') }}</label>
									<div class="input-group align-items-center">
										<input type="email" class="form-control" id="input-email" name="email" v-model="deliveryInfo.email" @input="watchAllowNext" placeholder="" required />
										<!-- <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="right" class="ms-2" title="Tooltip text here"><img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/info-icon.png" /></a> -->
										<p class="info">{{ renderText('infoEmail') }}</p>
									</div>
									<div class="invalid-feedback mt-1" id="em-email"></div>
								</div>
								<div class="form-group mb-4" id="field-emailConfirm">
									<label class="form-label" for="input-emailConfirm">* {{ renderText('labelEmailConfirm') }}</label>
									<div class="input-group align-items-center">
										<input type="email" class="form-control" id="input-emailConfirm" name="emailConfirm" v-model="deliveryInfo.emailConfirm" @input="watchAllowNext" placeholder="" required />
									</div>
									<div class="invalid-feedback mt-1" id="em-emailConfirm"></div>
								</div>
								<div class="form-group mb-4">
									<label class="form-label" for="input-address">* {{ renderText('labelAddress') }}</label>
									<!-- <a href="#" class="grey-link float-end">Can't find your address?</a> -->
									<div class="input-group align-items-center">
										<input type="text" class="form-control" id="input-address" name="address" v-model="deliveryInfo.address" @input="watchAllowNext" placeholder="" required />
									</div>
									<div class="invalid-feedback mt-1" id="em-address"></div>
								</div>
								<div class="form-group mb-4">
									<label class="form-label" for="input-addressMore">{{ renderText('labelAddressOptional') }}</label>
									<div class="input-group align-items-center">
										<input type="text" class="form-control" id="input-addressMore" name="addressMore" v-model="deliveryInfo.addressMore" placeholder="" />
									</div>
									<div class="invalid-feedback mt-1" id="em-addressMore"></div>
								</div>
								<div class="row">
									<div class="col-lg-4">
										<div class="form-group mb-4">
											<label class="form-label" for="input-postcode">* {{ renderText('labelPostcode') }}</label>
											<div class="input-group align-items-center">
												<input type="text" class="form-control" id="input-postcode" name="postcode" maxlength="5" v-model="deliveryInfo.postcode" @input="watchAllowNext" @keypress="checkIsNumber(event)" placeholder="" required />
											</div>
											<div class="invalid-feedback mt-1" id="em-postcode"></div>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group mb-4">
											<label class="form-label" for="select-state">* {{ renderText('labelState') }}</label>
											<div class="input-group align-items-center">
												<select class="form-select" id="select-state" name="state" data-live-search="true" v-model="deliveryInfo.state" @change="watchChangeState" required>
													<option value="" selected="selected" disabled="disabled">{{ renderText('selectState') }}</option>
													<option v-for="state in selectOptions.states" :value="state.value">{{ state.name }}</option>
												</select>
											</div>
											<div class="invalid-feedback mt-1" id="em-state"></div>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group mb-4">
											<label class="form-label">* {{ renderText('labelCity') }}</label>
											<div class="input-group align-items-center">
												<select class="form-select" id="select-city" name="city" data-live-search="true" v-model="deliveryInfo.city" @change="watchAllowNext" :disabled="!allowSelectCity" required>
													<option v-for="city in selectOptions.cities" :value="city.value">{{ city.name }}</option>
												</select>
											</div>
											<div class="invalid-feedback mt-1" id="em-city"></div>
										</div>
									</div>
								</div>
								<div class="form-group mb-4 d-none">
									<label class="form-label" for="textarea-deliveryNotes">Delivery Notes (optional)</label>
									<div class="input-group align-items-center">
										<textarea class="form-control" id="textarea-deliveryNotes" name="deliveryNotes" v-model="deliveryInfo.deliveryNotes" placeholder=""></textarea>
										<p class="info">Nearby landmarks or more detailed directions</p>
									</div>
									<div class="invalid-feedback mt-1" id="em-deliveryNotes"></div>
								</div>
								<div class="address-accuracy mb-4" v-if='(simType=="false")'>
									<img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/info-red-icon.png" alt="" class="float-start me-3">
									<div class="ps-5">
										<h1>{{ renderText('strAddressNoteTitle') }}</h1>
										<p>{{ renderText('strAddressNote') }}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<input type="submit" class="pink-btn" :value="renderText('strBtnSubmit')" :disabled="!allowSubmit" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
	<!-- Body ENDS -->

	<div class="modal fade" id="modal-referralAlert" tabindex="-1" aria-labelledby="modal-referralAlert" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header text-center">
					<h5 class="modal-title" id="exampleModalLabel">{{ renderText('modalRCTitle') }}</h5>
				</div>
				<div class="modal-body text-center">
					<p>{{ renderText('modalRCEmpty') }}</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" v-on:click="alertReferral">{{ renderText('modalRCNo') }}</button>
					<button type="button" class="btn btn-primary" v-on:click="alertReferral(false)">{{ renderText('modalRCContinue') }}</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal-referralEmptyAlert" tabindex="-1" aria-labelledby="modal-referralAlert" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header text-center">
					<h5 class="modal-title" id="exampleModalLabel">{{ renderText('modalRCTitle') }}</h5>
				</div>
				<div class="modal-body text-center">
					<p>{{ renderText('modalRCVerify') }}</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" v-on:click="alertReferral">OK</button>
					<button type="button" class="btn btn-primary" v-on:click="alertReferral(false)">{{ renderText('modalRCContinue') }}</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal-errorEligibilityCheck" tabindex="-1" aria-labelledby="modal-errorEligibilityCheck" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">{{ renderText('modalEligibilityTitle') }}</h5>
				</div>
				<div class="modal-body text-center">
					<p class="panel-errMsg"></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Vue Wrapper ENDS -->

<script type="text/javascript">
	$(document).ready(function() {
		toggleOverlay();

		var pageDelivery = new Vue({
			el: '#main-vue',
  			data: {
  				currentStep: 3,
  				simType: '',
  				eSimSupportPlan: '',
  				pageValid: false,
  				isBillingDifferent: false,
  				upFrontPayment: 'false',
  				orderSummary: {
  					plan: {},
  					due: {
  						addOns: 0.00,
  						taxesSST: 0.00,
  						shippingFees: 0.00,
  						rounding: 0.00,
  						foreignerDeposit: 0.00,
  						total: 0.00
  					},
  					addOn: null
  				},
  				selectOptions: {
  					states: [
						{ 'stateCode': 'JHR', 'value': 'JOHOR', 'name': 'Johor' },
  						{ 'stateCode': 'KDH', 'value': 'KEDAH', 'name': 'Kedah' },
  						{ 'stateCode': 'KTN', 'value': 'KELANTAN', 'name': 'Kelantan' },
  						{ 'stateCode': 'MLK', 'value': 'MELAKA', 'name': 'Melaka' },
  						{ 'stateCode': 'NSN', 'value': 'NEGERI SEMBILAN', 'name': 'Negeri Sembilan' },
  						{ 'stateCode': 'PHG', 'value': 'PAHANG', 'name': 'Pahang' },
  						{ 'stateCode': 'PNG', 'value': 'PULAU PINANG', 'name': 'Pulau Pinang' },
  						{ 'stateCode': 'PRK', 'value': 'PERAK', 'name': 'Perak' },
  						{ 'stateCode': 'PLS', 'value': 'PERLIS', 'name': 'Perlis' },
  						{ 'stateCode': 'SBH', 'value': 'SABAH', 'name': 'Sabah' },
  						{ 'stateCode': 'SRW', 'value': 'SARAWAK', 'name': 'Sarawak' },
  						{ 'stateCode': 'SGR', 'value': 'SELANGOR', 'name': 'Selangor' },
  						{ 'stateCode': 'TRG', 'value': 'TERENGGANU', 'name': 'Terengganu' },
  						{ 'stateCode': 'KUL', 'value': 'WILAYAH PERSEKUTUAN-KUALA LUMPUR', 'name': 'Wilayah Persekutuan Kuala Lumpur' },
  						{ 'stateCode': 'PJY', 'value': 'PUTRAJAYA', 'name': 'Wilayah Persekutuan Putrajaya' },
  						{ 'stateCode': 'LBN', 'value': 'LABUAN', 'name': 'Wilayah Persekutuan Labuan' }
  					],
  					cities: []
  				},
  				customerDetails: {
                    securityType: '',
                    securityId: '',
                    msisdn: ''
                },
  				deliveryInfo: {
  					name: '',
					mobileNumber: '',
					msisdn: '',
					securityType: '', 
					securityId: '',
  					dob: '',
  					gender: '',
  					email: '',
  					emailConfirm: '',
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
  				referralCode: {
  					applicable: false,
  					code: '',
  					alert: false,
  					toUse: false,
  					verified: false
  				},
  				input: {
  					name: {
  						field: '#input-name',
  						errorMessage: '#em-name'
  					},
  					email: {
  						field: '#input-email',
  						errorMessage: '#em-email'
  					},
  					emailConfirm: {
  						field: '#input-emailConfirm',
  						errorMessage: '#em-emailConfirm'
  					},
  					address: {
  						field: '#input-address',
  						errorMessage: '#em-address'
  					},
  					addressMore: {
  						field: '#input-addressMore',
  						errorMessage: '#em-addressMore'
  					},
  					postcode: {
  						field: '#input-postcode',
  						errorMessage: '#em-postcode'
  					},
  					state: {
  						field: '#select-state',
  						errorMessage: '#em-state'
  					},
  					city: {
  						field: '#select-city',
  						errorMessage: '#em-city'
  					},
  					deliveryNotes: {
  						field: '#textarea-deliveryNotes',
  						errorMessage: '#em-deliveryNotes'
  					},
  					referralCode: {
  						field: '#input-referralCode',
  						errorMessage: '#em-referralCode',
  						successMessage: '#sm-referralCode'
  					}
  				},
  				billingInfo: {
  					name: '',
  					email: '',
  					emailConfirm: '',
  					address: '',
  					addressMore: '',
  					postcode: '',
  					state: '',
  					city: '',
  				},
  				allowSelectCity: false,
  				allowSubmit: false,
  				allowDOB: false,
  				allowGender: false,
  				apiLocale: 'EN',
  				pageText: {
					strVerification: { 'en-US': 'Verification', 'ms-MY': 'Pengesahan', 'zh-hans': 'Verification' },
					strSelectSimType: { 'en-US': 'Select Sim Type', 'ms-MY': 'Pengesahan', 'zh-hans': 'Select Sim Type' },
					strDelivery: { 'en-US': 'Delivery Details', 'ms-MY': 'Butiran Penghantaran', 'zh-hans': 'Delivery Details' },
					strDeliveryeSim: { 'en-US': 'Billing  Details', 'ms-MY': 'Billing  Details', 'zh-hans': 'Billing  Details' },
					strReview: { 'en-US': 'Review', 'ms-MY': 'Semak', 'zh-hans': 'Review' },
					strPayment: { 'en-US': 'Payment Info', 'ms-MY': 'Maklumat Pembayaran', 'zh-hans': 'Payment Info' },
					strDeliverySub: { 'en-US': 'Delivery only available in Malaysia', 'ms-MY': 'Penghantaran hanya untuk di Malaysia', 'zh-hans': 'Delivery only available in Malaysia' },
					labelFullName: { 'en-US': 'Full Name (as per IC/Passport)', 'ms-MY': 'Nama Penuh (seperti di KP/Pasport)', 'zh-hans': 'Full Name (as per IC/Passport)' },
					labelMobileNumber: { 'en-US': 'Mobile Number', 'ms-MY': 'Nombor Telefon Bimbit', 'zh-hans': 'Mobile Number' },
                    labelSecurityType: { 'en-US': 'ID Type', 'ms-MY': 'Jenis ID', 'zh-hans': 'ID Type' },
                    strIDTypeSelect: { 'en-US': 'Select ID Type', 'ms-MY': 'Pilih jenis ID', 'zh-hans': 'Select ID Type' },
                    strIDNRIC: { 'en-US': 'MyKad ', 'ms-MY': 'Kad Pengenalan', 'zh-hans': 'MyKad ' },
                    strIDPassport: { 'en-US': 'Passport', 'ms-MY': 'Pasport', 'zh-hans': 'Passport' },
                    labelIDNumber: { 'en-US': 'ID/Passport Number', 'ms-MY': 'Nombor KP/Pasport', 'zh-hans': 'ID/Passport Number' },
					labelDOB: { 'en-US': 'Date of Birth', 'ms-MY': 'Tarikh Lahir', 'zh-hans': 'Date of Birth' },
					labelGender: { 'en-US': 'Gender', 'ms-MY': 'Jantina', 'zh-hans': 'Gender' },
					selectGender: { 'en-US': 'Select Gender', 'ms-MY': 'Pilih Jantina', 'zh-hans': 'Select Gender' },
					selectGenderMale: { 'en-US': 'Male', 'ms-MY': 'Lelaki', 'zh-hans': 'Male' },
					selectGenderFemale: { 'en-US': 'Female', 'ms-MY': 'Perempuan', 'zh-hans': 'Female' },
					labelEmail: { 'en-US': 'Email address', 'ms-MY': 'Alamat emel', 'zh-hans': 'Email address' },
					infoEmail: { 'en-US': 'Email is required for receipt and order confirmation', 'ms-MY': 'Emel diperlukan untuk resit dan pengesahan pesanan', 'zh-hans': 'Email is required for receipt and order confirmation' },
					labelEmailConfirm: { 'en-US': 'Confirm email address', 'ms-MY': 'Sahkan alamat emel', 'zh-hans': 'Confirm email address' },
					errorEmailConfirm: { 'en-US': 'Confirm email address must be same as Email address.', 'ms-MY': 'Pengesahan alamat emel harus sama dengan alamat emel.', 'zh-hans': 'Confirm email address must be same as Email address.' },
					labelAddress: { 'en-US': 'Address', 'ms-MY': 'Alamat', 'zh-hans': 'Address' },
					labelAddressOptional: { 'en-US': 'Apartment, Office, House, Floor number (optional)', 'ms-MY': 'Pangsapuri, Pejabat, Rumah, Nombor tingkat (tidak wajib)', 'zh-hans': 'Apartment, Office, House, Floor number (optional)' },
					labelPostcode: { 'en-US': 'Postcode', 'ms-MY': 'Poskod', 'zh-hans': 'Postcode' },
					labelState: { 'en-US': 'State', 'ms-MY': 'Negeri', 'zh-hans': 'State' },
					selectState: { 'en-US': 'Select State', 'ms-MY': 'Pilih Negeri', 'zh-hans': 'Select State' },
					labelCity: { 'en-US': 'City', 'ms-MY': 'Bandar', 'zh-hans': 'City' },
					strAddressNoteTitle: { 'en-US': 'Address Accuracy', 'ms-MY': 'Ketepatan Alamat', 'zh-hans': 'Address Accuracy' },
					strAddressNote: { 'en-US': 'Address that are entered incorrectly may delay your order, so please double-check for errors.', 'ms-MY': 'Alamat yang dimasukkan dengan tidak tepat mungkin melengahkan penghantaran anda, jadi sila semak untuk mengelakkan kesilapan.', 'zh-hans': 'Address that are entered incorrectly may delay your order, so please double-check for errors.' },
					strBtnSubmit: { 'en-US': 'Next', 'ms-MY': 'Seterusnya', 'zh-hans': 'Next' },
					placeholderReferral: { 'en-US': 'Enter referral code (if any)', 'ms-MY': 'Masukkan kod rujukan (jika ada)', 'zh-hans': 'Enter referral code (if any)' },
					errorReferralCode: { 'en-US': 'Please fill in the referral code.', 'ms-MY': 'Sila masukkan kod rujukan.', 'zh-hans': 'Please fill in the referral code.' },
					strBtnReferral: { 'en-US': 'Verify Referral Code', 'ms-MY': 'Sahkan Kod Rujukan', 'zh-hans': 'Verify Referral Code' },
					modalRCTitle: { 'en-US': 'Referral Code', 'ms-MY': 'Kod Rujukan', 'zh-hans': 'Referral Code' },
					modalRCEmpty: { 'en-US': 'Would you like to continue without a referral code?', 'ms-MY': 'Teruskan tanpa kod rujukan?', 'zh-hans': 'Would you like to continue without a referral code?' },
					modalRCNo: { 'en-US': 'No', 'ms-MY': 'Tidak', 'zh-hans': 'No' },
					modalRCContinue: { 'en-US': 'Proceed without referral code', 'ms-MY': 'Teruskan tanpa kod rujukan', 'zh-hans': 'Proceed without referral code' },
					modalRCVerify: { 'en-US': 'Please verify the referral code', 'ms-MY': 'Sila sahkan kod rujukan', 'zh-hans': 'Please verify the referral code' },
					modalEligibilityTitle: { 'en-US': 'Eligibility Check', 'ms-MY': 'Pengesahan Kelayakan', 'zh-hans': 'Eligibility Check' },
					strDeliveryBilling: { 'en-US': 'Billing Details', 'ms-MY': 'Billing Details', 'zh-hans': 'Billing Details' },
				}
  			},
			mounted: function() {},
			created: function() {
				var self = this;
				setTimeout(function() {
					self.getPlanData();
				}, 500);
			},
			methods: {
				getPlanData: function() {
					var self = this;

					if (ywos.validateSessionRoving(self.currentStep, true)) {
						if (ywos.lsData.meta.completedStep == 3) {
							self.deliveryInfo = ywos.lsData.meta.deliveryInfo;
							self.orderSummary = ywos.lsData.meta.orderSummary;
							self.watchChangeState();
							self.pageInit();
						} else {
							self.planID = ywos.lsData.meta.planID;
							self.ajaxGetPlanData();
						}
					} else {
						history.back();
					}
				},
				ajaxGetPlanData: function() {
					var self = this;
					axios.get(apiEndpointURL + '/get-plan-by-id/' + self.planID + '/?nonce=' + yesObj.nonce)
						.then((response) => {
							var data = response.data;

							if (data.internetData == '∞') {
								data.internetData = 'Unlimited';
							}

							self.orderSummary.plan = data;

							var planPriceBreakdown = [];
							var planDevicePriceBreakdown = [];
							var planSimplifiedBreakdown = [];
							for (var key in data) {
								var keyPricingComponentList = 'pricingComponentList';
								if (key == keyPricingComponentList) {
									var pricingComponentList = data[keyPricingComponentList];
									pricingComponentList.map(function(pricingComponent) {
										var componentName = pricingComponent.pricingComponentName;
										var componentValue = formatPrice(pricingComponent.pricingComponentValue);
										var objArr = {
											name: componentName,
											value: componentValue
										};
										if (['Postpaid Device Price', 'Postpaid Device Upfront Payment'].includes(componentName)) {
											planDevicePriceBreakdown.push(objArr);
										} else if (['Postpaid Foreigner Deposit'].includes(componentName)) {
											self.orderSummary.plan.foreignerDeposit = componentValue;
										} else {
											planPriceBreakdown.push(objArr);
										}
									});
								}
								var keySimplifiedItemPricingList = 'simplifiedItemPricingList';
								if (key == keySimplifiedItemPricingList) {
									planSimplifiedBreakdown = data[keySimplifiedItemPricingList];
								}
							};
							self.orderSummary.due.priceBreakdown = {
								plan: planPriceBreakdown,
								device: planDevicePriceBreakdown,
								simplified: planSimplifiedBreakdown
							};
							// console.log(self.orderSummary.due);

							var hasDevice = false;
							for (var i = 0; i < planDevicePriceBreakdown.length; i++) {
								if (parseFloat(planDevicePriceBreakdown[i].value) > 0) {
									hasDevice = true;
									break;
								}
							}
							self.orderSummary.plan.hasDevice = hasDevice;

							self.updatePlan(true);
						})
						.catch((error) => {
							// console.log('error', error);
						})
				},
				updatePlan: function(closeOverlay = true) {
					var self = this;

					self.hasFetchPlan = true;

					self.updateSummary();

					// self.sendAnalytics('addToCart');

					if (closeOverlay) {
						setTimeout(function() {
							toggleOverlay(false);
						}, 500);
					}

					if (self.orderSummary.plan.notes) {
						var arrNotes = self.orderSummary.plan.notes.split(',');
						self.packageInfos = arrNotes.sort(function(a, b) {
							return a.length - b.length;
						});
					}

					self.updateData();
				},
				updateSummary: function() {
					var self = this;
					var total = 0;

					self.orderSummary.due.addOns = (self.orderSummary.addOn != null) ? roundAmount(self.orderSummary.addOn.amount) : 0;
					self.orderSummary.due.planAmount = parseFloat(self.orderSummary.plan.totalAmount).toFixed(2);
					self.orderSummary.due.amount = (parseFloat(self.orderSummary.plan.totalAmountWithoutSST.replace(/,/g, '')) + ((self.orderSummary.addOn != null) ? parseFloat(self.orderSummary.addOn.amount) : 0)).toFixed(2);
					self.orderSummary.due.taxesSST = (parseFloat(self.orderSummary.plan.totalSST) + ((self.orderSummary.addOn != null) ? parseFloat(self.orderSummary.addOn.taxSST) : 0)).toFixed(2);
					self.orderSummary.due.total = roundAmount(parseFloat(self.orderSummary.due.amount) + parseFloat(self.orderSummary.due.taxesSST) + parseFloat(self.orderSummary.due.shippingFees)) + parseFloat(self.orderSummary.due.foreignerDeposit);
					self.orderSummary.due.rounding = parseFloat(self.orderSummary.plan.roundingAdjustment).toFixed(2);
					self.orderSummary.due.total = (parseFloat(self.orderSummary.due.total) + parseFloat(self.orderSummary.due.rounding)).toFixed(2);
				},
				updateData: function() {
					var self = this;

					self.deliveryInfo.country = 'MALAYSIA';

					ywos.lsData.meta.completedStep = self.currentStep;
					// ywos.lsData.meta.isLoggedIn = true;
					ywos.lsData.meta.orderSummary = self.orderSummary;
					ywos.lsData.meta.customerDetails = self.customerDetails;
					ywos.updateYWOSLSData();

					self.pageInit();
				},
				pageInit: function() {
					var self = this;

					self.pageValid = true;

					setTimeout(function() {
						$('.form-select').selectpicker('refresh');
						$('.input-datepicker').datepicker({
							format: 'dd/mm/yyyy',
							autoclose: true,
							startDate: '01/01/1910',
							endDate: '0'
						}).on(
							"changeDate",
							function() {
								self.deliveryInfo.dob = $('#input-dob').val();
								self.watchAllowNext();
							}
						);
					}, 100);
				},
				checkForeignerDeposit: function() {
					var self = this;
					if (self.orderSummary.plan.planType == 'postpaid') {
                        var foreignerDeposit = parseFloat(self.orderSummary.plan.foreignerDeposit);
                        if (self.deliveryInfo.securityType == 'PASSPORT' && ywos.lsData.meta.orderSummary.due.foreignerDeposit == 0.00) {
							self.orderSummary.due.foreignerDeposit = foreignerDeposit;
                            self.orderSummary.due.total = parseFloat(self.orderSummary.due.total) + parseFloat(foreignerDeposit);
                        } else if (self.deliveryInfo.securityType == 'NRIC' && ywos.lsData.meta.orderSummary.due.foreignerDeposit != 0.00) {
                            self.orderSummary.due.foreignerDeposit = 0.00;
                            self.orderSummary.due.total = parseFloat(self.orderSummary.due.total) - parseFloat(foreignerDeposit);
                        }
					}
				},
				watchSecurityType: function() {
					var self = this;
					self.checkForeignerDeposit();
                    self.watchAllowNext();

					self.deliveryInfo.securityId = '';
					$('#input-securityId').focus();

					self.deliveryInfo.dob = '';
					self.deliveryInfo.gender = '';
					
					if (self.deliveryInfo.securityType == 'PASSPORT') {
						self.allowDOB = true;
						self.allowGender = true;
					} else {
						self.allowDOB = false;
						self.allowGender = false;

						self.checkNRICDOB();
                    	self.checkNRICGender();
					}
					
					setTimeout(function() {
						$('#select-gender').selectpicker('refresh');
					}, 100);

					self.watchAllowNext();
				},
				watchSecurityIdInput: function() {
					var self = this;
					self.checkNRICDOB();
					self.checkNRICGender();
					self.watchAllowNext();
				},
                checkInput: function (event) {
                    var self = this;
                    var type = 'alphanumeric';
                    if (self.deliveryInfo.securityType == 'NRIC') {
                        type = 'numeric';
                        if (self.deliveryInfo.securityId.length > 11) {
                            event.preventDefault();
                        } else {
                            checkInputCharacters(event, type, false);
                        }
                    } else if (self.deliveryInfo.securityType == 'PASSPORT') {
                        checkInputCharacters(event, type, false);
                    } else {
                        return true;
                    }
                }, 
				checkNRICDOB: function() {
					var self = this;
					if (self.deliveryInfo.securityType == 'NRIC' && self.deliveryInfo.securityId.length >= 12) {
						var nricNo = self.deliveryInfo.securityId;
						var nricYear = nricNo.substring(0, 2);
						var nricMonth = nricNo.substring(2, 4);
						var nricDay = nricNo.substring(4, 6);

						var dateYear = (nricYear > 20) ? '19' + nricYear : '20' + nricYear;
						var dob = nricDay + '/' + nricMonth + '/' + dateYear;
						self.deliveryInfo.dob = dob;
						self.allowDOB = false;
					}
				},
				checkNRICGender: function() {
					var self = this;
					if (self.deliveryInfo.securityType == 'NRIC' && self.deliveryInfo.securityId.length >= 12) {
						var nricNo = self.deliveryInfo.securityId;
						var lastFour = nricNo.slice(-4);
						self.deliveryInfo.gender = (lastFour % 2 == 0) ? 'FEMALE' : 'MALE';
						self.allowGender = false;

						setTimeout(function() {
							$('#select-gender').selectpicker('refresh');
						}, 100);
					}
				},
				getStateCode: function(stateVal) {
					var self = this;
					var objState = self.selectOptions.states.filter(state => state.value == stateVal);
					return objState[0].stateCode;
				},
				ajaxGetCitiesByState: function(state = null) {
					var self = this;
					var stateCode = self.getStateCode(state);

					toggleOverlay();

					self.allowSelectCity = false;
					setTimeout(function() {
						$('.form-select').selectpicker('refresh');
					}, 100);

					axios.get(apiEndpointURL + '/get-cities-by-state/' + stateCode + '?nonce=' + yesObj.nonce)
						.then((response) => {
							var options = [];
							var data = response.data;
							var masterlist = data.masterDataList[0].masterList;
							masterlist.map((value, index) => {
								options.push({
									value: value.masterCode,
									name: value.masterValue,

								});
							})
							self.selectOptions.cities = options;
							self.allowSelectCity = true;

							var objCity = self.selectOptions.cities.filter(city => city.value == self.deliveryInfo.city);
							if (objCity.length == 0) {
								self.deliveryInfo.city = '';
								self.deliveryInfo.cityCode = '';
							}

							setTimeout(function() {
								$('.form-select').selectpicker('refresh');
								toggleOverlay(false);
							}, 500);
						})
						.catch((error) => {
							// console.log(error);
						})
						.finally(() => {
							self.watchAllowNext();
							toggleOverlay(false);
						});
				},
				validateEmail: function() {
					var self = this;
					var email = self.deliveryInfo.email.toLowerCase();
					var regexp = /^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\.)?[a-zA-Z]+\.)+(com|asia|au|biz|cn|co|de|edu|giv|hk|id|in|jp|my|net|nz|org|sg|tw|uk)$/;
					if (!regexp.test(email)) {
						var inputEmail = self.input.email.field;
						var emEmail = self.input.email.errorMessage;
						$(emEmail).html('Please fill up valid email address').show();
						$(inputEmail).focus();
						$(inputEmail).on('keydown', function() {
							$(emEmail).hide().html('');
						});
						return false;
					}
					return true;
				},
				validateConfirmEmail: function() {
					var self = this;
					var email = self.deliveryInfo.email.toLowerCase();
					var emailConfirm = self.deliveryInfo.emailConfirm.toLowerCase();
					if (email != emailConfirm) {
						var inputEmailConfirm = self.input.emailConfirm.field;
						var emEmailConfirm = self.input.emailConfirm.errorMessage;
						$(emEmailConfirm).html(self.renderText('errorEmailConfirm')).show();
						$(inputEmailConfirm).focus();
						$(inputEmailConfirm).on('keydown', function() {
							$(emEmailConfirm).hide().html('');
						});

						return false;
					}
					return true;
				},
				checkReferralCode: function() {
					var self = this;
					if (!self.referralCode.alert) {
						$('#modal-referralAlert').modal('show');
						return false;
					} else if (self.referralCode.toUse && self.referralCode.code.trim() == '') {
						$('#modal-referralEmptyAlert').modal('show');
						return false;
					} else if (self.referralCode.toUse && !self.referralCode.verified) {
						$('#modal-referralEmptyAlert').modal('show');
						return false;
					}
					return true;
				},
				validateReferralCodeField: function(errorMsg = '') {
					var self = this;
					var inputReferralCode = self.input.referralCode.field;
					var emReferralCode = self.input.referralCode.errorMessage;
					var smReferralCode = self.input.referralCode.successMessage;
					$(smReferralCode).html('').hide();
					$(emReferralCode).html(errorMsg).show();
					$(inputReferralCode).focus();
					$(inputReferralCode).on('keydown', function() {
						$(emReferralCode).hide().html('');
					});
				},
				ajaxVerifyReferralCode: function() {
					var self = this;
					$(self.input.referralCode.errorMessage).hide().html('');

					var params = {
						'referral_code': self.referralCode.code,
						'security_type': self.deliveryInfo.securityType,
						'security_id': self.deliveryInfo.securityId,
						'locale': self.apiLocale
					};
					axios.post(apiEndpointURL + '/verify-referral-code' + '?nonce=' + yesObj.nonce, params)
						.then((response) => {
							self.referralCode.verified = true;
							ywos.lsData.meta.referralCode = params;

							var data = response.data;
							var successMsg = data.displayResponseMessage;
							var smReferralCode = self.input.referralCode.successMessage;
							$(smReferralCode).html(successMsg).show();
						})
						.catch((error) => {
							var response = error.response;
							var data = response.data;
							var errorMsg = '';
							if (error.response.status == 500 || error.response.status == 503) {
								errorMsg = "<p>Eligibility Check. There's an error in validating customer eligibilities.</p>";
							} else {
								errorMsg = data.message
							}

							self.validateReferralCodeField(errorMsg);
						})
						.finally(() => {
							toggleOverlay(false);
						});
				},
				checkPreDefReferralCode: function() {
					var self = this;
					if (self.orderSummary.plan.referralApplicable && ywos.lsData.meta.refCode != null) {
						self.referralCode.code = ywos.lsData.meta.refCode;
						self.verifyReferralCode();
					} else {
						toggleOverlay(false);
					}
				},
				verifyReferralCode: function() {
					var self = this;
					self.referralCode.alert = true;
					self.referralCode.toUse = true;

					toggleOverlay();
					if (self.deliveryInfo.securityType == '' || self.deliveryInfo.securityId == '') {
						self.validateReferralCodeField('Please verify your identity in verification page.');
						toggleOverlay(false);
					} else if (self.referralCode.code.trim() == '') {
						self.validateReferralCodeField(self.renderText('errorReferralCode'));
						toggleOverlay(false);
					} else {
						self.ajaxVerifyReferralCode();
					}
				},
				alertReferral: function(useReferral = true) {
					var self = this;
					$('#modal-referralAlert, #modal-referralEmptyAlert').modal('hide');

					if (useReferral) {
						$(self.input.referralCode.field).focus();
						self.referralCode.toUse = true;
					} else {
						self.referralCode.toUse = false;
						self.ajaxValidateCustomerEligibility();
					}
					self.referralCode.alert = true;
				},
				sanitizeDeliveryInfo: function() {
					var self = this;
					self.deliveryInfo.sanitize = {
						address: self.deliveryInfo.address.toCamelCase(),
						addressMore: self.deliveryInfo.addressMore.toCamelCase(),
						addressLine: (self.deliveryInfo.addressMore) ? self.deliveryInfo.address + '<br />' + self.deliveryInfo.addressMore : self.deliveryInfo.address,
						state: self.deliveryInfo.state.replace('-', ' ').toCamelCase(),
						city: self.deliveryInfo.city.toCamelCase(),
						country: self.deliveryInfo.country.toCamelCase()
					};
				},
				redirectVerified: function() {
					var self = this;

					self.sanitizeDeliveryInfo();

					self.deliveryInfo.referralCode = self.referralCode.code;
					self.deliveryInfo.cityCode = self.deliveryInfo.city;
					self.deliveryInfo.stateCode = self.getStateCode(self.deliveryInfo.state);

					ywos.lsData.meta.completedStep = self.currentStep;

					ywos.lsData.meta.deliveryInfo = self.deliveryInfo;
					ywos.updateYWOSLSData();

					ywos.redirectToPage('roving-review');
				},
				ajaxValidateCustomerEligibility: function() {
					toggleOverlay();

					var self = this;
					var params = {
						'phone_number': self.deliveryInfo.msisdn,
						'customer_name': self.deliveryInfo.name,
						'dob': self.deliveryInfo.dob,
						'phone_number': '0' + self.deliveryInfo.mobileNumber, 
						'email': self.deliveryInfo.email,
						'security_type': self.deliveryInfo.securityType,
						'security_id': self.deliveryInfo.securityId,
						'address_line': self.deliveryInfo.address + ' ' + self.deliveryInfo.addressMore,
						'state': self.deliveryInfo.state,
						'state_code': self.getStateCode(self.deliveryInfo.state),
						'city': self.deliveryInfo.city,
						'city_code': self.deliveryInfo.city,
						'postal_code': self.deliveryInfo.postcode,
						'country': self.deliveryInfo.country,
						'plan_bundle_id': self.orderSummary.plan.mobilePlanId,
						'plan_type': self.orderSummary.plan.planType,
						'plan_name': self.orderSummary.plan.planName,
						'locale': self.apiLocale
					};
					axios.post(apiEndpointURL + '/validate-customer-eligibilities' + '?nonce=' + yesObj.nonce, params)
						.then((response) => {
							self.redirectVerified()
						})
						.catch((error) => {
							toggleOverlay(false);

							var response = error.response;
							var data = response.data;
							var errorMsg = '';
							if (error.response.status == 500 || error.response.status == 503) {
								errorMsg = "<p>There's an error in validating your eligibility.<br /> Please verify your identity and phone number in verification page.</p>";
							} else {
								errorMsg = data.message
							}
							$('#modal-errorEligibilityCheck .panel-errMsg').html(errorMsg);
							$('#modal-errorEligibilityCheck').modal('show');
						})
						.finally(() => {});
				},
				checkCustomerEligibility: function() {
					var self = this;
					self.ajaxValidateCustomerEligibility();
				},
				deliveryDetailsSubmit: function(e) {
					var self = this;
					var validSubmit = true;

					if (!self.validateEmail()) {
						jumpToSection('field-email');
						validSubmit = false;
					} else if (!self.validateConfirmEmail()) {
						jumpToSection('field-emailConfirm');
						validSubmit = false;
					}
					if (validSubmit) {
						if (self.referralCode.applicable) {
							if (self.checkReferralCode()) {
								self.checkCustomerEligibility();
							}
						} else {
							self.checkCustomerEligibility();
						}
					}
					e.preventDefault();
				},
				watchChangeState: function() {
					var self = this;
					if (typeof self.deliveryInfo.state !== 'undefined' && self.deliveryInfo.state.length) {
						self.ajaxGetCitiesByState(self.deliveryInfo.state);
					}
				},
				watchAllowNext: function() {
					var self = this;
					var isFilled = true;
					
					if (
						self.deliveryInfo.name.trim() == '' ||
						self.deliveryInfo.mobileNumber.trim() == '' ||
						self.deliveryInfo.securityType.trim() == '' ||
						self.deliveryInfo.securityId.trim() == '' ||
						(self.deliveryInfo.securityType == 'NRIC' && self.deliveryInfo.securityId.length < 12) ||
						self.deliveryInfo.dob.trim() == '' ||
						self.deliveryInfo.gender.trim() == '' ||
						self.deliveryInfo.email.trim() == '' ||
						self.deliveryInfo.emailConfirm.trim() == '' ||
						self.deliveryInfo.address.trim() == '' ||
						self.deliveryInfo.postcode.trim() == '' ||
						self.deliveryInfo.state.trim() == '' ||
						(typeof self.deliveryInfo.city == 'undefined' || self.deliveryInfo.city.trim() == '')
					) {
						isFilled = false;
					}

					if (isFilled) {
						self.allowSubmit = true;
					} else {
						self.allowSubmit = false;
					}
				},
				checkIsNumber: function(event) {
					event = (event) ? event : window.event;
					var charCode = (event.which) ? event.which : event.keyCode;
					if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
						event.preventDefault();
					} else {
						return true;
					}
				},
				watchBillingDifferent: function() {},
				renderText: function(strID) {
					return ywos.renderText(strID, this.pageText);
				}
			}
		});
	});
</script>


<?php include('footer-ywos.php'); ?>