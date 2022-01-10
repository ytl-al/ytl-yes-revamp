(function(abp){

    abp.multiTenancy = abp.multiTenancy || {};
    abp.multiTenancy.isEnabled = true;

})(abp);

(function(){

    abp.session = abp.session || {};
    abp.session.userId = null;
    abp.session.tenantId = null;
    abp.session.impersonatorUserId = null;
    abp.session.impersonatorTenantId = null;
    abp.session.multiTenancySide = 2;

})();

(function(){

    abp.localization = abp.localization || {};

    abp.localization.currentCulture = {
        name: 'es',
        displayName: 'Spanish'
    };

    abp.localization.languages = [{
        name: 'ms',
        displayName: 'Bahasa',
        icon: 'famfamfam-flags my',
        isDisabled: false,
        isDefault: true
    } , {
        name: 'en',
        displayName: 'English',
        icon: 'famfamfam-flags gb',
        isDisabled: false,
        isDefault: false
    }];

    abp.localization.currentLanguage = {
        name: 'ms',
        displayName: 'Bahasa',
        icon: 'famfamfam-flags my',
        isDisabled: false,
        isDefault: true
    };

    abp.localization.sources = [
        {
            name: 'Abp',
            type: 'MultiTenantLocalizationSource'
        },
        {
            name: 'AbpWeb',
            type: 'MultiTenantLocalizationSource'
        },
        {
            name: 'AbpZero',
            type: 'MultiTenantLocalizationSource'
        },
        {
            name: 'My5G',
            type: 'MultiTenantLocalizationSource'
        }
    ];

    abp.localization.values = abp.localization.values || {};

    abp.localization.values['Abp'] = {};

    abp.localization.values['AbpWeb'] = {};

    abp.localization.values['AbpZero'] = {};

    abp.localization.values['My5G'] = {
  "About": "About",
  "AcceptTerms": "Anda perlu menerima terma dan syarat untuk meneruskan",
  "Actions": "Actions",
  "AddressLine1": "Nombor Rumah dan Nama Jalan",
  "AddressLine2": "Kampung/Taman",
  "AddressMyKad": "Alamat seperti di dalam MyKad",
  "AddressRequired": "Sila masukkan  Alamat Baris 1",
  "AdminEmailAddress": "Admin email address",
  "Approved": "Diluluskan",
  "Back": "Back",
  "CanBeEmptyToLoginAsHost": "Can be empty to login as host.",
  "Cancel": "Cancel",
  "Change": "Change",
  "ChangeTenant": "Change tenant",
  "Check": "Hantar",
  "CheckEligibility": "Semak Kelayakan",
  "CheckInformation": "Semak Maklumat",
  "CheckPay": "Semak dan Bayar",
  "City": "Bandar",
  "CityRequired": "Sila masukkan Bandar",
  "ClaimYourSubsidyNow": "Tebus subsidi anda sekarang",
  "CollectData": "Saya juga bersetuju dan memberi kebenaran kepada YTL Communications Sdn Bhd (dan sekutunya) untuk  mengumpul, merakam, memegang, menyimpan dan memproses data peribadi saya bagi tujuan memproses pendaftaran dan langgangan saya untuk Perkhidmatan YES. Saya mengesahkan bahawa telah membaca dan bersetuju dengen terma dasar privasi YTL Group yang disediakan di https://www.ytl.com/privacypolicy.asp.",
  "ComeBackLater": "Sila datang kembali pada 5 Mei 2021 untuk menebus telefon dengan data percuma.",
  "ConfirmEmailAdress": "Sahkan Alamat Emel",
  "ConfirmEmailAdressWithMessage": "Sahkan Alamat Emel (untuk penghantaran ID Login dan Kata Laluan) ",
  "Consent": "\r\n      Persetujuan\r\n    ",
  "ConsentToApply": "\r\n      Saya mengesahkan bahawa saya berhasrat untuk membuat pra-pendaftaran untuk pelan Yes Prihatin Belajar Dari Rumah. Saya memberi kebenaran kepada YES untuk mendaftar saya untuk pelan tersebut menggunakan subsidi Jaringan Prihatin. Saya dengan ini mengakui bahawa maklumat yang diberikan di atas adalah benar.\r\n    ",
  "Country": "Negara",
  "CountryRequired": "Sila masukkan Negara",
  "CreateNewRole": "Create New Role",
  "CreateNewTenant": "Create new tenant",
  "CreateNewUser": "Create new user",
  "CurrentTenant": "Current tenant",
  "DatabaseConnectionString": "Database connection string",
  "DealerCode": "Kod Peniaga",
  "Declined": "Permohonan Ditolak",
  "DefaultPasswordIs": "Default password is {0}",
  "DeiveryAddress": "Alamat penghantaran",
  "DeiveryAddressCannotBeChanged": "Alamat penghantaran tidak boleh diubah selepas permohanan dihantar.",
  "Delete": "Delete",
  "DeliveryInformation": "Maklumat Penghantaran",
  "DeliveryNotice": "(untuk pengesahan dan penghantaran)",
  "DisplayName": "Display Name",
  "DOB": "Tarikh Lahir (DD/MM/YYYY)",
  "Edit": "Edit",
  "EditRole": "Edit Role",
  "EditUser": "Edit User",
  "EmailAddress": "Email address",
  "EmailAdress": "Alamat Emel",
  "EmailAdressWithMessage": "Emel (untuk menghantar nombor telefon YES dan Kata Laluan)",
  "EmailRequired": "Sila masukkan Alamat e-mel yang sah",
  "EnterNRIC": "Sila masukkan nombor MyKad Pengenalan yang sah",
  "ErrorAlreadySigned": "Maaf, nombor MyKad/NRIC tersebut telah pun didaftarkan",
  "ExistingCustomer": "Pelanggan yang sedia ada",
  "ExistingCustomerMessage": "Daftar melalui Aplikasi MyYes untuk pengalaman pendaftaran yang lancar",
  "Female": "Perempuan",
  "FormIsNotValidMessage": "Form is not valid. Please check and fix errors.",
  "FullName": "Full name",
  "FullNameMyKad": "Nama Penuh seperti di dalam MyKad",
  "FullnameRequired": "Sila masukkan Nama Penuh",
  "Gender": "Jantina",
  "GenericTerms": "\r\n      Saya mengakui bahawa maklumat yang diberikan di atas adalah benar dan betul. Saya ingin mendaftar untuk pelan mengikut Terma dan Syarat Pelan Perkhidmatan YES 5G dan Terma dan Syarat Program yang terdapat di https://www.yes.my/tnc/products-services-tnc dan https://www.yes.my/tnc/ongoing-campaigns-tnc.\r\n    ",
  "HomePage": "Home page",
  "HouseNo": "Nombor Rumah, Nama Jalan dan Kampung/Taman",
  "InvalidUserNameOrPassword": "Invalid user name or password",
  "IsActive": "Is active",
  "LaunchApp": "Lancarkan Aplikasi MyYes",
  "LeaveEmptyToSwitchToHost": "Leave empty to switch to the host",
  "LogIn": "Log in",
  "LoginFailed": "Login failed!",
  "Logout": "Logout",
  "MakePayment": "BAYAR",
  "Male": "Lelaki",
  "MobileNo": "Nombor Telefon ",
  "MobileRequired": "Sila masukkan Nombor telefon mudah alih yang sah",
  "MultiLevelMenu": "Multi Level Menu",
  "Name": "Name",
  "NameSurname": "Name surname",
  "Next": "SETERUSNYA",
  "No": "No",
  "NotSelected": "Not selected",
  "NRIC": "MyKad/NRIC",
  "NRICLengthError": "Panjang MyKad Pengenalan ialah 12 angka",
  "Optional": "Optional",
  "OrLoginWith": "Or login with",
  "ParentFullNameMyKad": "Nama Penuh Ibu/bapa (seperti MyKad/NRIC)",
  "ParentNRIC": "Nombor MyKad Ibu/bapa",
  "Password": "Password",
  "Pending": "Belum Selesai",
  "PersonalInformation": "Maklumat Peribadi",
  "PlanDetails": "Butiran Pelan",
  "PlanPreference": "Keutamaan Rancangan",
  "PleaseEnterLoginInformation": "Please enter login information",
  "Postcode": "Poskod",
  "PostcodeRequired": "Sila masukkan  Poskod",
  "Previous": "KEMBALI",
  "ReferralCode": "Kod Rujukan",
  "Register": "Register",
  "Registered": "Existing Registration",
  "RegisterFormUserNameInvalidMessage": "Please dont enter an email address for username.",
  "Registering": "Mendaftar...",
  "RegistrationForm": "Registration Form",
  "RegistrationSuccess": "Anda telah mendaftar awal untuk Jaringan Prihatin. Kami akan terus berhubung",
  "RememberMe": "Remember me",
  "RoleName": "Role Name",
  "Roles": "Roles",
  "Salutation": "Gelaran",
  "Save": "Save",
  "SavedSuccessfully": "Saved successfully",
  "SchoolName": "Nama Sekolah",
  "State": "Negeri",
  "StateRequired": "Sila masukkan Negeri",
  "StudentFullname": "Nama Penuh Murid (seperti MyKad/NRIC)",
  "StudentInformation": "Maklumat Murid",
  "StudentNRIC": "Nombor MyKad Murid",
  "Submit": "HANTAR",
  "SuccessfullyRegistered": "Successfully registered",
  "Surname": "Surname",
  "TenancyName": "Tenancy name",
  "TenantIsNotActive": "Tenant {0} is not active.",
  "TenantName_Regex_Description": "Tenant name must be at least 2 chars, starts with a letter and continue with letter, number, dash or underscore.",
  "TenantNameCanNotBeEmpty": "Tenant name can not be empty",
  "Tenants": "Tenants",
  "TenantSelection": "Tenant Selection",
  "TenantSelection_Detail": "Please select one of the following tenants.",
  "Terms": "Saya bersetuju bahawa saya layak dan ingin mendaftar mengikut Terma dan Syarat yang dikenakan di yes.my/tnc.",
  "TermsAndConditions": "Terma Dan Syarat",
  "ThereIsNoTenantDefinedWithName{0}": "There is no tenant defined with name {0}",
  "UserEmailIsNotConfirmedAndCanNotLogin": "Your email address is not confirmed. You can not login",
  "UserIsNotActiveAndCanNotLogin": "User {0} is not active and can not log in.",
  "UserLockedOutMessage": "The user account has been locked out. Please try again later.",
  "UserName": "User name",
  "UserNameOrEmail": "User name or email",
  "Users": "Users",
  "WaitingForActivationMessage": "Your account is waiting to be activated by system admin.",
  "WaitingForEmailActivation": "Your email address should be activated",
  "WelcomeTo": "Selamat datang ke",
  "WellcomeMessage": "Welcome to pproxy!",
  "Yes": "Yes"
};


})();

