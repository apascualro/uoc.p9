<style>
	body {
		font-family: 'Arial';
		color: #646464;
	}

	.continents-wrap {
		float: left;
		width: 20%;
		margin: 0 5% 0 0;
		padding: 0;
	}

	.flowers-wrap {
		float: left;
		width: 20%;
		margin: 0 5% 0 0;
		padding: 0;
		position: relative;
	}

	.flowers {
		float: left;
		width: 50%;
	}

	.flowers div {
		float: left;
		width: 90%;
		height: 68px;
		line-height: 68px;
		padding: 0 5%;
		background: #eee;
		margin: 0 0 1px;
		position: relative;
	}


</style>

<pre id=result> </pre>

<div class="flowers-wrap">

	<h3 style="font-size:14px; font-weight:normal;">Available Flowers</h3>
	<p style="font-size:12px;"><strong>Filter flowers by colour:</strong></p>
	<form>
		<label style="font-size:12px;">
			<input type="checkbox" name="fl-colour" value="red" id="red" /> Red
		</label>
		<br>
		<label style="font-size:12px;">
			<input type="checkbox" name="fl-colour" value="yellow" id="yellow" /> Yellow
		</label>
		<br>
		<label style="font-size:12px;">
			<input type="checkbox" name="fl-colour" value="pink" id="pink" /> Pink
		</label>
		<br>
		<label style="font-size:12px;">
			<input type="checkbox" name="fl-colour" value="purple" id="purple" /> Purple
		</label>
		<br>
		<label style="font-size:12px;">
			<input type="checkbox" name="fl-colour" value="green" id="green" /> Green
		</label>
		<br>
		<label style="font-size:12px;">
			<input type="checkbox" name="fl-colour" value="other" id="other" /> Other
		</label>
	</form>
	<p style="font-size:12px;"><strong>Filter flowers by size:</strong></p>
	<form>
		<label style="font-size:12px;">
			<input type="checkbox" name="fl-size" value="tiny" id="tiny" /> Tiny
		</label>
		<br>
		<label style="font-size:12px;">
			<input type="checkbox" name="fl-size" value="small" id="small" /> Small
		</label>
		<br>
		<label style="font-size:12px;">
			<input type="checkbox" name="fl-size" value="medium" id="medium" /> Medium
		</label>
		<br>
		<label style="font-size:12px;">
			<input type="checkbox" name="fl-size" value="large" id="large" /> Large
		</label>
		<br>
		<label style="font-size:12px;">
			<input type="checkbox" name="fl-size" value="giant" id="giant" /> Giant
		</label>
	</form>

</div>

<div class="continents-wrap">

	<h3 style="font-size:14px; font-weight:normal;">Categorias</h3>

	<div class="continents" style="font-size:12px;">
		<div>Cartas
			<input type="checkbox" name="fl-cont" value="Cartas" id="Cartas" />
		</div>
		<div>Dados
			<input type="checkbox" name="fl-cont" value="Dados" id="Dados" />
		</div>
		<div>Losetas
			<input type="checkbox" name="fl-cont" value="Losetas" id="Losetas" />
		</div>
		<div>Miniaturas
			<input type="checkbox" name="fl-cont" value="Miniaturas" id="Miniaturas" />
		</div>
		<div>Rol
			<input type="checkbox" name="fl-cont" value="Rol" id="Rol" />
		</div>
		<div>Set losetas
			<input type="checkbox" name="fl-cont" value="Set losetas" id="Set losetas" />
		</div>
		<div>Tablero
			<input type="checkbox" name="fl-cont" value="Tablero" id="Tablero" />
		</div>

		<div>Wargames
			<input type="checkbox" name="fl-cont" value="Wargames" id="Wargames" />
		</div>
	</div>

</div>

<div class="flowers">
	<div class="flower" data-id="aloe" data-category="green small medium africa">Aloe</div>
	<div class="flower" data-id="lavendar" data-category="purple green medium africa europe">Lavender</div>
	<div class="flower" data-id="stinging-nettle" data-category="green large africa europe asia">Stinging Nettle</div>
	<div class="flower" data-id="gorse" data-category="green yellow large europe">Gorse</div>
	<div class="flower" data-id="hemp" data-category="green large asia">Hemp</div>
	<div class="flower" data-id="titan-arum" data-category="purple other giant asia">Titan Arum</div>
	<div class="flower" data-id="golden-wattle" data-category="green yellow large australasia">Golden Wattle</div>
	<div class="flower" data-id="purple-prairie-clover" data-category="purple green other medium north-america">Purple Prairie Clover</div>
	<div class="flower" data-id="camellia" data-category="pink other large north-america">Camellia</div>
	<div class="flower" data-id="scarlet-carnation" data-category="red medium north-america">Scarlet Carnation</div>
	<div class="flower" data-id="indian-paintbrush" data-category="red medium north-america">Indian Paintbrush</div>
	<div class="flower" data-id="moss-verbena" data-category="purple other small south-america">Moss Verbena</div>
	<div class="flower" data-id="climbing-dayflower" data-category="blue tiny south-america">Climbing Dayflower</div>
	<div class="flower" data-id="antarctic-pearlwort" data-category="green yellow large antarctica">Antarctic Pearlwort</div>
</div>


<script>
	var $filterCheckboxes = $('input[type="checkbox"]');

	$filterCheckboxes.on('change', function() {

		var selectedFilters = {};

		$filterCheckboxes.filter(':checked').each(function() {

			if (!selectedFilters.hasOwnProperty(this.name)) {
				selectedFilters[this.name] = [];
			}

			selectedFilters[this.name].push(this.value);

		});

// create a collection containing all of the filterable elements
var $filteredResults = $('.flower');

// loop over the selected filter name -> (array) values pairs
$.each(selectedFilters, function(name, filterValues) {

// filter each .flower element
$filteredResults = $filteredResults.filter(function() {

	var matched = false,
	currentFilterValues = $(this).data('category').split(' ');

// loop over each category value in the current .flower's data-category
$.each(currentFilterValues, function(_, currentFilterValue) {

// if the current category exists in the selected filters array
// set matched to true, and stop looping. as we're ORing in each
// set of filters, we only need to match once

if ($.inArray(currentFilterValue, filterValues) != -1) {
	matched = true;
	return false;
}
});

// if matched is true the current .flower element is returned
return matched;

});
});

$('.flower').hide().filter($filteredResults).show();

});

</script>