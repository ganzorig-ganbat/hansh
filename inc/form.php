<?php
  $str = file_get_contents('stock.json');
  $json = json_decode($str, true);
?>

<div class="uk-section uk-section-secondary">
  <div class="uk-container uk-container">
    <h3>Урсдаг самбарын тохиргоо</h3>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div>
        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
          <label><input class="uk-radio" type="radio" name="mainradio" value="online" <?php if (isset($connection) && $connection=="online") echo "checked";?>> Онлайн</label>
          <label><input class="uk-radio" type="radio" name="mainradio" value="offline" <?php if (isset($connection) && $connection=="offline") echo "checked";?>> Оффлайн</label>
        </div>
      </div>

      <div id="anhaa" <?php if (isset($connection) && $connection=="online") echo 'class="hidden"';?>>
      <div uk-grid>
        <div class="uk-width-1-2@m uk-form-horizontal">
          
          <fieldset class="uk-padding uk-padding-remove-vertical">
            <legend>Голомт банк:</legend>
            <?php
              foreach($valyuts as $key=>$val):
            ?>
            <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text"><?php echo $val; ?> авах</label>
              <div class="uk-form-controls">
                <input class="uk-input" name="golomt-<?php echo $key; ?>-avah" id="form-horizontal-text" type="number" step="0.01" placeholder="Авах..." value="<?php echo $json['golomt'][$key]['avah']; ?>">
              </div>
            </div>

            <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text"><?php echo $val; ?> зарах</label>
              <div class="uk-form-controls">
                <input class="uk-input" name="golomt-<?php echo $key; ?>-zarah" id="form-horizontal-text" type="number" step="0.01" placeholder="Зарах..." value="<?php echo $json['golomt'][$key]['zarah']; ?>">
              </div>
            </div>

            <hr>
            <?php endforeach; ?>

          </fieldset>

          
        </div>
        <div class="uk-width-1-2@m uk-form-horizontal">

          <fieldset class="uk-padding uk-padding-remove-vertical">
            <legend>Хаан банк:</legend>
            <?php
              foreach($valyuts as $key=>$val):
            ?>
            <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text"><?php echo $val; ?> авах</label>
              <div class="uk-form-controls">
                <input class="uk-input" name="khaan-<?php echo $key; ?>-avah" id="form-horizontal-text" type="number" step="0.01" placeholder="Авах..." value="<?php echo $json['khaan'][$key]['avah']; ?>">
              </div>
            </div>

            <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text"><?php echo $val; ?> зарах</label>
              <div class="uk-form-controls">
                <input class="uk-input" name="khaan-<?php echo $key; ?>-zarah" id="form-horizontal-text" type="number" step="0.01" placeholder="Зарах..." value="<?php echo $json['khaan'][$key]['zarah']; ?>">
              </div>
            </div>

            <hr>
            <?php endforeach; ?>

          </fieldset>
        </div>
      </div>

      <div uk-grid>
        <div class="uk-width-1-2@m uk-form-horizontal">

          <fieldset class="uk-padding uk-padding-remove-vertical">
            <legend>Худалдаа хөгжлийн банк:</legend>
            <?php
              foreach($valyuts as $key=>$val):
            ?>
            <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text"><?php echo $val; ?> авах</label>
              <div class="uk-form-controls">
                <input class="uk-input" name="hudaldaa-<?php echo $key; ?>-avah" id="form-horizontal-text" type="number" step="0.01" placeholder="Авах..." value="<?php echo $json['hudaldaa'][$key]['avah']; ?>">
              </div>
            </div>

            <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text"><?php echo $val; ?> зарах</label>
              <div class="uk-form-controls">
                <input class="uk-input" name="hudaldaa-<?php echo $key; ?>-zarah" id="form-horizontal-text" type="number" step="0.01" placeholder="Зарах..." value="<?php echo $json['hudaldaa'][$key]['zarah']; ?>">
              </div>
            </div>

            <hr>
            <?php endforeach; ?>

          </fieldset>

          
        </div>
        <div class="uk-width-1-2@m uk-form-horizontal">

          <fieldset class="uk-padding uk-padding-remove-vertical">
            <legend>Хувьцаа, индекс:</legend>
            
            <?php
              foreach($stocks as $key=>$val):
            ?>
            <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text"><?php echo $val; ?> ханш</label>
              <div class="uk-form-controls">
                <input class="uk-input" name="huvitsaa-<?php echo $key; ?>-hansh" id="form-horizontal-text" type="number" step="0.01" placeholder="Ханш..." value="<?php echo $json['huvitsaa'][$key]['hansh']; ?>">
              </div>
            </div>

            <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text"><?php echo $val; ?> зөрүү</label>
              <div class="uk-form-controls">
                <input class="uk-input" name="huvitsaa-<?php echo $key; ?>-zuruu" id="form-horizontal-text" type="number" step="0.01" placeholder="Зөрүү..." value="<?php echo $json['huvitsaa'][$key]['zuruu']; ?>">
              </div>
            </div>

            <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text"><?php echo $val; ?> хувь</label>
              <div class="uk-form-controls">
                <input class="uk-input" name="huvitsaa-<?php echo $key; ?>-huvi" id="form-horizontal-text" type="number" step="0.01" placeholder="Хувь..." value="<?php echo $json['huvitsaa'][$key]['huvi']; ?>">
              </div>
            </div>

            <hr>
            <?php endforeach; ?>

          </fieldset>
        </div>
      </div>
      </div>

      <div class="uk-margin">
        <p>
          <input type="submit" class="uk-button uk-button-primary" value="Эхлэх">
        </p>
      </div>
    </form>
  </div>
</div>