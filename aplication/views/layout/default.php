<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <meta name="msapplication-config" content="img/logo/favicon/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">
  <meta name="description" content="Консалтинг, корпоративное обучение, тренинги  для вашего бизнеса от экспертов Академии ДТЭК.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="120x120" href="https://dtekacademy.com/img/logo/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" href="https://dtekacademy.com/img/logo/favicon/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="https://dtekacademy.com/img/logo/favicon/favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="https://dtekacademy.com/img/logo/favicon/manifest.json">
  <link rel="mask-icon" href="https://dtekacademy.com/img/logo/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="shortcut icon" href="https://dtekacademy.com/img/logo/favicon/favicon.ico">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
   crossorigin="anonymous">

  <!--calendar-->
  <link rel="stylesheet" href="../../../public/common.blocks/main_calendar.css">

  <!--slider-->
  <link rel="stylesheet" href="../../../public/common.blocks/main_slider.css">

    <!--feedback-->
    <link rel="stylesheet" href="../../../public/common.blocks/feedbackSlider.css">

    <!--blog-->
    <link rel="stylesheet" href="../../../public/common.blocks/main_blog.css">

    <!--blog-->
    <link rel="stylesheet" href="../../../public/common.blocks/footer.css">

    <!--contact-form-->
    <link rel="stylesheet" href="../../../public/common.blocks/contact_form.css">

  <title>Академия ДТЭК: Образовательная платформа для бизнеса в Украине</title>


  <link rel="stylesheet" type="text/css" href="../../../public/common.blocks/jsCalendar.css">


