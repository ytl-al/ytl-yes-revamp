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
                                        Filter <img decoding="async" src="/wp-content/uploads/2024/07/filter-icon.png" alt="filter">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="search">
                                        <img decoding="async" src="/wp-content/uploads/2024/07/search-icon.png" alt="search"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="device_cat_search">
                            <input type="text" class="form-control" id="search" placeholder="Search any Devices">
                            <a href="javascript:void(0);" class="search-btn btn" @click="performSearch">
                                <img decoding="async" src="/wp-content/uploads/2024/07/search-icon.png" alt="search"></a>
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
            <img decoding="async" src="/wp-content/uploads/2024/07/cancel-icon.png" alt="cancel"></a>
            
            <div id="bar-fixed">               

                <div class="filter-accordion sd-filter-section" v-if="brandsSection">
                    <h2 class="h2text">Filters</h2>

                    <div class="accordion-item">
                        <h2 id="regularHeadingFirst" class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#regularCollapseFirst" aria-expanded="true" aria-controls="regularCollapseFirst">
                                Brand
                            </button>
                        </h2>
                        <div id="regularCollapseFirst" class="accordion-collapse collapse show brand-h" aria-labelledby="regularHeadingFirst" data-bs-parent="#regularAccordionRobots">
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
                                            <input class="form-check-input network-checkbox" type="checkbox" :value="'data only'" id="DataOnly" @change="onNetworkChange" /> Data Only
                                        </label>
                                    </li>
                                    <li class="checkbox">
                                        <label>
                                            <input class="form-check-input network-checkbox" type="checkbox" :value="'data + volte'" id="DataVoLTE" @change="onNetworkChange" /> Data + VoLTE
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
                                            <input class="form-check-input" type="radio" name="sequence" :value="'desc'" id="Latest" @change="onSequenceChange" checked/> Latest
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
            </div>

            <div class="col col-lg-9 sd-device-section" id="device-list-section" v-if="deviceSection" >
                <div class="row">
                    <div v-for="device in devices" :key="device.id" class="col col-md-5 col-xl-4 mb-xl-4 flex-column mb-4 box-sec filter-btn aos-init aos-animate" data-aos="fade-right" >
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

                <div class="row mb-5" v-if="">
                    <div class="col-12 text-center mt-4" v-if="currentPage < totalPages">
                        <button class="btn load_more_btn" @click="loadMoreDevices">Load More</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Mid-section ENDS -->

<!-- Footer FAQs STARTS -->
<section class="layer-footerFAQ mt-4 mt-lg-0" id="faq-section" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <h2 class="mb-5">Frequently Asked Questions</h2>
        </div>
        <div class="row justify-content-lg-center">
            <div class="col-12 col-lg-9">
                <div class="accordion accordion-flush mb-3" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">How do I keep my number?</button></h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>Switch To Yes without changing your number, visit <a href="https://www.yes.my/docs/faq/switch-to-yes/yes-mobile-number-portability-prepaid/">here</a> for more info.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">Where are the Yes 5G coverage areas in Malaysia?</button></h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>To check out our 5G coverage areas, you can visit <a href="https://www.yes.my/coverage/">here</a>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">Is there any contract period if I subscribe to Yes Infinite Postpaid Service Plans?</button></h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>There is no contract for Yes Infinite Postpaid Plans.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-center mb-0"><a href="/faq" class="viewall-btn">View All FAQs <span class="iconify" data-icon="akar-icons:arrow-right"></span></a></p>
            </div>
        </div>
    </div>
</section>
<!-- Footer FAQs ENDS -->
<?php get_template_part('template-parts/new-supported-devices/scripts'); ?>
