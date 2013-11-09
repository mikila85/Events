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
    <input type="text" value="" placeholder="Name" name="Name"></br>

    <span class="formLabel">Address:</span>
    <input type="text" value=""  placeholder="fifth avenue 24/2" name="Address"></br>

    <input type="submit" value="send">

</form>

<script>


    $('#eventForm').submit(function(){

        parseAddress($("#eventForm input[name='Address'").val(), eventForm);
        return false;

    });




    function parseAddress(address, form){
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'address': address}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var parsed_address = [];
                parsed_address["house_num"] = results[0]["address_components"][0]["long_name"];
                parsed_address["street_name"] = results[0]["address_components"][1]["long_name"];
                parsed_address["city"] = results[0]["address_components"][2]["long_name"];
                parsed_address["country"] = results[0]["address_components"][3]["long_name"];
                parsed_address["formatted_address"] = results[0]["formatted_address"];
                addHiddenField(form, "addressParts", parsed_address);
            } else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        });
    }

    function addHiddenField(toForm, fieldClass, fieldsArray){
        $("." + fieldClass).remove(); //remove older.
        for(var index in fieldsArray) {
            $(toForm).append("<input type='hidden' class=" + fieldClass + " value='" + fieldsArray[index] + " name='" + index + "'>");
        }
        formParser("#eventForm");
    }

    function formParser(form){
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
