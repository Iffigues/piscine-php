$(function(){
	$.ajax({
		url: "./select.php",
		crossDomain: true,
	}).done(function(data, textStatus, jqXHR){
		data.forEach(function(element) {
			  create(element);
		});
	}).fail( function(jqXHR, textStatus, errorThrown) { 
	});
	function del(e) {
		$.ajax({
			url: "./delete.php",
			method: "POST",
			crossDomain: true,
			datatype: 'text',
			data: 'id='+e
		}).done(function(data, textStatus, jqXHR){
			if (data == 1)
				$("#"+e).remove();
		}).fail( function(jqXHR, textStatus, errorThrown) {
		});
	};
	$("#but").click(function() {
		var t = prompt("ici");
		if (t) {
			$.ajax({
				url: "./insert.php",
				method: "POST",
				datatype: "text",
				data: 'todo='+t,
				crossDomain: true
			}).done(function(data, textStatus, jqXHR){
				create(data);	
			}).fail( function(jqXHR, textStatus, errorThrown) {
			});
		}
		});
		function create(e) {
			var p = $("<p id="+e['id']+">"+e['value']+"</p>");
			p.click(function() {
				del(e['id']);
			})
			$("#ft_list").prepend(p);
		}
});
