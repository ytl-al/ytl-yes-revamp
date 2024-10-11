<?php get_template_part('template-parts/new-supported-devices/styles'); ?>

<!-- Hero Section -->
<!-- Slider Start -->
<section class="hero-slider-section">
    <div class="hero-slider slider">
        <div>
            <img src="https://cdn.yes.my/site/wp-content/uploads/2024/05/superjimat-power35webbanner-mayupdate-desktop-scaled.webp" class="w-100 d-none d-lg-block" alt="...">
            <img src="https://cdn.yes.my/site/wp-content/uploads/2024/05/superjimat-power35webbanner-mayupdate-mobile.webp" class="w-100 d-block d-md-block d-lg-none" alt="...">

            <div class="inner-content-sec">
                <h1 style="text-align:left">Pelan 5G dengan<br>
                simpanan BESAR!</h1>
                <div class="btn-sec d-flex align-items-center">
                    <div class="pricing-2" style="margin:0">
                        <h4 class="d-block">
                            <sup><span>Dari<br><b>RM</b></span></sup>35<span class="month-sec"> / bln</span>
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
                        <span class="">Peranti-Peranti</span>
                        <div class="mobile-filter">
                            <ul>
                                <li>
                                    <a href="javascript:void(0);" class="filter">
                                    Saring <img decoding="async" src="/wp-content/uploads/2024/02/filter-icon.png" alt="filter">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="search">
                                        <img decoding="async" src="/wp-content/uploads/2024/02/search-icon.png" alt="search"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="device_cat_search">
                            <input type="text" class="form-control" id="search" placeholder="Cari sebarang peranti">
                            <a href="javascript:void(0);" class="search-btn btn" @click="performSearch">
                                <img decoding="async" src="/wp-content/uploads/2024/02/search-icon.png" alt="search"></a>
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
                    <img decoding="async" src="/wp-content/uploads/2024/02/cancel-icon.png" alt="cancel"></a>

            <div id="bar-fixed">     

                <div class="filter-accordion sd-filter-section" v-if="brandsSection">
                    <h2 class="h2text">Saring</h2>

                    <div class="accordion-item">
                        <h2 id="regularHeadingFirst" class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#regularCollapseFirst" aria-expanded="true" aria-controls="regularCollapseFirst">
                            Jenama
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
<!-- Footer FAQs STARTS -->
<section class="layer-footerFAQ mt-4 mt-lg-0" id="faq-section" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <h2 class="mb-5">Soalan Lazim</h2>
        </div>
        <div class="row justify-content-lg-center">
            <div class="col-12 col-lg-9">
                <div class="accordion accordion-flush mb-3" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">Bagaimana cara untuk kekalkan nombor saya?</button></h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>Tukar ke Yes tanpa menukar nombor, klik di sini ini untuk maklumat lanjut. </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">Di manakah kawasan liputan Yes 5G di Malaysia?</button></h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>Untuk periksa kawasan liputan 5G kami, <a href="https://www.yes.my/ms/coverage/">klik di sini</a>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">Adakah terdapat tempoh kontrak jika saya melanggan Pelan Prabayar Tanpa Had Yes FT5G</button></h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>Tiada kontrak untuk Pelan Prabayar Tanpa Had Yes FT5G.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-center mb-0"><a href="/faq" class="viewall-btn">LIHAT SEMUA SOALAN LAZIM <span class="iconify" data-icon="akar-icons:arrow-right"></span></a></p>
            </div>
        </div>
    </div>
</section>
<!-- Footer FAQs ENDS -->

<?php get_template_part('template-parts/new-supported-devices/scripts'); ?>

