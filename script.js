var dateVar = new Date()
var offset = dateVar.getTimezoneOffset();
document.cookie = "offset="+offset;