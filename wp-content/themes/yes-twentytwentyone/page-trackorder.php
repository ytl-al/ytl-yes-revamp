<?php get_header(); ?>

<style>
    .breadcrumb-section {
        background-color: #DEE5EF;
    }

    #speedtest h1 {
        font-size: 56px;
        font-weight: 800;
        line-height: 55px;
        color: #2B2B2B;
        text-align: center;
    }

    #speedtest p {
        font-size: 24px;
        color: #2B2B2B;
        line-height: 32px;
        text-align: center;
    }

    #speedtest iframe {
        width: 100%;
        height: 788px;
    }

    /* Home Broadband End */
    /* IPAD Portrait */

    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 1) {}

    @media only screen and (min-device-width: 320px) and (max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2) {}
</style>

<div class="container breadcrumb-section">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Speed Test</li>
        </ol>
    </nav>
</div>

<section id="speedtest">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-5 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">Want to know your<br>actual internet speed?</h1>
                <p class="mb-5 mt-4 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    This speedometer can help you out!
                </p>
                <iframe sandbox="allow-scripts allow-same-origin" scrolling="no" src="https://ytlc.speedtestcustom.com/" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300" frameborder="0" class="aos-init aos-animate"></iframe>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>