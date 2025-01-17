<?php
register_menu("Hotspot Settings", true, "hotspot_settings", 'AFTER_SETTINGS', 'ion ion-earth');

function hotspot_settings()
{
    global $ui, $config;
    _admin();
    $admin = Admin::_info();
    $ui->assign('_title', 'Hotspot Dashboard');
    $ui->assign('_admin', $admin);

    if (!in_array($admin['user_type'], ['SuperAdmin', 'Admin'])) {
        r2(U . "dashboard", 'e', Lang::T("You Do Not Have Access"));
    }

    if (_post('save') == 'save') {
        $hotspot_title = _post('hotspot_title');
        $hotspot_description = _post('hotspot_description');
        $hotspot_description = _post('hotspot_description');
        $hotspot_router_name = _post('hotspot_router_name');
        $hotspot_faq_head1 = _post('hotspot_faq_head1');
        $hotspot_faq_head2 = _post('hotspot_faq_head2');
        $hotspot_faq_head3 = _post('hotspot_faq_head3');
        $hotspot_faq_answer1 = _post('hotspot_faq_answer1');
        $hotspot_faq_answer2 = _post('hotspot_faq_answer2');
        $hotspot_faq_answer3 = _post('hotspot_faq_answer3');

        $router = ORM::for_table('tbl_routers')->where('name', $hotspot_router_name)->where('enabled', '1')->find_one();

        if ($router) {
            $hotspot_router_id = $router->id;
        } else {
            r2(U . 'plugin/hotspot_settings', 'e', Lang::T('Router not found or not enabled.'));
            return;
        }

        $settings = [
            'hotspot_title' => $hotspot_title,
            'hotspot_description' => $hotspot_description,
            'hotspot_router_id' => $hotspot_router_id,
            'hotspot_router_name' => $hotspot_router_name,
            'hotspot_faq_head1' => $hotspot_faq_head1,
            'hotspot_faq_head2' => $hotspot_faq_head2,
            'hotspot_faq_head3' => $hotspot_faq_head3,
            'hotspot_faq_answer1' => $hotspot_faq_answer1,
            'hotspot_faq_answer2' => $hotspot_faq_answer2,
            'hotspot_faq_answer3' => $hotspot_faq_answer3,
        ];

        // Update or insert settings in the database
        foreach ($settings as $key => $value) {
            $d = ORM::for_table('tbl_appconfig')->where('setting', $key)->find_one();
            if ($d) {
                $d->value = $value;
                $d->save();
            } else {
                $d = ORM::for_table('tbl_appconfig')->create();
                $d->setting = $key;
                $d->value = $value;
                $d->save();
            }
        }

        _log('[' . $admin['username'] . ']: ' . Lang::T('Settings Saved Successfully'), $admin['user_type']);
        r2(U . 'plugin/hotspot_settings', 's', Lang::T('Settings Saved Successfully'));
    }

    $ui->assign('_c', $config);
    $ui->display('hotspot_settings.tpl');
}

function hotspot_settings_download()
{
    include 'config.php';
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }



    //modified one   

    // Function to get a setting value
function getSettingValue($mysqli, $setting) {
    $query = $mysqli->prepare("SELECT value FROM tbl_appconfig WHERE setting = ?");
    $query->bind_param("s", $setting);
    $query->execute();
    $result = $query->get_result();
    if ($row = $result->fetch_assoc()) {
        return $row['value'];
    }
    return '';
}

// Fetch hotspot title and description from tbl_appconfig
$hotspotTitle = getSettingValue($mysqli, 'hotspot_title');
$description = getSettingValue($mysqli, 'description');
$phone = getSettingValue($mysqli, 'phone');
$company = getSettingValue($mysqli, 'CompanyName');

// Fetch router name and router ID from tbl_appconfig
$routerName = getSettingValue($mysqli, 'router_name');
$routerId = getSettingValue($mysqli, 'router_id');

// Fetch available plans
$planQuery = "SELECT id, name_plan, price, validity, validity_unit FROM tbl_plans WHERE routers = ? AND type = 'Hotspot'";
$planStmt = $mysqli->prepare($planQuery);
$planStmt->bind_param("s", $routerName);
$planStmt->execute();
$planResult = $planStmt->get_result();

$htmlContent = "";
$htmlContent .= "<!DOCTYPE html>\n";
$htmlContent .= "<html lang=\"en\">\n";
$htmlContent .= "<style>\n";
$htmlContent .= "/* Custom styling for the SweetAlert popup */\n";
$htmlContent .= ".swal2-popup-custom {\n";
$htmlContent .= "    border-radius: 10px; /* Rounded corners */\n";
$htmlContent .= "    padding: 20px; /* Extra padding */\n";
$htmlContent .= "    backdrop-filter: blur(10px); /* Adds blur effect to the background */\n";
$htmlContent .= "    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5); /* Shadow for the popup */\n";
$htmlContent .= "}\n";
$htmlContent .= "</style>\n";
$htmlContent .= "<head>\n";
$htmlContent .= "    <meta charset=\"UTF-8\">\n";
$htmlContent .= "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n";
$htmlContent .= "    <title>$company</title>\n";
$htmlContent .= "    <script src=\"https://cdn.tailwindcss.com\"></script>\n";
$htmlContent .= "    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css\">\n";
$htmlContent .= "    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.css\" />\n";
$htmlContent .= "    <script src=\"https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.js\"></script>\n";
$htmlContent .= "    <link rel=\"preconnect\" href=\"https://cdn.jsdelivr.net\">\n";
$htmlContent .= "    <link rel=\"preconnect\" href=\"https://cdnjs.cloudflare.com\" crossorigin>\n";
$htmlContent .= "    <link rel=\"stylesheet\" href=\"https://rsms.me/inter/inter.css\">\n";
$htmlContent .= "    <!-- <link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\"> -->\n";
$htmlContent .= "</head>\n";
$htmlContent .= "<body class=\"font-sans antialiased text-gray-900 bg-cover bg-center font-inter\" style=\"background-image: url('peakpx.jpg');\">\n";
$htmlContent .= "    <!-- Main Content -->\n";
$htmlContent .= "    <div class=\"mx-auto max-w-screen-2xl px-4 md:px-6\">\n";
$htmlContent .= "        <div class=\"max-h-34 relative mx-auto mt-4 flex max-w-lg flex-1 items-center justify-center overflow-hidden shadow-lg rounded-lg\">\n";
$htmlContent .= "            <!-- text start -->\n";
$htmlContent .= "            <div class=\"text-center\">\n";
$htmlContent .= "                <div class=\"relative flex flex-col items-center p-6 sm:max-w-xl rounded-lg\">\n";
$htmlContent .= "                    <!-- Title -->\n";
$htmlContent .= "                    <h1 class=\"mb-4 text-center text-2xl font-extrabold text-gray-600 sm:text-xl md:mb-2\">\n";
$htmlContent .= "                        <strong>$company</strong>\n";
$htmlContent .= "                    </h1>\n";
$htmlContent .= "                    <!-- Contact Information -->\n";
$htmlContent .= "                    <p class=\"mb-4 text-center text-lg font-medium text-gray-600 sm:text-lg md:mb-1 md:text-xl\">\n";
$htmlContent .= "                        Customer Care: <span class=\"text-blue-500\">$phone</span>\n";
$htmlContent .= "                    </p>\n";
$htmlContent .= "                </div>\n";
$htmlContent .= "            </div>\n";
$htmlContent .= "            <!-- text end -->\n";
$htmlContent .= "        </div>\n";
$htmlContent .= "    </div>\n";



