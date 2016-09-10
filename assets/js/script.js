$(document).ready (function () {
	var idata;

	var files;
	$('#InputFile').change(function(){
		files = this.files;
		console.log(files);
	});

	function funcBefore () {
		$("#InputEmail").val(null);
		$("#InputFio").val(null);	
		$("#InputPhone").val(null);
		$("#InputComment").val(null);
	}

	function funcCheckShowHideErr (data) {
		$("#SuccessWell").hide();
		if (data['err0']) {
			$("#invalidEmail").css("display", "inherit" );
			if (data['email'] === '') {
				$("#invalidEmail").html("<p>Поле обязательное для заполнения!</p>");
			} else {
				$("#invalidEmail").html("<p>Указаный Вами Email - некорректен!</p>");
			}
		} else {
			$("#invalidEmail").css("display", "none" );
		}

		if (data['err1']) {
			$("#invalidFio").css("display", "inherit" );
			if (data['fio'] === '') {
				$("#invalidFio").html("<p>Поле обязательное для заполнения!</p>");
			} else {
				$("#invalidFio").html("<p>Указаный Вами ФИО - некорректны!</p>");
			}
		} else {
			$("#invalidFio").css("display", "none" );
		}

		if (data['err2']) {
			$("#invalidPhone").css("display", "inherit" );
			if (data['phone'] === '') {
				//данная ветвь сценария не отыгрывается, см. script.php (function checkPhone(data))
				$("#invalidPhone").html("<p>Поле обязательное для заполнения!</p>");
			} else {
				$("#invalidPhone").html("<p>Указаный Вами телефон - некорректен!</p>");
			}
		} else {
			$("#invalidPhone").css("display", "none" );
		}

		if (data['err3']) {
			$("#invalidComment").css("display", "inherit" );
			if (data['comment'] === '') {
				$("#invalidComment").html("<p>Поле обязательное для заполнения!</p>");
			} else {
				$("#invalidComment").html("<p>Указаный Вами комментарий - некорректен!</p>");
			}
		} else {
			$("#invalidComment").css("display", "none" );
		}

		if (data['err4']) {
			$("#invalidFile").css("display", "inherit" );
			$("#invalidFile").html("<p>Выбранный Вами файл - не доступен или некорректен!</p>");
		} else {
			$("#invalidFile").css("display", "none" );
		}

	}

	function funcWriteCommentInDB (idata) {
		$.ajax ({
			url: "addtodb.php",
			type: "POST",
			data: ({email: idata['email'], fio: idata['fio'], phone: idata['phone'], comment: idata['comment'], file: idata['file']}),
			dataType: "json",
			success: function(data) {
				var data = new FormData();
				$.each( files, function( key, value ) {
					data.append( key, value );
				});

				$.ajax({
					url: './submit.php?uploadfiles',
					type: 'POST',
					data: data,
					cache: false,
					dataType: 'json',
					processData: false,
					contentType: false,
					success: function( respond, textStatus, jqXHR ) {
	 
						if( typeof respond.error === 'undefined' ){
			 
							var files_path = respond.files;
							var html = '';
							$.each( files_path, function( key, val ){ html += val +'<br>'; } )
						}
						else{
							console.log('ОШИБКИ ОТВЕТА сервера: ' + respond.error );
						}
					},
					error: function( jqXHR, textStatus, errorThrown ) {
						console.log('ОШИБКИ AJAX запроса: ' + textStatus );
					}
				});

				$("#SuccessWell").show();
			}
		});
	}

	function funcShowComments () {
		$.ajax ({
			url: "showcommets.php",
			dataType: "json",
			beforeSend: funcBefore,
			success: function(data) {
				console.log(data);
				if (!String.format) {
					String.format = function(format) {
						var args = Array.prototype.slice.call(arguments, 1);
						return format.replace(/{(\d+)}/g, function(match, number) { 
							return typeof args[number] != 'undefined'
							? args[number] 
							: match;
						});
					};
				}
				for (var i = data.length - 1; i >= 0; i--) {
					if (data[i].file === null) {
						data[i].file = '';
					}
					var commentpattern = [
						'<div class="panel panel-default">',
						'<div class="panel-heading">',
						'<span class="comment-fio-email">{0} ({1})</span>',
						'<span class="comment-id-date pull-right">#{2} {3}</span>',
						'</div>',
						'<div class="panel-body">',
						'<div class="comment-content">',
						'{4}<br/>',
						'<a href="/uploads/{5}">{5}</a>',
						'</div>',
						'</div>',
						'</div>'
						].join("\n");
					$(".Comments").append(String.format(commentpattern, data[i].fio, data[i].email, data[i].id, data[i].date, data[i].comment, data[i].file));
				}
			}
		});
	}

	$("#Send").bind("click", function () {
		$.ajax ({
			url: "getcurrentinfo.php",
			type: "POST",
			data: ({InputEmail: $("#InputEmail").val(), InputFio: $("#InputFio").val(), InputPhone: $("#InputPhone").val(), InputComment: $("#InputComment").val(), InputFile: $("#InputFile").val()}),
			dataType: "json",
			beforeSend: funcBefore,
			success: function(data) {
				if (data['is_err']) {
					$("#InputEmail").val(data['email']);
					$("#InputFio").val(data['fio']);	
					$("#InputPhone").val(data['phone']);
					$("#InputComment").val(data['comment']);
					funcCheckShowHideErr(data);
				} else {
					$("#InputEmail").val(null);
					$("#InputFio").val(null);	
					$("#InputPhone").val(null);
					$("#InputComment").val(null);
					function Copy (obj2) {
						var obj1 = obj2;
						obj1['copy'] = true;
						return obj1;
					}
					funcCheckShowHideErr(data);
					idata = data;
					funcWriteCommentInDB(idata);
					$(".Comments").empty();
					funcShowComments();
				}
			}
		});
	});	

	funcShowComments();

});