$(function(){
	//$('.nav-tabs').tab();
	/*$('.tab-list').click(function(){
		$('.tab-list').each(function(i){
			$(this).removeClass('active');
		});
		$(this).addClass('active');
	});*/
	/*$('#my-modal').modal({'backdrop':'true'});*/
	$('[data-toggle="popover"]').popover();

	$('body').tooltip({'title':'Hello',
						'selector':'p',
						'placement':'right',
						'trigger':' focus click'
					})
	$('[data-toggle="tooltip"]').tooltip({'placement':'right','trigger':' focus click'});
	$('#carousel-test').carousel({'interval':2000,'pause':'focus'})
});