$htmlContent .= "    <div class=\"py-2 sm:py-4 lg:py-6\">\n";
$htmlContent .= "        <div class=\"mx-auto max-w-screen-2xl px-4 md:px-8\">\n";
$htmlContent .= "            <div class=\"mx-auto max-w-lg grid grid-cols-3 sm:grid-cols-3 gap-1 p-1\" id=\"cards-container\">\n";
$htmlContent .= "            </div>\n";
$htmlContent .= "        </div>\n";
$htmlContent .= "    </div>\n";

$htmlContent .= '    <!-- Separate section with another background for Mpesa Code -->';
$htmlContent .= '    <div class="max-w-md mx-auto bg-blue-500 rounded-lg overflow-hidden shadow-md mt-6">';
$htmlContent .= '        <div class="p-3">';
$htmlContent .= '            <h3 class="text-2xl font-semibold text-white mb-3 text-center">Enter Mpesa code to reconnect</h3>';
$htmlContent .= '            <div class="mb-6">';
$htmlContent .= '                <label for="mpesaCodeInput" class="block text-white text-sm font-bold mb-2">Mpesa Code:</label>';
$htmlContent .= '                <input type="text" id="mpesaCodeInput" name="mpesa_code" placeholder="Enter Mpesa Code" class="w-full rounded-lg bg-white px-3 py-2 text-white outline-none transition duration-100 focus:ring">';
$htmlContent .= '                <button id="reconnectBtn" class="w-full mt-3 rounded-lg bg-white px-4 py-2 text-slate-600 font-semibold hover:bg-amber-500 transition duration-100">Reconnect</button>';
$htmlContent .= '            </div>';
$htmlContent .= '        </div>';
$htmlContent .= '    </div>';
$htmlContent .= '</div>';

$htmlContent .= "<div class=\"py-2 sm:py-4 lg:py-4\">\n";
$htmlContent .= "    <div class=\"mx-auto max-w-screen-2xl px-4 md:px-4\">\n";
$htmlContent .= "        <div class=\"mx-auto max-w-lg\">\n";
$htmlContent .= "            <div class=\"flex flex-col gap-4\">\n";
$htmlContent .= "                <button type=\"button\" class=\"flex items-center justify-center gap-2 rounded-lg bg-amber-500 px-8 py-3 text-center text-sm font-semibold text-slate-100 outline-none ring-green-300 transition duration-100 hover:bg-gray-700 focus-visible:ring active:bg-blue-500 md:text-base\" onclick=\"redeemVoucher()\">\n";
$htmlContent .= "                    <svg class=\"w-5 h-5 mr-2\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\" xmlns=\"http://www.w3.org/2000/svg\">\n";
$htmlContent .= "                        <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7\"></path>\n";
$htmlContent .= "                    </svg>\n";
$htmlContent .= "                    Click here to Redeem Voucher\n";
$htmlContent .= "                </button>\n";
$htmlContent .= "            </div>\n";
$htmlContent .= "        </div>\n";
$htmlContent .= "    </div>\n";
$htmlContent .= "</div>\n";


$htmlContent .= "<script>\n";
$htmlContent .= "    let triggerCount = 0;\n";
$htmlContent .= "    const maxTriggers = 1; // Only trigger once\n";
$htmlContent .= "\n";
$htmlContent .= "    function submitLogin() {\n";
$htmlContent .= "        // Simulate form submission\n";
$htmlContent .= "        document.getElementById('loginForm').submit();\n";
$htmlContent .= "        console.log('Reconnect button clicked');\n";
$htmlContent .= "    }\n";
$htmlContent .= "\n";
$htmlContent .= "    function triggerReconnectButton() {\n";
$htmlContent .= "        if (triggerCount < maxTriggers) {\n";
$htmlContent .= "            triggerCount++;\n";
$htmlContent .= "            document.getElementById('submitBtn').click(); // Automatically click the reconnect button\n";
$htmlContent .= "        } else {\n";
$htmlContent .= "            clearInterval(reconnectInterval); // Stop automatic trigger after one execution\n";
$htmlContent .= "        }\n";
$htmlContent .= "    }\n";
$htmlContent .= "\n";
$htmlContent .= "    // Trigger the reconnect button after 2 minutes (120000ms)\n";
$htmlContent .= "    const reconnectInterval = setInterval(triggerReconnectButton, 60000); // 2 minutes in milliseconds\n";
$htmlContent .= "</script>\n";

