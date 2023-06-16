    var fm_currentDate = new Date();
    var FormCurrency_15 = '$';
    var FormPaypalTax_15 = '0';
    var check_submit15 = 0;
    var check_before_submit15 = {};
    var required_fields15 = ["2","3","4","5","6","7"];
    var labels_and_ids15 = {"2":"type_text","3":"type_submitter_mail","4":"type_own_select","5":"type_text","6":"type_own_select","8":"type_recaptcha","7":"type_checkbox","1":"type_submit_reset"};
    var check_regExp_all15 = {"5":["%5E%5B1-9%5D%5B0-9%5D%7B6%2C7%7D%24","i","Please insert minimum 7, maximum 8 digits, without prefix"]};
    var check_paypal_price_min_max15 = [];
    var file_upload_check15 = [];
    var spinner_check15 = [];
    var scrollbox_trigger_point15 = '20';
    var header_image_animation15 = 'none';
    var scrollbox_loading_delay15 = '0';
    var scrollbox_auto_hide15 = '1';
    var inputIds15 = '[]';
        var update_first_field_id15 = 0;
    var form_view_count15 = 0;
    // Occurs before the form is loaded
function before_load15() {

}

// Occurs just before submitting  the form
function before_submit15() {
  // IMPORTANT! If you want to interrupt (stop) the submitting of the form, this function should return true. You don't need to return any value if you don't want to stop the submission.
}

