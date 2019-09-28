<?php
include('inc/simple_html_dom.php');

$khaan = 'https://www.khanbank.com/mn/home/ratesForSites/';
$golomt = 'https://www.golomtbank.com/mn/home/ratesForSites/rate.json';
$tdb = 'https://www.tdbm.mn/script.php?mod=rate&ln=mn';

$huvitsaa = 'https://finance.yahoo.com/screener?.tsrc=fin-srch';

/* gets the data from a URL */
function get_data($url) {
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
  $content = curl_exec($ch);
  curl_close($ch);

  return $content;
}

// Getting golomt bank's html data
$json=get_data( $golomt );
$templ = json_decode($json, true);
$td = $templ['rates'];

if(isset($templ['rates'])){
  $response['golomt']['usd'] = array(
    'avah' => $td[0]["non_cash6_37_"],
    'zarah' => $td[0]['non_cash7_37_']
    );
  $response['golomt']['eur'] = array(
    'avah' => $td[1]['non_cash6_37_'],
    'zarah' => $td[1]['non_cash7_37_']
    );
  $response['golomt']['cny'] = array(
    'avah' => $td[2]['non_cash6_37_'],
    'zarah' => $td[2]['non_cash7_37_']
    );
  $response['golomt']['rub'] = array(
    'avah' => $td[3]['non_cash6_37_'],
    'zarah' => $td[3]['non_cash7_37_']
    );
  $response['golomt']['krw'] = array(
    'avah' => $td[7]['non_cash6_37_'],
    'zarah' => $td[7]['non_cash7_37_']
    );
  $response['golomt']['gbr'] = array(
    'avah' => $td[5]['non_cash6_37_'],
    'zarah' => $td[5]['non_cash7_37_']
    );
  $response['golomt']['jpy'] = array(
    'avah' => $td[4]['non_cash6_37_'],
    'zarah' => $td[4]['non_cash7_37_']
    );
}


// Getting khaan bank's html data
$html=get_data( $khaan );
$templ = str_get_html($html);
$td = $templ->find('tr td');
if(isset($td[1])){
$response['khaan']['usd'] = array(
  'avah' => $td[1]->plaintext,
  'zarah' => $td[2]->plaintext
  );
$response['khaan']['eur'] = array(
  'avah' => $td[6]->plaintext,
  'zarah' => $td[7]->plaintext
  );
$response['khaan']['cny'] = array(
  'avah' => $td[11]->plaintext,
  'zarah' => $td[12]->plaintext
  );
$response['khaan']['rub'] = array(
  'avah' => $td[16]->plaintext,
  'zarah' => $td[17]->plaintext
  );
$response['khaan']['krw'] = array(
  'avah' => $td[36]->plaintext,
  'zarah' => $td[37]->plaintext
  );
$response['khaan']['gbr'] = array(
  'avah' => $td[26]->plaintext,
  'zarah' => $td[27]->plaintext
  );
$response['khaan']['jpy'] = array(
  'avah' => $td[21]->plaintext,
  'zarah' => $td[22]->plaintext
  );
}

// Getting tdb's html data
$html=get_data( $tdb );
$templ = str_get_html($html);
$td = $templ->find('td');

if(isset($td[13])){
$response['hudaldaa']['usd'] = array(
  'avah' => $td[13]->plaintext,
  'zarah' => $td[14]->plaintext
  );
$response['hudaldaa']['eur'] = array(
  'avah' => $td[19]->plaintext,
  'zarah' => $td[20]->plaintext
  );
$response['hudaldaa']['cny'] = array(
  'avah' => $td[37]->plaintext,
  'zarah' => $td[38]->plaintext
  );
$response['hudaldaa']['rub'] = array(
  'avah' => $td[31]->plaintext,
  'zarah' => $td[32]->plaintext
  );
$response['hudaldaa']['krw'] = array(
  'avah' => $td[43]->plaintext,
  'zarah' => $td[44]->plaintext
  );
$response['hudaldaa']['gbr'] = array(
  'avah' => $td[25]->plaintext,
  'zarah' => $td[26]->plaintext
  );
$response['hudaldaa']['jpy'] = array(
  'avah' => $td[67]->plaintext,
  'zarah' => $td[68]->plaintext
  );
}


// Getting huvitsaa's html data
$html=get_data( $huvitsaa );
$templ = str_get_html($html);
$labels = $templ->find('.Carousel-Slider .Ell');
$hanshs = $templ->find('.Carousel-Slider li span');
$index = -1;
$hanshIndex = 0;
foreach ($labels as $label) {
  $index++;
  $arr = array();

  $arr['label'] = $label->plaintext;
  $arr['hansh'] = $hanshs[$hanshIndex++]->plaintext;
  $arr['zuruu'] = $hanshs[$hanshIndex++]->plaintext;
  $hanshIndex++;
  $arr['huvi'] = $hanshs[$hanshIndex++]->plaintext;
  $response['huvitsaa'][$index] = $arr;
}