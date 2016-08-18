
			$(document).ready(function() {
				$('#search_text').keyup(function() {
					var txt = $(this).val();
					if (txt != '') {
						$.ajax({
							url:"fetch.php",
							method:"post",
							data:{search:txt},
							dataType:"text",
							success:function(data) {
								$('#result').html(data);
							}
						});
					}
					else {
						$('#result').html('');
					}
				});

				$('#tst th').click(function() {
					if ($(this).hasClass("fa fa-caret-down")) {
						$(this).removeClass("fa fa-caret-down").addClass("fa fa-caret-up");
					}
					else {
						$(this).removeClass("fa fa-caret-up").addClass("fa fa-caret-down");
					}
				});
				
			});