$htmlContent .= "    <div class=\"mx-auto max-w-screen-2xl px-4 md:px-8\">\n";
$htmlContent .= "        <div class=\"mx-auto mb-4 max-w-lg\">\n";
$htmlContent .= "            <div class=\"border-t py-4\">\n";
$htmlContent .= "                <p class=\"text-xs text-blue-500 text-center\">&copy;  2025 - Unganisha Networks 0111723138/0768533585 All rights reserved.</p>\n";
$htmlContent .= "            </div>\n";
$htmlContent .= "        </div>\n";
$htmlContent .= "    </div>\n";
$htmlContent .= "</body>\n";

$htmlContent .= "<script>\n";
$htmlContent .= "    document.addEventListener('DOMContentLoaded', function() {\n";
$htmlContent .= "        var accountId = getCookie('accountid');\n";
$htmlContent .= "        if (accountId) {\n";
$htmlContent .= "            document.getElementById('usernameInput').value = accountId;\n";
$htmlContent .= "        }\n";
$htmlContent .= "    });\n";
$htmlContent .= "\n";
$htmlContent .= "</script>\n";

$htmlContent .= "<script>\n";
$htmlContent .= "function fetchData() {\n";
$htmlContent .= "    let domain = '" . APP_URL . "';\n";
$htmlContent .= "    let siteUrl = domain + \"/index.php?_route=plugin/hotspot_plan\";\n";
$htmlContent .= "    let request = new XMLHttpRequest();\n";
$htmlContent .= "        const routerName = \"Router1\";\n";
$htmlContent .= "        const dataparams = `routername=\${routerName}`;\n";
$htmlContent .= "    request.open(\"POST\", siteUrl, true);\n";
$htmlContent .= "    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');\n";
$htmlContent .= "    request.onload = () => {\n";
$htmlContent .= "        if (request.readyState === XMLHttpRequest.DONE) {\n";
$htmlContent .= "            if (request.status === 200) {\n";
$htmlContent .= "                let fetchedData = JSON.parse(request.responseText);\n";
$htmlContent .= "                populateCards(fetchedData);\n";
$htmlContent .= "            } else {\n";
$htmlContent .= "                console.log(`Error \${request.status}: \${request.statusText}`);\n";
$htmlContent .= "            }\n";
$htmlContent .= "        }\n";
$htmlContent .= "    };\n";
$htmlContent .= "    request.onerror = () => {\n";
$htmlContent .= "        console.error(\"Network error\");\n";
$htmlContent .= "    };\n";
$htmlContent .= "    request.send(dataparams);\n";
$htmlContent .= "}\n";
$htmlContent .= "function populateCards(data) {\n";
$htmlContent .= "    var cardsContainer = document.getElementById('cards-container');\n";
$htmlContent .= "    cardsContainer.innerHTML = ''; // Clear existing content\n";
$htmlContent .= "    data.data.forEach(router => {\n";
$htmlContent .= "        router.plans_hotspot.forEach(item => {\n";

$htmlContent .= "            var cardDiv = document.createElement('div');\n";
$htmlContent .= "            cardDiv.className = 'bg-white bg-opacity-70 rounded-lg shadow-sm overflow-hidden transition duration-300 hover:shadow-lg flex items-center justify-between mb-4 p-4 border-b-2 border-gray-300';\n"; // Added border-bottom
$htmlContent .= "            cardDiv.onclick = function(event) { if(event.target.tagName !== 'BUTTON') { handlePhoneNumberSubmission(item.planId, item.routerId); } };\n";
$htmlContent .= "            cardDiv.innerHTML = `\n";
$htmlContent .= "                <div class=\"flex w-full items-center justify-between\">\n"; // Main flex container
$htmlContent .= "                    <div class=\"flex-1 text-left\">\n"; // Plan name and validity container
$htmlContent .= "                        <h2 class=\"font-medium uppercase text-sm text-gray-600\">\n";
$htmlContent .= "                            \${item.planname}\n";
$htmlContent .= "                        </h2>\n";
$htmlContent .= "                        <p class=\"text-gray-500 text-xs\">\n";
$htmlContent .= "                            Access for \${item.validity} \${item.timelimit}\n";
$htmlContent .= "                        </p>\n";
$htmlContent .= "                    </div>\n";
$htmlContent .= "                    <div class=\"flex-1 text-center\">\n"; // Centered price container
$htmlContent .= "                        <p class=\"font-bold text-xs text-gray-600\">\n";
$htmlContent .= "                            <span class=\"font-medium text-gray-600\">\${item.currency}</span>\n";
$htmlContent .= "                            \${item.price}\n";
$htmlContent .= "                        </p>\n";
$htmlContent .= "                    </div>\n";
$htmlContent .= "                    <div class=\"flex-1 text-right\">\n"; // Button container
$htmlContent .= "                        <button class=\"bg-indigo-600 text-white font-bold py-1 px-2 rounded\" onclick=\"event.stopPropagation(); handlePhoneNumberSubmission(\${item.planId}, \${item.routerId});\">\n";
$htmlContent .= "                            Buy\n";
$htmlContent .= "                        </button>\n";
$htmlContent .= "                    </div>\n";
$htmlContent .= "                </div>\n";
$htmlContent .= "            `;\n";
$htmlContent .= "            cardsContainer.appendChild(cardDiv);\n";
$htmlContent .= "        });\n";
$htmlContent .= "    });\n";
$htmlContent .= "    adjustCardSizes();\n";
$htmlContent .= "}\n";


