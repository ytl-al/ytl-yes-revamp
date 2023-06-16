    var fm_currentDate = new Date();
    var FormCurrency_12 = '$';
    var FormPaypalTax_12 = '0';
    var check_submit12 = 0;
    var check_before_submit12 = {};
    var required_fields12 = ["2","3"];
    var labels_and_ids12 = {"2":"type_submitter_mail","3":"type_radio","4":"type_submit_reset"};
    var check_regExp_all12 = [];
    var check_paypal_price_min_max12 = [];
    var file_upload_check12 = [];
    var spinner_check12 = [];
    var scrollbox_trigger_point12 = '20';
    var header_image_animation12 = 'none';
    var scrollbox_loading_delay12 = '0';
    var scrollbox_auto_hide12 = '1';
    var inputIds12 = '[]';
        var update_first_field_id12 = 0;
    var form_view_count12 = 0;
    // Occurs before the form is loaded
function before_load12() {

}

// Occurs just before submitting  the form
function before_submit12() {
  // IMPORTANT! If you want to interrupt (stop) the submitting of the form, this function should return true. You don't need to return any value if you don't want to stop the submission.
  
  $('input[name="fm_current_post_type6"]').val('page');
}

// Occurs just before resetting the form
function before_reset12() {

}
// Occurs after form is submitted and reloaded
function after_submit12() {

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


    function onload_js12() {    }

    function condition_js12() {    }

    function check_js12(id, form_id) {
      if (id != 0) {
        x = jQuery("#" + form_id + "form_view"+id);
      }
      else {
        x = jQuery("#form"+form_id);
      }
          }

    function onsubmit_js12() {
      
  jQuery("<input type=\"hidden\" name=\"wdform_3_allow_other12\" value=\"no\" />").appendTo("#form12");
  jQuery("<input type=\"hidden\" name=\"wdform_3_allow_other_num12\" value=\"0\" />").appendTo("#form12");
    var disabled_fields = "";
    jQuery("#form12 div[wdid]").each(function() {
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
      jQuery("<input type=\"hidden\" name=\"disabled_fields12\" value =\""+disabled_fields+"\" />").appendTo("#form12");
    };    }

    function unset_fields12( values, id, i ) {
      rid = 0;
      if ( i > 0 ) {
        jQuery.each( values, function( k, v ) {
          if ( id == k.split('|')[2] ) {
            rid = k.split('|')[0];
            values[k] = '';
          }
        });
        return unset_fields12(values, rid, i - 1);
      }
      else {
        return values;
      }
    }

    function ajax_similarity12( obj, changing_field_id ) {
      jQuery.ajax({
        type: "POST",
        url: fm_objectL10n.form_maker_admin_ajax,
        dataType: "json",
        data: {
          nonce: fm_ajax.ajaxnonce,
          action: 'fm_reload_input',
          page: 'form_maker',
          form_id: 12,
          inputs: obj.inputs
        },
        beforeSend: function() {
          if ( !jQuery.isEmptyObject(obj.inputs) ) {
            jQuery.each( obj.inputs, function( key, val ) {
              wdid = key.split('|')[0];
              if ( val != '' && parseInt(wdid) == parseInt(changing_field_id) ) {
                jQuery("#form12 div[wdid='"+ wdid +"']").append( '<div class="fm-loading"></div>' );
              }
            });
          }
        },
        success: function (res) {
          if ( !jQuery.isEmptyObject(obj.inputs) ) {
            jQuery.each( obj.inputs, function( key, val ) {
              wdid = key.split('|')[0];
              jQuery("#form12 div[wdid='"+ wdid +"'] .fm-loading").remove();
              if ( !jQuery.isEmptyObject(res[wdid]) && ( !val || parseInt(wdid) == parseInt(changing_field_id) ) ) {
                jQuery("#form12 div[wdid='"+ wdid +"']").html( res[wdid].html );
              }
            });
          }
        },
        complete: function() {
        }
      });
    }

    function fm_script_ready12() {
      if (jQuery('#form12 .wdform_section').length > 0) {
        fm_document_ready( 12 );
      }
      else {
        jQuery("#form12").closest(".fm-form-container").removeAttr("style")
      }
      if (jQuery('#form12 .wdform_section').length > 0) {
        formOnload(12);
      }
      var ajaxObj12 = {};
      var value_ids12 = {};
      jQuery.each( jQuery.parseJSON( inputIds12 ), function( key, values ) {
        jQuery.each( values, function( index, input_id ) {
          tagName =  jQuery('#form12 [id^="wdform_'+ input_id +'_elemen"]').attr("tagName");
          type =  jQuery('#form12 [id^="wdform_'+ input_id +'_elemen"]').attr("type");
          if ( tagName == 'INPUT' ) {
            input_value = jQuery('#form12 [id^="wdform_'+ input_id +'_elemen"]').val();
            if ( jQuery('#form12 [id^="wdform_'+ input_id +'_elemen"]').is(':checked') ) {
              if ( input_value ) {
                value_ids12[key + '|' + input_id] = input_value;
              }
            }
            else if ( type == 'text' ) {
              if ( input_value ) {
                value_ids12[key + '|' + input_id] = input_value;
              }
            }
          }
          else if ( tagName == 'SELECT' ) {
            select_value = jQuery('#form12 [id^="wdform_'+ input_id +'_elemen"] option:selected').val();
            if ( select_value ) {
              value_ids12[key + '|' + input_id] = select_value;
            }
          }
          ajaxObj12.inputs = value_ids12;
          jQuery(document).on('change', '#form12 [id^="wdform_'+ input_id +'_elemen"]', function() {
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
          value_ids12[key + '|' + input_id] = id;
          jQuery.each( value_ids12, function( k, v ) {
            key_arr = k.split('|');
            if ( input_id == key_arr[2] ) {
              changing_field_id = key_arr[0];
              count = Object.keys(value_ids12).length;
              value_ids12 = unset_fields12( value_ids12, changing_field_id, count );
            }
          });
          ajaxObj12.inputs = value_ids12;
          ajax_similarity12( ajaxObj12, changing_field_id );
          });
        });
      });
      if ( update_first_field_id12 && !jQuery.isEmptyObject(ajaxObj12.inputs) ) {
        ajax_similarity12( ajaxObj12, update_first_field_id12 );
      }
      form_load_actions();
      	  }
    jQuery(function () {
      fm_script_ready12();
    });
        