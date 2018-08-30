@include('partials.front')

<section id="teste" class="clientes teste">
                
    <div class="container">
    	<div class="row">
	        <h2 class="center trick">Teste RP</h2>
	        <ul class="collection with-header">
	        	<li class="collection-header"><h4>Categorias</h4></li>
	        	@foreach($categoria as $cat_item)
				<li class="collection-item"><?php echo $cat_item->categoria ?></li>
				@endforeach
			</ul>
    	</div>

    	<div class="row">
    		<br><br>
    		<h4 class="center trick"><strong>Jobs (API Localhost)</strong></h4>
		  <ul class="collapsible" id="jobs-api"></ul>
    	</div>

    	<div class="row">
    		<br><br>
    		<h4 class="center trick"><strong>Poke (API External)</strong></h4>
		  <ul class="collection" id="poke-api"></ul>
    	</div>
    </div>

</section>

@include('partials.back')