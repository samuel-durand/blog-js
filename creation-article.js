// function 
function format(f) {
    var str = document.selection.createRange().text;
    document.article.text1.focus();
    var sel = document.selection.createRange();
    sel.text = "<" + f + ">" + str + "</" + f + ">";
    return;
}