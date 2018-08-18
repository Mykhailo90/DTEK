let width = 350; // ширина блока
let count = 3; // количество блоков на прокрутку

let carousel = document.getElementById('carousel');
let listCarousel = carousel.querySelector('ul');
let listElems = carousel.querySelectorAll('li');

let position = 0; // текущий сдвиг влево

if (document.documentElement.clientWidth <= 1080)
    count = 2;
if (document.documentElement.clientWidth <= 767)
    count = 1;

carousel.querySelector('.prev').onclick = function() {
    // сдвиг влево
    // последнее передвижение влево может быть не на 3, а на 2 или 1 элемент
    position = Math.min(position + width * count, 0);
    listCarousel.style.marginLeft = position + 'px';
};

carousel.querySelector('.next').onclick = function() {
    // сдвиг вправо

    // последнее передвижение вправо может быть не на 3, а на 2 или 1 элемент
    if (position == Math.max(position - width * count, -width * (listElems.length - count)))
        position = 0;
    else
        position = Math.max(position - width * count, -width * (listElems.length - count));
    listCarousel.style.marginLeft = position + 'px';
};