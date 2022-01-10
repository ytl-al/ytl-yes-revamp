(function(){

    var serviceNamespace = abp.utils.createNamespace(abp, 'services.app.session');

    serviceNamespace.getCurrentLoginInformations = function(ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/session/GetCurrentLoginInformations',
            type: 'POST',
            data: JSON.stringify({})
        }, ajaxParams));
    };


})();


(function(){

    var serviceNamespace = abp.utils.createNamespace(abp, 'services.app.user');

    serviceNamespace.getRoles = function(ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/user/GetRoles',
            type: 'POST',
            data: JSON.stringify({})
        }, ajaxParams));
    };

    serviceNamespace.getAllUsers = function(ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/user/GetAllUsers',
            type: 'POST',
            data: JSON.stringify({})
        }, ajaxParams));
    };

    serviceNamespace.get = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/user/Get',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.getAll = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/user/GetAll',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.create = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/user/Create',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.update = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/user/Update',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace['delete'] = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/user/Delete',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };


})();


(function(){

    var serviceNamespace = abp.utils.createNamespace(abp, 'services.app.role');

    serviceNamespace.getAllPermissions = function(ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/role/GetAllPermissions',
            type: 'POST',
            data: JSON.stringify({})
        }, ajaxParams));
    };

    serviceNamespace.getAllRoles = function(ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/role/GetAllRoles',
            type: 'POST',
            data: JSON.stringify({})
        }, ajaxParams));
    };

    serviceNamespace.get = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/role/Get',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.getAll = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/role/GetAll',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.create = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/role/Create',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.update = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/role/Update',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace['delete'] = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/role/Delete',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };


})();


(function(){

    var serviceNamespace = abp.utils.createNamespace(abp, 'services.app.registration');

    serviceNamespace.register = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/registration/Register',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.get = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/registration/Get',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.getAll = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/registration/GetAll',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.create = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/registration/Create',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.update = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/registration/Update',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace['delete'] = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/registration/Delete',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };


})();


(function(){

    var serviceNamespace = abp.utils.createNamespace(abp, 'services.app.postcode');

    serviceNamespace.getAll = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/postcode/GetAll',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.get = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/postcode/Get',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.getAllPublic = function(authcode, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/postcode/GetAllPublic' + abp.utils.buildQueryString([{ name: 'authcode', value: authcode }]) + '',
            type: 'POST',
            data: JSON.stringify({})
        }, ajaxParams));
    };

    serviceNamespace.create = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/postcode/Create',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.update = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/postcode/Update',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace['delete'] = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/postcode/Delete',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };


})();


(function(){

    var serviceNamespace = abp.utils.createNamespace(abp, 'services.app.plan');

    serviceNamespace.getAll = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/plan/GetAll',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.get = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/plan/Get',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.create = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/plan/Create',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.update = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/plan/Update',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace['delete'] = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/plan/Delete',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };


})();


(function(){

    var serviceNamespace = abp.utils.createNamespace(abp, 'services.app.tenant');

    serviceNamespace.get = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/tenant/Get',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.getAll = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/tenant/GetAll',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.create = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/tenant/Create',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.update = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/tenant/Update',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace['delete'] = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/tenant/Delete',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };


})();


(function(){

    var serviceNamespace = abp.utils.createNamespace(abp, 'services.app.configuration');

    serviceNamespace.changeUiTheme = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/configuration/ChangeUiTheme',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };


})();


(function(){

    var serviceNamespace = abp.utils.createNamespace(abp, 'services.app.account');

    serviceNamespace.isTenantAvailable = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/account/IsTenantAvailable',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.register = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/account/Register',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };


})();


(function(){

    var serviceNamespace = abp.utils.createNamespace(abp, 'services.app.inventory');

    serviceNamespace.addInventory = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/inventory/AddInventory',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.get = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/inventory/Get',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.getAll = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/inventory/GetAll',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.create = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/inventory/Create',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.update = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/inventory/Update',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace['delete'] = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/inventory/Delete',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };


})();


(function(){

    var serviceNamespace = abp.utils.createNamespace(abp, 'services.app.dealer');

    serviceNamespace.getAll = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/dealer/GetAll',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.get = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/dealer/Get',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.create = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/dealer/Create',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace.update = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/dealer/Update',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };

    serviceNamespace['delete'] = function(input, ajaxParams) {
        return abp.ajax($.extend({
            url: abp.appPath + 'api/services/app/dealer/Delete',
            type: 'POST',
            data: JSON.stringify(input)
        }, ajaxParams));
    };


})();


