    var fm_currentDate = new Date();
    var FormCurrency_16 = '$';
    var FormPaypalTax_16 = '0';
    var check_submit16 = 0;
    var check_before_submit16 = {};
    var required_fields16 = ["2","3","4","10","11","12"];
    var labels_and_ids16 = {"2":"type_text","3":"type_text","4":"type_submitter_mail","10":"type_own_select","11":"type_phone_new","12":"type_spinner","1":"type_submit_reset"};
    var check_regExp_all16 = [];
    var check_paypal_price_min_max16 = [];
    var file_upload_check16 = [];
    var spinner_check16 = {"12":["",""]};
    var scrollbox_trigger_point16 = '20';
    var header_image_animation16 = 'none';
    var scrollbox_loading_delay16 = '0';
    var scrollbox_auto_hide16 = '1';
    var inputIds16 = '[]';
        var update_first_field_id16 = 0;
    var form_view_count16 = 0;
    // Occurs before the form is loaded
function before_load16() {	
}	
// Occurs just before submitting  the form
function before_submit16() {
	// IMPORTANT! If you want to interrupt (stop) the submitting of the form, this function should return true. You don\'t need to return any value if you don\'t want to stop the submission.
}	
// Occurs just before resetting the form
function before_reset16() {	
}
// Occurs after form is submitted and reloaded
function after_submit16() {
  
}
    function get_adress_fields_ids( that ) {
      var id = jQuery(that).attr("wdid");
      var disabled = [];
      /* This is the case when the address field is completely closed by condition. */
      if ( jQuery(that).css('display') == 'none' ) {
        for (var i = 0; i <= 5; i++) {
          var name = jQuery(that).find(".wdform_" + id + "_address_" + i).attr("name");
          if (typeof name !== "undefined") {
            var temp = name.split("_");
            disabled.push(temp[1]);
          }
        }
      }
     /* This is the case when the fields in the address are closed with a condition. */
      else {
        for (var i = 0; i <= 5; i++) {
          var field = jQuery(that).find(".wdform_" + id + "_address_" + i);
          if( field.parent().css('display') == 'none' ) {
            var name = field.attr("name");
            if (typeof name !== "undefined") {
              var temp = name.split("_");
              disabled.push(temp[1]);
            }
          }
        }
      }
      return disabled;
    }


    function onload_js16() {
                var telinput11 = jQuery("#wdform_11_element16");
								var iti11 = window.intlTelInput(telinput11[0], {
									nationalMode: false,
									preferredCountries: [ "us" ],
									utilsScript: "https://yesmy-dev.azurewebsites.net/wp-content/plugins/form-maker/js/intlTelInput-utils.js"
								});
							
  jQuery("#form16 #wdform_12_element16")[0].spin = null;
  spinner = jQuery("#form16 #wdform_12_element16").spinner();
  if ("3" == "null" && jQuery("#form16 #wdform_12_element16").val() == "") { spinner.spinner("value", ""); }
  jQuery("#form16 #wdform_12_element16").spinner({ min: ""});
  jQuery("#form16 #wdform_12_element16").spinner({ max: ""});
  jQuery("#form16 #wdform_12_element16").spinner({ step: "1"});    }

    function condition_js16() {    }

    function check_js16(id, form_id) {
      if (id != 0) {
        x = jQuery("#" + form_id + "form_view"+id);
      }
      else {
        x = jQuery("#form"+form_id);
      }
          }

    function onsubmit_js16() {
      
    var disabled_fields = "";
    jQuery("#form16 div[wdid]").each(function() {
      if(jQuery(this).css("display") == "none") {
      
          if( jQuery(this).children().first().attr("type") === "type_address" ) {
              var ids = get_adress_fields_ids( this );
              if( ids.length > 0 ) {
                disabled_fields += ids.join(",");
                disabled_fields += ",";
              }
          } else {
              disabled_fields += jQuery(this).attr("wdid");
              disabled_fields += ",";
          }
      } else if( jQuery(this).children().first().attr("type") === "type_address" ) {
          var ids = get_adress_fields_ids( this );
          if( ids.length > 0 ) {
            disabled_fields += ids.join(",");
            disabled_fields += ",";
          }
      }
    })
    if(disabled_fields) {
      jQuery("<input type=\"hidden\" name=\"disabled_fields16\" value =\""+disabled_fields+"\" />").appendTo("#form16");
    };    }

    function unset_fields16( values, id, i ) {
      rid = 0;
      if ( i > 0 ) {
        jQuery.each( values, function( k, v ) {
          if ( id == k.split('|')[2] ) {
            rid = k.split('|')[0];
            values[k] = '';
          }
        });
        return unset_fields16(values, rid, i - 1);
      }
      else {
        return values;
      }
    }

    function ajax_similarity16( obj, changing_field_id ) {
      jQuery.ajax({
        type: "POST",
        url: fm_objectL10n.form_maker_admin_ajax,
        dataType: "json",
        data: {
          nonce: fm_ajax.ajaxnonce,
          action: 'fm_reload_input',
          page: 'form_maker',
          form_id: 16,
          inputs: obj.inputs
        },
        beforeSend: function() {
          if ( !jQuery.isEmptyObject(obj.inputs) ) {
            jQuery.each( obj.inputs, function( key, val ) {
              wdid = key.split('|')[0];
              if ( val != '' && parseInt(wdid) == parseInt(changing_field_id) ) {
                jQuery("#form16 div[wdid='"+ wdid +"']").append( '<div class="fm-loading"></div>' );
              }
            });
          }
        },
        success: function (res) {
          if ( !jQuery.isEmptyObject(obj.inputs) ) {
            jQuery.each( obj.inputs, function( key, val ) {
              wdid = key.split('|')[0];
              jQuery("#form16 div[wdid='"+ wdid +"'] .fm-loading").remove();
              if ( !jQuery.isEmptyObject(res[wdid]) && ( !val || parseInt(wdid) == parseInt(changing_field_id) ) ) {
                jQuery("#form16 div[wdid='"+ wdid +"']").html( res[wdid].html );
              }
            });
          }
        },
        complete: function() {
        }
      });
    }

    function fm_script_ready16() {
      if (jQuery('#form16 .wdform_section').length > 0) {
        fm_document_ready( 16 );
      }
      else {
        jQuery("#form16").closest(".fm-form-container").removeAttr("style")
      }
      if (jQuery('#form16 .wdform_section').length > 0) {
        formOnload(16);
      }
      var ajaxObj16 = {};
      var value_ids16 = {};
      jQuery.each( jQuery.parseJSON( inputIds16 ), function( key, values ) {
        jQuery.each( values, function( index, input_id ) {
          tagName =  jQuery('#form16 [id^="wdform_'+ input_id +'_elemen"]').attr("tagName");
          type =  jQuery('#form16 [id^="wdform_'+ input_id +'_elemen"]').attr("type");
          if ( tagName == 'INPUT' ) {
            input_value = jQuery('#form16 [id^="wdform_'+ input_id +'_elemen"]').val();
            if ( jQuery('#form16 [id^="wdform_'+ input_id +'_elemen"]').is(':checked') ) {
              if ( input_value ) {
                value_ids16[key + '|' + input_id] = input_value;
              }
            }
            else if ( type == 'text' ) {
              if ( input_value ) {
                value_ids16[key + '|' + input_id] = input_value;
              }
            }
          }
          else if ( tagName == 'SELECT' ) {
            select_value = jQuery('#form16 [id^="wdform_'+ input_id +'_elemen"] option:selected').val();
            if ( select_value ) {
              value_ids16[key + '|' + input_id] = select_value;
            }
          }
          ajaxObj16.inputs = value_ids16;
          jQuery(document).on('change', '#form16 [id^="wdform_'+ input_id +'_elemen"]', function() {
          var id = '';
          var changing_field_id = '';
          if( jQuery(this).attr("tagName") == 'INPUT' ) {
            if( jQuery(this).is(':checked') ) {
              id = jQuery(this).val();
            }
            if( jQuery(this).attr('type') == 'text' ) {
              id = jQuery(this).val();
            }
          }
          else {
            id = jQuery(this).val();
          }
          value_ids16[key + '|' + input_id] = id;
          jQuery.each( value_ids16, function( k, v ) {
            key_arr = k.split('|');
            if ( input_id == key_arr[2] ) {
              changing_field_id = key_arr[0];
              count = Object.keys(value_ids16).length;
              value_ids16 = unset_fields16( value_ids16, changing_field_id, count );
            }
          });
          ajaxObj16.inputs = value_ids16;
          ajax_similarity16( ajaxObj16, changing_field_id );
          });
        });
      });
      if ( update_first_field_id16 && !jQuery.isEmptyObject(ajaxObj16.inputs) ) {
        ajax_similarity16( ajaxObj16, update_first_field_id16 );
      }
      form_load_actions();
      	  }
    jQuery(function () {
      fm_script_ready16();
    });
        