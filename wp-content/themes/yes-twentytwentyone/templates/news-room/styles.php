<style>
    #newsroom-top-banner {
        overflow: hidden;
        background-image: url('images/newsroom-header-bg.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        padding: 50px 0px;
    }

    #newsroom-top-banner h1 {
        font-size: 71px;
        line-height: 71px;
        font-weight: 800;
        color: #2B2B2B;
        text-align: left;
        margin-bottom: 15px;
    }

    #newsroom-top-banner p {
        font-size: 29px;
        font-weight: 800;
        line-height: 28px;
        color: #2B2B2B;
        margin-bottom: 20px;
    }

    #filter-panel {
        padding-bottom: 30px;
        padding-top: 30px;
        border-bottom: solid 1px #C5C5C5;
        margin-bottom: 40px;
    }

    #filter-panel h1 {
        color: #2B2B2B;
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    #filter-panel h1 img {
        vertical-align: bottom;
    }

    #filter-panel .filter-drop {
        border: 1px solid #C5C5C5;
        background-color: #F9F7F4;
        font-size: 17px;
        color: #000;
        font-weight: 400;
        padding: 15px 15px;
        width: 100%;
        border-radius: 7px;
        text-align: left;
    }

    #filter-panel label {
        font-size: 20px;
        margin-bottom: 10px;
        color: #000;
    }

    #filter-panel .filter-drop:focus {
        outline: none;
        box-shadow: none;
    }

    #filter-panel .dropdown-menu {
        border-radius: 0;
        border: 1px solid #C5C5C5;
        background-color: #F9F7F4;
        width: 100%;
        filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.15));
    }

    #filter-panel .dropdown-toggle::after {
        position: absolute;
        top: 25px;
        right: 17px;
    }

    #news-section h1 {
        font-size: 32px;
        font-weight: 700;
        color: #000;
        margin-bottom: 20px;
    }

    #news-section .news-box {
        display: flex;
        width: 100%;
        flex-direction: column;
        padding: 15px;
        height: 100%;
        background-color: #FFF;
        border-radius: 10px;
    }

    #news-section .news-box .news-content {
        margin-bottom: auto;
    }

    #news-section .news-box .visual {
        border-radius: 8px;
    }

    #news-section .news-box .news-content h2 {
        margin: 20px 0px;
        color: #525252;
        text-transform: uppercase;
        font-size: 24px;
        line-height: 28px;
        font-weight: 800;
    }

    #news-section .news-box .news-content p {
        font-size: 20px;
        line-height: 24px;
        color: #7A7A7A;
        margin-bottom: 20px;
    }

    #news-section .news-box .news-footer a.pink-link {
        color: #ED028C;
        text-transform: uppercase;
        font-size: 20px;
        font-weight: 800;
    }

    #news-section .news-box .news-footer a.pink-link:hover {
        text-decoration: underline;
    }

    #news-section .news-box .news-footer .date {
        font-size: 17px;
        color: #525252;
    }

    #news-section .news-box .news-footer .date svg {
        margin-right: 5px;
    }

    /* IPAD Portrait */

    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 1) {
        #newsroom-top-banner h1 {
            font-size: 44px;
            line-height: 44px;
        }

        #newsroom-top-banner p {
            font-size: 24px;
            line-height: 35px;
        }
    }

    @media only screen and (min-device-width: 320px) and (max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2) {
        #newsroom-top-banner {
            background-position: top;
            padding-top: 20px;
        }

        #newsroom-top-banner h1 {
            font-size: 35px;
            line-height: 35px;
            text-align: center;
        }

        #newsroom-top-banner p {
            margin-bottom: 15px;
            text-align: center;
            font-size: 22px;
        }
    }
</style>