// Occurs just before resetting the form
function before_reset15() {

}
// Occurs after form is submitted and reloaded
function after_submit15() {

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


    function onload_js15() {    }

    function condition_js15() {
            if(fm_html_entities( jQuery("#wdform_2_element15").val() )!="" && fm_html_entities( jQuery("#wdform_3_element15").val() )!="" && jQuery("#wdform_5_element15").val().indexOf("'01%'")==-1 ) {
              jQuery("#form15 div[wdid=1]").removeAttr("style");
            }
            else {
              jQuery("#form15 div[wdid=1]").css("display", "none");
            }
            jQuery("#wdform_2_element15, #wdform_3_element15, #wdform_5_element15").on("keyup change", function() {
              if(fm_html_entities( jQuery("#wdform_2_element15").val() )!="" && fm_html_entities( jQuery("#wdform_3_element15").val() )!="" && jQuery("#wdform_5_element15").val().indexOf("'01%'")==-1 ) {
                jQuery("#form15 div[wdid=1]").removeAttr("style");
              }
              else {
                jQuery("#form15 div[wdid=1]").css("display", "none");
              }
              set_total_value(15);
              if ( jQuery("#form15 div[type='type_signature']").length && typeof fm_signature_init != 'undefined' ) {
                fm_signature_init();
              }
            });    }

    function check_js15(id, form_id) {
      if (id != 0) {
        x = jQuery("#" + form_id + "form_view"+id);
      }
      else {
        x = jQuery("#form"+form_id);
      }
          }

    function onsubmit_js15() {
      
				  jQuery("<input type=\"hidden\" name=\"wdform_7_allow_other15\" value=\"no\" />").appendTo("#form15");
				  jQuery("<input type=\"hidden\" name=\"wdform_7_allow_other_num15\" value=\"0\" />").appendTo("#form15");
    var disabled_fields = "";
    jQuery("#form15 div[wdid]").each(function() {
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
      jQuery("<input type=\"hidden\" name=\"disabled_fields15\" value =\""+disabled_fields+"\" />").appendTo("#form15");
    };    }

    function unset_fields15( values, id, i ) {
      rid = 0;
      if ( i > 0 ) {
        jQuery.each( values, function( k, v ) {
          if ( id == k.split('|')[2] ) {
            rid = k.split('|')[0];
            values[k] = '';
          }
        });
        return unset_fields15(values, rid, i - 1);
      }
      else {
        return values;
      }
    }

    function ajax_similarity15( obj, changing_field_id ) {
      jQuery.ajax({
        type: "POST",
        url: fm_objectL10n.form_maker_admin_ajax,
        dataType: "json",
        data: {
          nonce: fm_ajax.ajaxnonce,
          action: 'fm_reload_input',
          page: 'form_maker',
          form_id: 15,
          inputs: obj.inputs
        },
        beforeSend: function() {
          if ( !jQuery.isEmptyObject(obj.inputs) ) {
            jQuery.each( obj.inputs, function( key, val ) {
              wdid = key.split('|')[0];
              if ( val != '' && parseInt(wdid) == parseInt(changing_field_id) ) {
                jQuery("#form15 div[wdid='"+ wdid +"']").append( '<div class="fm-loading"></div>' );
              }
            });
          }
        },
        success: function (res) {
          if ( !jQuery.isEmptyObject(obj.inputs) ) {
            jQuery.each( obj.inputs, function( key, val ) {
              wdid = key.split('|')[0];
              jQuery("#form15 div[wdid='"+ wdid +"'] .fm-loading").remove();
              if ( !jQuery.isEmptyObject(res[wdid]) && ( !val || parseInt(wdid) == parseInt(changing_field_id) ) ) {
                jQuery("#form15 div[wdid='"+ wdid +"']").html( res[wdid].html );
              }
            });
          }
        },
        complete: function() {
        }
      });
    }

    function fm_script_ready15() {
      if (jQuery('#form15 .wdform_section').length > 0) {
        fm_document_ready( 15 );
      }
      else {
        jQuery("#form15").closest(".fm-form-container").removeAttr("style")
      }
      if (jQuery('#form15 .wdform_section').length > 0) {
        formOnload(15);
      }
      var ajaxObj15 = {};
      var value_ids15 = {};
      jQuery.each( jQuery.parseJSON( inputIds15 ), function( key, values ) {
        jQuery.each( values, function( index, input_id ) {
          tagName =  jQuery('#form15 [id^="wdform_'+ input_id +'_elemen"]').attr("tagName");
          type =  jQuery('#form15 [id^="wdform_'+ input_id +'_elemen"]').attr("type");
          if ( tagName == 'INPUT' ) {
            input_value = jQuery('#form15 [id^="wdform_'+ input_id +'_elemen"]').val();
            if ( jQuery('#form15 [id^="wdform_'+ input_id +'_elemen"]').is(':checked') ) {
              if ( input_value ) {
                value_ids15[key + '|' + input_id] = input_value;
              }
            }
            else if ( type == 'text' ) {
              if ( input_value ) {
                value_ids15[key + '|' + input_id] = input_value;
              }
            }
          }
          else if ( tagName == 'SELECT' ) {
            select_value = jQuery('#form15 [id^="wdform_'+ input_id +'_elemen"] option:selected').val();
            if ( select_value ) {
              value_ids15[key + '|' + input_id] = select_value;
            }
          }
          ajaxObj15.inputs = value_ids15;
          jQuery(document).on('change', '#form15 [id^="wdform_'+ input_id +'_elemen"]', function() {
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
          value_ids15[key + '|' + input_id] = id;
          jQuery.each( value_ids15, function( k, v ) {
            key_arr = k.split('|');
            if ( input_id == key_arr[2] ) {
              changing_field_id = key_arr[0];
              count = Object.keys(value_ids15).length;
              value_ids15 = unset_fields15( value_ids15, changing_field_id, count );
            }
          });
          ajaxObj15.inputs = value_ids15;
          ajax_similarity15( ajaxObj15, changing_field_id );
          });
        });
      });
      if ( update_first_field_id15 && !jQuery.isEmptyObject(ajaxObj15.inputs) ) {
        ajax_similarity15( ajaxObj15, update_first_field_id15 );
      }
      form_load_actions();
      	  }
    jQuery(function () {
      fm_script_ready15();
    });
        