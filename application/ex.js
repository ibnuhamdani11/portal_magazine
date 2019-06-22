
var str = "<img alt='' src='http://api.com/images/UID' /><br/>Some plain text<br/><a href='http://www.google.com'>http://www.google.com</a>";

var regex = /<img.*?src='(.*?)'/;
var src = regex.exec(str)[1];

console.log(src);