$htmlContent .= "function adjustCardSizes() {\n";
$htmlContent .= "    const cards = document.querySelectorAll('.card');\n";
$htmlContent .= "    const containerWidth = document.getElementById('cards-container').offsetWidth;\n";
$htmlContent .= "    const cardWidth = containerWidth < 640 ? (containerWidth - 16) / 3 : (containerWidth - 24) / 4;\n";
$htmlContent .= "    cards.forEach(card => {\n";
$htmlContent .= "        card.style.width = cardWidth + 'px';\n";
$htmlContent .= "    });\n";
$htmlContent .= "}\n";
$htmlContent .= "window.addEventListener('resize', adjustCardSizes);\n";
$htmlContent .= "fetchData();\n";
$htmlContent .= "</script>\n";
$htmlContent .= "<style>\n";
$htmlContent .= "#cards-container {\n";
$htmlContent .= "    display: flex;\n";
$htmlContent .= "    flex-direction: column;\n";  // Arrange cards in a column
$htmlContent .= "    gap: 1rem;\n";               // Add spacing between cards
$htmlContent .= "}\n";
$htmlContent .= ".card {\n";
$htmlContent .= "    background-color: #000;\n";
$htmlContent .= "    color: #fff;\n";
$htmlContent .= "    font-size: 14px;\n";
$htmlContent .= "    padding: 0.5rem;\n";
$htmlContent .= "    border: 1px solid white;\n";
$htmlContent .= "    border-radius: 0.5rem;\n";
$htmlContent .= "    display: flex;\n";
$htmlContent .= "    align-items: center;\n";
$htmlContent .= "    justify-content: space-between;\n"; // Align content in the card
$htmlContent .= "    transition: box-shadow 0.3s;\n";
$htmlContent .= "}\n";
$htmlContent .= ".card:hover {\n";
$htmlContent .= "    box-shadow: 0 4px 8px rgba(255, 255, 255, 0.3);\n";
$htmlContent .= "}\n";
$htmlContent .= ".card-title {\n";
$htmlContent .= "    font-size: 14px;\n";
$htmlContent .= "    white-space: nowrap;\n";
$htmlContent .= "    overflow: hidden;\n";
$htmlContent .= "    text-overflow: ellipsis;\n";
$htmlContent .= "}\n";
$htmlContent .= ".card-price {\n";
$htmlContent .= "    font-size: 16px;\n";
$htmlContent .= "}\n";
$htmlContent .= ".card-currency {\n";
$htmlContent .= "    font-size: 14px;\n";
$htmlContent .= "}\n";
$htmlContent .= "@media (max-width: 640px) {\n";
$htmlContent .= "    .card {\n";
$htmlContent .= "        font-size: 12px;\n";
$htmlContent .= "        padding: 0.375rem;\n";
$htmlContent .= "    }\n";
$htmlContent .= "    .card-title {\n";
$htmlContent .= "        font-size: 12px;\n";
$htmlContent .= "    }\n";
$htmlContent .= "    .card-price {\n";
$htmlContent .= "        font-size: 14px;\n";
$htmlContent .= "    }\n";
$htmlContent .= "}\n";
$htmlContent .= "</style>\n";


$htmlContent .= "<script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@11\"></script>\n";
$htmlContent .= "<script>\n";
$htmlContent .= "    function formatPhoneNumber(phoneNumber) {\n";
$htmlContent .= "        if (phoneNumber.startsWith('+')) {\n";
$htmlContent .= "            phoneNumber = phoneNumber.substring(1);\n";
$htmlContent .= "        }\n";
$htmlContent .= "        if (phoneNumber.startsWith('0')) {\n";
$htmlContent .= "            phoneNumber = '254' + phoneNumber.substring(1);\n";
$htmlContent .= "        }\n";
$htmlContent .= "        if (phoneNumber.match(/^(7|1)/)) {\n";
$htmlContent .= "            phoneNumber = '254' + phoneNumber;\n";
$htmlContent .= "        }\n";
$htmlContent .= "        return phoneNumber;\n";
$htmlContent .= "    }\n";
$htmlContent .= "\n";
$htmlContent .= "document.addEventListener('DOMContentLoaded', function() {\n";
$htmlContent .= "    // Check if accountId exists in the cookie\n";
$htmlContent .= "    var accountId = getCookie('accountId');\n";
$htmlContent .= "    \n";
$htmlContent .= "    // If no accountId cookie exists, generate a new one and set the cookie\n";
$htmlContent .= "    if (!accountId) {\n";
$htmlContent .= "        accountId = generateAccountId(); // Use your function to generate the account ID\n";
$htmlContent .= "        setCookie('accountId', accountId, 7); // Set the cookie for 7 days\n";
$htmlContent .= "    }\n";
$htmlContent .= "    \n";
$htmlContent .= "    // Auto-fill the account ID in the username input field\n";
$htmlContent .= "    document.getElementById('usernameInput').value = accountId;\n";
$htmlContent .= "});\n";

$htmlContent .= "    function setCookie(name, value, days) {\n";
$htmlContent .= "        var expires = \"\";\n";
$htmlContent .= "        if (days) {\n";
$htmlContent .= "            var date = new Date();\n";
$htmlContent .= "            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));\n";
$htmlContent .= "            expires = \"; expires=\" + date.toUTCString();\n";
$htmlContent .= "        }\n";
$htmlContent .= "        document.cookie = name + \"=\" + (value || \"\") + expires + \"; path=/\";\n";
$htmlContent .= "    }\n";
$htmlContent .= "\n";
$htmlContent .= "    function getCookie(name) {\n";
$htmlContent .= "        var nameEQ = name + \"=\";\n";
$htmlContent .= "        var ca = document.cookie.split(';');\n";
$htmlContent .= "        for (var i = 0; i < ca.length; i++) {\n";
$htmlContent .= "            var c = ca[i];\n";
$htmlContent .= "            while (c.charAt(0) == ' ') c = c.substring(1, c.length);\n";
$htmlContent .= "            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);\n";
$htmlContent .= "        }\n";
$htmlContent .= "        return null;\n";
$htmlContent .= "    }\n";
$htmlContent .= "\n";
$htmlContent .= "    function generateAccountId() {\n";
$htmlContent .= "        return 'MobiTech' + Math.floor(100 + Math.random() * 9000); // Generate a random number between 100 and 9999\n";
$htmlContent .= "    }\n";
$htmlContent .= "\n";

