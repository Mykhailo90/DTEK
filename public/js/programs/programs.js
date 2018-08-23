window.onload = function() {
  var page = document.querySelectorAll('.pagination a');
  page.forEach(function (element) {
      element.addEventListener("click", function (e) {

      var url = element.getAttribute('href');

      page_number = element.dataset['page'];
      request = new XMLHttpRequest();
      request.open('POST', url, true);
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      request.send('page=' + page_number);
          request.onreadystatechange = function () {
          if (request.readyState == 4 && request.status === 200) {
            element.classList.add("pag_color");
          }
      }
  });
  });
};
