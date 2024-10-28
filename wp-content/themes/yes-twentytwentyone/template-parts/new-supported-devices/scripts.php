
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        const apiEndpointURL = window.location.origin + '/wp-json/ywos/v1';
        var pageDelivery = new Vue({
            el: '#main-app',
            data: {
                apiLocale: 'EN',
                devices: [],
                brands: [],
                currentPage: 1,
                totalPages: 1,
                perPage: 3,
                selectedBrands: [],
                selectedNetworks: [],
                selectedSequences: [],
                networks: [],
                sequences: [],
                searchQuery: '' ,
                deviceSection:false,
                brandsSection:false,
            },
            mounted: function() {},
            created: function() {
                this.pageInit();
                setTimeout(function() {
                    toggleOverlay(true);
                }, 500);
  
            },
            methods: {
                // Initialize the page
                pageInit: function() {
                    this.fetchSupportedBrands();
                    this.fetchSupportedDevices();
                },

                // Fetch supported brands from the API
                fetchSupportedBrands: function() {
                    var self = this;
                    toggleOverlay(true);
                    const url = `${yes.apiUrlName}${yes.apiBrandlistEndpoint}`;
                    axios({
                        method: 'get',
                        url: url,
                        headers: {
                            [yes.apiKey]: yes.apiValue
                        }
                    })
                        .then((response) => {
                            self.brands = response.data;
                            self.brandsSection=true;
                            toggleOverlay(false);
                        })
                        .catch((error) => {

                        });
                },

                


                fetchSupportedDevices: function(page = 1, filters = {}) {
                    var self = this;
                    toggleOverlay(true);
                    if (filters.brand === 'All') {
                        page = 1;
                    }
                     filters.page=page;
                    //  filters.order = order;
                    const queryParams = Object.keys(filters)
                    .filter(key => filters[key] !== '' && filters[key] !== 'All')
                        .map(key => `${encodeURIComponent(key)}=${encodeURIComponent(filters[key])}`)
                        .join('&');

                    const url = `${yes.apiUrlName}${yes.apiDevicelistEndpoint}?${queryParams}`;
                    axios({
                        method: 'get',
                        url: url,
                        headers: {
                            [yes.apiKey]: yes.apiValue
                        }
                    })
                    .then(response => {
                        self.deviceSection = true;
                        toggleOverlay(false);
                        if (page === 1) {
                            self.devices = response.data.data;
                        } else {
                            self.devices = [...self.devices, ...response.data.data];
                        }
                        self.currentPage = response.data.current_page;
                        self.totalPages = response.data.last_page;
                    })
                    .catch(error => {
                        toggleOverlay(false);
                        // Handle the error appropriately
                        console.error(error);
                    });
                },

                  
 
 
 
 
              // Load more devices
              loadMoreDevices: function() {
                  var self = this;
                  if (self.currentPage < self.totalPages) {
                      self.fetchSupportedDevices(self.currentPage + 1, {
                          brand: self.selectedBrands.join(','),
                          device_supports: self.selectedNetworks.join(','),
                          order: self.selectedSequences[0] || '',
                      });
                  }
              },
 
               // Method to perform search action
               performSearch: function() {
                  var self = this;
                  self.searchQuery = document.getElementById('search').value;
                  self.updateDevices();
                  self.scrollToTop(); 
              },
 
 
              onBrandChange(event) {
                  var self = this;
                  const brand = event.target.value;
                  self.searchQuery = '';
                  if (brand === 'All' && event.target.checked) {
                      self.selectedBrands = ['All'];
                      document.querySelectorAll('.brand-checkbox').forEach(checkbox => {
                          if (checkbox.value !== 'All') {
                              checkbox.checked = false;
                          }
                      });
                  } else if (brand !== 'All' && event.target.checked) {
                      self.selectedBrands = self.selectedBrands.filter(b => b !== 'All');
                      self.selectedBrands.push(brand);
                      document.getElementById('All').checked = false;
                  } else {
                      const index = self.selectedBrands.indexOf(brand);
                      if (index > -1) {
                          self.selectedBrands.splice(index, 1);
                      }
                  }
                  self.scrollToTop(); 
                  self.updateDevices();
              },
 
              onNetworkChange(event) {
                  var self = this;
                  const network = event.target.value;
                  self.searchQuery = '';
                  if (network === 'All' && event.target.checked) {
                      self.selectedNetworks = ['All'];
                      document.querySelectorAll('.network-checkbox').forEach(checkbox => {
                          if (checkbox.value !== 'All') {
                              checkbox.checked = false;
                          }
                      });
                  } else if (network !== 'All' && event.target.checked) {
                      self.selectedNetworks = self.selectedNetworks.filter(n => n !== 'All');
                      self.selectedNetworks.push(network);
                      document.getElementById('AllNetwork').checked = false; // Ensure the 'All' network checkbox is unchecked
                  } else {
                      const index = self.selectedNetworks.indexOf(network);
                      if (index > -1) {
                          self.selectedNetworks.splice(index, 1);
                      }
                  }
 
                  self.scrollToTop(); 
                  self.updateDevices();
              },
 
 
              onSequenceChange(event) {
                  var self = this;
                  self.searchQuery = '';
                  const sequence = event.target.value;
                  if (event.target.checked) {
                      self.selectedSequences = [sequence];
                  } else {
                      self.selectedSequences = [];
                  }
                  self.scrollToTop(); 
                  self.updateDevices();
              },
 
    
 
              updateDevices() {
                  var self = this;
                  var currentPage = self.currentPage;
                  var currentDevices = self.devices;
                  // self.devices = [];
                  self.fetchSupportedDevices(currentPage, {
                      brand: self.selectedBrands.join(','),
                      device_supports: self.selectedNetworks.join(','),
                      order: self.selectedSequences[0] || '',
                      device_name: self.searchQuery
                  });
                  setTimeout(function() {
                      if (self.devices.length === 0 && currentDevices.length > 0) {
                          self.devices = currentDevices;
                      }
                  }, 500);
              },
 

               // Fetch supported devices from the API 
                scrollToTop() {
                    var self = this;
                    if (self.$refs.cardContainer) {
                        self.$refs.cardContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }

            }
        });
        $(".filter").click(function() {           
            $("#filter-section").toggle();
        });
        $(".cancel-btn").click(function() {
            $("#filter-section").hide();
        });
        $(".search").click(function() {
            $(".device_cat_search").toggle();
        });
    });
</script>


<script>
/* it seems javascript..*/
var topLimit = $('#bar-fixed').offset().top;
$(window).scroll(function() {
  //console.log(topLimit <= $(window).scrollTop())
  if (topLimit <= $(window).scrollTop()) {
    $('#bar-fixed').addClass('stickIt')
  } else {
    $('#bar-fixed').removeClass('stickIt')
  }
})
</script>