<!--    HAMBURGER START!!!-->
    <link rel="stylesheet" type="text/css" href="../../../public/common.blocks/hamburgerMenu.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



    <script type="text/javascript" src="../../../public/common.blocks/hamburgerMenu.js"></script>

    <!--    HAMBURGER END!!!-->

    <script type="text/javascript">
        // pass PHP variable declared above to JavaScript variable
        // var g_calendar_json = <?//php echo json_encode($calendar) ?>;
    </script>

  <!-- jsCalendar -->
  <script type="text/javascript" src="../../../public/common.blocks/jsCalendar.js"></script>
  <script type="text/javascript" src="../../../public/js/programs/programs.js">

  </script>


  <!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->



  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-7243260-2']);
    _gaq.push(['_trackPageview']);
    (function () {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>

  <link rel="stylesheet" href="../../../public/styles/programs/programs.css">
  <link rel="stylesheet" href="../../../public/styles/newstyle.css">
  <link rel="stylesheet" href="../../../public/styles/media.css">
  <link rel="stylesheet" href="../../../public/styles/layout.css">
</head>

<body>

  <header>
    <div class="reigistr_menu">
      <div class="top-bar">
        <ul class="left-side">
          <li>
            <a href="#">
              <i class="fas fa-phone-square"></i> +38044 594 42 03</a>
          </li>
          <li>
            <a href="#">Контакты</a>
          </li>
          <li>
            <a href="#">Блог</a>
          </li>
        </ul>

        <ul class="right-side">
          <li>
            <a href="#">
              <i class="fas fa-globe"></i> RU
              <i class="fas fa-angle-down"></i>
            </a>
          </li>
          <li>
            <a href="#">Вход</a>
          </li>
          <li>
            <a href="#">Регистрация</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="header-container">
            <div class="wrapper">
                <div class="material-design-hamburger">
                    <a class="material-design-hamburger__icon">
                        <span class="material-design-hamburger__layer"></span>
                    </a>
                </div>
                <section class="menu menu--off">
                    <?php foreach($navMenu as $item) { ?>
                        <div>
                            <a href="/<?php echo $item['path_to_program']; ?>"><?php echo $item['title']; ?></a>
                        </div>
                    <?php } ?>
                </section>
            </div>
            <div class="logo">
        <div>
          <a href="/">
            <svg class="svg_logo" xmlns="http://www.w3.org/2000/svg" viewBox="160 190 538 214.5">
              <path fill="rgba(254,209,0,1)" d="M186.9 316.3H166v83.5h20.9c22.8 0 41.2-18.7 41.2-41.8.1-23-18.4-41.7-41.2-41.7"></path>
              <path d="M187 291.3h-21v25h21c22.7 0 41.2 18.7 41.2 41.7 0 23.1-18.5 41.8-41.2 41.8h-21v25h21c36.4 0 66.7-27 66.7-66.8 0-40.2-30.3-66.7-66.7-66.7m53.3 108.5v25H265v-25h-24.7zm247.4-41.7l48.5-49.1v-17.7h-18.3l-56.7 57.4v-57.4H240.5v25H287v108.5h25.9V316.3h46.7c-8.5 11-13.7 25.2-13.7 41.7 0 39.8 30.3 66.8 66.7 66.8h48.5v-57.4l56.7 57.4h35.8l-65.9-66.7zm-52.4 41.7h-22.6c-18.6 0-34.3-12.5-39.4-29.7h36.6V346h-36.6c5.1-17.1 20.9-29.6 39.4-29.6h22.6v83.4z"></path>
              <g>
                <path d="M190.3 170.4h14.8l29.5 77.6h-15.2l-6-16h-31.3l-6.2 16h-15.2l29.6-77.6zm7.5 20.6l-10.3 26.6H208L197.8 191zM244.3 190.6h14.2v21.5l19.6-21.5h17.4l-25.2 28 25.5 29.4h-18.9L260 227.7l-1.5 1.8V248h-14.2v-57.4zM343.4 190.6h14.2V248h-14.2v-6.1c-2.8 2.7-5.6 4.6-8.4 5.8-2.8 1.2-5.8 1.8-9.1 1.8-7.3 0-13.6-2.9-19-8.6-5.3-5.7-8-12.9-8-21.4 0-8.9 2.6-16.1 7.8-21.8 5.2-5.7 11.4-8.5 18.8-8.5 3.4 0 6.6.6 9.6 2 3 1.3 5.7 3.3 8.3 5.9v-6.5zm-15 11.8c-4.4 0-8 1.6-11 4.7-2.9 3.1-4.4 7.2-4.4 12.1 0 5 1.5 9 4.4 12.2 3 3.2 6.6 4.8 10.9 4.8 4.5 0 8.2-1.6 11.1-4.7 2.9-3.1 4.4-7.3 4.4-12.4 0-5-1.5-9-4.4-12.1-2.8-3-6.5-4.6-11-4.6zM379.3 248v10h-12.7v-22.2h8.5l19.6-45.2h9.2l19.8 45.2h8.7V258h-13.5v-10h-39.6zm29.3-12.2l-9.3-24.2-9.6 24.2h18.9zM498.1 223.5h-45.7c.7 4.1 2.4 7.3 5.3 9.7 2.9 2.4 6.5 3.6 11 3.6 5.3 0 9.9-1.9 13.7-5.6l12 5.7c-3 4.3-6.6 7.5-10.7 9.5s-9.1 3.1-14.8 3.1c-8.9 0-16.1-2.8-21.7-8.5-5.6-5.7-8.4-12.8-8.4-21.3 0-8.8 2.8-16 8.4-21.8 5.6-5.8 12.6-8.7 21-8.7 8.9 0 16.2 2.9 21.8 8.7 5.6 5.8 8.4 13.4 8.4 22.9l-.3 2.7zm-14.2-11.4c-.9-3.2-2.8-5.8-5.6-7.8s-6-3-9.6-3c-4 0-7.4 1.1-10.4 3.4-1.9 1.4-3.6 3.9-5.2 7.4h30.8zM544.3 226.8l17.4-36.2h9.4l14.2 57.4h-13.9l-7.6-33.7-16.9 33.7h-5.8l-16.5-33.7L517 248h-13.9l14.2-57.4h9.4l17.6 36.2zM600.7 248h-7.6v-57.4H607v33.7l29-33.7h6.8V248H629v-33l-28.3 33zM666.8 224.5c-3.1-1-5.6-2.9-7.5-5.8-2-2.8-2.9-6-2.9-9.6 0-4.3 1.2-8 3.6-11.2 2.4-3.2 5.3-5.2 8.6-6.1 3.3-.8 8.5-1.3 15.5-1.3h14.4V248h-14.2v-20.8h-2.8L667.9 248h-16.8l15.7-23.5zm17.4-8.1v-13.8h-5c-5.4 0-8.1 2.3-8.1 6.9 0 4.6 3 6.9 9 6.9h4.1z"></path>
              </g>
            </svg>
          </a>
        </div>
      </div>
      <input type="checkbox" id="menu-checkbox">
      <nav role="navigation">
        <label for="menu-checkbox" class="toggle-button" data-open="Menu" data-close="Close" onclick></label>
        <ul class="main-menu">
          <?php foreach($navMenu as $item) { ?>
          <li>
            <a href="/<?php echo $item['path_to_program']; ?>"><?php echo $item['title']; ?></a>
          </li>
          <?php } ?>
        </ul>
      </nav>
    </div>

  </header>












      <?php echo "$content"; ?>


















      <footer>
          <div class="frame">
            <div class="frame_left">
              <div class="footer_blocks">
                  <h2>Академия ДТЭК</h2>
                  <ul>
                      <li class ="f_contacts">
                          <div>
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 211.621 211.621"><path d="M180.948 27.722C163.07 9.844 139.298 0 114.018 0c-4.144 0-7.5 3.358-7.5 7.5 0 4.142 3.357 7.5 7.5 7.5 21.275 0 41.278 8.284 56.323 23.33 15.047 15.044 23.332 35.048 23.33 56.325 0 4.142 3.358 7.5 7.5 7.5 4.143 0 7.5-3.358 7.5-7.5.002-25.284-9.843-49.055-27.722-66.933z"></path><path d="M150.096 94.656c0 4.142 3.358 7.5 7.5 7.5 4.143 0 7.5-3.36 7.5-7.5-.002-28.16-22.916-51.074-51.078-51.078-4.143 0-7.5 3.357-7.5 7.5 0 4.14 3.356 7.5 7.498 7.5 19.893.003 36.078 16.187 36.08 36.078zM133.5 132.896c-11.432-.592-17.256 7.91-20.05 11.994-2.338 3.42-1.462 8.086 1.957 10.425 3.42 2.34 8.086 1.463 10.425-1.956 3.3-4.826 4.795-5.585 6.823-5.49 6.49.764 32.056 19.498 34.616 25.356.643 1.725.62 3.416-.07 5.473-2.684 7.965-7.127 13.563-12.85 16.187-5.44 2.493-12.106 2.267-19.277-.65-26.777-10.915-50.17-26.146-69.53-45.272-.01-.008-.017-.015-.024-.023-19.087-19.34-34.29-42.705-45.186-69.44-2.92-7.178-3.145-13.846-.652-19.283 2.624-5.725 8.222-10.168 16.18-12.85 2.065-.69 3.753-.713 5.462-.077 5.88 2.57 24.612 28.133 25.368 34.55.108 2.105-.657 3.6-5.478 6.893-3.42 2.336-4.3 7.003-1.962 10.423 2.336 3.42 7.002 4.297 10.423 1.96 4.086-2.79 12.586-8.597 11.996-20.068-.65-11.982-23.957-43.713-35.094-47.808-4.953-1.846-10.163-1.878-15.49-.09C19.095 37.19 10.438 44.39 6.045 53.97c-4.26 9.293-4.124 20.076.396 31.188 11.66 28.612 27.976 53.647 48.49 74.412l.154.15c20.75 20.477 45.756 36.762 74.33 48.41 5.722 2.326 11.357 3.49 16.746 3.49 5.074 0 9.932-1.03 14.438-3.097 9.58-4.39 16.778-13.048 20.818-25.044 1.784-5.32 1.755-10.527-.077-15.457-4.108-11.167-35.84-34.475-47.84-35.127z"></path></svg>

                          </div>
                          <a href="tel:+38 044 594 42 03">+38 044 594 42 03</a>
                      </li>
                      <li class="f_contacts">
                          <div>
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 241.061 241.061"><path d="M198.602 70.402l-78.063 68.79L42.46 70.4c-3.11-2.74-7.85-2.44-10.587.668s-2.44 7.847.67 10.586l83.04 73.16c1.416 1.247 3.187 1.87 4.957 1.87s3.542-.623 4.96-1.872l83.02-73.16c3.108-2.737 3.407-7.477.67-10.585-2.74-3.106-7.48-3.406-10.588-.668z"></path><path d="M218.56 38.53H22.5C10.094 38.53 0 48.62 0 61.03v119c0 12.408 10.094 22.5 22.5 22.5h196.06c12.407 0 22.5-10.092 22.5-22.5v-119c0-12.407-10.093-22.5-22.5-22.5zm7.5 141.5c0 4.136-3.363 7.5-7.5 7.5H22.5c-4.136 0-7.5-3.364-7.5-7.5v-119c0-4.136 3.364-7.5 7.5-7.5h196.06c4.137 0 7.5 3.364 7.5 7.5v119z"></path></svg>

                          </div>
                          <a href="mailto:academy@dtek.com">academy@dtek.com</a>
                      </li>

                      <li class="social_info">
                          <div>
                              <a href="https://www.facebook.com/DTEKacademy/" target="blank"><svg xmlns="http://www.w3.org/2000/svg" width="430.113" height="430.114" viewBox="0 0 430.113 430.114"><path d="M158.08 83.3v59.218h-43.384v72.412h43.385v215.183h89.123V214.936h59.805s5.6-34.72 8.316-72.685H247.54V92.74c0-7.4 9.717-17.354 19.32-17.354h48.558V0h-66.02c-93.52-.004-91.317 72.48-91.317 83.3z"/></svg></a>
                              <a href="https://www.linkedin.com/company/9299979/" target="blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260.366 260.366"><path d="M34.703.183C15.583.183.013 15.748 0 34.883 0 54.02 15.568 69.59 34.703 69.59c19.128 0 34.688-15.568 34.688-34.704 0-19.134-15.56-34.7-34.687-34.7zM60.748 83.53H8.654c-2.478 0-4.488 2.01-4.488 4.49v167.675c0 2.48 2.01 4.488 4.488 4.488h52.093c2.48 0 4.49-2.01 4.49-4.488V88.02c0-2.48-2.01-4.49-4.49-4.49zM193.924 81.557c-19.064 0-35.817 5.805-46.04 15.27V88.02c0-2.48-2.01-4.49-4.49-4.49h-49.97c-2.48 0-4.49 2.01-4.49 4.49v167.675c0 2.48 2.01 4.488 4.49 4.488h52.044c2.48 0 4.49-2.01 4.49-4.488v-82.957c0-23.802 4.377-38.555 26.226-38.555 21.526.026 23.137 15.846 23.137 39.977v81.535c0 2.48 2.01 4.488 4.49 4.488h52.07c2.477 0 4.487-2.01 4.487-4.488v-91.977c0-38.253-7.553-82.16-66.443-82.16z"/></svg></a>
                              <a href="https://www.youtube.com/channel/UCxUpgy3HcjdbKip1q66Nfdg" target="blank"><svg xmlns="http://www.w3.org/2000/svg" width="90.677" height="90.677" viewBox="0 0 90.677 90.677"><path d="M82.287 45.907c-.937-4.07-4.267-7.074-8.275-7.52-9.49-1.06-19.098-1.066-28.66-1.06-9.566-.006-19.173 0-28.665 1.06-4.006.447-7.334 3.45-8.27 7.52C7.083 51.704 7.067 58.032 7.067 64c0 5.97 0 12.297 1.334 18.094.937 4.07 4.265 7.073 8.273 7.52 9.49 1.062 19.097 1.066 28.662 1.062 9.566.005 19.17 0 28.664-1.06 4.005-.45 7.335-3.452 8.27-7.522C83.605 76.297 83.61 69.97 83.61 64c0-5.97.01-12.296-1.323-18.093zM28.9 50.4h-5.54v29.438h-5.146V50.4h-5.44v-4.822H28.9V50.4zm13.977 29.44h-4.63v-2.786c-1.838 2.108-3.584 3.136-5.285 3.136-1.49 0-2.517-.604-2.98-1.897-.252-.772-.408-1.994-.408-3.796V54.31H34.2v18.796c0 1.084 0 1.647.04 1.8.112.717.463 1.08 1.083 1.08.928 0 1.898-.714 2.924-2.165V54.31h4.63v25.53zm17.573-7.663c0 2.36-.16 4.062-.468 5.144-.618 1.9-1.855 2.87-3.695 2.87-1.646 0-3.234-.914-4.78-2.824v2.474H46.88V45.578h4.626v11.19c1.494-1.84 3.08-2.77 4.78-2.77 1.84 0 3.08.97 3.696 2.88.31 1.027.468 2.715.468 5.132v10.167zm17.457-4.26h-9.25v4.526c0 2.363.772 3.543 2.362 3.543 1.138 0 1.8-.62 2.065-1.855.043-.25.104-1.278.104-3.133h4.718v.675c0 1.49-.057 2.518-.1 2.98-.154 1.024-.518 1.953-1.08 2.77-1.28 1.855-3.178 2.77-5.594 2.77-2.42 0-4.262-.872-5.6-2.615-.98-1.278-1.484-3.29-1.484-6.003v-8.94c0-2.73.447-4.726 1.43-6.016C66.816 54.87 68.657 54 71.02 54c2.32 0 4.16.87 5.457 2.618.97 1.29 1.432 3.286 1.432 6.015v5.285h-.003z"/><path d="M70.978 58.163c-1.546 0-2.32 1.18-2.32 3.54v2.363h4.624v-2.362c0-2.36-.774-3.54-2.304-3.54zM53.812 58.163c-.762 0-1.534.36-2.307 1.125v15.56c.772.773 1.545 1.14 2.307 1.14 1.334 0 2.012-1.14 2.012-3.446V61.646c0-2.302-.678-3.483-2.012-3.483zM56.396 34.973c1.705 0 3.48-1.036 5.34-3.168v2.814h4.675V8.82h-4.674v19.718c-1.036 1.464-2.018 2.188-2.953 2.188-.626 0-.994-.37-1.096-1.095-.057-.152-.057-.72-.057-1.816V8.82h-4.66v20.4c0 1.822.156 3.055.414 3.836.47 1.307 1.507 1.917 3.012 1.917zM23.85 20.598v14.02h5.185V20.6L35.27 0h-5.24L26.49 13.595 22.812 0h-5.455c1.093 3.21 2.23 6.434 3.323 9.646 1.663 4.828 2.7 8.468 3.17 10.952zM42.22 34.973c2.34 0 4.16-.88 5.452-2.64.98-1.292 1.45-3.326 1.45-6.068V17.23c0-2.757-.468-4.773-1.45-6.076-1.29-1.765-3.11-2.646-5.453-2.646-2.33 0-4.15.88-5.444 2.646-.993 1.303-1.463 3.32-1.463 6.077v9.035c0 2.742.47 4.776 1.463 6.067 1.293 1.76 3.113 2.64 5.443 2.64zm-2.232-18.68c0-2.386.724-3.576 2.23-3.576 1.508 0 2.23 1.19 2.23 3.577v10.852c0 2.387-.722 3.58-2.23 3.58-1.506 0-2.23-1.193-2.23-3.58V16.294z"/></svg></a>
                              <a href="https://twitter.com/dtek_ua" target="blank"><svg xmlns="http://www.w3.org/2000/svg" width="512.002" height="512.002" viewBox="0 0 512.002 512.002"><path d="M512.002 97.21c-18.84 8.355-39.082 14.002-60.33 16.54 21.686-13 38.342-33.584 46.186-58.114-20.3 12.04-42.777 20.78-66.705 25.49-19.16-20.415-46.46-33.17-76.674-33.17-58.012 0-105.043 47.03-105.043 105.04 0 8.232.93 16.25 2.72 23.938-87.3-4.382-164.7-46.2-216.51-109.753-9.04 15.515-14.222 33.56-14.222 52.81 0 36.444 18.544 68.596 46.73 87.433-17.22-.546-33.416-5.27-47.577-13.14-.01.44-.01.88-.01 1.322 0 50.894 36.21 93.348 84.26 103-8.812 2.4-18.093 3.687-27.673 3.687-6.77 0-13.35-.66-19.764-1.888 13.37 41.73 52.16 72.104 98.127 72.95-35.95 28.175-81.243 44.966-130.458 44.966-8.48 0-16.84-.496-25.06-1.47 46.487 29.806 101.702 47.196 161.022 47.196 193.21 0 298.868-160.062 298.868-298.872 0-4.554-.104-9.084-.305-13.59 20.526-14.81 38.335-33.31 52.417-54.373z"/></svg></a>
                          </div>
                      </li>
                  </ul>
              </div>
              <div class="footer_blocks">
                  <h2>О компании</h2>
                  <ul>
                      <li class="f_contacts"><a href="https://dtekacademy.com/academy/">Академия ДТЭК</a></li>
                      <li class="f_contacts"><a href="https://dtekacademy.com/conference_service/">Конференц сервис</a></li>
                      <li class="f_contacts"><a href="https://dtekacademy.com/treners/">Тренеры и эксперты</a></li>

                  </ul>
              </div>
            </div>
            <div class="frame_right">
              <div class="footer_blocks">
                  <h2>Программы обучения</h2>
                  <ul>
                      <li class="f_contacts"><a href="/programs/module_programs/">Долгосрочные программы</a></li>
                      <li class="f_contacts"><a href="/programs/trenings/">Мастер классы</a></li>
                      <li class="f_contacts"><a href="/programs/team_buildings/">Тимбилдинг</a></li>
                  </ul>
              </div>
              <div class="footer_blocks">
                  <h2>Консалтинг</h2>
                  <ul>
                      <li class="f_contacts"><a href="https://dtekacademy.com/consulting/strategic_sessions/">Стратегические сессии</a></li>
                      <li class="f_contacts"><a href="https://dtekacademy.com/consulting/estimation_center/">Центры оценки</a></li>
                      <li class="f_contacts"><a href="https://dtekacademy.com/consulting/">Все консалтинговые программы</a></li>
                  </ul>
              </div>


            </div>
          </div>

          <div class="copyrights frame">
              <p>&copy; Академия ДТЭК</p>
          </div>
      </footer>
    </body>
  </html>
