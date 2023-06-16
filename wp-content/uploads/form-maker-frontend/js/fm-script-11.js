    var fm_currentDate = new Date();
    var FormCurrency_11 = '$';
    var FormPaypalTax_11 = '0';
    var check_submit11 = 0;
    var check_before_submit11 = {};
    var required_fields11 = ["2","3"];
    var labels_and_ids11 = {"2":"type_submitter_mail","3":"type_radio","4":"type_submit_reset"};
    var check_regExp_all11 = [];
    var check_paypal_price_min_max11 = [];
    var file_upload_check11 = [];
    var spinner_check11 = [];
    var scrollbox_trigger_point11 = '20';
    var header_image_animation11 = 'none';
    var scrollbox_loading_delay11 = '0';
    var scrollbox_auto_hide11 = '1';
    var inputIds11 = '[]';
        var update_first_field_id11 = 0;
    var form_view_count11 = 0;
    // Occurs before the form is loaded
function before_load11() {

}

// Occurs just before submitting  the form
function before_submit11() {
  // IMPORTANT! If you want to interrupt (stop) the submitting of the form, this function should return true. You don't need to return any value if you don't want to stop the submission.
  
  $('input[name="fm_current_post_type6"]').val('page');
}

// Occurs just before resetting the form
function before_reset11() {

}
// Occurs after form is submitted and reloaded
function after_submit11() {

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


    function onload_js11() {    }

    function condition_js11() {    }

    function check_js11(id, form_id) {
      if (id != 0) {
        x = jQuery("#" + form_id + "form_view"+id);
      }
      else {
        x = jQuery("#form"+form_id);
      }
          }

    function onsubmit_js11() {
      
  jQuery("<input type=\"hidden\" name=\"wdform_3_allow_other11\" value=\"no\" />").appendTo("#form11");
  jQuery("<input type=\"hidden\" name=\"wdform_3_allow_other_num11\" value=\"0\" />").appendTo("#form11");
    var disabled_fields = "";
    jQuery("#form11 div[wdid]").each(function() {
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
      jQuery("<input type=\"hidden\" name=\"disabled_fields11\" value =\""+disabled_fields+"\" />").appendTo("#form11");
    };    }

    function unset_fields11( values, id, i ) {
      rid = 0;
      if ( i > 0 ) {
        jQuery.each( values, function( k, v ) {
          if ( id == k.split('|')[2] ) {
            rid = k.split('|')[0];
            values[k] = '';
          }
        });
        return unset_fields11(values, rid, i - 1);
      }
      else {
        return values;
      }
    }

    function ajax_similarity11( obj, changing_field_id ) {
      jQuery.ajax({
        type: "POST",
        url: fm_objectL10n.form_maker_admin_ajax,
        dataType: "json",
        data: {
          nonce: fm_ajax.ajaxnonce,
          action: 'fm_reload_input',
          page: 'form_maker',
          form_id: 11,
          inputs: obj.inputs
        },
        beforeSend: function() {
          if ( !jQuery.isEmptyObject(obj.inputs) ) {
            jQuery.each( obj.inputs, function( key, val ) {
              wdid = key.split('|')[0];
              if ( val != '' && parseInt(wdid) == parseInt(changing_field_id) ) {
                jQuery("#form11 div[wdid='"+ wdid +"']").append( '<div class="fm-loading"></div>' );
              }
            });
          }
        },
        success: function (res) {
          if ( !jQuery.isEmptyObject(obj.inputs) ) {
            jQuery.each( obj.inputs, function( key, val ) {
              wdid = key.split('|')[0];
              jQuery("#form11 div[wdid='"+ wdid +"'] .fm-loading").remove();
              if ( !jQuery.isEmptyObject(res[wdid]) && ( !val || parseInt(wdid) == parseInt(changing_field_id) ) ) {
                jQuery("#form11 div[wdid='"+ wdid +"']").html( res[wdid].html );
              }
            });
          }
        },
        complete: function() {
        }
      });
    }

    function fm_script_ready11() {
      if (jQuery('#form11 .wdform_section').length > 0) {
        fm_document_ready( 11 );
      }
      else {
        jQuery("#form11").closest(".fm-form-container").removeAttr("style")
      }
      if (jQuery('#form11 .wdform_section').length > 0) {
        formOnload(11);
      }
      var ajaxObj11 = {};
      var value_ids11 = {};
      jQuery.each( jQuery.parseJSON( inputIds11 ), function( key, values ) {
        jQuery.each( values, function( index, input_id ) {
          tagName =  jQuery('#form11 [id^="wdform_'+ input_id +'_elemen"]').attr("tagName");
          type =  jQuery('#form11 [id^="wdform_'+ input_id +'_elemen"]').attr("type");
          if ( tagName == 'INPUT' ) {
            input_value = jQuery('#form11 [id^="wdform_'+ input_id +'_elemen"]').val();
            if ( jQuery('#form11 [id^="wdform_'+ input_id +'_elemen"]').is(':checked') ) {
              if ( input_value ) {
                value_ids11[key + '|' + input_id] = input_value;
              }
            }
            else if ( type == 'text' ) {
              if ( input_value ) {
                value_ids11[key + '|' + input_id] = input_value;
              }
            }
          }
          else if ( tagName == 'SELECT' ) {
            select_value = jQuery('#form11 [id^="wdform_'+ input_id +'_elemen"] option:selected').val();
            if ( select_value ) {
              value_ids11[key + '|' + input_id] = select_value;
            }
          }
          ajaxObj11.inputs = value_ids11;
          jQuery(document).on('change', '#form11 [id^="wdform_'+ input_id +'_elemen"]', function() {
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
          value_ids11[key + '|' + input_id] = id;
          jQuery.each( value_ids11, function( k, v ) {
            key_arr = k.split('|');
            if ( input_id == key_arr[2] ) {
              changing_field_id = key_arr[0];
              count = Object.keys(value_ids11).length;
              value_ids11 = unset_fields11( value_ids11, changing_field_id, count );
            }
          });
          ajaxObj11.inputs = value_ids11;
          ajax_similarity11( ajaxObj11, changing_field_id );
          });
        });
      });
      if ( update_first_field_id11 && !jQuery.isEmptyObject(ajaxObj11.inputs) ) {
        ajax_similarity11( ajaxObj11, update_first_field_id11 );
      }
      form_load_actions();
      	  }
    jQuery(function () {
      fm_script_ready11();
    });
        