$htmlContent .= "var loginTimeout; // Variable to store the timeout ID\n";
$htmlContent .= "function handlePhoneNumberSubmission(planId, routerId, price) {\n";

$htmlContent .= "    var msg = \"You are about to pay Kes: ${amount}. Enter phonenumber below and click pay now to initialize payment\";\n";
$htmlContent .= "    const regexp = /\\\${([^{}]+)}/g;\n";
$htmlContent .= "    let result = msg.replace(regexp, function(ignore, key) {\n";
$htmlContent .= "        return eval(key);\n";
$htmlContent .= "    });\n";
$htmlContent .= "    swal.fire({\n";
$htmlContent .= "        title: '<h2 style=\"color: #000; font-weight: bold;\">Enter Your Mpesa Number</h2>',\n";
$htmlContent .= "        input: 'number',\n";
$htmlContent .= "        inputAttributes: {\n";
$htmlContent .= "            required: 'true'\n";
$htmlContent .= "        },\n";
$htmlContent .= "        inputValidator: function(value) {\n";
$htmlContent .= "            if (value === '') {\n";
$htmlContent .= "                return 'You need to write your phonenumber!';\n";
$htmlContent .= "            }\n";
$htmlContent .= "        },\n";
$htmlContent .= "        text: result,\n";
$htmlContent .= "        showCancelButton: true,\n";
$htmlContent .= "        confirmButtonColor: '#28a745',\n";
$htmlContent .= "        cancelButtonColor: '#d33',\n";
$htmlContent .= "        confirmButtonText: 'Pay Now',\n";
$htmlContent .= "        showLoaderOnConfirm: true,\n";
$htmlContent .= "       background: 'rgba(255,255,255)', // Set black translucent background\n";
$htmlContent .= "        color: '#000',  // Text color (white)\n";
$htmlContent .= "    customClass: {\n";
$htmlContent .= "        popup: 'swal2-popup-custom' // Custom class for additional styling\n";
$htmlContent .= "    },\n";
$htmlContent .= "        preConfirm: (phoneNumber) => {\n";
$htmlContent .= "            var formattedPhoneNumber = formatPhoneNumber(phoneNumber);\n";
$htmlContent .= "            var accountId = getCookie('accountId');\n";
$htmlContent .= "            if (!accountId) {\n";
$htmlContent .= "                accountId = generateAccountId(); // Generate a new account ID\n";
$htmlContent .= "                setCookie('accountId', accountId, 7); // Set account ID as a cookie\n";
$htmlContent .= "            }\n";
$htmlContent .= "            document.getElementById('usernameInput').value = accountId; // Use account ID as the new username\n";
$htmlContent .= "            console.log(\"Phone number for autofill:\", formattedPhoneNumber);\n";
$htmlContent .= "\n";
$htmlContent .= "            return fetch('" . APP_URL . "/index.php?_route=plugin/CreateHotspotuser&type=grant', {\n";
$htmlContent .= "                method: 'POST',\n";
$htmlContent .= "                headers: {'Content-Type': 'application/json'},\n";
$htmlContent .= "                body: JSON.stringify({phone_number: formattedPhoneNumber, plan_id: planId, router_id: routerId, account_id: accountId}),\n";
$htmlContent .= "            })\n";
$htmlContent .= "            .then(response => {\n";
$htmlContent .= "                if (!response.ok) throw new Error('Network response was not ok');\n";
$htmlContent .= "                return response.json();\n";
$htmlContent .= "            })\n";
$htmlContent .= "            .then(data => {\n";
$htmlContent .= "                if (data.status === 'error') throw new Error(data.message);\n";
$htmlContent .= "                Swal.fire({\n";
$htmlContent .= "                    icon: 'info',\n";
$htmlContent .= "                    title: 'Processing..',\n";
$htmlContent .= "                    html: `A payment request has been sent to your phone. Please wait while we process your payment.`,\n";
$htmlContent .= "                    showConfirmButton: false,\n";
$htmlContent .= "                    allowOutsideClick: false,\n";
$htmlContent .= "    background: 'rgba(0, 0, 0, 0.8)', // Set black translucent background\n";
$htmlContent .= "    color: '#fff',  // Text color (white)\n";
$htmlContent .= "    customClass: {\n";
$htmlContent .= "        popup: 'swal2-popup-custom' // Custom class for additional styling\n";
$htmlContent .= "    },\n";
$htmlContent .= "                    didOpen: () => {\n";
$htmlContent .= "                        Swal.showLoading();\n";
$htmlContent .= "                        checkPaymentStatus(formattedPhoneNumber);\n";
$htmlContent .= "                    }\n";
$htmlContent .= "                });\n";
$htmlContent .= "                return formattedPhoneNumber;\n";
$htmlContent .= "            })\n";
$htmlContent .= "            .catch(error => {\n";
$htmlContent .= "                Swal.fire({\n";
$htmlContent .= "                    icon: 'error',\n";
$htmlContent .= "                    title: 'Oops...',\n";
$htmlContent .= "                    text: error.message,\n";
$htmlContent .= "    background: 'rgba(0, 0, 0, 0.8)', // Set black translucent background\n";
$htmlContent .= "    color: '#fff',  // Text color (white)\n";
$htmlContent .= "    customClass: {\n";
$htmlContent .= "        popup: 'swal2-popup-custom' // Custom class for additional styling\n";
$htmlContent .= "    },\n";
$htmlContent .= "                });\n";
$htmlContent .= "            });\n";
$htmlContent .= "        },\n";
$htmlContent .= "        allowOutsideClick: () => !Swal.isLoading()\n";
$htmlContent .= "    });\n";
$htmlContent .= "}\n";
$htmlContent .= "\n";
$htmlContent .= "function checkPaymentStatus(phoneNumber) {\n";
$htmlContent .= "    let checkInterval = setInterval(() => {\n";
$htmlContent .= "        $.ajax({\n";
$htmlContent .= "            url: '" . APP_URL . "/index.php?_route=plugin/CreateHotspotuser&type=verify',\n";
$htmlContent .= "            method: 'POST',\n";
$htmlContent .= "            data: JSON.stringify({account_id: document.getElementById('usernameInput').value}),\n";
$htmlContent .= "            contentType: 'application/json',\n";
$htmlContent .= "            dataType: 'json',\n";
$htmlContent .= "            success: function(data) {\n";
$htmlContent .= "                console.log('Raw Response:', data); // Debugging\n";
$htmlContent .= "                if (data.Resultcode === '3') { // Success\n";
$htmlContent .= "                    clearInterval(checkInterval);\n";
$htmlContent .= "                    Swal.fire({\n";
$htmlContent .= "                        icon: 'success',\n";
$htmlContent .= "                        title: 'Payment Successful',\n";
$htmlContent .= "                        text: data.Message,\n";
$htmlContent .= "    background: 'rgba(0, 0, 0, 0.8)', // Set black translucent background\n";
$htmlContent .= "    color: '#fff',  // Text color (white)\n";
$htmlContent .= "    customClass: {\n";
$htmlContent .= "        popup: 'swal2-popup-custom' // Custom class for additional styling\n";
$htmlContent .= "    },\n";
$htmlContent .= "                        showConfirmButton: false\n";
$htmlContent .= "                    });\n";
$htmlContent .= "                    if (loginTimeout) {\n";
$htmlContent .= "                        clearTimeout(loginTimeout);\n";
$htmlContent .= "                    }\n";
$htmlContent .= "                    loginTimeout = setTimeout(function() {\n";
$htmlContent .= "                        document.getElementById('loginForm').submit();\n";
$htmlContent .= "                    }, 2000);\n";
$htmlContent .= "                } else if (data.Resultcode === '2') { // Error\n";
$htmlContent .= "                    clearInterval(checkInterval);\n";
$htmlContent .= "                    let iconType = data.Status === 'danger' ? 'error' : data.Status;\n";
$htmlContent .= "                    Swal.fire({\n";
$htmlContent .= "                        icon: iconType,\n";
$htmlContent .= "                        title: 'Payment Issue',\n";
$htmlContent .= "                        text: data.Message,\n";
$htmlContent .= "    background: 'rgba(0, 0, 0, 0.8)', // Set black translucent background\n";
$htmlContent .= "    color: '#fff',  // Text color (white)\n";
$htmlContent .= "    customClass: {\n";
$htmlContent .= "        popup: 'swal2-popup-custom' // Custom class for additional styling\n";
$htmlContent .= "    },\n";
$htmlContent .= "                    });\n";
$htmlContent .= "                } else if (data.Resultcode === '1') { // Primary\n";
$htmlContent .= "                    // Continue checking\n";
$htmlContent .= "                }\n";
$htmlContent .= "            },\n";
$htmlContent .= "            error: function(xhr, textStatus, errorThrown) {\n";
$htmlContent .= "                console.log('Error: ' + errorThrown);\n";
$htmlContent .= "            }\n";
$htmlContent .= "        });\n";
$htmlContent .= "    }, 2000);\n";
$htmlContent .= "\n";
$htmlContent .= "    setTimeout(() => {\n";
$htmlContent .= "        clearInterval(checkInterval);\n";
$htmlContent .= "        Swal.fire({\n";
$htmlContent .= "            icon: 'warning',\n";
$htmlContent .= "            title: 'Timeout',\n";
$htmlContent .= "            text: 'Payment verification timed out. Please try again.',\n";
$htmlContent .= "    background: 'rgba(0, 0, 0, 0.8)', // Set black translucent background\n";
$htmlContent .= "    color: '#fff',  // Text color (white)\n";
$htmlContent .= "    customClass: {\n";
$htmlContent .= "        popup: 'swal2-popup-custom' // Custom class for additional styling\n";
$htmlContent .= "    },\n";
$htmlContent .= "        });\n";
$htmlContent .= "    }, 600000); // Stop checking after 60 seconds\n";
$htmlContent .= "}\n";
$htmlContent .= "</script>\n";

