(function($){
  $(function(){

    $('.sidenav').sidenav();
    $('.parallax').parallax();
    $('.modal').modal();

  }); // end of document ready

  $('.collapsible').collapsible();

	$(window).load(function() {
	  var link = "http://localhost:8001/api/jobs/";
	  $.ajax({
	      url: link,
	      type: 'GET',
	      dataType: 'json',
	    })
	    .done(function(data) {
			console.log("success");
	    	console.log(data);
	    	var jobs = data.map(function(item) {
	    		console.log(item)
	    		$('#data-api').append('<li>'+
		      		'<div class="collapsible-header"><strong>'+ item.id +'. </strong>'+ item.title +'</div>'+
		      		'<div class="collapsible-body">'+
		      		'<span><h6><strong>Description</strong></h6>'+ item.description +'</span>'+
		      		'<div><p><strong>Company:</strong> '+ item.company.name +'</p></div>'+
		      		'<div><p><strong>Local:</strong> '+ item.local +'</p></div>'+
		      		'<div><p><strong>Email:</strong> '+ item.company.email +'</p></div>'+
		      		'</div>'+
		    		'</li>')
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
