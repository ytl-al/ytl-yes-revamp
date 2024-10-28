<?php

// Add WhatsApp icon above footer using wp_footer hook
function add_whatsapp_icon_to_footer()
{
    $whatsapp_number = '60183331138'; // Replace with your WhatsApp number
    $whatsapp_message = urlencode('Hello Sofia');
    //$whatsapp_icon_url = 'https://cdn.yellowmessenger.com/GW5b8x8ivMvY1706600195310.png';
    $whatsapp_icon_url = 'https://ytlmarketing.blob.core.windows.net/site/wp-content/uploads/2024/08/sofia-icon.png';
    // $icon_message = "Ask Sofia";
    $lang = get_bloginfo("language");
    if ($lang == "en-US") {
        $icon_message = 'Ask Sofia';
    } elseif ($lang == "ms-MY") {
        $icon_message = 'Tanya Sofia';
    }
?>
    <style>
        /* Optional: CSS for styling the WhatsApp icon */
        .whatsapp-icon {
            position: fixed;
            bottom: 30px;
            /* top: 0px; */
            margin: 0;
            right: 20px;
            z-index: 99999;
            text-align: right;
            width: auto;
            height: auto;
        }

        .close-need-help svg {
            height: 20px;
        }

        .close-need-help {
            width: 25px;
            height: 25px;
            background: #fff;
            color: #000;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 16px rgba(0, 0, 0, 0.2);
            margin-left: auto;
            cursor: pointer;
            z-index: 99;
            position: absolute;
            right: 0;
            top: -25px;
        }

        .icon-textw {
            background: none;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border-radius: 10px;
            margin-top: -35px;
            width: 100%;
            height: auto;
            padding: 5px 0;
            box-shadow: none;
            max-height: 100px;

        }

        .icon-textw p {
            margin-top: 0px;
            margin-bottom: 0px;
            color: #000;
            font-size: 12px;
            text-align: center;
            font-weight: 700;
            background-color: #fff;
            padding: 5px 15px;
            border-radius: 100px;
            box-shadow: 0 0 16px rgba(0, 0, 0, 0.2);
            text-transform: uppercase;
        }

        .icon-textw img {
            width: 60px;
            /* Adjust size as necessary */
        }
    </style>

    <div class="whatsapp-icon" id="whatsapp-icon-container">
        <span class="close-need-help" id="close-whatsapp-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368" />
            </svg>
        </span>

        <a href="https://api.whatsapp.com/send?phone=<?php echo esc_attr($whatsapp_number); ?>&text=<?php echo $whatsapp_message; ?>" target="_blank" rel="noopener">
            <div class="icon-textw">
                <img src="<?php echo esc_url($whatsapp_icon_url); ?>" alt="WhatsApp">
                <p><?php echo $icon_message ?></p>
            </div>
        </a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var closeButton = document.getElementById('close-whatsapp-icon');
            var whatsappIconContainer = document.getElementById('whatsapp-icon-container');

            if (closeButton && whatsappIconContainer) {
                closeButton.addEventListener('click', function() {
                    whatsappIconContainer.style.display = 'none';
                });
            }
        });
    </script>
<?php
}
add_action('wp_footer', 'add_whatsapp_icon_to_footer');

?>