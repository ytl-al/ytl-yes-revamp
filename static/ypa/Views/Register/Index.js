"use strict";

(function () {
	$(function () {


	});
})();

var setSelected = function () {
	return {
		init: function (eng, bm, lang) {
			if (lang == 'ms') {
				$('.plan').html(bm);
			}
			else {
				$('.plan').html(eng);
			}
		}
	};
}();

var Wizard = function () {
	// Base elements
	var form;

	// Private functions
	var _initWizard = function () {

		jQuery.validator.addMethod("accept", function (value, element, param) {
			return value.match(new RegExp("^" + param + "$"));
		}, 'please enter a valid email')

		$("#registerCustomerInformationForm").validate({
			rules: {
				MobileNumber: {
					required: true,
					number: true,
					minlength: function () {
						return 10;
					},
					maxlength: function () {
						return 11;
					},
					accept: "^[0][1][0-9].{7,}$"
				},
				Postcode: {
					required: true,
					number: true,
					minlength: function () {
						return 5;
					},
					maxlength: function () {
						return 6;
					}
				},
				EmailAddress: {
					required: true,
					email: true,
					accept: "^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\.)?[a-zA-Z]+\.)+(com|asia|au|biz|cn|co|de|edu|giv|hk|id|in|jp|my|net|nz|org|sg|tw|uk)$"
				}
			},
			messages: {
				FullName: abp.localization.localize('FullnameRequired', 'My5G'),
				AddressLine1: abp.localization.localize('AddressRequired', 'My5G'),
				Postcode: abp.localization.localize('PostcodeRequired', 'My5G'),
				City: abp.localization.localize('CityRequired', 'My5G'),
				State: abp.localization.localize('StateRequired', 'My5G'),
				Country: abp.localization.localize('CountryRequired', 'My5G'),
				MobileNumber: abp.localization.localize('MobileRequired', 'My5G'),
				EmailAddress: abp.localization.localize('EmailRequired', 'My5G'),
				hasAgreedTerms: abp.localization.localize('AcceptTerms', 'My5G'),
				hasAgreedDataCollection: abp.localization.localize('AcceptTerms', 'My5G')
			},
			errorPlacement: function (error, element) {
				if (element.attr("name") == "hasAgreedTerms") {
					error.appendTo("#errorToShow");
				} else if (element.attr("name") == "hasAgreedDataCollection") {
					error.appendTo("#error2ToShow");
				} else {
					error.insertAfter(element);
				}
			}
		});

		$("#form-total").steps({
			headerTag: "h2",
			bodyTag: "section",
			transitionEffect: "slideLeft",
			enableAllSteps: false,
			titleTemplate: '<div class="title">#title#</div>',
			labels: {
				previous: abp.localization.localize('Previous', 'My5G'),
				next: abp.localization.localize('Next', 'My5G'),
				finish: abp.localization.localize('Submit', 'My5G'),
				current: ''
			},

			onStepChanging: function (event, currentIndex, newIndex) {
				if (currentIndex > newIndex) {
					return true; // Skip if stepped back
				}



				if (newIndex === 1) {
				}
				if (newIndex === 2) {
					$('.step3Data').html($('#addressLine1').val() + ', ' + $('#postcode').val());
					$('.nric').html($('#nricNumber').val());
					$('.fullname').html($('#fullName').val());
					$('.houseno').html($('#addressLine1').val());
					$('.addressLine2').html($('#addressLine2').val());
					$('.postcode').html($('#postcode').val());
					$('.city').html($('#city').val());
					$('.state').html($('#state').val());
					$('.country').html($('#country').val());
					$('.mobileno').html($('#mobileNumber').val());
					$('.emailadd').html($('#emailAddress').val());
				}

				form.validate().settings.ignore = ":disabled,:hidden";
				return form.valid();

			},
			onFinishing: function (event, currentIndex) {
				form.validate().settings.ignore = ":disabled";
				return form.valid();
			},
			onFinished: function (event, currentIndex) {
				var _service = abp.services.app.registration;
				var _$form = $('#registerCustomerInformationForm');
				var objData = _$form.serializeFormToObject(); //serializeFormToObject is defined in main.js

				if (objData.ReferCode != '') //if refer code not empty then validate length
				{
					if (objData.ReferCode.length < 10) {
						$('#invalidCode').show();
						return;
					}
					else {
						$('#invalidCode').hide();
					}
				}

				abp.ui.setBusy(_$form);
				_service.register(objData).done(function (returnVal) {

					if (objData.NRIC.length < 12) {
						$('.securityTypeYOS').val('PASSPORT');
                    }

					$('.securityIdYOS').val(objData.NRIC);
					$('.alternatePhoneNumberYOS').val(objData.MobileNumber);
					$('.customerFullNameYOS').val(objData.FullName.toUpperCase());
					$('.emailYOS').val(objData.EmailAddress);

					$('.planNameYOS').val(objData.PlanName);
					$('.productBundleIdYOS').val(objData.ProductBundleID);
					$('.planTypeYOS').val(objData.PlanType);

					$('.stateYOS').val(objData.State.toUpperCase());
					$('.stateCodeYOS').val(getStateCode(objData.State).toUpperCase());
					$('.cityYOS').val(objData.City.toUpperCase());
					$('.postalCodeYOS').val(objData.Postcode);

					$('.genderYOS').val(objData.Gender);
					if (objData.Gender == 'MALE') {
						$('.salutationYOS').val('MR');
					}
					else {
						$('.salutationYOS').val('MRS');
					}

					$('.dobYOS').val(formatDate(objData.DOB));

					if (objData.DeliveryAddressLine2 == '') {
						$('.addressLineYOS').val(objData.AddressLine1.toUpperCase());
					}
					else {
						$('.addressLineYOS').val(objData.AddressLine1.toUpperCase() + ',' + objData.AddressLine2.toUpperCase());
					}

					$('.referralCodeYOS').val(objData.ReferCode);
					$('.regisrationGUIDYOS').val(returnVal.id);

					$('.dealerCodeYOS').val(objData.DealerCode);
					$('.dealerLoginIdYOS').val(objData.DealerUID);

					document.querySelector("form[name='deviceForm']").submit();
					return;

				}).always(function () {
					abp.ui.clearBusy(_$form);
				});

				
			}


		});
	}

	return {
		// public functions
		init: function () {
			//_wizardEl = KTUtil.getById('kt_projects_add');
			form = $("#registerCustomerInformationForm");

			_initWizard();
		}
	};
}();

