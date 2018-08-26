window.onload = function() {
  var pages = document.querySelectorAll('.pagination a');

  pages.forEach(function (element) {
      element.addEventListener("click", function (e) {
        e.preventDefault();
      var url = element.getAttribute('href');
      page_number = element.dataset['page'];
      request = new XMLHttpRequest();
      request.open('POST', url, true);
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      request.send('page=' + page_number);
      request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status === 200) {
          var ald_value = document.querySelector('#current');
          ald_value.removeAttribute('id');
          element.setAttribute('id', 'current');
          var list = document.querySelector('.list');
          list.innerHTML = request.responseText;
        }
      }
    });
  });
};
