$(function(){
		(function( $ ){
		 var getTodo = function () {
		 var t = [];
		 var rr = document.cookie.split(";");
		 var e = "";
		 rr.forEach(function(i){
		 		i = i.replace(/^\s+/g, '');
				 var ouil = i.substring(0,5);
				 if (ouil == "todo=")
				 e = i;
				 });
		if (e)
		 	e = e.substr(5);
		 if (e) {
		 	t = JSON.parse(e);
		 }
		 return (t);
		 };
		 var setTodo = function(e) {
		 var c = getTodo();
		 e = e.replace(";", "%3B");
		 c.push(e);
		 document.cookie = "todo="+JSON.stringify(c);
		 return (c.length);
		 };
		 var delTodo = function(e) {
			 var c = getTodo();
			 c.splice(e,1);
			 document.cookie = "todo="+JSON.stringify(c);
		 };
		 var td = function (i,e) {
			 e = e.replace("%3B",";");
			 var p = $("<p id="+i+">"+e+"</p>");
			 p.click(function() {
					 $("#"+i).DelToDo(i)
					 })
			 $("#ft_list").prepend(p);
		 }
		 $.fn.getToDo = function() {
			 var t =getTodo();
			 $.each(t, function (index, value) {
					 td(index, value);
					 });
		 }
		 $.fn.DelToDo = function(i) {
			 delTodo(i);
			 $(this).remove();
		 };	
		 $.fn.setToDo = function(e) {
			 if (e) {
				 var t = setTodo(e);
				 td(t - 1,e);
			 }
		 }; 
		})( jQuery );
		$("#ft_list").getToDo();
		$("#but").click(function(){
				var c = prompt("lol");
				if (c) 
				$(this).setToDo(c);
				});
});
