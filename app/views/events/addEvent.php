<style>
    .formLabel {
        width: 150px;
        display: inline-block;
    }
    .formAlert{
        color:red;
        font-weight: bold;
    }
</style>



    <span class="formLabel">Address:</span>
    <input id="" type="text" value=""  placeholder="fifth avenue 24/2" name="address[full_address]"></br>


<script>


    $('#place_address').blur(function(){
        getAddress($("#place_address").val());
        return false;
    });

    var address_results;
    function getAddress(address){
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'address': address}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                address_results = results;
                parseAddress(results);
            } else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        });
    }

    function parseAddress(results){
        var parsed_address = [];

        $.each( address_results[0].address_components, function( key, addressPart) {
            parsed_address[addressNamefix(addressPart.types[0])] =  addressPart.long_name;
        });

        parsed_address["formatted_address"] = results[0]["formatted_address"];
        parsed_address["map_cords"] = address_results[0].geometry.location.lat() + "/" + address_results[0].geometry.location.lng();
        console.dir(parsed_address);
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
