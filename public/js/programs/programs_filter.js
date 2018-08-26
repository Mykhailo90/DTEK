    var query = document.querySelectorAll('select');
    query.forEach(function (t) {
      t.addEventListener("change", function () {

        var type_event = document.getElementById("type_event");
        var User_type_choice = type_event.options[type_event.selectedIndex].value;

        var direction = document.getElementById("direction");
        var User_direction_choice = direction.options[direction.selectedIndex].value;

        var subject = document.getElementById("subject");
        var User_subject_choice = subject.options[subject.selectedIndex].value;

        var trener = document.getElementById("trener");
        var User_trener_choice = trener.options[trener.selectedIndex].value;

        var time = document.getElementById("time");
        var User_time_choice = time.options[time.selectedIndex].value;

        var price = document.getElementById("price");
        var User_price_choice = price.options[price.selectedIndex].value;

          ajaxPost('type_event=' + User_type_choice
              + '&direction=' + User_direction_choice
              + '&subject=' + User_subject_choice
            + '&trener=' + User_trener_choice
          + '&time=' + User_time_choice
        + '&price=' + User_price_choice);
      })
   })


function ajaxPost(params) {
  console.log(params);
    var request = new XMLHttpRequest();

    request.open('POST', '/programs', true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(params);

    request.onreadystatechange = function () {
        if(request.readyState == 4 && request.status == 200) {
            var pars = request.responseText;
            // pos = pars.search('<!doctype html>');
            // slice = pars.substring(0, pos);
            // // var json = JSON.parse(slice);
            console.log(pars);
            // document.querySelector('#result').innerHTML = slice;
        }
    }
  }
    // request.open('POST', 'test');
    // request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // request.send(params);
