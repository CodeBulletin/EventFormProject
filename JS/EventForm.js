const form = document.getElementById('form');

const OrgName = document.getElementById('OrgName');
const ORGNAME = document.getElementById('ORGNAME');

const OrgFacName = document.getElementById('OrgFacName');
const ORGFACNAME = document.getElementById('ORGFACNAME');

const Topic = document.getElementById('Topic');
const TOPIC = document.getElementById('TOPIC');

const Guest = document.getElementById('Guest');
const GUEST = document.getElementById('GUEST');

const Part = document.getElementById('Participants');
const PART = document.getElementById('PARTICIPANT');

const OType = document.getElementById('OType');
const TYPE = document.getElementById('TYPE');

const Datetime = document.getElementById('Datetime');
const DATETIME = document.getElementById('DATETIME');

const ODays = document.getElementById('ODays');
const DAYS = document.getElementById('DAYS');

const OFile = document.getElementById('File');
const FILE = document.getElementById('FILE');

const About = document.getElementById('About');
const ABOUT = document.getElementById('ABOUT');
var ABOUTTXT = document.getElementById('About_Limit');

function validateName(name) {
    var Regex = /^[a-zA-Z\.\,\s]+$/;
    return Regex.test(name);
}

function validateNameExtended(name) {
    var Regex = /^[a-zA-Z0-9\,\.\s]+$/;
    return Regex.test(name);
}

function validateNameExtendedSlash(name) {
    var Regex = /^[a-zA-Z0-9\,\.\s\/\\]+$/;
    return Regex.test(name);
}

function validateNameExtendedPlus(name) {
    var Regex = /^[a-zA-Z0-9\,\.\+\s]+$/;
    return Regex.test(name);
}

function validateDateTime(date) {
    var Today = new Date();
    return date > Today;
}

function validateNum(num) {
    return parseInt(num) > 0;
}

function PosterFileValidator(fname) {
    var n = fname.split(".");
    var ext = n[n.length - 1];
    if (["pdf", "png", "jpeg", "jpg", "bmp"].indexOf(ext.toLowerCase()) >= 0) {
        return true;
    }
    return false;
}

function countWords(s){
    s = s.replace(/(^\s*)|(\s*$)/gi,"");//exclude  start and end white-space
    s = s.replace(/[ ]{2,}/gi," ");//2 or more space to 1
    s = s.replace(/\n /,"\n"); // exclude newline with a start spacing
    return s.split(' ').filter(function(str){return str!="";}).length;
}

function handleRadio(myRadio, div, input) {
    var val = myRadio.value;
    var DIV = document.getElementById(div);
    var Input = document.getElementById(input);
    if (val == "Other") {
        Input.required = true;
    } 
    else {
        Input.required = false;
        Input.value = ''
        DIV.classList.remove('form__input--error');
    }
}

function onClearClick() {
    ORGNAME.classList.remove('form__input--error');
    ORGFACNAME.classList.remove('form__input--error');
    TOPIC.classList.remove('form__input--error');
    GUEST.classList.remove('form__input--error');
    TYPE.classList.remove('form__input--error');
    DATETIME.classList.remove('form__input--error');
    DAYS.classList.remove('form__input--error');
    HOST.classList.remove('form__input--error');
    FILE.classList.remove('form__input--error');
}

OrgName.addEventListener('input', (event) => {
    var str = OrgName.value;
    var value = validateName(str);
    if (str.length > 0) {
        if (value === true) {
            ORGNAME.classList.remove('form__input--error');
        }
        else {
            ORGNAME.classList.add('form__input--error');
        }
    } 
    else {
        ORGNAME.classList.remove('form__input--error');
    }
})

OrgFacName.addEventListener('input', (event) => {
    var str = OrgFacName.value;
    var value = validateName(str);
    if (str.length > 0) {
        if (value === true) {
            ORGFACNAME.classList.remove('form__input--error');
        }
        else {
            ORGFACNAME.classList.add('form__input--error');
        }
    } 
    else {
        ORGFACNAME.classList.remove('form__input--error');
    }
})

