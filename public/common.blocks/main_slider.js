var slideIndex = 1;

displayControls();
showSlides(slideIndex);
loadImages();

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function displayControls() {

    var slidesnum = document.getElementsByClassName("slide");
    slidesnum = slidesnum.length;
    var container = document.getElementById("slider-controllers");

    for (var i = 1; i <= slidesnum; i++) {
        var controller = document.createElement("DIV");
        controller.className = "slider-controller";
        controller.setAttribute("onclick", "currentSlide(" + i + ")");
        container.appendChild(controller);
    }
}

function loadImages() {
    var slides = document.getElementsByClassName("slide");
    var image;
    var UID = {
        _current: 0,
        getNew: function(){
            this._current++;
            return this._current;
        }
    };

    HTMLElement.prototype.pseudoStyle = function(element,prop,value){
        var _this = this;
        var _sheetId = "pseudoStyles";
        var _head = document.head || document.getElementsByTagName('head')[0];
        var _sheet = document.getElementById(_sheetId) || document.createElement('style');
        _sheet.id = _sheetId;
        if(_this.className.indexOf("pseudoafter") == -1) {
            var className = "pseudoafter" + UID.getNew();
            _this.className +=  " " + className;
            _sheet.innerHTML += "\n." + className + ":" + element + "{"+prop+":"+value+"}";
        }
        else
            {
                var sub = _this.className.substr(_this.className.indexOf("pseudoafter"), 12);
                _sheet.innerHTML += "\n." + sub + ":" + element + "{"+prop+":"+value+"}";
            }
        _head.appendChild(_sheet);
        return this;
    };

    for (var i = 0; i <= slides.length - 1; i++) {
        try {
            image = document.getElementsByClassName("slide")[i].getElementsByTagName('img')[0];
            slides[i].pseudoStyle("after","background","url(\"" + image.src + "\") no-repeat center");
            slides[i].pseudoStyle("after","background-size","cover");
        }
        catch (err) {
        }
    }
}


function showSlides(n) {
    var slides = document.getElementsByClassName("slide");
    var dots = document.getElementsByClassName("slider-controller");
    var i;

    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
}