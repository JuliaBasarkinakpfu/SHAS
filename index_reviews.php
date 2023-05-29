
<form method="post" action="/save_reviews.php">
	<h3>Отправить отзыв:</h3>
	<div class="form-row">
		<label>Ваше имя:</label>
		<input type="text" name="name" required>
	</div>
	<div class="form-row">
		<label>Комментарий:</label>
		<input type="text" name="text" required>
	</div>
	<div class="form-row">
		<label>Изображения:</label>
		<div class="img-list" id="js-file-list"></div>
		<input id="js-file" type="file" name="file[]" multiple accept=".jpg,.jpeg,.png,.gif">
	</div>
	<div class="form-submit">
		<input type="submit" name="send" value="Отправить">
	</div>
</form>
 
<script src="/jquery.min.js"></script>
<script>
$("#js-file").change(function(){
	if (window.FormData === undefined) {
		alert('В вашем браузере загрузка файлов не поддерживается');
	} else {
		var formData = new FormData();
		$.each($("#js-file")[0].files, function(key, input){
			formData.append('file[]', input);
		});
 
		$.ajax({
			type: 'POST',
			url: '/upload_image.php',
			cache: false,
			contentType: false,
			processData: false,
			data: formData,
			dataType : 'json',
			success: function(msg){
				msg.forEach(function(row) {
					if (row.error == '') {
						$('#js-file-list').append(row.data);
					} else {
						alert(row.error);
					}
				});
				$("#js-file").val(''); 
			}
		});
	}
});
 
/* Удаление загруженной картинки */
function remove_img(target){
	$(target).parent().remove();
}
</script>