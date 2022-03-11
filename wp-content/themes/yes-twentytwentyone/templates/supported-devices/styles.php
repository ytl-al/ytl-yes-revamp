<style>
    .xs-filter-container .filter-drop {
        border-radius: 0;
        border: 1px solid #C5C5C5;
        background-color: #F9F7F4;
        font-size: 17px;
        color: #000;
        font-weight: 400;
        padding: 15px 30px;
        width: 100%;
    }
    .xs-filter-container .dropdown-menu {
        border-radius: 0;
        border: 1px solid #C5C5C5;
        background-color: #F9F7F4;
        width: 100%;
        filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.15));
    }

    .filter-storeitem .storegrid {
        display: none;
        animation: fadeOut .35s ease-in-out;
    }
    .filter-storeitem .storegrid.show {
        display: block;
        animation: fadeIn .7s ease-in-out;
    }
    #supported-top-banner {
            background: linear-gradient(253.22deg, #ED028C -28.49%, #00B4F0 84.7%);
            padding: 50px 0px;
            text-align: center;
        }
        
        #supported-top-banner h1 {
            font-size: 60px;
            font-weight: 800;
            color: #F9F7F4;
        }
        
        #supported-top-banner p {
            font-size: 28px;
            font-weight: 600;
            line-height: normal;
            color: #F9F7F4;
        }
        
        #supported-top-banner .search-box {
            width: 100%;
            border-radius: 40px;
            background-color: #FFF;
            position: relative;
            display: inline-block;
            padding: 10px;
            width: 80%;
            margin-top: 20px;
        }
        
        #supported-top-banner .search-box .search-btn {
            position: absolute;
            right: 20px;
            top: 14px;
        }
        
        #supported-top-banner .search-box input {
            background-color: #FFF;
            border: none;
            color: #000;
            font-size: 20px;
        }
        
        #supported-top-banner .search-box input:focus,
        #supported-top-banner .search-box input:active {
            outline: none;
            box-shadow: none;
            border: none;
        }
        
        #filter-panel {
            margin-bottom: 30px;
            margin-top: 30px;
        }
        
        #filter-panel h1 {
            color: #2B2B2B;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        #filter-panel h1 img {
            vertical-align: middle;
            margin-right: 5px;
            display: inline;
        }
        
        #filter-panel label {
            font-size: 17px;
            color: #2B2B2B;
        }
        
        #supported-device .tab-content {
            padding: 40px 0px;
            padding-top: 0;
        }
        
        #supported-device .nav-item {
            margin: 0px 20px
        }
        
        #supported-device .nav-wrapper {
            border-bottom: solid 1px #C5C5C5;
        }
        
        #supported-device .nav-pills .nav-link {
            color: #525252;
            font-size: 24px;
            font-weight: 600;
            border-radius: 0;
        }
        
        #supported-device .nav-pills .nav-link.active {
            color: #ED028C;
            border-bottom: solid 4px #ED028C;
            background-color: transparent;
            font-weight: 700;
        }
        
        #supported-device .phone-box {
            background-color: #FFF;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(50, 44, 98, 0.15);
            display: flex;
            flex-direction: column;
            height: 100%;
            padding: 15px;
            text-align: center;
        }
        
        #supported-device .phone-box p {
            font-size: 14px;
            color: #525252;
            text-transform: uppercase;
            text-align: left;
        }
        
        #supported-device .phone-box h2 {
            font-weight: 700;
            color: #2B2B2B;
            font-size: 19px;
            text-align: left;
        }
        
        #supported-device .phone-box .phone-img {
            width: 100px;
            max-width: 100%;
            margin: 0 auto;
            margin-bottom: 20px;
        }
        
        #supported-device .filter-drop .btn:focus,
        #supported-device .filter-drop .btn:active {
            outline: none;
            box-shadow: none;
            border: none;
        }
        
        #supported-device .filter-drop .btn {
            font-size: 17px;
            outline: none;
            box-shadow: none;
            border: none;
        }
        
        #supported-device .filter-drop .btn span {
            font-weight: 700;
        }
        /* IPAD Portrait */
        
        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 1) {
            #supported-device .nav-item {
                margin: 0px 7px;
            }
        }
        
        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2) {
            #supported-top-banner h1 {
                font-size: 40px;
            }
            #supported-top-banner p {
                font-size: 20px;
            }
        }
</style>