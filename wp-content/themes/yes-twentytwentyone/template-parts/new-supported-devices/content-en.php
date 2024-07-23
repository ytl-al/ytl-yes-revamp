<?php get_template_part('template-parts/new-supported-devices/styles'); ?>

<!-- Hero Section -->
<!-- Slider Start -->
<section class="hero-slider-section">
    <div class="hero-slider slider">
        <div>
            <img src="https://cdn.yes.my/site/wp-content/uploads/2024/05/superjimat-power35webbanner-mayupdate-desktop-scaled.webp" class="w-100 d-none d-lg-block" alt="...">
            <img src="https://cdn.yes.my/site/wp-content/uploads/2024/05/superjimat-power35webbanner-mayupdate-mobile.webp" class="w-100 d-block d-md-block d-lg-none" alt="...">

            <div class="inner-content-sec">
                <h1 style="text-align:left">5G plans with<br>
                    BIG savings!</h1>
                <div class="btn-sec d-flex align-items-center">
                    <div class="pricing-2" style="margin:0">
                        <h4 class="d-block">
                            <sup><span>From<br><b>RM</b></span></sup>35<span class="month-sec"> / mth</span>
                        </h4>
                    </div>
                </div>
                <!-- <div class="btn-sec" style="text-align: left;">
                    <a href="/promo/pakej-super-jimat/" class="btn pink-btn">Buy Now</a>
                </div> -->
            </div>
        </div>
    </div>
</section>
<!-- Slider End -->