Topic.addEventListener('input', (event) => {
    var str = Topic.value;
    var value = validateNameExtended(str);
    if (str.length > 0) {
        if (value === true) {
            TOPIC.classList.remove('form__input--error');
        }
        else {
            TOPIC.classList.add('form__input--error');
        }
    } 
    else {
        TOPIC.classList.remove('form__input--error');
    }
})

Guest.addEventListener('input', (event) => {
    var str = Guest.value;
    var value = parseInt(str) >= 0;
    if (str.length > 0) {
        if (value === true) {
            GUEST.classList.remove('form__input--error');
        }
        else {
            GUEST.classList.add('form__input--error');
        }
    } 
    else {
        GUEST.classList.remove('form__input--error');
    }
})

Part.addEventListener('input', (event) => {
    var str = Part.value;
    var value = parseInt(str) >= 0;
    if (str.length > 0) {
        if (value === true) {
            PART.classList.remove('form__input--error');
        }
        else {
            PART.classList.add('form__input--error');
        }
    } 
    else {
        PART.classList.remove('form__input--error');
    }
})

OType.addEventListener('input', (event) => {
    if(!OType.required) {
        document.getElementById('T6').checked = true;
    }

    var str = OType.value;
    var value = validateNameExtendedSlash(str);
    if (str.length > 0) {
        if (value === true) {
            TYPE.classList.remove('form__input--error');
        }
        else {
            TYPE.classList.add('form__input--error');
        }
    } 
    else {
        TYPE.classList.remove('form__input--error');
    }
})

Datetime.addEventListener('input', (event) => {
    var str = new Date(Datetime.value);
    console.log(Datetime.value);
    var value = validateDateTime(str);
    if (Datetime.value.length > 0) {
        if (value === true) {
            DATETIME.classList.remove('form__input--error');
        }
        else {
            DATETIME.classList.add('form__input--error');
        }
    } 
    else {
        DATETIME.classList.add('form__input--error');
    }
})

ODays.addEventListener('input', (event) => {
    if(!ODays.required) {
        document.getElementById('D2').checked = true;
    }
    var str = ODays.value;
    var value = validateNum(str);
    if (str.length > 0) {
        if (value === true) {
            DAYS.classList.remove('form__input--error');
        }
        else {
            DAYS.classList.add('form__input--error');
        }
    } 
    else {
        DAYS.classList.remove('form__input--error');
    }
})

OFile.addEventListener('input', (event) => {
    var str = OFile.value;
    var value = PosterFileValidator(str);
    if (str.length > 0) {
        if (value === true) {
            FILE.classList.remove('form__input--error');
        }
        else {
            FILE.classList.add('form__input--error');
        }
    } 
    else {
        FILE.classList.remove('form__input--error');
    }
})

About.addEventListener('input', (event) => {
    var str = About.value;
    var numWords = countWords(str);
    var value = numWords >= 50 && numWords <= 100;
    var numLeft = 100 - numWords;
    ABOUTTXT.innerHTML = "Words Left: " + numLeft.toString()
    if (str.length > 0) {
        if (value === true) {
            ABOUT.classList.remove('form__input--error');
        }
        else {
            ABOUT.classList.add('form__input--error');
        }
    } 
    else {
        ABOUT.classList.remove('form__input--error');
    }
})

form.addEventListener('submit', (event) => {
    var error = (
        ORGNAME.classList.contains('form__input--error') ||
        ORGFACNAME.classList.contains('form__input--error') ||
        TOPIC.classList.contains('form__input--error') ||
        GUEST.classList.contains('form__input--error') ||
        TYPE.classList.contains('form__input--error') ||
        DATETIME.classList.contains('form__input--error') ||
        DAYS.classList.contains('form__input--error') ||
        HOST.classList.contains('form__input--error') ||
        FILE.classList.contains('form__input--error') ||
        ABOUT.classList.contains('form__input--error')
    );

    if(error) {
        event.preventDefault();
    }
})