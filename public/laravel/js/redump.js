function redump(thevar,origname)
{
	var dump=function(n,v)
	{
		var r='';
		if (n) n+=' ';
		else n='';
		
		var t=Object.prototype.toString.call(v);
		t=t.substr(8,t.length-9);
		b=t.substr(0,1);
		switch(t)
		{
			case 'String':
			case 'Date':
				n="<font color=green>"+n+"</font>";
				r+=n+"<font color=orange>("+b+")</font>"+' = "'+v.toString().replace('"','\\"')+'"';
				break;
			case 'Number':
			case 'RegExp':
			case 'Boolean':
				n="<font color=green>"+n+"</font>";
				r+=n+"<font color=orange>("+b+")</font>"+' = '+v;
				break;
			case 'Null':
			case 'Undefined':
				r+=n+t;
				break;
			case 'Array':
				n="<font color=green>"+n+"</font>";
				r+=n+'<font color=orange>(A)</font> = [<ul style="list-style:none">';
				for (c in v)
				{
					r+='<li>';
					r+=dump('<font color=blue>['+c+']</font>',v[c])+',';
					r+='</li>';
				}
				r+='</ul>]';
				break;
			case 'Object':
				r+=n+'<font color=orange>(O)</font> = {<ul style="list-style:none">';
				for (c in v)
				{
					r+='<li>';
					r+=dump('.'+c,v[c])+',';
					r+='</li>';
				}
				r+='</ul>}'
				break;
			case 'Function':
				r+=n+"<font color=darkgreen>"+b+"</font>"+' = '+v.toString().substr(0,v.toString().indexOf('{'));
				r+='{<ul style="list-style:none">';
					r+='<li>Arguments: '+v.length+'</li>';
				r+='</ul>}';
				break;
			default:
				r+='>>'+"<font color=red>"+t+"</font>"+'<<'+n;
				break;
		}
		return r;
	};
	(typeof origname !== 'undefined')||(origname='');
	return '<ul style="list-style:none"><li>'+dump(origname,thevar)+'</li></ul>';
}