<!-- Mid-section -->
<section id="main-app" ref="cardContainer">
    <div class="cap-search-box-main">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-12 col-lg-12 col-md-12">
                    <div class="cap-search-box clearfix">
                        <span class="">Supported Device</span>
                        <div class="mobile-filter">
                            <ul>
                                <li>
                                    <a href="javascript:void(0);" class="filter">
                                        Filter <img decoding="async" src="/wp-content/uploads/2024/01/filter-icon.png" alt="filter">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="search">
                                        <img decoding="async" src="/wp-content/uploads/2023/09/search-icon.png" alt="search"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="device_cat_search">
                            <input type="text" class="form-control" id="search" placeholder="Search any Devices">
                            <a href="javascript:void(0);" class="search-btn" @click="performSearch">
                                <img decoding="async" src="/wp-content/uploads/2023/09/search-icon.png" alt="search"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt-5">
            <div class="col col-lg-3" id="filter-section">
                <a href="javascript:void(0);" class="cancel-btn">
                    <img decoding="async" src="/wp-content/uploads/2024/01/cancel-icon.png" alt="cancel"></a>

                <div class="filter-accordion sd-filter-section" v-if="brandsSection">
                    <h2 class="h2text">Filters</h2>

                    <div class="accordion-item">
                        <h2 id="regularHeadingFirst" class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#regularCollapseFirst" aria-expanded="true" aria-controls="regularCollapseFirst">
                                Brand
                            </button>
                        </h2>
                        <div id="regularCollapseFirst" class="accordion-collapse collapse show" aria-labelledby="regularHeadingFirst" data-bs-parent="#regularAccordionRobots">
                            <div class="accordion-body">
                                <label>
                                    <input class="form-check-input brand-checkbox" type="checkbox" :value="'All'" id="All" @change="onBrandChange" checked /> All
                                </label>
                                <ul>
                                    <li class="checkbox" v-for="brand in brands" :key="brand.id">
                                        <label>
                                            <input class="form-check-input brand-checkbox" type="checkbox" :name="`fl-model-${brand.id}`" :value="brand.name" :id="brand.name" @change="onBrandChange" /> {{ brand.name }}
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Cellular Network Filter -->
                    <div class="accordion-item">
                        <h2 id="regularHeadingSecond" class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#regularCollapseSecond" aria-expanded="true" aria-controls="regularCollapseSecond">
                                Cellular Network
                            </button>
                        </h2>
                        <div id="regularCollapseSecond" class="accordion-collapse collapse" aria-labelledby="regularHeadingSecond" data-bs-parent="#regularAccordionRobots">
                            <div class="accordion-body">
                                <ul>
                                    <li class="checkbox">
                                        <label>
                                            <input class="form-check-input network-checkbox" type="checkbox" :value="'All'" id="AllNetwork" @change="onNetworkChange" checked /> All
                                        </label>
                                    </li>
                                    <li class="checkbox">
                                        <label>
                                            <input class="form-check-input network-checkbox" type="checkbox" :value="'volte'" id="VoLTE" @change="onNetworkChange" /> VoLTE
                                        </label>
                                    </li>
                                    <li class="checkbox">
                                        <label>
                                            <input class="form-check-input network-checkbox" type="checkbox" :value="'data-only'" id="DataOnly" @change="onNetworkChange" /> Data Only
                                        </label>
                                    </li>
                                    <li class="checkbox">
                                        <label>
                                            <input class="form-check-input network-checkbox" type="checkbox" :value="'data-volte'" id="DataVoLTE" @change="onNetworkChange" /> Data + VoLTE
                                        </label>
                                    </li>
                                    <li class="checkbox">
                                        <label>
                                            <input class="form-check-input network-checkbox" type="checkbox" :value="'5g'" id="5G" @change="onNetworkChange" /> 5G
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <!-- Sequence Filter -->
                    <div class="accordion-item">
                        <h2 id="regularHeadingThird" class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#regularCollapseThird" aria-expanded="true" aria-controls="regularCollapseThird">
                                Sequence
                            </button>
                        </h2>
                        <div id="regularCollapseThird" class="accordion-collapse collapse" aria-labelledby="regularHeadingThird" data-bs-parent="#regularAccordionRobots">
                            <div class="accordion-body">
                                <ul>
                                    <li class="radio">
                                        <label>
                                            <input class="form-check-input" type="radio" name="sequence" :value="'desc'" id="Latest" @change="onSequenceChange" /> Latest
                                        </label>
                                    </li>
                                    <li class="radio">
                                        <label>
                                            <input class="form-check-input" type="radio" name="sequence" :value="'asc'" id="Oldest" @change="onSequenceChange" /> Oldest
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col col-lg-9 sd-device-section" id="device-list-section" v-if="deviceSection" >
                <div class="row">
                    <div v-for="device in devices" :key="device.id" class="col col-md-5 col-xl-4 mb-xl-4 flex-column mb-4 box-sec filter-btn">
                        <div class="layer-planDevice">
                            <p class="panel-deviceImg">
                                <img decoding="async" :src="device.image_path" :alt="device.title">
                            </p>
                            <div class="m-content">
                                <h3>{{ device.brand_name }}</h3>
                                <h2>{{ device.title }}</h2>
                                <p class="price">{{ device.device_supports }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 text-center mt-4" v-if="currentPage < totalPages">
                        <button class="btn load_more_btn" @click="loadMoreDevices">Load More</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Mid-section ENDS -->


<?php get_template_part('template-parts/new-supported-devices/scripts'); ?>

<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        const apiEndpointURL = window.location.origin + '/wp-json/ywos/v1';

        // Initialize Vue instance
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
                    axios.post(apiEndpointURL + '/fetch-supported-brands')
                        .then((response) => {
                            self.brands = response.data;
                            self.brandsSection=true;
                            ('#sd-filter-section').show();
                            toggleOverlay(false);
                        })
                        .catch((error) => {

                        });
                },

                


                // Fetch supported devices from the API
                fetchSupportedDevices: function(page = 1, filters = {}) {
                    var self = this;
                    toggleOverlay(true);
                    filters.page = page;
                    axios.post(apiEndpointURL + '/fetch-supported-devices', filters)
                        .then((response) => {
                            self.deviceSection=true;

                            toggleOverlay(false);
                            if (page === 1) {
                                self.devices = response.data.data;
                            } else {
                                self.devices = [...self.devices, ...response.data.data];
                            }
                            self.currentPage = response.data.current_page;
                            self.totalPages = response.data.last_page;
                            self.scrollToTop(); 
                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            // Handle the error appropriately
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
                },


                onBrandChange(event) {
                    var self = this;
                    const brand = event.target.value;

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

                    self.updateDevices();
                },

                onNetworkChange(event) {
                    var self = this;
                    const network = event.target.value;

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

                    self.updateDevices();
                },


                onSequenceChange(event) {
                    var self = this;
                    const sequence = event.target.value;
                    if (event.target.checked) {
                        self.selectedSequences = [sequence];
                    } else {
                        self.selectedSequences = [];
                    }
                    self.updateDevices();
                },

                updateDevices() {
                    var self = this;
                    self.devices = [];
                    self.currentPage = 1;
                    self.fetchSupportedDevices(1, {
                        brand: self.selectedBrands.join(','),
                        device_supports: self.selectedNetworks.join(','),
                        order: self.selectedSequences[0] || '',
                        device_name: self.searchQuery
                    });
                },
                scrollToTop() {
                    var self = this;
                    if (self.$refs.cardContainer) {
                        self.$refs.cardContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }

            }
        });
    });
</script>