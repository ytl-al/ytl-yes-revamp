    var fm_currentDate = new Date();
    var FormCurrency_10 = '$';
    var FormPaypalTax_10 = '0';
    var check_submit10 = 0;
    var check_before_submit10 = {};
    var required_fields10 = ["2"];
    var labels_and_ids10 = {"2":"type_submitter_mail","3":"type_hidden","4":"type_submit_reset"};
    var check_regExp_all10 = [];
    var check_paypal_price_min_max10 = [];
    var file_upload_check10 = [];
    var spinner_check10 = [];
    var scrollbox_trigger_point10 = '20';
    var header_image_animation10 = 'none';
    var scrollbox_loading_delay10 = '0';
    var scrollbox_auto_hide10 = '1';
    var inputIds10 = '[]';
        var update_first_field_id10 = 0;
    var form_view_count10 = 0;
    // Occurs before the form is loaded
function before_load10() {

}

// Occurs just before submitting  the form
function before_submit10() {
  // IMPORTANT! If you want to interrupt (stop) the submitting of the form, this function should return true. You don't need to return any value if you don't want to stop the submission.
}

// Occurs just before resetting the form
function before_reset10() {

}
// Occurs after form is submitted and reloaded
function after_submit10() {
  $('.layer-form').hide();
  setTimeout(function() {
    location.reload();
  }
             , 2000);
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


    function onload_js10() {    }

    function condition_js10() {    }

    function check_js10(id, form_id) {
      if (id != 0) {
        x = jQuery("#" + form_id + "form_view"+id);
      }
      else {
        x = jQuery("#form"+form_id);
      }
          }

    function onsubmit_js10() {
      
    var disabled_fields = "";
    jQuery("#form10 div[wdid]").each(function() {
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
      jQuery("<input type=\"hidden\" name=\"disabled_fields10\" value =\""+disabled_fields+"\" />").appendTo("#form10");
    };    }

    function unset_fields10( values, id, i ) {
      rid = 0;
      if ( i > 0 ) {
        jQuery.each( values, function( k, v ) {
          if ( id == k.split('|')[2] ) {
            rid = k.split('|')[0];
            values[k] = '';
          }
        });
        return unset_fields10(values, rid, i - 1);
      }
      else {
        return values;
      }
    }

    function ajax_similarity10( obj, changing_field_id ) {
      jQuery.ajax({
        type: "POST",
        url: fm_objectL10n.form_maker_admin_ajax,
        dataType: "json",
        data: {
          nonce: fm_ajax.ajaxnonce,
          action: 'fm_reload_input',
          page: 'form_maker',
          form_id: 10,
          inputs: obj.inputs
        },
        beforeSend: function() {
          if ( !jQuery.isEmptyObject(obj.inputs) ) {
            jQuery.each( obj.inputs, function( key, val ) {
              wdid = key.split('|')[0];
              if ( val != '' && parseInt(wdid) == parseInt(changing_field_id) ) {
                jQuery("#form10 div[wdid='"+ wdid +"']").append( '<div class="fm-loading"></div>' );
              }
            });
          }
        },
        success: function (res) {
          if ( !jQuery.isEmptyObject(obj.inputs) ) {
            jQuery.each( obj.inputs, function( key, val ) {
              wdid = key.split('|')[0];
              jQuery("#form10 div[wdid='"+ wdid +"'] .fm-loading").remove();
              if ( !jQuery.isEmptyObject(res[wdid]) && ( !val || parseInt(wdid) == parseInt(changing_field_id) ) ) {
                jQuery("#form10 div[wdid='"+ wdid +"']").html( res[wdid].html );
              }
            });
          }
        },
        complete: function() {
        }
      });
    }

    function fm_script_ready10() {
      if (jQuery('#form10 .wdform_section').length > 0) {
        fm_document_ready( 10 );
      }
      else {
        jQuery("#form10").closest(".fm-form-container").removeAttr("style")
      }
      if (jQuery('#form10 .wdform_section').length > 0) {
        formOnload(10);
      }
      var ajaxObj10 = {};
      var value_ids10 = {};
      jQuery.each( jQuery.parseJSON( inputIds10 ), function( key, values ) {
        jQuery.each( values, function( index, input_id ) {
          tagName =  jQuery('#form10 [id^="wdform_'+ input_id +'_elemen"]').attr("tagName");
          type =  jQuery('#form10 [id^="wdform_'+ input_id +'_elemen"]').attr("type");
          if ( tagName == 'INPUT' ) {
            input_value = jQuery('#form10 [id^="wdform_'+ input_id +'_elemen"]').val();
            if ( jQuery('#form10 [id^="wdform_'+ input_id +'_elemen"]').is(':checked') ) {
              if ( input_value ) {
                value_ids10[key + '|' + input_id] = input_value;
              }
            }
            else if ( type == 'text' ) {
              if ( input_value ) {
                value_ids10[key + '|' + input_id] = input_value;
              }
            }
          }
          else if ( tagName == 'SELECT' ) {
            select_value = jQuery('#form10 [id^="wdform_'+ input_id +'_elemen"] option:selected').val();
            if ( select_value ) {
              value_ids10[key + '|' + input_id] = select_value;
            }
          }
          ajaxObj10.inputs = value_ids10;
          jQuery(document).on('change', '#form10 [id^="wdform_'+ input_id +'_elemen"]', function() {
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
          value_ids10[key + '|' + input_id] = id;
          jQuery.each( value_ids10, function( k, v ) {
            key_arr = k.split('|');
            if ( input_id == key_arr[2] ) {
              changing_field_id = key_arr[0];
              count = Object.keys(value_ids10).length;
              value_ids10 = unset_fields10( value_ids10, changing_field_id, count );
            }
          });
          ajaxObj10.inputs = value_ids10;
          ajax_similarity10( ajaxObj10, changing_field_id );
          });
        });
      });
      if ( update_first_field_id10 && !jQuery.isEmptyObject(ajaxObj10.inputs) ) {
        ajax_similarity10( ajaxObj10, update_first_field_id10 );
      }
      form_load_actions();
      	  }
    jQuery(function () {
      fm_script_ready10();
    });
        