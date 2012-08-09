var control = (function(){
	
	var _delay_time, _trans_time, $update_message;

	var _set_listeners = function() {

	};
	
	var _update = function(msg, type) {
		var msg_type = (type) ? type : "message";
		if(msg_type != "error") {
			if($update_message.length === 0) {
				$update_message = $('<div>', {class: "update-message"}).prependTo($('div[role=main]')).hide();
			}
			_display_message(msg);
		} 
		else {
			alert(msg);
		}
	};

	var _display_message = function(msg) {
		$update_message.html(msg).slideDown(_trans_time).delay(_delay_time).slideUp();
	}
	
	return {
		init: function(){
			_delay_time = 3000,
			_trans_time = 300;
			$update_message = $('.update-message');
			
			$update_message.slideDown(_trans_time).delay(_delay_time).slideUp();

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