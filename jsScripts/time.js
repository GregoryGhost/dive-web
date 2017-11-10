function nTime() {
    var _t = new Date();
    function check(valTime) {
        if (valTime < 10)
            valTime = `0${valTime}`;
        return valTime;
    };

    this.getHours = () => check(_t.getHours());
    this.getMinutes = () => check(_t.getMinutes());
    this.getSeconds = () => {
        var s = _t.getSeconds();
        return check(s);
    };
    this.getTime = () => `${this.getHours()}:${this.getMinutes()}:${this.getSeconds()}`;
}

function giveSpeechToRiki() {
    var riki = document.getElementById('sayTimeRiki');
    riki.title = "I'll tell you how much time. Click on me";
    riki.onclick = (e) => sayTime(`текущее время ${(new nTime()).getTime()}`);
}

function sayTime(time) {
    var textTime = new SpeechSynthesisUtterance(time);
    textTime.lang = 'ru-Ru';;
    window.speechSynthesis.speak(textTime);
}

var _titleH = "Команды ";
function inlineTime() {
    var _time = new nTime();
    document.getElementById('time').innerHTML = _titleH + _time.getTime();
    setTimeout("inlineTime()", 1000);
}

window.onbeforeunload = (e) => true;

var _t = 0;
function runStopwatch1() {
    _t++;
    document.getElementById('namePage').innerHTML = document.title;
    document.getElementById('timeSec').innerHTML = _t + " секунд";
    setTimeout("runStopwatch1()", 1000);
}

var _seconds = 0;
function callTimer() {
    document.getElementById('gotoPage').innerHTML = `Если перенаправления не произошло через ${_seconds} секунд, то нажмите на Гейба =)`;
    _seconds--;
    if (_seconds > 0)
        setTimeout("callTimer()", 1000);
}
function runTimer(seconds) {
    _seconds = seconds;
    callTimer();
}

function setColorTime() {
    var t = new nTime();
    document.getElementById('colorTime').innerHTML = `<span style="color:red;">${t.getHours()}:</span><span style="color:#00ffff;">${t.getMinutes()}:</span><span style="color:yellow;">${t.getSeconds()}</span>`;
}

function runSetTimeToImgs() {
    callSetTimeToImgs();
    setTimeout("runSetTimeToImgs()", 1000);
}
function callSetTimeToImgs() {
    function getTenTime(timeElement) {
        return Math.floor((timeElement / 10) % 10);
    };
    function setSrcImgClock(timeElement) {
        var imgClock = document.getElementById(timeElement.id());
        if (imgClock && !isNaN(timeElement.elem)) {
            imgClock.src = folderImg + clock[timeElement.elem] + '.jpg';

        }
        else {
            if (imgClock == null)
                console.error('imgclock ' + imgClock);
            if (isNaN(timeElement.elem))
                console.error('imgtimeelement ' + timeElement.elem);
        }
    };


    var clock = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
    var t = new nTime();

    var h1 = {
        elem: getTenTime(t.getHours()),
        id: () => 'h1'
    };
    var h2 = {
        elem: t.getHours() % 10,
        id: () => 'h2'
    };

    var m1 = {
        elem: getTenTime(t.getMinutes()),
        id: () => 'm1'
    };
    var m2 = {
        elem: t.getMinutes() % 10,
        id: () => 'm2'
    };

    var s1 = {
        elem: getTenTime(t.getSeconds()),
        id: () => 's1'
    };
    var s2 = {
        elem: t.getSeconds() % 10,
        id: () => 's2'
    };

    var valClock = [h1, h2, m1, m2, s1, s2];
    var folderImg = "images/clock/";
    valClock.forEach(function (element) {
        setSrcImgClock(element);
    }, this);
}
