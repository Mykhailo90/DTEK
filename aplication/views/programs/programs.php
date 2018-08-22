
<div style="background-color: grey;">
  <div class="courses-cards">
            <?php foreach($programs as $item) {?>
    <div class="card">
      <div class="top-card" style='background-image: url("../../../public/img/director.jpg");'>
        <!--<img src="img/director.jpg" alt="Для руководителей">-->
      </div>
      <div class="bottom-card">
        <h3>
                        <?php echo $item['title']?>
        </h3>
        <p><?php echo $item['short_info']?>
          <br> для затравочки</p>

      </div>
                <a class="button-link"><button class="default-button">ПОДРОБНЕЕ</button></a>
    </div>
            <?php }?>

  </div>
</div>

<section class="blog">
    <h2>Актуальные программы</h2>
    <div class="blog-container">
        <?php
            echo "$name";
        ?>
    </div>
    <div class="butt">
        <button class="default-button">ВСЕ ЗАПИСИ</button>
    </div>
</section>
