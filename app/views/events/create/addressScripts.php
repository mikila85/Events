<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8vsWhdlN5xOdKltQ2mgHaXiY_k57jbTs&sensor=true&language=iw">
</script>

<script>


    $('#place_address').change(function(){
        getAddress($("#place_address").val());
    });

    var address_results;

    function getAddress(address){
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'address': address}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                address_results = results;
                var parsed_address =  parseAddress(results);
                $("#place_address").val(parsed_address["formatted_address"]);
                $("#place_address_cont").empty();
                $.each( parsed_address, function( key, value) {
                    $("#place_address_cont").append("<input type='hidden' name='" + key + "' value='" + value + "'>")
                });

            } else {
                return "Geocode was not successful for the following reason: " + status;
            }
        });
    }

    function parseAddress(results){
        var parsed_address = {};

        $.each( address_results[0].address_components, function( key, addressPart) {
            parsed_address[addressNamefix(addressPart.types[0])] =  addressPart.long_name;
        });

        parsed_address["formatted_address"] = results[0]["formatted_address"];
        parsed_address["map_cords"] = address_results[0].geometry.location.lat() + "/" + address_results[0].geometry.location.lng();

        return parsed_address;
    }

    function addressNamefix(address){
        addressAlias = {
            "route":"street",
            "locality":"city",
            "street_number":"house_num"
        };

        if(addressAlias[address]){
            address = addressAlias[address];
        }

        return address;
    }
</script>