$htmlContent .= "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>\n";

$htmlContent .= "<script>\n";
$htmlContent .= "document.addEventListener('DOMContentLoaded', function() {\n";
$htmlContent .= "     // Ensure the button is correctly targeted by its ID.\n";
$htmlContent .= "     var submitBtn = document.getElementById('submitBtn');\n";
$htmlContent .= "     \n";
$htmlContent .= "     // Add a click event listener to the \"Login Now\" button.\n";
$htmlContent .= "     submitBtn.addEventListener('click', function(event) {\n";
$htmlContent .= "         event.preventDefault(); // Prevent the default button action.\n";
$htmlContent .= "         \n";
$htmlContent .= "         // Optional: Log to console for debugging purposes.\n";
$htmlContent .= "         console.log(\"Login Now button clicked.\");\n";
$htmlContent .= " \n";
$htmlContent .= "         // Direct form submission, bypassing the doLogin function for simplicity.\n";
$htmlContent .= "         var form = document.getElementById('loginForm');\n";
$htmlContent .= "         form.submit(); // Submit the form directly.\n";
$htmlContent .= "     });\n";
$htmlContent .= "});\n";
$htmlContent .= "</script>\n";
$htmlContent .= "<script>\n";
$htmlContent .= "var loginTimeout; // Variable to store the timeout ID\n";
$htmlContent .= "function redeemVoucher() {\n";
$htmlContent .= "    Swal.fire({\n";
$htmlContent .= "        title: '<h2 style=\"color: #ffffff; font-weight: bold;\">Redeem Voucher</h2>',\n";
$htmlContent .= "        input: 'text',\n";
$htmlContent .= "        inputPlaceholder: 'Enter voucher code',\n";
$htmlContent .= "        inputValidator: function(value) {\n";
$htmlContent .= "            if (!value) {\n";
$htmlContent .= "                return 'You need to enter a voucher code!';\n";
$htmlContent .= "            }\n";
$htmlContent .= "        },\n";
$htmlContent .= "        confirmButtonColor: '#28a745',\n";
$htmlContent .= "        cancelButtonColor: '#d33',\n";
$htmlContent .= "        confirmButtonText: 'Redeem',\n";
$htmlContent .= "        showLoaderOnConfirm: true,\n";
$htmlContent .= "    background: 'rgba(0, 0, 0, 0.8)', // Set black translucent background\n";
$htmlContent .= "    color: '#fff',  // Text color (white)\n";
$htmlContent .= "    customClass: {\n";
$htmlContent .= "        popup: 'swal2-popup-custom' // Custom class for additional styling\n";
$htmlContent .= "    },\n";
$htmlContent .= "        preConfirm: (voucherCode) => {\n";
$htmlContent .= "            var accountId = getCookie('accountId');\n";
$htmlContent .= "            if (!accountId) {\n";
$htmlContent .= "                accountId = generateAccountId();\n";
$htmlContent .= "                setCookie('accountId', accountId, 7);\n";
$htmlContent .= "            }\n";
$htmlContent .= "            return fetch('" . APP_URL . "/index.php?_route=plugin/CreateHotspotuser&type=voucher', {\n";
$htmlContent .= "                method: 'POST',\n";
$htmlContent .= "                headers: {'Content-Type': 'application/json'},\n";
$htmlContent .= "                body: JSON.stringify({voucher_code: voucherCode, account_id: accountId}),\n";
$htmlContent .= "            })\n";
$htmlContent .= "            .then(response => {\n";
$htmlContent .= "                if (!response.ok) throw new Error('Network response was not ok');\n";
$htmlContent .= "                return response.json();\n";
$htmlContent .= "            })\n";
$htmlContent .= "            .then(data => {\n";
$htmlContent .= "                if (data.status === 'error') throw new Error(data.message);\n";
$htmlContent .= "                return data;\n";
$htmlContent .= "            });\n";
$htmlContent .= "        },\n";
$htmlContent .= "        allowOutsideClick: () => !Swal.isLoading()\n";
$htmlContent .= "    }).then((result) => {\n";
$htmlContent .= "        if (result.isConfirmed) {\n";
$htmlContent .= "            Swal.fire({\n";
$htmlContent .= "                icon: 'success',\n";
$htmlContent .= "                title: 'Voucher Redeemed',\n";
$htmlContent .= "                text: result.value.message,\n";
$htmlContent .= "                showConfirmButton: false,\n";
$htmlContent .= "                allowOutsideClick: false,\n";
$htmlContent .= "    background: 'rgba(0, 0, 0, 0.8)', // Set black translucent background\n";
$htmlContent .= "    color: '#fff',  // Text color (white)\n";
$htmlContent .= "    customClass: {\n";
$htmlContent .= "        popup: 'swal2-popup-custom' // Custom class for additional styling\n";
$htmlContent .= "    },\n";
$htmlContent .= "                didOpen: () => {\n";
$htmlContent .= "                    Swal.showLoading();\n";
$htmlContent .= "                    var username = result.value.username;\n";
$htmlContent .= "                    console.log('Received username from server:', username);\n";
$htmlContent .= "                    var usernameInput = document.querySelector('input[name=\"username\"]');\n";
$htmlContent .= "                    if (usernameInput) {\n";
$htmlContent .= "                        console.log('Found username input element.');\n";
$htmlContent .= "                        usernameInput.value = username;\n";
$htmlContent .= "                        loginTimeout = setTimeout(function() {\n";
$htmlContent .= "                            var loginForm = document.getElementById('loginForm');\n";
$htmlContent .= "                            if (loginForm) {\n";
$htmlContent .= "                                loginForm.submit();\n";
$htmlContent .= "                            } else {\n";
$htmlContent .= "                                console.error('Login form not found.');\n";
$htmlContent .= "                                Swal.fire({\n";
$htmlContent .= "                                    icon: 'error',\n";
$htmlContent .= "                                    title: 'Error',\n";
$htmlContent .= "                                    text: 'Login form not found. Please try again.',\n";
$htmlContent .= "    background: 'rgba(0, 0, 0, 0.8)', // Set black translucent background\n";
$htmlContent .= "    color: '#fff',  // Text color (white)\n";
$htmlContent .= "    customClass: {\n";
$htmlContent .= "        popup: 'swal2-popup-custom' // Custom class for additional styling\n";
$htmlContent .= "    },\n";
$htmlContent .= "                                });\n";
$htmlContent .= "                            }\n";
$htmlContent .= "                        }, 2000);\n";
$htmlContent .= "                    } else {\n";
$htmlContent .= "                        console.error('Username input element not found.');\n";
$htmlContent .= "                        Swal.fire({\n";
$htmlContent .= "                            icon: 'error',\n";
$htmlContent .= "                            title: 'Error',\n";
$htmlContent .= "                            text: 'Username input not found. Please try again.',\n";
$htmlContent .= "    background: 'rgba(0, 0, 0, 0.8)', // Set black translucent background\n";
$htmlContent .= "    color: '#fff',  // Text color (white)\n";
$htmlContent .= "    customClass: {\n";
$htmlContent .= "        popup: 'swal2-popup-custom' // Custom class for additional styling\n";
$htmlContent .= "    },\n";
$htmlContent .= "                        });\n";
$htmlContent .= "                    }\n";
$htmlContent .= "                }\n";
$htmlContent .= "            });\n";
$htmlContent .= "        }\n";
$htmlContent .= "    }).catch(error => {\n";
$htmlContent .= "        Swal.fire({\n";
$htmlContent .= "            icon: 'error',\n";
$htmlContent .= "            title: 'Oops...',\n";
$htmlContent .= "            text: error.message,\n";
$htmlContent .= "    background: 'rgba(0, 0, 0, 0.8)', // Set black translucent background\n";
$htmlContent .= "    color: '#fff',  // Text color (white)\n";
$htmlContent .= "    customClass: {\n";
$htmlContent .= "        popup: 'swal2-popup-custom' // Custom class for additional styling\n";
$htmlContent .= "    },\n";
$htmlContent .= "        });\n";
$htmlContent .= "    });\n";
$htmlContent .= "}\n";
$htmlContent .= "</script>\n";

