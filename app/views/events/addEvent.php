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
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8vsWhdlN5xOdKltQ2mgHaXiY_k57jbTs&sensor=true&language=iw">
</script>

<h1>Add new event:</h1>
<form method="POST" action="/event" id="eventForm">

    <span class="formLabel">Event Name:</span>
    <input type="text" value="" placeholder="Name" name="name"></br>

    <span class="formLabel">Address:</span>
    <input type="text" value=""  placeholder="fifth avenue 24/2" name="address[full_address]"></br>

    <input type="submit" value="send">

</form>

<script>


    $('#eventForm').submit(function(){
        getAddress($("#eventForm input[name='address[full_address]'").val());
        return false;
    });
    var results1;
    function getAddress(address){
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'address': address}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                results1 = results;
                parseAddress(results);
            } else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        });
    }

    function parseAddress(results){
        var parsed_address = [];

        $.each( results1[0].address_components, function( key, addressPart) {
            parsed_address[addressPart.types[0]] =  addressPart.long_name;
        });

        parsed_address["formatted_address"] = results[0]["formatted_address"];
        parsed_address["map_cords"] = results1[0].geometry.location.lat() + "/" + results1[0].geometry.location.lng();
        console.dir(parsed_address);
        addHiddenField("addressParts", parsed_address);
    }

    function addHiddenField(fieldClass, fieldsArray){
        $("." + fieldClass).remove(); //remove older.

        for(var index in fieldsArray) {
            $("#eventForm").append("<input type='hidden'  class='" + fieldClass + "' value='" + fieldsArray[index] + "' name='address[" + index + "]'>");
        }
        formParser("#eventForm");
    }

    function formParser(form){
        console.log($(form).serialize());
        $.ajax({
            type: "POST",
            url: $(form).attr('action'),
            data: $(form).serialize(),
            dataType : "json",
            success: function (response) {
                console.dir(response);
                $(".formAlert").remove();
                $.each( response, function( key, value ) {
                     $("input[name='" + key + "']").after("<span class='formAlert'>" + value + "</span>");
                });
            }
        });
        return false;
    }
</script>
