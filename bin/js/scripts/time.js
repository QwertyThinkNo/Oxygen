function time(id)
{
    var date = new Date;

	//Hours
    var h = date.getHours();
    if ( h < 10 )
    {
            h = "0" + h;
    }

	//Minutes
    var m = date.getMinutes();
    if ( m < 10 )
    {
            m = "0" + m;
    }

    //Seconds
    var s = date.getSeconds();
    if ( s < 10 )
	{
		s = "0" + s;
    }

    var resultat = h + ' : '+ m +' : '+ s;
    document.getElementById( id ).innerHTML = resultat;
    setTimeout('time("'+id+'");','1000');
    return true;
}