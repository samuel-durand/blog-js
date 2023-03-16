// function 
function format(f) {
    var str = document.selection.createRange().text;
    //console.log(str);
    document.article.text1.focus();
    var sel = document.selection.createRange();
    sel.text = "<" + f + ">" + str + "</" + f + ">";
    return;
}

// Select

const bold = document.body.querySelector('#bold');
const italic = document.body.querySelector('#italic');
const underligne = document.body.querySelector('#underligne');
const start = document.body.querySelector('#start');
const center = document.body.querySelector('#center');
const end = document.body.querySelector('#end');

// Event
bold.addEventListener('click', () => {
    format('b');
});

italic.addEventListener('click', () => {
    format('i');
});

underligne.addEventListener('click', () => {
    format('u');
});