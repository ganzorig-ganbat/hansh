<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $response = array(
    'golomt' => array(
      'usd' => array(
        'avah' => test_input($_POST["golomt-usd-avah"]),
        'zarah' => test_input($_POST["golomt-usd-zarah"])
        ),
      'eur' => array(
        'avah' => test_input($_POST["golomt-eur-avah"]),
        'zarah' => test_input($_POST["golomt-eur-zarah"])
        ),
      'cny' => array(
        'avah' => test_input($_POST["golomt-cny-avah"]),
        'zarah' => test_input($_POST["golomt-cny-zarah"])
        ),
      'rub' => array(
        'avah' => test_input($_POST["golomt-rub-avah"]),
        'zarah' => test_input($_POST["golomt-rub-zarah"])
        ),
      'krw' => array(
        'avah' => test_input($_POST["golomt-krw-avah"]),
        'zarah' => test_input($_POST["golomt-krw-zarah"])
        ),
      'gbr' => array(
        'avah' => test_input($_POST["golomt-gbr-avah"]),
        'zarah' => test_input($_POST["golomt-gbr-zarah"])
        ),
      'jpy' => array(
        'avah' => test_input($_POST["golomt-jpy-avah"]),
        'zarah' => test_input($_POST["golomt-jpy-zarah"])
        ),
      ),
    'hudaldaa' => array(
      'usd' => array(
        'avah' => test_input($_POST["hudaldaa-usd-avah"]),
        'zarah' => test_input($_POST["hudaldaa-usd-zarah"])
        ),
      'eur' => array(
        'avah' => test_input($_POST["hudaldaa-eur-avah"]),
        'zarah' => test_input($_POST["hudaldaa-eur-zarah"])
        ),
      'cny' => array(
        'avah' => test_input($_POST["hudaldaa-cny-avah"]),
        'zarah' => test_input($_POST["hudaldaa-cny-zarah"])
        ),
      'rub' => array(
        'avah' => test_input($_POST["hudaldaa-rub-avah"]),
        'zarah' => test_input($_POST["hudaldaa-rub-zarah"])
        ),
      'krw' => array(
        'avah' => test_input($_POST["hudaldaa-krw-avah"]),
        'zarah' => test_input($_POST["hudaldaa-krw-zarah"])
        ),
      'gbr' => array(
        'avah' => test_input($_POST["hudaldaa-gbr-avah"]),
        'zarah' => test_input($_POST["hudaldaa-gbr-zarah"])
        ),
      'jpy' => array(
        'avah' => test_input($_POST["hudaldaa-jpy-avah"]),
        'zarah' => test_input($_POST["hudaldaa-jpy-zarah"])
        ),
      ),
    'khaan' => array(
      'usd' => array(
        'avah' => test_input($_POST["khaan-usd-avah"]),
        'zarah' => test_input($_POST["khaan-usd-zarah"])
        ),
      'eur' => array(
        'avah' => test_input($_POST["khaan-eur-avah"]),
        'zarah' => test_input($_POST["khaan-eur-zarah"])
        ),
      'cny' => array(
        'avah' => test_input($_POST["khaan-cny-avah"]),
        'zarah' => test_input($_POST["khaan-cny-zarah"])
        ),
      'rub' => array(
        'avah' => test_input($_POST["khaan-rub-avah"]),
        'zarah' => test_input($_POST["khaan-rub-zarah"])
        ),
      'krw' => array(
        'avah' => test_input($_POST["khaan-krw-avah"]),
        'zarah' => test_input($_POST["khaan-krw-zarah"])
        ),
      'gbr' => array(
        'avah' => test_input($_POST["khaan-gbr-avah"]),
        'zarah' => test_input($_POST["khaan-gbr-zarah"])
        ),
      'jpy' => array(
        'avah' => test_input($_POST["khaan-jpy-avah"]),
        'zarah' => test_input($_POST["khaan-jpy-zarah"])
        ),
      ),
    'huvitsaa' => array(
      'dax' => array(
        'hansh' => test_input($_POST["huvitsaa-dax-hansh"]),
        'zuruu' => test_input($_POST["huvitsaa-dax-zuruu"]),
        'huvi' => test_input($_POST["huvitsaa-dax-huvi"]),
        ),
      'sax' => array(
        'hansh' => test_input($_POST["huvitsaa-sax-hansh"]),
        'zuruu' => test_input($_POST["huvitsaa-sax-zuruu"]),
        'huvi' => test_input($_POST["huvitsaa-sax-huvi"]),
        ),
      'sc' => array(
        'hansh' => test_input($_POST["huvitsaa-sc-hansh"]),
        'zuruu' => test_input($_POST["huvitsaa-sc-zuruu"]),
        'huvi' => test_input($_POST["huvitsaa-sc-huvi"]),
        ),
      't20' => array(
        'hansh' => test_input($_POST["huvitsaa-t20-hansh"]),
        'zuruu' => test_input($_POST["huvitsaa-t20-zuruu"]),
        'huvi' => test_input($_POST["huvitsaa-t20-huvi"]),
        ),
      'ftse' => array(
        'hansh' => test_input($_POST["huvitsaa-ftse-hansh"]),
        'zuruu' => test_input($_POST["huvitsaa-ftse-zuruu"]),
        'huvi' => test_input($_POST["huvitsaa-ftse-huvi"]),
        ),
      'hs' => array(
        'hansh' => test_input($_POST["huvitsaa-hs-hansh"]),
        'zuruu' => test_input($_POST["huvitsaa-hs-zuruu"]),
        'huvi' => test_input($_POST["huvitsaa-hs-huvi"]),
        ),
      ),
    );

  $fp = fopen('stock.json', 'w');
  fwrite($fp, json_encode($response));
  fclose($fp);
}