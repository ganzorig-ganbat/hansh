<?php
$response = array();
$banks = array(
  'golomt', 'khaan', 'hudaldaa'
  );

$valyuts = array(
  'usd' => 'АНУ-ын доллар',
  'eur' => 'Евро',
  'cny' => 'БНХАУ-ын юань',
  'rub' => 'ОХУ-ын рубль',
  'krw' => 'БНСУ-ын вон',
  'gbr' => 'Английн фунт',
  'jpy' => 'Японы иен',
  );

$connection = 'offline';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ( $_POST["mainradio"]=="offline" ) {
    include('inc/offline.php');
  }else{
    $connection = 'online';
    include('inc/online.php');
  }
}else{
  include('inc/offline.php');
}
?>

<div id="marq">
  <div class="marquee">
  <div class="marquee-item clearfix">
      <?php
        if(isset($response['huvitsaa'])):
        foreach( $response['huvitsaa'] as $stock):
      ?>
        <div class="stock-item">
          <div class="label">
            <span><?php echo $stock['label']; ?></span>
          </div>
          <div class="label">
            <span class="yellow"><?php echo $stock['hansh']; ?></span>
          </div>
          <div class="label bg <?php if( strpos($stock['zuruu'], '-') !== false) echo 'bg-red'; else 'bg-green'; ?>">
            <span><?php echo $stock['zuruu']; ?></span>
            <span><?php echo $stock['huvi']; ?></span>
          </div>
        </div>
      <?php 
        endforeach;
        endif;
      ?>
        </div><!-- Marque item -->
  </div>

  <div class="marquee">
    <div class="marquee-item clearfix">
    <?php foreach( $valyuts as $valyut=>$val): ?>
      <div class="marquee-block">
        <div class="stock-item">
          <div class="img-wrapper">
            <img src="images/<?php echo $valyut; ?>.png">
          </div>
          <div class="label">
            <span><?php echo $val; ?></span>
          </div>
        </div>

        <?php
          foreach( $banks as $bank):
          if(isset($response[$bank][$valyut]['avah']) && $response[$bank][$valyut]['zarah']):
        ?>
        <div class="stock-item">
          <div class="img-wrapper">
            <img src="images/<?php echo $bank; ?>.png">
          </div>
          <div class="label">
            <span>Авах:</span> 
            <span class="yellow"><?php echo $response[$bank][$valyut]['avah'] ?></span>
          </div>
          <div class="label">
            <span>Зарах:</span> 
            <span class="blue"><?php echo $response[$bank][$valyut]['zarah'] ?></span>
          </div>
        </div>
        <?php 
          endif;
          endforeach;
        ?>
      </div><!-- Marque block -->
      <?php endforeach; ?>

    </div><!-- Marque item -->
  </div>
</div>