var TypeAhead = function () {

	var demo2 = function () {
		$.ajax({
			url: "/Register/GetCodes",
			type: 'POST',
			dataType: 'json',
			success: function (data) {
				// constructs the suggestion engine
				var pcodes = new Bloodhound({
					datumTokenizer: Bloodhound.tokenizers.obj.whitespace('code'),
					queryTokenizer: Bloodhound.tokenizers.whitespace,
					local: data.result
				});
				$('#postcode').typeahead(null, {
					name: 'postcodes',
					display: 'code',
					source: pcodes,
					templates: {
						empty: [
							'<div class=\"empty-message\" style=\"padding: 10px 15px; text-align: center;\">',
							'unable to find any Postcode that match the current query',
							'</div>'
						].join('\n'),
						suggestion: Handlebars.compile('<div><strong>{{code}}</strong> – {{city}}  – {{state}}</div>')
					}
				});

				var selected = null;
				var originalVal = null;
				$('#postcode').on("typeahead:active", function (e) {
					selected = null;
					originalVal = $('#postcode').typeahead("val");
				})

				$('#postcode').on("typeahead:change", function (e, datum) {
					if (!selected) {
						$('#deliveryCity').val('');
						$('#deliveryState').val('');
					}
				});

				$('#postcode').on('typeahead:select', function (e, datum) {
					selected = datum;
					$('#city').val(datum.city);
					$('#state').val(datum.state);
					if ($('#postcode').val() != '') {
						$('#city').valid();
						$('#state').valid();
					}
				});
			}
		});
	}


	return {
		// public functions
		init: function () {
			// demo2();
		}
	};
}();

