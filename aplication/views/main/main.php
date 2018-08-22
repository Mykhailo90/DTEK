

	<div class="slideshow-container darken">
        <?php foreach($baners as $item) {?>
		<div class="slide fade">
			<img src="<?php echo $item['img_path'];?>" style="width:100%">
			<div class="description">
			<h2><?php echo $item['title']; ?></h2>
			<p><?php echo $item['short_info']; ?></p>
			<button class="default-button"><?php echo $item['button_content']; ?></button>
			</div>
		</div>
        <?php }?>
        <a class="prev" onclick="plusSlides(-1)"><i class="fas fa-angle-left"></i></a>
        <a class="next" onclick="plusSlides(1)"><i class="fas fa-angle-right"></i></a>
	</div>


	<div id="slider-controllers">

	</div>
	<script src="../../../public/common.blocks/main_slider.js"></script>
	<div class="butt">
		<button class="calltoaction-button">CALL-TO-ACTION</button>
	</div>

	<section class="courses">
		<div class="courses-container">
			<h2>Направления</h2>
			<div class="courses-cards">
                <?php foreach($direction as $item) {?>
				<div class="card">
					<div class="top-card" style='background-image: url("../../../public/img/director.jpg");'>
						<!--<img src="img/director.jpg" alt="Для руководителей">-->
					</div>
					<div class="bottom-card">
						<h3>
                            <?php echo $item['title']; ?>
						</h3>
						<p><?php echo $item['short_info']; ?>
							<br> для затравочки</p>
                        <!--

                        поменять '/programs_catalog/' на правельный путь

                        -->

					</div>
                    <a class="button-link" href="<?php echo '/programs_catalog/' . $item['path_to_program']; ?>"><button class="default-button">ПОДРОБНЕЕ</button></a>
				</div>
                <?php }?>
			</div>
		</div>
	</section>

	<section class="event-calendar">
		<h2>Календарь событий</h2>
		<div class="events-calendar-container">

            <!--

            Удалить цыкл for сделать обращение к переменной $calendar

             -->
            <?php
