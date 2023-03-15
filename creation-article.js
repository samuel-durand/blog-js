// function 
function format(f) {
    var str = document.selection.createRange().text;
    document.article.text1.focus();
    var sel = document.selection.createRange();
    sel.text = "<" + f + ">" + str + "</" + f + ">";
    return;
}

// Select

const bold = document.querySelector('#bold');
const italic = document.querySelector('#italic');
const underligne = document.querySelector('#underligne');
const start = document.querySelector('#start');
const center = document.querySelector('#center');
const end = document.querySelector('#end');