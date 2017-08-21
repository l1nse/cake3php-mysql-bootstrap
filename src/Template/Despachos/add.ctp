<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->script('despachos') ?>
<div class="despachos form large-9 medium-8 columns content">
    <?= $this->Form->create($despacho, array('class' => 'formulario','enctype' => "multipart/form-data", 'id' => 'frm_add')) ?>
    <input type="hidden" name="ticket_id" id="ticket_id" value="<?php echo $ticket['id']; ?>">
    <input type="hidden" name="ciudade_id_hd" id="ciudade_id_hd" value="">
    <input type="hidden" name="comuna_id_hd" id="comuna_id_hd" value="">
    <fieldset>
        <legend><?= __('Agregar Despacho') ?></legend>
        <div class="form-group">
            <div class="input text">
                <label for="horario">Ticket</label>
                <input id="ticket_id_hd" name="ticket_id_hd" class="form-control" type="text" value="<?php echo $ticket['id']; ?>" disabled="disabled">
            </div>
        <?php
            //echo $this->Form->control('ticket_id', ["class" => "form-control", 'value' => $ticket['id'], 'disabled' => true]);
            echo $this->Form->control('descripcion', ["class" => 'form-control', 'disabled' => true, "value" => $ticket['descripcion'], "type" => "textarea"]);
            echo $this->Form->control('empresa del holding', ['options' => $empresas, 'empty' => true, "class" => "form-control", "id" => "empresa-id", "name" => "empresa_id", "required" => true]);
            echo $this->Form->control('región', ['options' => $regiones, 'empty' => true, "class" => "form-control", "id" => "regione-id", "name" => "regione_id", "required" => true]);
            echo $this->Form->control('ciudad', ['options' => $ciudades, 'empty' => true, "class" => "form-control", "id" => "ciudade-id", "name" => "ciudade_id", "required" => true]);
            echo $this->Form->control('comuna_id', ['options' => $comunas, 'empty' => true, "class" => "form-control", "required" => true]);
            echo $this->Form->control('cliente', ['options' => $entidades, 'empty' => true, "class" => "form-control", "id" => "entidade-id", "name" => "entidade_id", "required" => true]);
            echo $this->Form->control('tipo_documento_id', ['options' => $tipoDocumentos, 'empty' => true, "class" => "form-control", "required" => true]);
            echo $this->Form->control('numero_documento', ["class" => "form-control", "required" => true]);
            //echo $this->Form->control('direccion', ["class" => "form-control"]);
            //echo $this->Form->control('horario', ["class" => "form-control"]);
            //echo $this->Form->control('fecha_solicitud', ['empty' => true, "class" => "form-control"]);
        ?>
            
            
            <div class="input text">
                <label for="horario">Horario</label>
                <input type="text" name="horario" class="form-control time" maxlength="5" id="horario" required="required">
            </div>
            <div class="input text">
                <label for="fecha-solicitud">Fecha Solicitud</label>
                <input type="text" name="fecha_solicitud" class="form-control datetime" maxlength="10" id="fecha-solicitud" required="required">
            </div>
            <div class="input text">
                <label for="horario">Dirección</label>
                <input id="direccion" name="direccion" class="form-control" type="text" required="required">
                <div id="map"></div>
            </div>
        </div>
    </fieldset>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>tickets/index/">Cancelar</a>
        </div>
        <div class="col-md-1 col-md-offset-5">
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success', 'id' => 'btn_guardar')) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>

<script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13,
          mapTypeId: 'roadmap',
          mapTypeControl: false
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('direccion');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdNRziuJNaQKW9JPZiv3Xtw3EGBEsYTeY&libraries=places&callback=initAutocomplete" async defer></script>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 350px;
      }
      
    </style>