(function() {

    abp.features = abp.features || {};

    abp.features.allFeatures = {
    };

})();

(function(){

    abp.auth = abp.auth || {};

    abp.auth.allPermissions = {
        'Pages.Users': true,
        'Pages.Roles': true,
        'Pages.Tenants': true
    };

    abp.auth.grantedPermissions = {
    };

})();

(function() {
    abp.nav = {};
    abp.nav.menus = {
        'MainMenu': {
            name: 'MainMenu',
            displayName: '[Main menu]',
            items: [{
                    name: 'Plans',
                    order: 0,
                    icon: 'info',
                    url: 'Plans',
                    displayName: '[Plans]',
                    isEnabled: true,
                    isVisible: true,
                    items: []
                } , {
                    name: 'Dealers',
                    order: 0,
                    icon: 'info',
                    url: 'Dealers',
                    displayName: '[Dealers]',
                    isEnabled: true,
                    isVisible: true,
                    items: []
                } , {
                    name: 'Inventory',
                    order: 0,
                    icon: 'info',
                    url: 'Inventory',
                    displayName: '[Inventory]',
                    isEnabled: true,
                    isVisible: true,
                    items: []
                }]
            }
    };
})();


(function(){
    abp.setting = abp.setting || {};
    abp.setting.values = {

        'Abp.Localization.DefaultLanguageName': 'ms',
        'Abp.Notifications.ReceiveNotifications': 'true',
        'Abp.Timing.TimeZone': 'UTC',
        'Abp.Zero.UserManagement.IsEmailConfirmationRequiredForLogin': 'false',
        'Abp.Zero.OrganizationUnits.MaxUserMembershipCount': '2147483647',
        'Abp.Zero.UserManagement.TwoFactorLogin.IsEnabled': 'true',
        'Abp.Zero.UserManagement.TwoFactorLogin.IsRememberBrowserEnabled': 'true',
        'Abp.Zero.UserManagement.TwoFactorLogin.IsEmailProviderEnabled': 'true',
        'Abp.Zero.UserManagement.TwoFactorLogin.IsSmsProviderEnabled': 'true',
        'Abp.Zero.UserManagement.UserLockOut.IsEnabled': 'true',
        'Abp.Zero.UserManagement.UserLockOut.MaxFailedAccessAttemptsBeforeLockout': '5',
        'Abp.Zero.UserManagement.UserLockOut.DefaultAccountLockoutSeconds': '300',
        'Abp.Zero.UserManagement.PasswordComplexity.RequireDigit': 'false',
        'Abp.Zero.UserManagement.PasswordComplexity.RequireLowercase': 'false',
        'Abp.Zero.UserManagement.PasswordComplexity.RequireNonAlphanumeric': 'false',
        'Abp.Zero.UserManagement.PasswordComplexity.RequireUppercase': 'false',
        'Abp.Zero.UserManagement.PasswordComplexity.RequiredLength': '3',
        'App.UiTheme': 'red'
    };

})();

(function(){
    abp.clock.provider = abp.timing.unspecifiedClockProvider || abp.timing.localClockProvider;
    abp.clock.provider.supportsMultipleTimezone = false;
})();

(function(){
    abp.security.antiForgery.tokenCookieName = 'XSRF-TOKEN';
    abp.security.antiForgery.tokenHeaderName = 'X-XSRF-TOKEN';
})();

(function(){
    abp.event.trigger('abp.dynamicScriptsInitialized');
})();