$htmlContent .= "<script>\n";
$htmlContent .= "var loginTimeout;\n";
$htmlContent .= "document.addEventListener('DOMContentLoaded', function() {\n";
$htmlContent .= "    document.getElementById('reconnectBtn').addEventListener('click', function() {\n";
$htmlContent .= "        var mpesaCode = document.getElementById('mpesaCodeInput').value;\n";
$htmlContent .= "        fetch('" . APP_URL . "/index.php?_route=plugin/CreateHotspotuser&type=reconnect', {\n";
$htmlContent .= "            method: 'POST',\n";
$htmlContent .= "            headers: {'Content-Type': 'application/json'},\n";
$htmlContent .= "            body: JSON.stringify({mpesa_code: mpesaCode}),\n";
$htmlContent .= "        })\n";
$htmlContent .= "        .then(response => response.json())\n";
$htmlContent .= "        .then(data => {\n";
$htmlContent .= "            if (data.Status === 'success') {\n";
$htmlContent .= "                Swal.fire({\n";
$htmlContent .= "                    icon: 'success',\n";
$htmlContent .= "                    title: 'Reconnection Successful',\n";
$htmlContent .= "                    text: data.Message,\n";
$htmlContent .= "                    showConfirmButton: false,\n";
$htmlContent .= "                    allowOutsideClick: false,\n";
$htmlContent .= "                    background: 'rgba(0, 0, 0, 0.8)', // Set black translucent background\n";
$htmlContent .= "                    color: '#fff',  // Text color (white)\n";
$htmlContent .= "                    customClass: {\n";
$htmlContent .= "                        popup: 'swal2-popup-custom' // Custom class for additional styling\n";
$htmlContent .= "                    },\n";
$htmlContent .= "                    didOpen: () => {\n";
$htmlContent .= "                        Swal.showLoading();\n";
$htmlContent .= "                        var username = data.username;\n";
$htmlContent .= "                        var usernameInput = document.querySelector('input[name=\"username\"]');\n";
$htmlContent .= "                        if (usernameInput) {\n";
$htmlContent .= "                            usernameInput.value = username;\n";
$htmlContent .= "                            loginTimeout = setTimeout(function() {\n";
$htmlContent .= "                                var loginForm = document.getElementById('loginForm');\n";
$htmlContent .= "                                if (loginForm) {\n";
$htmlContent .= "                                    loginForm.submit();\n";
$htmlContent .= "                                } else {\n";
$htmlContent .= "                                    Swal.fire({\n";
$htmlContent .= "                                        icon: 'error',\n";
$htmlContent .= "                                        title: 'Error',\n";
$htmlContent .= "                                        text: 'Login form not found. Please try again.',\n";
$htmlContent .= "                                    });\n";
$htmlContent .= "                                }\n";
$htmlContent .= "                            }, 2000);\n";
$htmlContent .= "                        } else {\n";
$htmlContent .= "                            Swal.fire({\n";
$htmlContent .= "                                icon: 'error',\n";
$htmlContent .= "                                title: 'Error',\n";
$htmlContent .= "                                text: 'Username input not found. Please try again.',\n";
$htmlContent .= "                            });\n";
$htmlContent .= "                        }\n";
$htmlContent .= "                    }\n";
$htmlContent .= "                });\n";
$htmlContent .= "            } else {\n";
$htmlContent .= "                Swal.fire({\n";
$htmlContent .= "                    icon: 'error',\n";
$htmlContent .= "                    title: 'Reconnection Failed',\n";
$htmlContent .= "                    text: data.Message,\n";
$htmlContent .= "                    background: 'rgba(0, 0, 0, 0.8)',\n";
$htmlContent .= "                    color: '#fff',\n";
$htmlContent .= "                    customClass: {\n";
$htmlContent .= "                        popup: 'swal2-popup-custom'\n";
$htmlContent .= "                    }\n";
$htmlContent .= "                });\n";
$htmlContent .= "            }\n";
$htmlContent .= "        })\n";
$htmlContent .= "        .catch(error => {\n";
$htmlContent .= "            Swal.fire({\n";
$htmlContent .= "                icon: 'error',\n";
$htmlContent .= "                title: 'Error',\n";
$htmlContent .= "                text: 'Failed to reconnect. Please try again later.',\n";
$htmlContent .= "                background: 'rgba(0, 0, 0, 0.8)',\n";
$htmlContent .= "                color: '#fff',\n";
$htmlContent .= "                customClass: {\n";
$htmlContent .= "                    popup: 'swal2-popup-custom'\n";
$htmlContent .= "                }\n";
$htmlContent .= "            });\n";
$htmlContent .= "        });\n";
$htmlContent .= "    });\n";
$htmlContent .= "});\n";
$htmlContent .= "</script>\n";

$htmlContent .= '<style>' . "\n";
$htmlContent .= '.swal2-popup-custom {' . "\n";
$htmlContent .= '    border-radius: 10px;' . "\n";
$htmlContent .= '    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);' . "\n";
$htmlContent .= '}' . "\n";
$htmlContent .= '</style>' . "\n";



$htmlContent .= "</html>\n";


$planStmt->close();
    $mysqli->close();

    if (isset($_GET['download']) && $_GET['download'] == '1') {
        $filename = "login.html";
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filename));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . strlen($htmlContent));
        echo $htmlContent;
        exit;
    }
}

