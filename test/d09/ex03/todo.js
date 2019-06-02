(function () {
	var div = document.getElementById('ft_list');
	
	function removee(e) {
		var t = getCookie();
		t.splice(e, 1);
		document.cookie = "todo="+JSON.stringify(t);

	}
	function td(e, i) {
		var node = document.createElement("p");
		node.id = i;
		node.addEventListener("click",function(){
			removee(parseInt(this.id));
			this.remove();
		});
		e = e.replace("%3B",";");
		var textnode = document.createTextNode(e);
		node.appendChild(textnode);
		div.prepend(node);
	}
	(function() {
		var t = getCookie();
		for (var i = 0; i < t.length; i++)
			td(t[i], i);
	}());
	function setCookie(e) {
		var t = getCookie();
		e = e.replace(";","%3B");
		t.push(e);
		document.cookie = "todo="+JSON.stringify(t);
		return (t.length);
	}
	function getCookie() {
		var arr = [];
		var rr = document.cookie.split(";");
		var s = "";
		rr.forEach(function(i){
			i = i.replace(/^\s+/g, '');
			var ouil = i.substring(0,5);
			if (ouil == "todo=")
				s = i;
		});
		console.log(s);
		if (s)
			s = s.substr(5);
		if (s)
			arr = JSON.parse(s);
		return (arr);
	}
  	document.getElementById('but').addEventListener("click", function(){
		var signe = prompt("Quel est votre signe astrologique ?");
		if (signe){
			var c = setCookie(signe);
			td(signe, c - 1);
		}
	});
}());
