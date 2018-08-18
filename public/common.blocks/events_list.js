var schedule = '{\
		"events": [ \
			{\
				"title":"Трансформационные инновации",\
				"date":"2018-08-29T02:00:00.000Z",\
				"person":"Для директора",\
				"type":"Лекция",\
				"img":"https://rau.ua/wp-content/uploads/2016/09/HR.jpg",\
				"url":"#"\
			}, \
			{\
				"title":"Событие мирового уровня",\
				"date":"2018-08-25T12:00:00.000Z",\
				"img":"https://image.shutterstock.com/image-photo/human-resource-business-concept-hr-260nw-529259896.jpg",\
				"url":"#",\
				"person":"Для HR",\
				"type":"Лекция"},\
			{"title":"Событие c очень длинным названием, проверим, влезет ли в контейнер","date":"2018-08-31T12:00:00.000Z","img":"img/liderstvo-100.jpg","url":"#","person":"Для всех","type":"Митап"},\
			{"title":"Очень крутое событие","date":"2018-08-21T12:00:00.000Z","img":"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyJvupsSJSX-7AuyOjqCc8wIjd9l0wYR_KebIuPmDz5KhNQ0lOAA","url":"#","person":"Для топ-менеджеров","type":"Вечеринка"}\
		]\
}';

function sortByDate(a, b) {
	return new Date(a.date).getTime() - new Date(b.date).getTime();
}

//Check wether there is an event at that day
function dateHasEvent(date, eventList) {
	var index, len;

	for (index = 0, len = eventList.events.length; index < len; ++index) {
		if (eventList.events[index].date.getDate() == date.getDate() &&
			eventList.events[index].date.getDay() == date.getDay())
			return true;
	}
	return false;
}

function eventList() {

    this._elements = {};
	this.datestart = new Date();
	this.schedule = JSON.parse(schedule, function (key, value) {
		if (key == 'date')
		{
			var date = new Date(value);
			return date;
		}
		return value;
	});
	this.schedule.events.sort(sortByDate);

}

eventList.prototype.addCard = function() {
    this._elements.card = document.createElement("DIV");

    this._elements.cardinfo = document.createElement("DIV");
    this._elements.cardinfo.className = "event-card-info";
    this._elements.addinfo = document.createElement("SPAN");
    this._elements.addinfo.className = "event-card-addinfo"
}

eventList.prototype.addExtraInfo = function(element) {

	let person = document.createElement("span");
    let type = document.createElement("span");
    let time = document.createElement("span");

    this._elements.roleicon = document.createElement("I");
    this._elements.typeicon = document.createElement("I");
    this._elements.timeicon = document.createElement("I");

    this._elements.roleicon.className = "fas fa-user-circle";
    this._elements.typeicon.className = "fas fa-microphone";
    this._elements.timeicon.className = "fas fa-clock";

    let textnode = document.createTextNode(element.person);
    this._elements.addinfo.appendChild(this._elements.roleicon);
    person.appendChild(textnode);
    this._elements.addinfo.appendChild(person);

    textnode = document.createTextNode(element.type);
    this._elements.addinfo.appendChild(this._elements.typeicon);
    type.appendChild(textnode);
    this._elements.addinfo.appendChild(type);

    var hour = element.date.getHours();
    var minute = element.date.getMinutes();
    var temp = '' + hour + ((minute < 10) ? ':0' : ':') + minute;

    textnode = document.createTextNode(temp);
    this._elements.addinfo.appendChild(this._elements.timeicon);
    time.appendChild(textnode);
    this._elements.addinfo.appendChild(time);

    this._elements.card.appendChild(this._elements.cardinfo);
}


eventList.prototype.refresh = function () {

	var container = document.getElementById("events-list");

	while (container.firstChild) {
		container.removeChild(container.firstChild);
	}

	var index, len;
	for (index = 0, len = this.schedule.events.length; index < len; ++index) {
		if (this.schedule.events[index].date >= this.datestart)
			break;
	}

	for (var i = index, len = index + 3; i < this.schedule.events.length && i < len; i++) {
        this.addCard();
		var cardimg = document.createElement("DIV");
		var title = document.createElement("SPAN");
		var month = document.createElement("SPAN");
		var image = document.createElement("IMG");
		var link = document.createElement("A");
		var textnode = document.createTextNode(this.schedule.events[i].title);


		var a = document.createElement("A");
		var linkicon = document.createElement("I");


		linkicon.className = "fas fa-angle-right";

		title.className = "event-title";
        this._elements.card.className = "event-card";
		month.className = "event-month";
		cardimg.className = "event-card-img";
		cardimg.style.backgroundImage = "url(" + this.schedule.events[i].img + ")";
		cardimg.style.backgroundSize = "cover";
		cardimg.style.backgroundPosition = "center";

		link.className = "event-card-link";

		container.appendChild(this._elements.card);
        this._elements.card.appendChild(cardimg);


		title.appendChild(textnode);
		a.appendChild(linkicon);
        link.href = this.schedule.events[i].url;
		link.appendChild(a);


		textnode = document.createTextNode(this.schedule.events[i].date.getDate()
			+ " " + this.getMonthName(this.schedule.events[i].date.getMonth()));
		month.appendChild(textnode);

        cardimg.appendChild(image);


        this._elements.cardinfo.appendChild(month);
        this._elements.cardinfo.appendChild(title);


        this.addExtraInfo(this.schedule.events[i]);

        this._elements.cardinfo.appendChild(this._elements.addinfo);
        this._elements.card.appendChild(link);
	}
};

eventList.prototype.getMonthName = function (month) {
	var monthList = ["января",
		"февраля",
		"марта",
		"апреля",
		"мая",
		"июня",
		"июля",
		"августа",
		"сентября",
		"октября",
		"ноября",
		"декабря"];
	return monthList[month];
};

eventList.prototype.getDates = function (month) {
	var dates = [];

	this.schedule.events.forEach(function (entry) {
		dates[dates.length] = entry.date;
	});
	return dates;
};

eventList.prototype.setDateStart = function (date) {
	if (!dateHasEvent(date, this.schedule))
		return;

	this.datestart = date;
	this.refresh();
};

