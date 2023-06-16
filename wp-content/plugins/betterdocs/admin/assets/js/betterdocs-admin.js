(function ($) {
	"use strict";

	/**
	 * BetterDocs Admin JS
	 */

	$.betterdocsAdmin = $.betterdocsAdmin || {};

	$(document).ready(function () {
		$.betterdocsAdmin.init();

		var qVars = $.betterdocsAdmin.get_query_vars("page");
		if (qVars != undefined) {
			if (qVars.indexOf("betterdocs-settings") >= 0) {
				var cSettingsTab = qVars.split("#");
				$(
					'.betterdocs-settings-menu li[data-tab="' +
						cSettingsTab[1] +
						'"]'
				).trigger("click");
			}
		}
	});

	$.betterdocsAdmin.init = function () {
		$.betterdocsAdmin.toggleFields();
		$.betterdocsAdmin.bindEvents();
		$.betterdocsAdmin.initializeFields();
	};

	$.betterdocsAdmin.bindEvents = function () {
		//Advance Checkbox with SweetAlear
		$("body").on(
			"click",
			".betterdocs-adv-checkbox-wrap label, .betterdocs-stats-tease",
			function (e) {
				if (typeof $(this)[0].dataset.swal == "undefined") {
					return;
				}
				if (typeof $(this)[0].dataset.swal != "undefined") {
					e.preventDefault();
				}
				var premium_content = document.createElement("p");
				var premium_anchor = document.createElement("a");

				premium_anchor.setAttribute("href", "https://betterdocs.co");
				premium_anchor.innerText = "Premium";
				premium_anchor.style.color = "red";
				premium_content.innerHTML =
					"You need to upgrade to the <strong>" +
					premium_anchor.outerHTML +
					" </strong> Version to use this feature";

				swal({
					title: "Opps...",
					content: premium_content,
					icon: "warning",
					buttons: [false, "Close"],
					dangerMode: true,
				});
			}
		);

		// date range picker
		$("#dashboard-select-date").change(function () {
			if (this.value == 'custom_date') {
				$('#reportrange').show().trigger('click');
			} else {
				$('#reportrange').hide();
			}
		});

		if ($("#dashboard-select-date").val() === 'custom_date') {
			$('#reportrange').show();
		}

		$('#reportrange').daterangepicker({
			timePicker: false,
			/*showDropdowns: true,
			minYear: 1950,
			maxYear: parseInt(moment().format('YYYY'),10),*/
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			},
			locale: {
				format: 'MMMM D, YYYY'
			}
		});

		// Switch to Dark Mode
		$("#betterdocs-mode-toggle").prop(
			"checked",
			betterdocs_admin.dark_mode
		);
		
		$("#betterdocs-mode-toggle").on("click", function (e) {
			$("body").toggleClass("betterdocs-dark-mode");
			$.ajax({
				type: "POST",
				url: betterdocs_admin.ajaxurl,
				data: {
					action: "betterdocs_dark_mode",
					mode: e.currentTarget.checked ? 1 : 0,
					nonce: betterdocs_admin.doc_cat_order_nonce,
				},
				dataType: "JSON",
				success: function (response) {
					// console.log( response );
				},
			});
		});

		// Go To Sorting UI
		$("body.post-type-docs.edit-php .wp-heading-inline").after(
			'<a href="admin.php?page=betterdocs-admin" class="page-title-action">' +
			betterdocs_admin.menu_title +
			"</a>"
		);

		/**
		 * Group Field Events
		 */
		$(".betterdocs-group-field .betterdocs-group-field-title").on(
			"click",
			function (e) {
				e.preventDefault();
				if ($(e.srcElement).hasClass("betterdocs-group-field-title")) {
					$.betterdocsAdmin.groupToggle(this);
				}
			}
		);

		$(".betterdocs-group-field .betterdocs-group-clone").on(
			"click",
			function () {
				$.betterdocsAdmin.cloneGroup(this);
			}
		);

		$("body").on(
			"click",
			".betterdocs-group-field .betterdocs-group-remove",
			function () {
				$.betterdocsAdmin.removeGroup(this);
			}
		);

		/**
		 * Media Field
		 */
		$(".betterdocs-media-field-wrapper .betterdocs-media-upload-button").on(
			"click",
			function (e) {
				e.preventDefault();
				$.betterdocsAdmin.initMediaField(this);
			}
		);

		$(".betterdocs-media-field-wrapper .betterdocs-media-remove-button").on(
			"click",
			function (e) {
				e.preventDefault();
				$.betterdocsAdmin.removeMedia(this);
			}
		);

		/**
		 * Settings Tab
		 */
		$(".betterdocs-settings-menu li").on("click", function (e) {
			$.betterdocsAdmin.settingsTab(this);
		});
		
		$(".betterdocs-settings-button").on("click", function (e) {
			e.preventDefault();
			var form = $(this).parents("#betterdocs-settings-form");
			$.betterdocsAdmin.submitSettings(this, form);
		});

		$("#test_report").on("click", function (e) {
			e.preventDefault();
			$.betterdocsAdmin.sendEmail(this);
		});

		$(".betterdocs-opt-alert").on("click", function (e) {
			$.betterdocsAdmin.fieldAlert(this);
		});

		/**
		 * Reset Section Settings
		 */
		$(".betterdocs-section-reset").on("click", function (e) {
			e.preventDefault();
			$.betterdocsAdmin.resetSection(this);
		});

		$.betterdocsAdmin.permalink_structure();
		$('#permalink_structure').on('change', $.betterdocsAdmin.permalink_structure);
		$('#multiple_kb').on('change', function(){
			var kb = $('.permalink-structure .available-structure-tags .knowledge-base');
			var multiple_kb = $(this);
			if(multiple_kb.is(':checked')){
				kb.show();
			}
			else{
				kb.hide();
			}
			$.betterdocsAdmin.permalink_structure();
		});
	};

	$.betterdocsAdmin.permalink_structure = function(){
		var multiple_kb = $('#multiple_kb');
		var permalink_structure = $('#permalink_structure');
		var $val = permalink_structure.val();
		if($val && !multiple_kb.is(':checked')){
			permalink_structure.val($val.replace(/%knowledge_base%\/?/g, ''));
		}
	}
	
	$.betterdocsAdmin.initializeFields = function () {
		$.betterdocsAdmin.innerTab();
		if ($(".betterdocs-meta-field, .betterdocs-settings-field").length > 0) {
			$(".betterdocs-meta-field, .betterdocs-settings-field").map(
				function (iterator, item) {
					var node = item.nodeName;
					if (node === "SELECT") {
						$(item).select2({
							placeholder: "Select any",
						});
					}
				}
			);
		}

		if ($(".betterdocs-countdown-datepicker").length > 0) {
			$(".betterdocs-countdown-datepicker").each(function () {
				$(this).find("input").datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat: "DD, d MM, yy",
				});
			});
		}

		$(".betterdocs-settings-field.betterdocs-select").on("select2:select", function (evt) {
			let $values = $(this).val();
			if ( Array.isArray( $values ) && $values.includes('all') && $values.length > 1 ) {
				let mod_values = $values.filter((value) => {
					return value != 'all'
				});
				$(this).val(mod_values);
				$(this).trigger('change');
			} 
		});

		$(".betterdocs-metabox-wrapper .betterdocs-meta-field, .betterdocs-settings-field").trigger("change");

		if ($(".betterdocs-colorpicker-field").length > 0) {
			if ("undefined" !== typeof $.fn.wpColorPicker) {
				$(".betterdocs-colorpicker-field").each(function () {
					var color = $(this).val();
					$(this)
						.wpColorPicker({
							change: function (event, ui) {
								var element = event.target;
								var color = ui.color.toString();
								$(element)
									.parents(".wp-picker-container")
									.find("input.betterdocs-colorpicker-field")
									.val(color)
									.trigger("change");
							},
						})
						.parents(".wp-picker-container")
						.find(".wp-color-result")
						.css("background-color", "#" + color);
				});
			}
		}
		$.betterdocsAdmin.groupField();
		$(".betterdocs-meta-template-editable").trigger("blur");
	};

	$.betterdocsAdmin.innerTab = function () {
		if ($(".betterdocs-section-inner-tab").length <= 0) {
			return;
		}

		$(".betterdocs-section-inner-tab").each(function (i, item) {
			$(item)
				.find("ul")
				.on("click", "li", function (e) {
					var target = e.currentTarget.dataset.target;
					$(this)
						.addClass("betterdocs-active")
						.siblings()
						.removeClass("betterdocs-active");
					$("#" + target)
						.show()
						.siblings()
						.hide();
				});
			$(item).find("ul").find("li:first").trigger("click");
		});
	};

	$.betterdocsAdmin.groupField = function () {
		if ($(".betterdocs-group-field-wrapper").length < 0) {
			return;
		}

		var fields = $(".betterdocs-group-field-wrapper");

		fields.each(function () {
			var $this = $(this),
				groups = $this.find(".betterdocs-group-field"),
				firstGroup = $this.find(".betterdocs-group-field:first"),
				lastGroup = $this.find(".betterdocs-group-field:last");

			groups.each(function () {
				var groupContent = $(this)
					.find(".betterdocs-group-field-title:not(.open)")
					.next();
				if (groupContent.is(":visible")) {
					groupContent.addClass("open");
				}
			});

			$this.find(".betterdocs-group-field-add").on("click", function (e) {
				e.preventDefault();

				var fieldId = $this.attr("id"),
					dataId = $this.data("name"),
					wrapper = $this.find(".betterdocs-group-fields-wrapper"),
					groups = $this.find(".betterdocs-group-field"),
					firstGroup = $this.find(".betterdocs-group-field:first"),
					lastGroup = $this.find(".betterdocs-group-field:last"),
					clone = $($this.find(".betterdocs-group-template").html()),
					groupId = parseInt(lastGroup.data("id")),
					nextGroupId = 1,
					title = clone.data("group-title");

				if (!isNaN(groupId)) {
					nextGroupId = groupId + 1;
				}

				groups.each(function () {
					$(this).removeClass("open");
				});

				// Reset all data of clone object.
				clone.attr("data-id", nextGroupId);
				clone.addClass("open");
				// clone.find('.betterdocs-group-field-title > span').html(title + ' ' + nextGroupId);
				clone
					.find("tr.betterdocs-field[id*=" + fieldId + "]")
					.each(function () {
						var fieldName = dataId;
						var fieldNameSuffix = $(this)
							.attr("id")
							.split("[1]")[1];
						var nextFieldId =
							fieldName +
							"[" +
							nextGroupId +
							"]" +
							fieldNameSuffix;
						var label = $(this).find("th label");

						$(this)
							.find('[name*="' + fieldName + '[1]"]')
							.each(function () {
								var inputName = $(this)
									.attr("name")
									.split("[1]");
								var inputNamePrefix = inputName[0];
								var inputNameSuffix = inputName[1];
								var newInputName =
									inputNamePrefix +
									"[" +
									nextGroupId +
									"]" +
									inputNameSuffix;
								$(this)
									.attr("id", newInputName)
									.attr("name", newInputName);
								label.attr("for", newInputName);
							});

						$(this).attr("id", nextFieldId);
					});

				clone.insertBefore($(this));

				$.betterdocsAdmin.resetFieldIds($(".betterdocs-group-field"));
			});
		});
	};

	/**
	 * This function will change tab
	 * with menu click & Next Previous Button Click
	 */
	$.betterdocsAdmin.tabChanger = function (buttonName) {
		var button = $(buttonName),
			tabID = button.data("tabid"),
			tabKey = button.data("tab"),
			tab;

		if (tabKey != "") {
			tab = $("#betterdocs-" + tabKey);
			$("#betterdocs_builder_current_tab").val(tabKey);
		}

		if (buttonName.nodeName !== "BUTTON") {
			button
				.parent()
				.find("li")
				.each(function (i) {
					if (i < tabID) {
						$(this).addClass("betterdocs-complete");
					} else {
						$(this).removeClass("betterdocs-complete");
					}
				});

			button.addClass("active").siblings().removeClass("active");
			tab.addClass("active").siblings().removeClass("active");
			return;
		}
		if (tab === undefined) {
			$("#publish").trigger("click");
			return;
		}
		$('.betterdocs-metatab-menu li[data-tabid="' + tabID + '"]').trigger(
			"click"
		);
		$(
			'.betterdocs-builder-tab-menu li[data-tabid="' + tabID + '"]'
		).trigger("click");
	};

	$.betterdocsAdmin.toggleFields = function () {
		$(".betterdocs-meta-field, .betterdocs-settings-field").on(
			"change",
			function (e) {
				$.betterdocsAdmin.checkDependencies(this);
			}
		);
	};

	$.betterdocsAdmin.toggle = function (array, func, prefix, suffix, id) {
		var i = 0;
		suffix = "undefined" == typeof suffix ? "" : suffix;

		if (typeof array !== "undefined") {
			for (; i < array.length; i++) {
				var selector = prefix + array[i] + suffix;
				$(selector)[func]();
			}
		}
	};

	$.betterdocsAdmin.checkDependencies = function (variable) {
		if (betterdocsAdminConfig.toggleFields === null) {
			return;
		}

		var current = $(variable),
			container = current.parents(".betterdocs-field:first"),
			id = container.data("id"),
			value = current.val();

		if ("checkbox" === current.attr("type")) {
			if (!current.is(":checked")) {
				value = 0;
			} else {
				value = 1;
			}
		}

		if (current.hasClass("betterdocs-theme-selected")) {
			var currentTheme = current
				.parents(".betterdocs-theme-control-wrapper")
				.data("name");
			value = $("#" + currentTheme).val();
		}

		var mainid = id;

		if (betterdocsAdminConfig.toggleFields.hasOwnProperty(id)) {
			var canShow = betterdocsAdminConfig.toggleFields[id].hasOwnProperty(
				value
			);
			var canHide = true;
			if (betterdocsAdminConfig.hideFields[id]) {
				var canHide = betterdocsAdminConfig.hideFields[
					id
				].hasOwnProperty(value);
			}

			if (
				betterdocsAdminConfig.toggleFields.hasOwnProperty(id) &&
				canHide
			) {
				$.each(betterdocsAdminConfig.toggleFields[id], function (
					key,
					array
				) {
					$.betterdocsAdmin.toggle(
						array.fields,
						"hide",
						"#betterdocs-meta-",
						"",
						mainid
					);
					$.betterdocsAdmin.toggle(
						array.sections,
						"hide",
						"#betterdocs-settings-",
						"",
						mainid
					);
				});
			}

			if (canShow) {
				$.betterdocsAdmin.toggle(
					betterdocsAdminConfig.toggleFields[id][value].fields,
					"show",
					"#betterdocs-meta-",
					"",
					mainid
				);
				$.betterdocsAdmin.toggle(
					betterdocsAdminConfig.toggleFields[id][value].sections,
					"show",
					"#betterdocs-settings-",
					"",
					mainid
				);
			}
		}

		if (betterdocsAdminConfig.hideFields.hasOwnProperty(id)) {
			var hideFields = betterdocsAdminConfig.hideFields[id];

			if (hideFields.hasOwnProperty(value)) {
				$.betterdocsAdmin.toggle(
					hideFields[value].fields,
					"hide",
					"#betterdocs-meta-",
					"",
					mainid
				);
				$.betterdocsAdmin.toggle(
					hideFields[value].sections,
					"hide",
					"#betterdocs-settings-",
					"",
					mainid
				);
			}
		}
	};

	$.betterdocsAdmin.groupToggle = function (group) {
		var input = $(group),
			wrapper = input.parents(".betterdocs-group-field");

		if (wrapper.hasClass("open")) {
			wrapper.removeClass("open");
		} else {
			wrapper.addClass("open").siblings().removeClass("open");
		}
	};

	$.betterdocsAdmin.removeGroup = function (button) {
		var groupId = $(button)
				.parents(".betterdocs-group-field")
				.attr("data-id"),
			group = $(button).parents(
				'.betterdocs-group-field[data-id="' + groupId + '"]'
			),
			parent = group.parent();

		group.fadeOut({
			duration: 300,
			complete: function () {
				$(this).remove();
			},
		});

		$.betterdocsAdmin.resetFieldIds(parent.find(".betterdocs-group-field"));
	};

	$.betterdocsAdmin.cloneGroup = function (button) {
		var groupId = $(button)
				.parents(".betterdocs-group-field")
				.attr("data-id"),
			group = $(button).parents(
				'.betterdocs-group-field[data-id="' + groupId + '"]'
			),
			clone = $(group.clone()),
			lastGroup = $(button)
				.parents(".betterdocs-group-fields-wrapper")
				.find(".betterdocs-group-field:last"),
			parent = group.parent(),
			nextGroupID = $(lastGroup).data("id") + 1;

		group.removeClass("open");

		clone.attr("data-id", nextGroupID);
		clone.insertAfter(group);
		$.betterdocsAdmin.resetFieldIds(parent.find(".betterdocs-group-field"));
	};

	$.betterdocsAdmin.resetFieldIds = function (groups) {
		if (groups.length <= 0) {
			return;
		}
		var groupID = 0;

		groups.map(function (iterator, item) {
			var item = $(item),
				fieldName = item.data("field-name"),
				groupInfo = item
					.find(".betterdocs-group-field-info")
					.data("info"),
				subFields = groupInfo.group_sub_fields;

			item.attr("data-id", groupID);

			var table_row = item.find("tr.betterdocs-field");

			table_row.each(function (i, child) {
				var child = $($(child)[0]),
					childInput = child.find(
						'[name*="betterdocs_meta_' + fieldName + '"]'
					),
					key = childInput.attr("data-key"),
					subKey = subFields[i].original_name,
					dataID = fieldName + "[" + groupID + "][" + subKey + "]",
					idName = "betterdocs-meta-" + dataID,
					inputName = "betterdocs_meta_" + dataID;

				child.attr("data-id", dataID);
				child.attr("id", idName);

				if (key != undefined) {
					childInput.attr("id", inputName);
					childInput.attr("name", inputName);
					childInput.attr("data-key", dataID);
				} else {
					if (childInput.length > 1) {
						childInput.each(function (i, subInput) {
							if (subInput.type === "text") {
								var subInputName = inputName + "[url]";
							}
							if (subInput.type === "hidden") {
								var subInputName = inputName + "[id]";
							}
							subInput = $(subInput);
							subInput.attr("id", subInputName);
							subInput.attr("name", subInputName);
							subInput.attr("data-key", dataID);
						});
					}
				}
			});

			groupID++;
		});
	};

	$.betterdocsAdmin.initMediaField = function (button) {
		var button = $(button),
			wrapper = button.parents(".betterdocs-media-field-wrapper"),
			removeButton = wrapper.find(".betterdocs-media-remove-button"),
			imgContainer = wrapper.find(".betterdocs-thumb-container"),
			idField = wrapper.find(".betterdocs-media-id"),
			urlField = wrapper.find(".betterdocs-media-url");

		// Create a new media frame
		var frame = wp.media({
			title: "Upload Photo",
			button: {
				text: "Use this photo",
			},
			multiple: false, // Set to true to allow multiple files to be selected
		});

		// When an image is selected in the media frame...
		frame.on("select", function () {
			// Get media attachment details from the frame state
			var attachment = frame.state().get("selection").first().toJSON();
			/**
			 * Set image to the image container
			 */
			imgContainer
				.addClass("betterdocs-has-thumb")
				.append(
					'<img src="' +
						attachment.url +
						'" alt="" style="max-width:100%;"/>'
				);
			idField.val(attachment.id); // set image id
			urlField.val(attachment.url); // set image url
			// Hide the upload button
			button.addClass("hidden");
			// Show the remove button
			removeButton.removeClass("hidden");
		});
		// Finally, open the modal on click
		frame.open();
	};

	$.betterdocsAdmin.removeMedia = function (button) {
		var button = $(button),
			wrapper = button.parents(".betterdocs-media-field-wrapper"),
			uploadButton = wrapper.find(".betterdocs-media-upload-button"),
			imgContainer = wrapper.find(".betterdocs-has-thumb"),
			idField = wrapper.find(".betterdocs-media-id"),
			urlField = wrapper.find(".betterdocs-media-url");

		imgContainer.removeClass("betterdocs-has-thumb").find("img").remove();

		urlField.val(""); // URL field has to be empty
		idField.val(""); // ID field has to empty as well

		button.addClass("hidden"); // Hide the remove button first
		uploadButton.removeClass("hidden"); // Show the uplaod button
	};

	$.betterdocsAdmin.fieldAlert = function (button) {
		var premium_content = document.createElement("p");
		var premium_anchor = document.createElement("a");

		premium_anchor.setAttribute("href", "https://betterdocs.co/upgrade");
		premium_anchor.innerText = "Premium";
		premium_anchor.style.color = "red";
		premium_content.innerHTML =
			"You need to upgrade to the <strong>" +
			premium_anchor.outerHTML +
			" </strong> Version to use this feature";

		swal({
			title: "Opps...",
			content: premium_content,
			icon: "warning",
			buttons: [false, "Close"],
			dangerMode: true,
		});
	};

	$.betterdocsAdmin.resetSection = function (button) {
		var button = $(button),
			parent = button.parents(".betterdocs-meta-section"),
			fields = parent.find(".betterdocs-meta-field"),
			updateFields = [];

		window.fieldsss = fields;
		fields.map(function (iterator, item) {
			var item = $(item),
				default_value = item.data("default");

			item.val(default_value);

			if (item.hasClass("wp-color-picker")) {
				item.parents(".wp-picker-container")
					.find(".wp-color-result")
					.removeAttr("style");
			}
			if (item[0].id == "betterdocs_meta_border") {
				item.trigger("click");
			} else {
				item.trigger("change");
			}
		});
	};

	$.betterdocsAdmin.settingsTab = function (button) {
		var button = $(button),
			tabToGo = button.data("tab");

		button.addClass("active").siblings().removeClass("active");
		$("#betterdocs-" + tabToGo)
			.addClass("active")
			.siblings()
			.removeClass("active");
	};

	$.betterdocsAdmin.submitSettings = function (button, form) {
		var button = $(button),
			submitKey = button.data("key"),
			nonce = button.data("nonce"),
			formData = $(form).serializeArray();

		$.ajax({
			type: "POST",
			url: ajaxurl,
			data: {
				action: "betterdocs_general_settings",
				key: submitKey,
				nonce: nonce,
				form_data: formData,
			},
			beforeSend: function () {
				button.html("<span>Saving...</span>");
			},
			success: function (res) {
				button.html("Save Settings");
				if (res.data === "success") {
					swal({
						title: "Settings Saved!",
						text: "Click OK to continue",
						icon: "success",
						buttons: [false, "Ok"],
						timer: 2000,
					}).then(function () {
						$(".betterdocs-save-now").removeClass(
							"betterdocs-save-now"
						);
						location=location.origin+location.pathname+location.search+'&saved=true'+location.hash;
					});
				} else {
					swal({
						title: "Settings Not Saved!",
						text: "Click OK to continue",
						icon: "error",
						buttons: [false, "Ok"],
						timer: 1000,
					});
				}
			},
		});
	};

	$.betterdocsAdmin.sendEmail = function (button) {
		var button = $(button),
			submitKey = button.data("key"),
			nonce = button.data("nonce");
		
		$.ajax({
			type: "POST",
			url: ajaxurl,
			data: {
				action: "test_email_report",
				key: submitKey,
				nonce: nonce
			},
			beforeSend: function () {
				button.val(betterdocs_admin.sending);
			},
			success: function (res) {
				button.val(betterdocs_admin.test_report);
				if (res.success === true) {
					swal({
						title: "Email Report Sent!",
						text: "Click OK to continue",
						icon: "success",
						buttons: [false, "Ok"],
						timer: 2000,
					}).then(function () {
						$(".betterdocs-save-now").removeClass(
							"betterdocs-save-now"
						);
					});
				} else {
					swal({
						title: "Email sending failed!",
						text: "Click OK to continue",
						icon: "error",
						buttons: [false, "Ok"],
						timer: 1000,
					});
				}
			},
		});
	};

	$.betterdocsAdmin.get_query_vars = function (name) {
		var vars = {};
		window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (
			m,
			key,
			value
		) {
			vars[key] = value;
		});
		if (name != "") {
			return vars[name];
		}
		return vars;
	};

	/**
	 * Copy To Clipboard
	 */
	$('.betterdocs-settings-input-text span').on('click', function(e){
		var previousValue = this.previousSibling;
		previousValue.select();
		document.execCommand("copy");
		this.firstChild.textContent = betterdocs_admin.text;
		previousValue.setSelectionRange(0, 99999);
	}); 

	/**
	 * admin tabs to display All Docs list and grid view 
	 */

	let active_tab = localStorage.getItem("betterdocs_admin_tab");
	if (active_tab === 'tab-content-1') {
		$('.icon-wrap-1').addClass('active');
		$('.tab-content-1').addClass('active');
		$('.select-kb-top').hide();
	} else {
		$('.icon-wrap-2').addClass('active');
		$('.tab-content-2').addClass('active');
		$('.select-kb-top').show();
	}

	$('.tabs-nav a').click(function(e) {
		e.preventDefault();
		$(this).siblings('a').removeClass('active').end().addClass('active');
		let sel = this.getAttribute('data-toggle-target');
		if (sel === '.tab-content-2') {
			$('.select-kb-top').show();
		} else {
			$('.select-kb-top').hide();
		}
		let val = $(this).hasClass('active') ? sel : '';
		localStorage.setItem('betterdocs_admin_tab', val.replace('.',''));
		$('.betterdocs-tab-content').removeClass('active').filter(sel).addClass('active');
	});

	/**
	 * drag and drop sortalbe doc post
	 */
	const docs_post_list = $(".betterdocs-single-listing ul");
	docs_post_list.each(function (i, single_doc_list) {
		var single_doc_list = $(single_doc_list),
			list_term_id = single_doc_list.data("category_id"),
			droppable = false;

		if (single_doc_list.hasClass("docs-droppable")) {
			droppable = true;
		}

		single_doc_list.sortable({
			connectWith: "ul.docs-droppable",
			placeholder: "betterdocs-post-list-placeholder",
			// axis: droppable ? "y" : true,
			// On start, set a height for the placeholder to prevent table jumps.
			start: function (event, ui) {
				const item = $(ui.item[0]);
				$(".betterdocs-post-list-placeholder").css(
					"height",
					item.css("height")
				);
			},
			receive: function (event, ui) {
				const item = ui.item;
				item.siblings(".betterdocs-no-docs").remove();
				if (list_term_id != undefined) {
					// AJAX Data.
					const data = {
						action: "update_docs_term",
						object_id: item.data("id"),
						prev_term_id: ui.sender.data("category_id"),
						list_term_id: list_term_id,
						doc_cat_order_nonce:
							betterdocs_admin.doc_cat_order_nonce,
					};
					// Run the ajax request.
					$.ajax({
						type: "POST",
						url: betterdocs_admin.ajaxurl,
						data: data,
						dataType: "JSON",
						success: function (response) {
							// console.log( response );
						},
					});
				}
			},
			update: function (event, ui) {
				const docs_ordering_data = [];
				single_doc_list
					.find("li.ui-sortable-handle")
					.each(function () {
						const ele = $(this);
						docs_ordering_data.push(ele.data("id"));
					});
				if (list_term_id != undefined) {
					// AJAX Data.
					const data = {
						action: "update_doc_order_by_category",
						docs_ordering_data: docs_ordering_data,
						list_term_id: list_term_id,
						doc_cat_order_nonce:
							betterdocs_admin.doc_cat_order_nonce,
					};
					// console.log( docs_ordering_data );
					// Run the ajax request.
					$.ajax({
						type: "POST",
						url: betterdocs_admin.ajaxurl,
						data: data,
						dataType: "JSON",
						success: function (response) {
							// console.log( response );
						},
					});
				}
			},
		});
	});

	// drag and drop sortalbe doc category
	const base_index =
	parseInt(betterdocs_admin.paged) > 0
		? (parseInt(betterdocs_admin.paged) - 1) *
		  parseInt($("#" + betterdocs_admin.per_page_id).val())
		: 0;
	const tax_table = $(".taxonomy-doc_category #the-list");

	if (tax_table.length > 0) {
		// If the tax table contains items.
		if (!tax_table.find("tr:first-child").hasClass("no-items")) {
			tax_table.sortable({
				placeholder: "betterdocs-drag-drop-cat-tax-placeholder",
				axis: "y",

				// On start, set a height for the placeholder to prevent table jumps.
				start: function (event, ui) {
					const item = $(ui.item[0]);
					const index = item.index();
					$(".betterdocs-drag-drop-cat-tax-placeholder").css(
						"height",
						item.css("height")
					);
				},
				// Update callback.
				update: function (event, ui) {
					const item = $(ui.item[0]);

					const taxonomy_ordering_data = [];

					tax_table
						.find("tr.ui-sortable-handle")
						.each(function () {
							const ele = $(this);
							const term_data = {
								term_id: ele.attr("id").replace("tag-", ""),
								order: parseInt(ele.index()) + 1,
							};
							taxonomy_ordering_data.push(term_data);
						});

					// AJAX Data.
					const data = {
						action: "update_doc_cat_order",
						taxonomy_ordering_data: taxonomy_ordering_data,
						base_index: base_index,
						doc_cat_order_nonce:
							betterdocs_admin.doc_cat_order_nonce,
					};

					// Run the ajax request.
					$.ajax({
						type: "POST",
						url: betterdocs_admin.ajaxurl,
						data: data,
						dataType: "JSON",
						success: function (response) {},
					});
				},
			});
		}
	}

})(jQuery);
