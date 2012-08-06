var control = (function(){
	
	var _delay_time, _trans_time;

	var _set_listeners = function() {

	};
	
	var _update = function(msg, type) {
		var msg_type = (type) ? type : "message";
		if(msg_type != "error") {
			if($('.update-message').length === 0) {
				$('<div>', {class: "update-message"}).prependTo($('div[role=main]')).hide();
			}
			$('.update-message').html(msg).slideDown(_trans_time).delay(_delay_time).slideUp();
		} else {
			alert(msg);
		}
	};
	
	return {
		init: function(){
			_delay_time = 3000,
			_trans_time = 300;
			
			_set_listeners();
		},
		update: 	_update,
		trans_time: _trans_time,
		delay_time: _delay_time
	}
})();

$(function() {
	control.init();
	$.Console = function(message) {
		try { console.log(message); } catch (e) { console = { log: function() { } } }
	};
});