<main>
		
	<div class="main_page" id="main_page" style="position: absolute; left: -100%;">
		
	</div>
	
	<div class="catalog" id="catalog" style="position: static; right: 0px;">
		<div class="course-hero-module">
			<div class="header_backgound_img"></div>
				<div class="page_name">
					<div class="frame" id="main_title_frame">
						
					<h1 id="main_title">Блог</h1></div>
			</div>
		</div>
		<div class="wiper" id="wiper" style="background-color: white;"> 
			<div class="bread_crumbs frame">
				<div class="frame" id="path">
					
				<div class="bredcrumb" id="bredcrumb"><div class="pathes" id="programs_catalog"><a href="/">Главная</a></div><div class="pathes" id="blog">
				<a href="/blog">Блог</a><div class="pathes" id="blog_id_5">Анализ дожития: как предсказывать увольнения сотрудников и что на это влияет</div></div></div>
			</div>
			<div class="blocks_list_frame">
				<div class="blocks_menu" id="blocks_menu"><div class="block_area" id="block_area" style="height: auto;"><div class="swipe_block" style="transform: translateX(0%); position: relative;"><div class="blog_frame"><div class="blog_frame_940"><h1>Анализ дожития: как предсказывать увольнения сотрудников и что на это влияет</h1><div class="blog_info"><div class="author"><div>Автор статьи:</div><div>Евгений Бондаренко</div></div><div class="category"><div>Раздел:</div><div>null</div></div><div class="date"><div>Дата:</div><div>15.08.2017</div></div></div><div class="img"><div><img src="//dtekacademy.com/img/blog/Survival_plot_2.png" alt="Анализ дожития"></div></div><div class="common_text_content"><p><em>Данная статья подготовлена для учебных целей. Любые совпадения с реальными бизнесами или компаниями являются случайными.</em></p>  <h2>Задача</h2>  <p>Наша задача состоит в следующем. Проанализировать данные по уволенным сотрудникам и выявить факторы, которые влияют на уход. А также визуализировать полученный результат и сделать выводы.</p>  <h2>О подходе</h2>  <p>Мы будем использовать такой инструмент, как анализ дожития или анализ выживаемости (survival analysis).</p> <p>Анализ выживаемости – это в широком смысле построение статистических моделей, в которых эффект <strong><em><u>y</u></em></strong> (отклик) является функцией независимых переменных (<strong><em><u>х</u></em></strong>; <strong><em><u>t</u></em></strong>), где <strong><em><u>х</u></em></strong> – это уровень воздействия и/или факторы, которые влияют на время «жизни» изучаемых объектов <strong><em><u>t</u></em></strong>.</p> <p>А если говорить более конкретно о методе, то это мы будем использовать регрессию Кокса.</p> <p>Данный метод позволяет ответить на вопрос: с какой вероятностью и как долго сотрудник проработает до наступления определенного события (например, увольнение или назначение). А также найти драйверы, которые увеличивают или уменьшают время до наступления определенного события.</p> <p>Для тех, кто дочитает всю статью до конца, будет несколько <strong><em>инсайтов</em></strong> от меня относительно данного инструмента.</p>   <h2>Данные</h2>  <p>Мы будем анализировать данные компании об увольнениях и назначениях сотрудников за последние несколько лет. Загрузить датасет в R, а также посмотреть его содержание, можно так:</p> <p>q1 &lt;- read.table(«staff.csv», header = TRUE, sep = «;», na.strings = c(«»,NA), stringsAsFactors=FALSE)</p> <p>str(q1)</p> <p>head(q1)</p> <p><img class="alignnone size-full wp-image-3298" src="../img/blog/post_3/dataset-2.png" alt="" width="656" height="240" srcset="http://www.hr1.in.ua/wp-content/uploads/dataset-2.png 656w, http://www.hr1.in.ua/wp-content/uploads/dataset-2-300x110.png 300w" sizes="(max-width: 656px) 100vw, 656px"></p> <p>Мы видим, что у нас есть 303 наблюдения. Также мы видим формат данных всех наших переменных.</p> <p>В датасете у нас есть следующие данные:</p> <ul> <li>Номер – порядковый номер наблюдения</li> <li>Пол – пол сотрудника</li> <li>Учился – бинарная переменная, которая говорит нам о том, проходил ли какое-либо обучение сотрудник компании (1), или нет (0)</li> <li>Дата приема, Дата увольнения и Дата назначения</li> </ul> <h2>Подготовка данных</h2> <p>Для проведения анализа дожития по нашим увольнениям, первое, что нам нужно сделать, так это добавить новую переменную <strong><em><u>event</u></em></strong>, которая будет отвечать на вопрос: наступило ли событие (т.е. увольнение или нет).</p> <p>event = 1 – сотрудник уволился,</p> <p>event = 0 – сотрудник не уволился.</p> <p>Давайте это и сделаем.</p> <p>q1$event = 1</p> <p>q1$event[is.na(q1$Дата.увольнения)] = 0</p> <p>Чтобы посмотреть результат работы предыдущих строк кода, давайте посмотрим на таблицу:</p> <p>table(q1$event)</p> <p><img class="alignnone size-full wp-image-3299" src="../img/blog/post_3/table_1-1.png" alt="" width="146" height="61"></p> <p>Данная таблица показывает, сколько у нас сотрудников уволились (т.е. событие наступило = 49), и сколько сотрудников продолжают работать (т.е. событие не наступило = 254).</p> <p>Теперь нам нужно посчитать время в месяцах, которое прошло от момента приема и до момента увольнения. Т.е. нам нужно взять и от даты увольнения отнять дату приема. А в тех случаях, где событие не наступило, т.е. нет даты увольнения, мы подставим дату формирования этого набора данных.</p> <p>После всех этих операций, давайте посмотрим, что у нас получилось. Для этого достаточно вызвать функцию summary для переменной <strong><em><u>stag</u></em></strong>.</p> <p><img class="alignnone size-full wp-image-3300" src="../img/blog/post_3/summary_stag.png" alt="" width="554" height="79" srcset="http://www.hr1.in.ua/wp-content/uploads/summary_stag.png 554w, http://www.hr1.in.ua/wp-content/uploads/summary_stag-300x43.png 300w" sizes="(max-width: 554px) 100vw, 554px"></p> <p>В переменной <strong><em><u>stag</u></em></strong>&nbsp; у нас получилось кол-во месяцев работы в компании начиная с даты приема и заканчивая датой увольнения или датой формирования датасета.</p> <p>Мы можем видеть, что у нас нет никаких отрицательных значений и нет никаких тысяч и милионнов месяцев. Это говорит о том, что у нас не было ошибок в датах и мы все сделали верно.</p> <p>Мы завершили подготовку наших данных для анализа дожития.</p> <p>А именно, у нас есть переменные:</p> <p><strong><em><u>stag</u></em></strong> – это количество месяцев до наступления события,</p> <p><strong><em><u>event</u></em></strong> – событие наступило или нет (1 – наступило, 0 – нет).</p>   <h2>Анализ дожития</h2>  <p>Для своего анализа мы будем использовать регрессионную модель – это модель пропорциональных рисков Кокса (Cox proportional hazards model). Построить такую модель в R можно одно строчкой кода:</p> <p>w1 = coxph(Surv(stag, event) ~ 1 , data = q1)</p> <p>summary(w1)</p> <p><img class="alignnone size-full wp-image-3301" src="../img/blog/post_3/survival_model_1.png" alt="" width="465" height="107" srcset="http://www.hr1.in.ua/wp-content/uploads/survival_model_1.png 465w, http://www.hr1.in.ua/wp-content/uploads/survival_model_1-300x69.png 300w" sizes="(max-width: 465px) 100vw, 465px"></p> <p>Первая строка кода строит саму модель регрессии Кокса. Вторая – выводит результат на экран. Здесь важно отметить, что в данной модели у нас еще нет никакого фактора, который мы бы изучали. Запись «~1» в формуле означает, что мы строим модель без факторов. Такая модель позволит посмотреть на общую картину увольнений по компании.</p> <p>Давайте мы сейчас, эту самую картину и визуализируем. Для этого нам понадобиться следующий код:</p> <p>library(survminer)</p> <p>ggsurvplot(survfit(w1), palette = «#2E9FDF»,ggtheme = theme_minimal(),</p> <p>title = «График дожития (анализ увольнений)»,</p> <p>xlab = «Кол-во месяцев до увольнения»)</p> <p><img class="alignnone wp-image-3302 " src="../img/blog/post_3/Survival_plot_1.png" alt="" width="782" height="520" srcset="http://www.hr1.in.ua/wp-content/uploads/Survival_plot_1.png 963w, http://www.hr1.in.ua/wp-content/uploads/Survival_plot_1-300x199.png 300w, http://www.hr1.in.ua/wp-content/uploads/Survival_plot_1-768x510.png 768w" sizes="(max-width: 782px) 100vw, 782px"></p> <p>Что нам показывает данный график?</p> <p>По оси <strong><em>Y</em></strong> у нас вероятность дожития (т.е. наступления события, которое мы изучаем).</p> <p>По оси <strong><em>X</em></strong> у нас стаж в месяцах наших сотрудников.</p> <p>Толстая синяя линия показывает средний срок «жизни» в компании. А закрашенная голубая область 95%-ый доверительный интервал.</p> <p>Трактуется данная кривая следующим образом. Вероятность, что сотрудник проработает в компании <em><u>60 месяцев</u></em> (5 лет) – смотрим на ось <strong><em>Х</em></strong>, составляет чуть больше <em><u>0,5</u></em> – смотрим на ось <strong><em>Y</em></strong>.</p> <p>Если мы хотим получить точное значение среднего срока «жизни» в компании, тогда следует выполнить команду:</p> <p>quantile(survfit(w1))</p> <p><img class="alignnone size-full wp-image-3303" src="../img/blog/post_3/quantile.png" alt="" width="228" height="195"></p> <p>Средний срок «жизни» в компании равняется почти 65 месяцев (выделено красной пунктирной линией в полученной таблице).</p> <h2>Анализ факторов</h2> <p>Мы уже посмотрели общую картину в компании по увольнениям. Теперь давайте посмотрим, как обучение влияет и влияет ли на текучесть персонала.</p> <p>Для этого у нас в датасете есть переменная «Учился».</p> <p><img class="alignnone size-full wp-image-3304" src="../img/blog/post_3/dataset_2.png" alt="" width="656" height="118" srcset="http://www.hr1.in.ua/wp-content/uploads/dataset_2.png 656w, http://www.hr1.in.ua/wp-content/uploads/dataset_2-300x54.png 300w" sizes="(max-width: 656px) 100vw, 656px"></p> <p><span style="color: #000000; font-family: Calibri;">Это бинарная переменная: 1 – если сотрудник проходил какие-либо программы обучения в компании и 0 – если сотрудник не проходил никакого обучения.</span></p> <p><span style="color: #000000; font-family: Calibri;">Давайте посмотрим на распределение данной переменной.</span></p> <p><img class="alignnone size-full wp-image-3306" src="../img/blog/post_3/table_2.png" alt="" width="158" height="83"></p> <p>Теперь давайте построим модель Кокса и выведем результат:</p> <p>w1 = coxph(Surv(stag, event) ~ as.factor(Учился) , data = q1)</p> <p>summary(w1)</p> <p><img class="alignnone size-full wp-image-3307" src="../img/blog/post_3/survival_model_2.png" alt="" width="531" height="307" srcset="http://www.hr1.in.ua/wp-content/uploads/survival_model_2.png 531w, http://www.hr1.in.ua/wp-content/uploads/survival_model_2-300x173.png 300w" sizes="(max-width: 531px) 100vw, 531px"></p> <p>Из этого итога мы можем увидеть, что наш фактор «Учился» оказался значимым (<em>р=0.00351</em>) – выделено красной пунктирной линией.</p> <p>А знак минус («−») возле коэффициента нашего фактора (выделено зеленой пунктирной линией) говорит о том, что наличие данного фактора (т.е. когда сотрудник проходил программы обучения) снижает риск увольнения.</p> <p>Другими словами, обучение сотрудников связано с текучестью персонала.</p> <p>Давайте визуализируем полученный результат. Это можно сделать при помощи следующего кода.</p> <p>e = survfit(w1, newdata=data.frame(Учился = c(1, 0)))</p> <p>ggsurvplot(e, legend.labs=c(«Учился»,»Не учился»),</p> <p>ggtheme = theme_bw(), palette = c(«#E7B800», «#2E9FDF»),</p> <p>title = «График дожития (анализ увольнений)»,</p> <p>xlab = «Кол-во месяцев до увольнения»)</p> <p><img class="alignnone size-full wp-image-3308" src="../img/blog/post_3/Survival_plot_2.png" alt="" width="724" height="471" srcset="http://www.hr1.in.ua/wp-content/uploads/Survival_plot_2.png 724w, http://www.hr1.in.ua/wp-content/uploads/Survival_plot_2-300x195.png 300w" sizes="(max-width: 724px) 100vw, 724px"></p> <p><span style="color: #000000; font-family: Calibri;">Данный график нам еще раз показывает, что те сотрудники, которые обучаются в компании, работают дольше – желтая верхняя линия. Например, вероятность, что сотрудник, который обучался, проработает 48 месяцев (4 года) составляет почти 80%. А сотрудник, который не обучался, проработает 4 года с вероятностью чуть ниже 50%.</span></p> <p><span style="color: #000000; font-family: Calibri;">Или можем по-другому посмотреть на этот график. Например, сотрудник, который не учился, проработает в компании с вероятностью 60% чуть больше 3-х лет. А сотрудник, который проходил обучение с вероятностью 60% проработает уже почти 5-ть лет.</span></p> <p><span style="color: #000000; font-family: Calibri;">А теперь давайте посмотрим на фактор пола.</span></p> <p><img class="alignnone size-full wp-image-3309" src="../img/blog/post_3/survival_model_3.png" alt="" width="500" height="343" srcset="http://www.hr1.in.ua/wp-content/uploads/survival_model_3.png 500w, http://www.hr1.in.ua/wp-content/uploads/survival_model_3-300x206.png 300w" sizes="(max-width: 500px) 100vw, 500px"></p> <p>Как видно из итога, фактор пола получился незначимым для увольнений (<em><u>р=0,179</u></em>).</p> <p>Давайте визуализируем полученный результат:</p> <p><img class="alignnone size-full wp-image-3310" src="../img/blog/post_3/Survival_plot_3.png" alt="" width="816" height="587" srcset="http://www.hr1.in.ua/wp-content/uploads/Survival_plot_3.png 816w, http://www.hr1.in.ua/wp-content/uploads/Survival_plot_3-300x216.png 300w, http://www.hr1.in.ua/wp-content/uploads/Survival_plot_3-768x552.png 768w" sizes="(max-width: 816px) 100vw, 816px"></p> <p><span style="color: #000000; font-family: Calibri;">Мы видим, что наши две линии (Ж и М) находятся довольно близко друг к другу и их рисунок практически идентичный.</span></p> <p><span style="color: #000000; font-family: Calibri;">&nbsp;</span><span style="color: #000000; font-family: Calibri;">А теперь давайте посмотрим на два фактора вместе. Для этого в нашу формулу добавим и фактор Пола, и фактор Обучения в компании (Учился).</span></p> <p><img class="alignnone size-full wp-image-3311" src="../img/blog/post_3/survival_model_4.png" alt="" width="626" height="352" srcset="http://www.hr1.in.ua/wp-content/uploads/survival_model_4.png 626w, http://www.hr1.in.ua/wp-content/uploads/survival_model_4-300x169.png 300w" sizes="(max-width: 626px) 100vw, 626px"></p> <p>Первое, мы видим что теперь оба фактора оказались значимыми (<em><u>р=0,001</u></em> и <em><u>р=0,0395</u></em>).</p> <p>Второе, если человек учился, то это понижает риск увольнения. Об этом говорит знак минус возле коэффициента фактора Учился. И наоборот, отсутствие знака минус возле коэффициента фактора Пол (м) говорит о том, что, будучи мужчиной, риск увольнения сотрудника в данной компании увеличивается.</p> <p>Давайте добавим все четыре возможных комбинации наших факторов и изобразим результаты на графике.</p> <p>У нас могу быть следующие комбинации:</p> <ul> <li><i><em>Ж, проходила обучение</em></i></li> </ul> <ul> <li><em>М, проходил обучение</em></li> </ul> <ul> <li><em>Ж, не проходила обучение</em></li> </ul> <ul> <li><em>М, не проходил обучение</em></li> </ul> <p>&nbsp;</p> <p>e = survfit(w1, newdata=data.frame(Пол = c(«ж», «м», «ж», «м»), Учился = c(1, 1,0,0)))</p> <p>ggsurvplot(e, conf.int = F, legend.labs=c(«Ж — Обучалась», «М — Обучался»,»Ж — Не обучалась «, «М — Не обучался»),</p> <p>break.x.by= 12, break.y.by= 0.2,xlim= c(0,108),</p> <p>ggtheme = theme_bw(),</p> <p>title = «График дожития (анализ увольнений)»,</p> <p>xlab = «Кол-во месяцев до увольнения»)</p> <p><img class="alignnone size-full wp-image-3312" src="../img/blog/post_3/Survival_Plot_4.png" alt="" width="840" height="500" srcset="http://www.hr1.in.ua/wp-content/uploads/Survival_Plot_4.png 840w, http://www.hr1.in.ua/wp-content/uploads/Survival_Plot_4-300x179.png 300w, http://www.hr1.in.ua/wp-content/uploads/Survival_Plot_4-768x457.png 768w" sizes="(max-width: 840px) 100vw, 840px"></p> <p>Данная картинка замечательно иллюстрирует полученный нами выше результат. Дольше всего в компании будут работать женщины, которые проходят обучение. И быстрей всего будут уходить мужчины, которые ну обучаются.</p> <h2>Для продвинутых</h2> <p>В процессе работы с моделью рисков Кокса наткнулся на еще один аналогичный метод. Он называется Модели ускоренного времени AFT (Accelerated failure-time models).</p> <p>Метод АFT является альтернативой модели Кокса. Модели AFT разработаны, исходя из некоторого предположения о теоретическом распределении времени жизни. Данное предположение заключается в том, что изменение объясняющих переменных сопряжено с изменением масштаба времени наблюдаемого состояния объекта: т.е. ускорением или замедлением наступления момента изучаемого события.</p> <p>В R параметрические AFT-модели могут быть построены очень легко при помощи функции <em>survreg</em><em>()</em>. Давайте мы построим несколько аналогичных моделей с изучением наших двух факторов (Пол и Учился) с использованием различных видов распределений: <em>exponential, weibull, lognormal, logistic и gaussian</em>. А затем сравним все эти модели с нашей моделью Кокса и выберем лучшую.</p> <p>Все это можно сделать при помощи следующего кода:</p> <p><img class="alignnone size-full wp-image-3313" src="../img/blog/post_3/AFT.png" alt="" width="860" height="338" srcset="http://www.hr1.in.ua/wp-content/uploads/AFT.png 860w, http://www.hr1.in.ua/wp-content/uploads/AFT-300x118.png 300w, http://www.hr1.in.ua/wp-content/uploads/AFT-768x302.png 768w" sizes="(max-width: 860px) 100vw, 860px"></p> <p><span style="color: #000000; font-family: Calibri;">В результате мы получим следующую таблицу:</span></p> <p><img class="alignnone size-full wp-image-3314" src="../img/blog/post_3/AFT_results.png" alt="" width="242" height="139"></p> <p>В этой таблице мы видим рассчитанные по каждой модели логарифм правдоподобия и AIC-критерий. Наилучшей модели будет соответствовать максимальная оценка правдоподобия или минимальный AIC-критерий.</p> <p>Модель Кокса имеет самый минимальный AIC-критерий из всех шести протестированных моделей.</p> <h2>Выводы</h2> <p>Анализ выживаемости или анализ дожития (survival analysis) очень интересный и полезный инструмент. Данный метод позволяет выявлять факторы, которые влияют на текучесть сотрудников компании.</p> <p>Построить модель регрессии Кокса и потом ее понятно визуализировать крайне просто в R. И что немаловажно, такие расчеты и такие итоги вашего исследования внутри компании очень легко объяснить бизнесу и «продать» их внутри.</p> <h2>И еще обещанные вначале статьи мои инсайты.</h2> <p>Работая с данным инструментом (survival analysis) я понял, что:</p> <ol> <li>Начать его применять может практически любая компания и любой HR уже завтра из-за его простоты и понятности. Что необходимо, так это немного усидчивости и данные по вашим сотрудникам.</li> <li>Данный инструмент позволит ВАМ уже СЕГОДНЯ найти те факторы, которые влияют на текучесть ВАШИХ сотрудников в ВАШЕЙ компании. Т.е. не читать исследования каких-то других специалистов из каких-то других компаний и потом примерять их выводы к вашей компании и к вашим сотрудникам. А найти именно ВАШИ драйверы, которые влияют именно на ВАШУ текучесть.</li> </ol> <p>Р.S.: Ну и еще один вывод по итогам данного исследования – обучайте ваших сотрудников и тогда они проработают у вас дольше! <img draggable="false" class="emoji" alt="????" src="../img/blog/post_3/1f642.svg"></p> <p>Р.S.1.: Делаю для себя задел на будущее для следующей статьи. Провести анализ дожития, например, назначений. Т.е. будем искать факторы, которые драйвят наши назначения.</p> <p>Р.S.2.: Если хотите еще больше погрузиться в тему анализа увольнений, поучаствуйте в опросе Академии ДТЭК <a href="https://dtekacademy.com/oprosy/" target="_blank" rel="noopener">Ключевые факторы удержания и текучести персонала</a> (<a href="https://dtekacademy.com/oprosy/" target="_blank" rel="noopener">https://dtekacademy.com/oprosy/</a>) и мы пришлем вам отчет по его итогам.</p> <p>&nbsp;</p> <h3>Используемые источники при подготовке статьи:</h3> <ul> <li><i><em>Эдуард Бабушкин, Семинар-практикум «HR-Аналитика в R».</em></i></li> </ul> <ul> <li><em>В.К. Шитиков, «Экотоксикология и статистическое моделирование эффекта с использованием R».</em></li> </ul></div><div style="clear: both;"></div></div></div></div></div></div>
				<div class="bottom_retern" id="bottom_retern">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M491.318 235.318H20.682C9.26 235.318 0 244.578 0 256c0 11.423 9.26 20.682 20.682 20.682h470.636c11.423 0 20.682-9.26 20.682-20.682 0-11.422-9.26-20.682-20.682-20.682z"></path><path d="M49.932 256L211.795 94.136c8.077-8.077 8.077-21.172 0-29.25-8.077-8.075-21.172-8.075-29.25 0L6.06 241.377c-8.077 8.076-8.077 21.17 0 29.248l176.488 176.488c4.038 4.04 9.332 6.058 14.625 6.058 5.294 0 10.588-2.02 14.626-6.058 8.077-8.077 8.077-21.172 0-29.25L49.932 256z"></path></svg>
				</div>
			</div>
		 </div>
	 </div>
	 <div class="pages_area" id="pages_area">
		<div id="page_area"></div>
	</div> 
 </main>