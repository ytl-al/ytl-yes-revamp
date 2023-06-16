    var fm_currentDate = new Date();
    var FormCurrency_13 = '$';
    var FormPaypalTax_13 = '0';
    var check_submit13 = 0;
    var check_before_submit13 = {};
    var required_fields13 = ["2","3","4","5","6"];
    var labels_and_ids13 = {"2":"type_text","3":"type_text","4":"type_submitter_mail","5":"type_textarea","6":"type_file_upload","1":"type_submit_reset"};
    var check_regExp_all13 = [];
    var check_paypal_price_min_max13 = [];
    var file_upload_check13 = {"6":{"extension":"pdf","max_size":"2000"}};
    var spinner_check13 = [];
    var scrollbox_trigger_point13 = '20';
    var header_image_animation13 = 'none';
    var scrollbox_loading_delay13 = '0';
    var scrollbox_auto_hide13 = '1';
    var inputIds13 = '[]';
        var update_first_field_id13 = 0;
    var form_view_count13 = 0;
    // Occurs before the form is loaded
function before_load13() {

}

// Occurs just before submitting  the form
function before_submit13() {
  // IMPORTANT! If you want to interrupt (stop) the submitting of the form, this function should return true. You don't need to return any value if you don't want to stop the submission.
}

// Occurs just before resetting the form
function before_reset13() {

}
// Occurs after form is submitted and reloaded
function after_submit13() {

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


    function onload_js13() {    }

    function condition_js13() {    }

    function check_js13(id, form_id) {
      if (id != 0) {
        x = jQuery("#" + form_id + "form_view"+id);
      }
      else {
        x = jQuery("#form"+form_id);
      }
          }

    function onsubmit_js13() {
      
    var disabled_fields = "";
    jQuery("#form13 div[wdid]").each(function() {
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
      jQuery("<input type=\"hidden\" name=\"disabled_fields13\" value =\""+disabled_fields+"\" />").appendTo("#form13");
    };    }

    function unset_fields13( values, id, i ) {
      rid = 0;
      if ( i > 0 ) {
        jQuery.each( values, function( k, v ) {
          if ( id == k.split('|')[2] ) {
            rid = k.split('|')[0];
            values[k] = '';
          }
        });
        return unset_fields13(values, rid, i - 1);
      }
      else {
        return values;
      }
    }

    function ajax_similarity13( obj, changing_field_id ) {
      jQuery.ajax({
        type: "POST",
        url: fm_objectL10n.form_maker_admin_ajax,
        dataType: "json",
        data: {
          nonce: fm_ajax.ajaxnonce,
          action: 'fm_reload_input',
          page: 'form_maker',
          form_id: 13,
          inputs: obj.inputs
        },
        beforeSend: function() {
          if ( !jQuery.isEmptyObject(obj.inputs) ) {
            jQuery.each( obj.inputs, function( key, val ) {
              wdid = key.split('|')[0];
              if ( val != '' && parseInt(wdid) == parseInt(changing_field_id) ) {
                jQuery("#form13 div[wdid='"+ wdid +"']").append( '<div class="fm-loading"></div>' );
              }
            });
          }
        },
        success: function (res) {
          if ( !jQuery.isEmptyObject(obj.inputs) ) {
            jQuery.each( obj.inputs, function( key, val ) {
              wdid = key.split('|')[0];
              jQuery("#form13 div[wdid='"+ wdid +"'] .fm-loading").remove();
              if ( !jQuery.isEmptyObject(res[wdid]) && ( !val || parseInt(wdid) == parseInt(changing_field_id) ) ) {
                jQuery("#form13 div[wdid='"+ wdid +"']").html( res[wdid].html );
              }
            });
          }
        },
        complete: function() {
        }
      });
    }

    function fm_script_ready13() {
      if (jQuery('#form13 .wdform_section').length > 0) {
        fm_document_ready( 13 );
      }
      else {
        jQuery("#form13").closest(".fm-form-container").removeAttr("style")
      }
      if (jQuery('#form13 .wdform_section').length > 0) {
        formOnload(13);
      }
      var ajaxObj13 = {};
      var value_ids13 = {};
      jQuery.each( jQuery.parseJSON( inputIds13 ), function( key, values ) {
        jQuery.each( values, function( index, input_id ) {
          tagName =  jQuery('#form13 [id^="wdform_'+ input_id +'_elemen"]').attr("tagName");
          type =  jQuery('#form13 [id^="wdform_'+ input_id +'_elemen"]').attr("type");
          if ( tagName == 'INPUT' ) {
            input_value = jQuery('#form13 [id^="wdform_'+ input_id +'_elemen"]').val();
            if ( jQuery('#form13 [id^="wdform_'+ input_id +'_elemen"]').is(':checked') ) {
              if ( input_value ) {
                value_ids13[key + '|' + input_id] = input_value;
              }
            }
            else if ( type == 'text' ) {
              if ( input_value ) {
                value_ids13[key + '|' + input_id] = input_value;
              }
            }
          }
          else if ( tagName == 'SELECT' ) {
            select_value = jQuery('#form13 [id^="wdform_'+ input_id +'_elemen"] option:selected').val();
            if ( select_value ) {
              value_ids13[key + '|' + input_id] = select_value;
            }
          }
          ajaxObj13.inputs = value_ids13;
          jQuery(document).on('change', '#form13 [id^="wdform_'+ input_id +'_elemen"]', function() {
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
          value_ids13[key + '|' + input_id] = id;
          jQuery.each( value_ids13, function( k, v ) {
            key_arr = k.split('|');
            if ( input_id == key_arr[2] ) {
              changing_field_id = key_arr[0];
              count = Object.keys(value_ids13).length;
              value_ids13 = unset_fields13( value_ids13, changing_field_id, count );
            }
          });
          ajaxObj13.inputs = value_ids13;
          ajax_similarity13( ajaxObj13, changing_field_id );
          });
        });
      });
      if ( update_first_field_id13 && !jQuery.isEmptyObject(ajaxObj13.inputs) ) {
        ajax_similarity13( ajaxObj13, update_first_field_id13 );
      }
      form_load_actions();
      	  }
    jQuery(function () {
      fm_script_ready13();
    });
        