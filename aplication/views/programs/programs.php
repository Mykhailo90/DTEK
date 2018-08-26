

<div class="delimeter">
  <div class="left"></div>
  <div class="right"></div>
</div>

<div class="programs_page">


  <section class="filtr">
    <div class="filtr_form">
      <form>
        <fieldset>
          <legend>Фильтр вывода</legend>
          <div class="tr">
            <div class="r">
              <label for="type">Тип <em>*</em></label>
                <select id='type_event'>
                  <option selected value="">Выберите Тип</option>
                  <?php foreach ($filterType as $value): ?>
                    <option value="<?php echo $value['id']; ?>"><?php echo $value['type_name']; ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
            <div class="r">
              <label for="direction">Для кого</label>
              <select id='direction'>
                <option selected value="">Выберите направление</option>
                <?php foreach ($filterForWhom as $value): ?>
                  <option value="<?php echo $value['id_direction'] ?>"><?php echo $value['title'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="r">
              <label for="subject_name">Тематика</label>
              <select id='subject'>
                <option selected value="">Сфера применения</option>
                <?php foreach ($filterSubjects as $val): ?>
                  <option value="<?php echo $val['id'] ?>"><?php echo $val['subject_name'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="r">
              <label for="trener">Куратор</label>
              <select id='trener'>
                <option selected value="">Укажите тренера</option>
                <?php foreach ($filterTrainer as $val): ?>
                  <option value="<?php echo $val['id'] ?>"><?php echo $val['trener_name'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="r">
              <label for="time">Дата</label>
              <select id="time">
                <option selected value="">Выберите время</option>
                <option name = "s" value="this_week">На этой неделе</option>
                <option value="this_month">В этом месяце</option>
                <option value="undef">Группа формируется</option>
              </select>
            </div>
            <div class="r">
              <label for="price">Цена</label>
              <select id="price">
                <option selected value="">Фильт стоимости</option>
                <option value="1">До 500 грн</option>
                <option value="2">501-1000 грн</option>
                <option value="3">1001-3500 грн</option>
                <option value="4">3501-6500 грн</option>
                <option value="5">6501-10000 грн</option>
                <option value="6">10001-25000 грн</option>
                <option value="7">25001-50000 грн</option>
                <option value="8">50001+ грн</option>
              </select>
            </div>
          </div>
        </fieldset>
        <p class="button">
          <input class="default-button, filt_button"  type="submit" value="Отправить">
        </p>
      </form>
    </div>

  </section>

  <section class="prog_list">
      <div class="list">
      <?php foreach ($programs as $value) {?>

          <div class='prog_cards'>
            <img class="prog_image" width="150" height="150" src="../../../public/img/corporate.jpg" alt="f1">
            <div class="cards_content">
              <h2 class="prog_title"><?php echo $value['title'];?></h2>
              <a href="<?php echo $value['path_to_program']; ?>"><p class="text_content">
                <?php echo $value['short_info']; ?>
              </p></a>
            </div>
          </div>

          <?php } ?>
        </div>

      <div class="pagination">
        <?php
          for ($i=1; $i <= $pages ; $i++) { ?>
            <a <?php
              if ($i == 1)
              {
                echo "id = 'current'";
              }
             ?>data-page="<?php echo $i;?>" href="/<?php echo $url?>"><?php echo $i;?></a>
        <?php } ?>
      </div>
  </section>
</div>
<script type="text/javascript" src="public/js/programs/programs_filter.js"></script>
