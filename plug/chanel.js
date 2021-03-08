function getData(url)
{
	$("#h1").html('C E K');
	$.ajax({
				url: url+"driver/reloadOrderDriver/",
				success: function(data){
					$("#cektarikan").html(data);
				}
			});
}