jQuery(document).ready(function () {
	Wizard.init();
	TypeAhead.init();
	window.scrollTo(0, 0);

	$('input:text').on('keypress', function (event) {
		var regex = new RegExp("^[a-zA-Z0-9_ , - / # -]*$");
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if (!regex.test(key)) {
			event.preventDefault();
			return false;
		}
	});

	$('#fullName').on('keypress', function (event) {
		var regex = new RegExp("[a-zA-Z /]+");
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if (!regex.test(key)) {
			event.preventDefault();
			return false;
		}
	});

	const nric = document.getElementById('nricNumber');
	nric.onpaste = e => e.preventDefault();

	const fname = document.getElementById('fullName');
	fname.onpaste = e => e.preventDefault();

	const address1 = document.getElementById('addressLine1');
	address1.onpaste = e => e.preventDefault();

	const address2 = document.getElementById('addressLine2');
	address2.onpaste = e => e.preventDefault();

	const postcode = document.getElementById('postcode');
	postcode.onpaste = e => e.preventDefault();

	const mobileNumber = document.getElementById('mobileNumber');
	mobileNumber.onpaste = e => e.preventDefault();

	const emailAddress = document.getElementById('emailAddress');
	emailAddress.onpaste = e => e.preventDefault();

});

function validateEmail(emailAddress) {
	emailAddress = emailAddress.toLowerCase();;
	var re = /^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\.)?[a-zA-Z]+\.)+(com|asia|au|biz|cn|co|de|edu|giv|hk|id|in|jp|my|net|nz|org|sg|tw|uk)$/;
	return re.test(emailAddress);
}

function getStateCode(stateName) {
	var code = '';

	switch (stateName) {
		case 'JOHOR':
			code = 'JHR';
			break;
		case 'KEDAH':
			code = 'KDH';
			break;
		case 'KELANTAN':
			code = 'KTN';
			break;
		case 'WILAYAH PERSEKUTUAN-KUALA LUMPUR':
			code = 'KUL';
			break;
		case 'WILAYAH PERSEKUTUAN-LABUAN':
			code = 'LBN';
			break;
		case 'MELAKA':
			code = 'MLK';
			break;
		case 'NEGERI SEMBILAN':
			code = 'NSN';
			break;
		case 'PAHANG':
			code = 'PHG';
			break;
		case 'WILAYAH PERSEKUTUAN-PUTRAJAYA':
			code = 'PJY';
			break;
		case 'PERLIS':
			code = 'PLS';
			break;
		case 'PULAU PINANG':
			code = 'PNG';
			break;
		case 'PERAK':
			code = 'PRK';
			break;
		case 'SABAH':
			code = 'SBH';
			break;
		case 'SELANGOR':
			code = 'SGR';
			break;
		case 'SARAWAK':
			code = 'SRW';
			break;
		case 'TERENGGANU':
			code = 'TRG';
			break;
		default:
			code = 'KUL';
			break;
	}

	return code;
}

function getBundle(plan) {
	var bundle = '';

	switch (plan) {
		case 'PK300S':
			bundle = '662';
			// code block
			break;
		case 'PK180S':
			bundle = '664';
			// code block
			break;
		default:
		// code block
	}

	return bundle;
}

function getPlanName(plan) {
	var bundle = '';

	switch (plan) {
		case 'PK300S':
			bundle = 'YES Prihatin Learn From Home Family Postpaid With Samsung A02';
			// code block
			break;
		case 'PK180S':
			bundle = 'YES Prihatin Learn From Home Individual Postpaid With Samsung A02';
			// code block
			break;
		default:
		// code block
	}

	return bundle
}

function formatDate(date) {
	var d = new Date(date),
		month = '' + (d.getMonth() + 1),
		day = '' + d.getDate(),
		year = d.getFullYear();

	if (month.length < 2) month = '0' + month;
	if (day.length < 2) day = '0' + day;

	return [day, month, year].join('/');
}