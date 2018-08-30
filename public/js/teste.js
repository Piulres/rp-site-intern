(function($){
  $('.collapsible').collapsible();

	$(window).load(function() {
	  $.ajax({
	      url: 'http://localhost:8001/api/jobs/',
	      type: 'GET',
	      dataType: 'json',
	    })
	    .done(function(data) {
			console.log("success");
	    	var jobs = data.map(function(item) {
	    		$('#jobs-api').append('<li>'+
		      		'<div class="collapsible-header"><strong>'+ item.id +'. </strong>'+ item.title +'</div>'+
		      		'<div class="collapsible-body">'+
		      		'<span><h6><strong>Description</strong></h6>'+ item.description +'</span>'+
		      		'<div><p><strong>Company:</strong> '+ item.company.name +'</p></div>'+
		      		'<div><p><strong>Local:</strong> '+ item.local +'</p></div>'+
		      		'<div><p><strong>Email:</strong> '+ item.company.email +'</p></div>'+
		      		'</div>'+
		    	'</li>');
	    	});
	    })
	    .fail(function() {
	      console.log("error");
	    })
	    .always(function() {
	      console.log("complete");
	    });

	  $.ajax({
	      url: 'http://pokeapi.salestock.net/api/v2/pokemon/?limit=20',
	      type: 'GET',
	      dataType: 'json',
	    })
	    .done(function(data) {
			console.log("success");
	    	var pokes = data.results.map(function(item) {
	    		$('#poke-api').append('<li class="collection-item">'+ item.name +'</li>');
	    	});
	    })
	    .fail(function() {
	      console.log("error");
	    })
	    .always(function() {
	      console.log("complete");
	    });
	});
})(jQuery); // end of jQuery name space
