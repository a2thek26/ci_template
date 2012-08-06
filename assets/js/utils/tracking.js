var Tracking = function() {
	
	var add_to_cart_button, ga_account, ga_active, new_match_button, save_search_button, self, step_array, view_diamond_button;
	
	var set_up_listeners = function() {
		youtube.on('click', function() {
			self.record_outbound_link("", "Scratch Dr Page Header", "Add to Cart Click", "Scratch Dr Page - Click YouTube");
		});
	};
	
	return {
		init: function() {
			//define values
			ga_account	= "UA-8118613-1";
			ga_active 	= true;
			
			//define objects
			self				= this;
			youtube 			= $('.youtube-btn');
			
			set_up_listeners();
		},
		
		record_outbound_link: function(link, category, action, label) {
			if(ga_active) {
				label = label || "";
				try {
					var pageTracker=_gat._getTracker(ga_account);
					pageTracker._trackEvent(category, action, label);
				} catch(err){}
			}
			
		} 
	}	
	
}();

$(function() {
	$.Console = function(message) {
    	try { console.log(message); } catch (e) { console = { log: function() { } } }
	};
	
	Tracking.init();
});
