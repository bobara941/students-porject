$(document).ready(function() {

	$('#sbt').click(function() {
		var errors = false;
		$('.errors').remove();
		if ($('#ime').val() == "") {
			$('#ime').after('<span class="errors">Моля въведете Име.</span>');
			errors = true;
		}
		if ($('#fam').val() == "") {
			$('#fam').after('<span class="errors">Mоля въведете Фамилия.</span>');
			errors = true;
		}
		if ($('#fn').val() == "") {
			$('#fn').after('<span class="errors">Моля въведете Факултетен номер.</span>');
			errors = true;
		}
		if ($('#fn').val().length > 6 || $('#fn').val().length < 6) {
			$('#fn').after('<span class="errors">Факултетния номер трябва да бъде дълъг 6 цифри</span>')
		}
		if ($('#spec').val() == "") {
			$('#spec').after('<span class="errors">Моля въведете Специалност.</span>');
			errors = true;
		}
		if ($('#kurs').val() == "") {
			$('#kurs').after('<span class="errors">Моля въведете Курс.</span>');
			errors = true;
		}
		//TODO
		/*if (isNaN($('#kurs'))) {
			$('#kurs').after('<span class="errors">Курсът трябва да съдържа само цифри.</span>');
			errors = true;
		}*/
		if ($('#grupa').val() == "") {
			$('#grupa').after('<span class="errors">Моля въведете Група.</span>');
			errors = true;
		}

		if (errors == true) {
			return false;
		}
		else {
			return true;
		}
	});

});