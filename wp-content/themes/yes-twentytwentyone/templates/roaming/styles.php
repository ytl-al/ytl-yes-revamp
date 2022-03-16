<style>
    #roaming-banner {
        overflow: hidden;
        background-image: url('/wp-content/uploads/2022/03/roaming-banner1-bg.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        padding: 150px 0px;
    }

    .flexselect_dropdown {
        display: none;
        position: absolute;
        z-index: 999999;
        margin: 0;
        padding: 0.5rem;
        border: 1px solid rgba(0, 0, 0, .15);
        border-radius: 0.25rem;
        max-height: 200px;
        overflow-x: hidden;
        overflow-y: auto;
        background-color: #fff;
        text-align: left;
        box-shadow: 0 6px 12px #ccc;
        -webkit-box-shadow: 0 6px 12px #ccc;
    }

    .flexselect_dropdown ul {
        width: 100%;
        list-style-position: outside;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .flexselect_dropdown li {
        margin: 0px;
        padding: 2px 5px;
        cursor: pointer;
        display: block;
        width: 100%;
        overflow: hidden;
    }

    .flexselect_dropdown li.disabled {
        cursor: not-allowed;
        color: GrayText;
    }

    .flexselect_selected {
        background-color: Highlight;
        color: HighlightText;
    }

    .roaming-bg2 {
        background-image: url('/wp-content/uploads/2022/03/roaming-banner2-bg.jpg') !important;
    }

    #roaming-banner h1 {
        font-size: 49px;
        line-height: 67px;
        font-weight: 600;
        color: #2B2B2B;
        text-align: left;
        margin-bottom: 15px;
    }

    #roaming-banner h1 span {
        font-weight: 800;
    }

    #roaming-banner p {
        font-size: 29px;
        font-weight: 400;
        line-height: 40px;
        color: #525252;
        margin-bottom: 20px;
    }

    #roaming-banner .search-box {
        width: 100%;
        position: relative;
        border-radius: 90px;
        background-color: #FFF;
        border: solid 1px #00B4F0;
        display: inline-block;
        padding: 2px;
    }

    #roaming-banner .search-box .dropdown-menu {
        width: 50%;
    }


    #roaming-banner .search-box input {
        border: none;
        background-color: #FFF;
        border-radius: 90px;
        padding: 12px;
        padding-left: 18px;
        font-size: 19px;
        float: left;
    }

    #roaming-banner .search-box input ::placeholder {
        color: #525252;
    }

    #roaming-banner .search-box input:focus-visible {
        outline: none;
    }

    #roaming-banner .search-box .btn {
        float: right;
        display: inline-block;
        padding: 7px 14px;
        border-radius: 90px;
        background-color: #ED028C;
        color: #FFF;
        text-align: center;
        font-size: 24px;
        font-weight: 800;
        text-transform: uppercase;
    }

    #countries-section {
        padding: 60px 0px;
    }

    #countries-section h1 {
        text-align: center;
        color: #00B4F0;
        font-weight: 600;
        font-size: 49px;
        line-height: 67px;
        margin-bottom: 50px;
    }

    #countries-section h1 span {
        font-weight: 800;
    }

    #countries-section .carousel-roaming h2 {
        text-align: center;
        color: #2B2B2B;
        font-size: 20px;
        font-weight: 600;
    }

    #countries-section .carousel-roaming p {
        color: #7A7A7A;
        text-align: center;
        font-size: 15px;
    }

    #countries-section .carousel-roaming .row-roaming-country img {
        margin: 0 auto;
    }

    #countries-section .carousel-roaming .slick-dots {
        bottom: -57px;
    }

    #countries-section .carousel-roaming .slick-dots li button::before {
        font-size: 20px;
        color: #525252;
    }

    #roaming-rates-section {
        padding: 60px 0px;
    }

    #roaming-rates-section h1 {
        text-align: center;
        color: #00B4F0;
        font-weight: 600;
        font-size: 49px;
        line-height: 67px;
        margin-bottom: 50px;
    }

    #roaming-rates-section h1 span {
        font-weight: 800;
        color: #ec008c;
    }

    #roaming-rates-section .row-roaming h3 {
        border-bottom: 4px solid #666;
        padding-bottom: 1em;
        margin-bottom: 1em;
        font-size: 18px;
    }

    #roaming-rates-section .row-roaming h4 {
        font-size: 18px;
        font-weight: 800;
    }

    #roaming-rates-section .row-roaming h4.blue {
        color: #00B4F0;
    }

    #roaming-rates-section .row-roaming h4.internet-rates {
        font-size: 81px;
        font-weight: 800;
        color: #00B4F0;
    }

    #roaming-rates-section .row-roaming h4.internet-rates sub {
        font-size: 20px;
    }

    #roaming-rates-section .row-roaming p.small {
        font-size: 12px;
    }

    #roaming-rates-section .row-roaming p.blue {
        color: #00B4F0;
    }

    #roaming-rates-section .viewall-btn {
        display: inline-block;
        font-size: 20px;
        font-weight: 800;
        text-transform: uppercase;
        color: #ED028C;
        text-align: center;
    }

    #roaming-rates-section .viewall-btn svg {
        margin-left: 5px;
        font-size: 20px;
    }

    #roaming-rates-section .viewall-btn:hover {
        text-decoration: underline;
    }

    #roaming-tips {
        padding: 60px 0px;
    }

    #roaming-tips h1 {
        text-align: center;
        color: #00B4F0;
        font-weight: 600;
        font-size: 49px;
        line-height: 67px;
        margin-bottom: 50px;
    }

    #start-roaming {
        padding: 60px 0px;
    }

    #start-roaming h1 {
        text-align: center;
        color: #00B4F0;
        font-weight: 600;
        font-size: 49px;
        line-height: 67px;
        margin-bottom: 50px;
    }

    #start-roaming p.small {
        font-size: 11px;
    }

    #start-roaming .viewall-btn {
        display: inline-block;
        font-size: 20px;
        font-weight: 800;
        text-transform: uppercase;
        color: #ED028C;
        text-align: center;
    }

    #start-roaming .viewall-btn svg {
        margin-left: 5px;
        font-size: 20px;
    }

    #start-roaming .viewall-btn:hover {
        text-decoration: underline;
    }

    .ui-widget-content {
        background: #fff;
        max-height: 250px;
        border: none;
        overflow: auto;
        color: #333
    }

    /* IPAD Portrait */

    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 1) {
        #roaming-banner h1 {
            font-size: 44px;
            line-height: 44px;
        }

        #roaming-banner p {
            font-size: 24px;
            line-height: 35px;
        }
    }

    @media only screen and (min-device-width: 320px) and (max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2) {
        #roaming-banner {
            background-position: top;
            padding: 50px 0px;
        }

        #roaming-banner h1 {
            font-size: 35px;
            line-height: 35px;
            text-align: center;
        }

        #roaming-banner p {
            margin-bottom: 15px;
            text-align: center;
            font-size: 22px;
            line-height: normal;
        }

        #roaming-banner .search-box input {
            padding: 6px 12px;
            font-size: 13px;
        }

        #roaming-banner .search-box .btn {
            font-size: 11px;
        }
    }

    @media only screen and (min-device-width: 375px) and (max-device-width: 667px) {
        #roaming-banner .search-box input {
            padding: 7px 12px;
            font-size: 11px;
        }

        #roaming-banner .search-box .btn {
            font-size: 10px;
        }
    }
</style>