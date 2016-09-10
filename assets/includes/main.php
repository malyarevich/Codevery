<div class="container">
	<div class="row">

		<div class="col-md-15" role="main">
			<div class="panel panel-default">
				<div class="panel-body" id="formInput">
					<a class="btn btn-primary btn-md btn-block" href="index.php">Back</a>
					<h3 class="control-title">Форма комментариев</h3>
					<form enctype="multipart/form-data" role="form">
						<div id="SuccessWell" class="alert alert-success" role="alert" style="display: none">Ваш комментарий добавлен!
						</div>
						<div id="invalidEmail" class="alert alert-danger" role="alert" style="display: none">
						</div>
						<div class="form-group">
							<label for="InputEmail">Email:</label><sup><span class="glyphicon glyphicon-asterisk red-star"></span></sup>
							<input type="email" class="form-control" name="InputEmail" id="InputEmail" placeholder="e-mail@mail.net">
						</div>
						<div id="invalidFio" class="alert alert-danger" role="alert" style="display: none">
						</div>
						<div class="form-group">
							<label for="InputFio">ФИО:</label><sup><span class="glyphicon glyphicon-asterisk red-star"></span></sup>
							<input type="text" class="form-control" name="InputFio" id="InputFio" placeholder="Фамилия Имя Отчество">
						</div>
						<div id="invalidPhone" class="alert alert-danger" role="alert" style="display: none">
						</div>
						<div class="form-group">
							<label for="InputPhone">Телефон:</label>
							<input type="phone" class="form-control" name="InputPhone" id="InputPhone" placeholder="+38 (098) 765-43-21">
						</div>
						<div id="invalidComment" class="alert alert-danger" role="alert" style="display: none">
						</div>
						<div>
							<label for="InputComment">Комментарий:</label><sup><span class="glyphicon glyphicon-asterisk red-star"></span></sup>
							<textarea class="form-control" name="InputComment" id="InputComment" rows="3" placeholder="Ваш комментарий..."></textarea>
						</div>
						<div id="invalidFile" class="alert alert-danger" role="alert" style="display: none">
						</div>
						<div class="form-group">
							<label for="InputFile">Прикрепить файл</label>
							<input type="file" name="InputFile" id="InputFile" multiple="multiple">
							<div class="ajax-respond"></div>
							<p class="help-block"><sup><span class="glyphicon glyphicon-asterisk red-star"></span></sup> Поля обязательные для заполнения</p>
						</div>
						<button type="submit" class="btn btn-default btn-md btn-block" id="Send">Отправить</button>
						<div id="insert_response"></div>
					</form>

				</div>
			</div>
		</div>
		<div class="col-md-15" role="main">
			<div class="panel panel-default">
				<div class="panel-body" id="formList">
					<h3 class="control-title">Комментарии</h3>
					
					<div class="Comments"> 
					</div>

					<?php
					//#2
						echo ('<div class="panel panel-default">
							<div class="panel-heading">
								<span class="comment-fio-email">ФИО (email)</span>
								<span class="comment-id-date pull-right">ID_коментария Дата</span>
							</div>
							<div class="panel-body">
								<div class="comment-content">Пример комментария. Его можно удалить. Он находиться в конце файла /assets/includes/main.php. Удаляем все что между //#2 и //#end.</div>
							</div>
						</div>');
					//#end
					?>

				</div>
			</div>
		</div>
	</div>
</div>