//            for ($i=0; $i < 3; $i++) {
//                echo $calendar[$i]['title'] . '<br>' . $calendar[$i]['start_date'] . '<br>' . $calendar[$i]['place'] . '<br>' . $calendar[$i]['short_info'];
//                echo '<br>' . '<br>';
//            }
            ?>
			<div class="events-cards-container" id="events-list"></div>
			<div class="event-calendar__calendar"></div>
		</div>
		<div class="butt">
		    <button class="default-button">ВСЕ СОБЫТИЯ</button>
		</div>
	</section>
	<script src="../../../public/common.blocks/events_list.js"></script>

	<section class="feedback">
		<div class="feedback-container">
			<h2>Отзывы об Академии</h2>
			<div id="carousel" class="carousel">
				<a class="arrow prev">
                    <i class="fas fa-angle-left"></i>
                </a>
				<div class="gallery">
					<ul class="images">
                        <?php foreach($feedback as $item) {?>
						<li>
							<div class = "feedback-block">
								<div class="feedback-text">"<?php echo $item['msg']?>"</div>
								<div class="commentator-img circular">
                                    <img src="http://mylifeaslucille.com/wp-content/uploads/2018/05/hairstyle-for-square-face-man-square-face-hairstyles.jpg">
                                </div>
								<div class="feedback-author"><?php echo $item['user_name'] . ' ' . $item['user_surname']?></div>
								<div class="feedback-author-who"><?php echo $item['user_company']?></div>
							</div>
						</li>
                        <?php }?>
					</ul>
				</div>
				<a class="arrow next">
                    <i class="fas fa-angle-right"></i>
                </a>
			</div>
		</div>
	</section>

	<section class="popular-programs">
		<h2>Популярные программы обучения</h2>
		<div class="courses-container">



			<div class="courses-cards">
                <?php foreach($popular_programs as $item) {?>
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
            <div class="butt">
                <button class="calltoaction-button">CALL-TO-ACTION</button>
            </div>
		</div>

	</section>
    <script src="../../../public/common.blocks/feedbackSlider.js"></script>
    <script type="text/javascript">
        var calendar = jsCalendar.new(".event-calendar__calendar");
        var list = new eventList();
        list.refresh();
        var datesList = list.getDates();
        calendar.select(datesList);
        calendar.onDateClick(function (event, date) {
            list.setDateStart(date);
        });
    </script>
    <section class="blog">
        <h2>Блог Академии</h2>
        <div class="blog-container">
            <?php
                include_once(ROOT.'/public/common.blocks/parser.php');
            ?>
        </div>
        <div class="butt">
            <button class="default-button">ВСЕ ЗАПИСИ</button>
        </div>
    </section>

    <section class="main-feedback">
        <div class="container">

                <div class="writetous">
                    <h2>Напишите нам</h2>
                    <form class="contact_form" action="#" method="post" name="contact_form">
                        <ul>
                            <li class="label">
                                <label for="first-name">Имя<input type="text"  placeholder="Иван" required />
                                </label>
                            </li>
                            <li class="label">
                                <label for="last-name">Фамилия<input type="text"  placeholder="Петренко" required />
                                </label>
                            </li>
                            <li class="label">
                                <label for="email">E-mail<input type="email" name="email" placeholder="ivanpetrenko@example.com" required />
                                </label>
                            </li>
                            <li class="label">
                                <label for="phone">Телефон<input type="phone" name="phone" placeholder="+380123456789" required pattern="111"/>
                                </label>
                            </li>

                            <li class="text">
                                <label for="message">
                                    Сообщение
                                    <textarea name="message" cols="40" rows="6" required ></textarea>
                                </label>
                            </li>


                            <li>
                                <button class="calltoaction-button" type="submit">ОТПРАВИТЬ СООБЩЕНИЕ</button>
                            </li>

                        </ul>
                    </form>

                </div>
                                <div class="map">
                                    <h2>Будьте с нами на связи</h2>
<!--                                    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:220px;width:350px;'><div id='gmap_canvas' style='height:440px;width:700px;'></div><div><small><a href="https://embedgooglemaps.com/ru/">embedgooglemaps RU</a></small></div><div><small><a href="http://mrpromokod.ru/labirint/">http://mrpromokod.ru/labirint/</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:17,center:new google.maps.LatLng(50.439242333575024,30.498735313491807),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(50.439242333575024,30.498735313491807)});infowindow = new google.maps.InfoWindow({content:'<strong>Название</strong><br>Киев, Жилянская 75, Б<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>-->
                                <div class="googlemap" style="background-image: url('http://joomly.net/frontend/web/images/googlemap/map.png'); width: 100%; height: 60%; background-size: cover"></div>
                                </div>
            </div>

    </section>

    <section class="partners">
        <h2>У нас обучаются сотрудники</h2>
        <div class="partners-container">
<!--            --><?php //echo file_get_contents(ROOT . "/views/dtek_academy_newsite/img/visa_logo.svg"); ?>
			<?php echo file_get_contents(ROOT."/public/img/visa_logo.svg"); ?>
            <?php echo file_get_contents(ROOT."/public/img/kievstar_logo.svg"); ?>
            <?php echo file_get_contents(ROOT."/public/img/kievstar_logo.svg"); ?>
            <?php echo file_get_contents(ROOT."/public/img/kievstar_logo.svg"); ?>
            <?php echo file_get_contents(ROOT."/public/img/arterium_logo.svg"); ?>
            <?php echo file_get_contents(ROOT."/public/img/konti_logo.svg"); ?>
            <?php echo file_get_contents(ROOT."/public/img/nissan_logo.svg"); ?>
            <?php echo file_get_contents(ROOT."/public/img/jti_logo.svg"); ?>
            <?php echo file_get_contents(ROOT."/public/img/pumb_logo.svg"); ?>
            <?php echo file_get_contents(ROOT."/public/img/comfy_logo.svg"); ?>
        </div>
    </section>
