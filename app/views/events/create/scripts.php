<link type="text/css" rel="stylesheet" href="\js\timePicker\bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="\js\timePicker\bootstrap-timepicker.min.css"/>

<script type="text/javascript" src="/js\jQueryUI\jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="\js\jQueryUI\langs\jquery.ui.datepicker-he.js"></script>

<script type="text/javascript" src="\js\timePicker\bootstrap.min.js"></script>
<script type="text/javascript" src="\js\timePicker\bootstrap-timepicker.js"></script>

<script type="text/javascript" src="\js\jquery.ajaxfileupload.js"></script>


<link href="\js\jQueryUI\css\ui-lightness\jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css"/>
<script>
    var a;
    function nameOfPlaceAjax(obj, event) {
        if (event.keyCode == 40) {//down
            if ($("#list .selected").next().length !== 0) {
                var temp = $("#list .selected").next();
                $("#list .selected").removeClass("selected");
                $(temp).addClass("selected");
            }
            return;
        } else if (event.keyCode == 38) {//up
            if ($("#list .selected").prev().length !== 0) {
                var temp = $("#list .selected").prev();
                $("#list .selected").removeClass("selected");
                $(temp).addClass("selected");
            }
            return;
        } else if (event.keyCode == 13) {//enter
            if ($("#list .selected").length !== 0) {
                nameOfPlaceClicked($("#list .selected"), event)
            }
            return;
        }

        if ($("#place_address").attr("disabled")) {
            //$("#place_address").val("");
            $("#place_address").removeAttr("disabled", "true");
        }


        $.ajax({
            type: "GET",
            url: '/place/autocomplete',
            data: "name=" + obj.value,
            dataType: "json",
            success: function (json) {
                $("#list").empty();
                for (key in json) {
                    $("#list").append("<div class='nameOfPlaceItem' onmousemove='nameOfPlaceMouse(this);' onclick='nameOfPlaceClicked(this, event);' address='" + json[key].formatted_address + "' place_id='" + json [key].ID + "'>" + json[key].name + "</div>");
                    $("#list").show();
                }
                $("#list").children().first().addClass("selected");
            }
        });
    }

    function nameOfPlaceMouse(obj) {
        if ($("#list .selected") != obj) {
            $("#list .selected").removeClass("selected");
            $(obj).addClass("selected");
        }
    }

    function nameOfPlaceClicked(obj, event) {
        event.stopPropagation();
        $("#place_address").val(($(obj).attr("address")));
        $("#nameOfPlace").val($(obj).text());

        $("#place_address_cont").empty();
        $("#place_address_cont").append("<input type='hidden' name='place_id' value='" + $(obj).attr("place_id") + "'>")

        $("#list").hide();
        $("#place_address").attr("disabled", "true");
    }

    $('nameOfPlace').blur(function (event) {
        makeNameLoseFocus(event);
    });


    $('html').click(function (event) {
        if ($('#list').is(':visible') && $(event.target).parents("#nameOfPlaceCont").length===0) {
            $("#place_address").removeAttr("disabled", "true");
            $("#list").hide();
        }
    });


    $(function () {
        $.datepicker.setDefaults($.datepicker.regional[ "he" ]);

        $("#startDate, #endDate, #lastCampainDate, .ticketDate").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd/mm/y'
        });

        $('#entryTime, #endTime').timepicker({
            showMeridian: false,
            minuteStep: 5
        });
    });

    var myJson = {};
    $(document).ready(function () {
        $(".saveEvent").click(function () {

            var form = $('#createEvent');

            var tickets = [];
            $("#sideTicketsContainer").children().each(function () {
                tickets.push($(this).find("input").serializeObject());
            });

            var events = $(".create_event_details_main").find("input, textarea").serializeObject();


            myJson["events"] = events;
            myJson["tickets"] = tickets;


            $.ajax({
                type: "POST",
                url: form.attr('action'),
                data: "data=" + JSON.stringify(myJson),
                dataType: "json",
                success: function (response) {
                    console.log(response);

                    $(".formAlert").removeClass("formAlert");
                    $.each(response, function (key, value) {
                        $("[name='" + key + "']").addClass('formAlert');
                    });


                }
            });
            return false;

        });
    });
    function removeTicket(ticket) {
        if ($("#sideTicketsContainer").children().length == 1) {
            alert("cant delete 1 ticket...");
            return;
        }
        $(ticket).parents('.white_box').remove();
    }
    ;

    $.fn.serializeObject = function () {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function () {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };

    $('#createEvent').bind("keyup keypress", function (e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            e.preventDefault();
            return false;
        }
    });
    $("#imageUpload").ajaxfileupload({
        'action': '/upload/image',
        onComplete: function(filename, response) {
            if (filename) {
                $("#imageUploaded").attr("src", filename);
                $("#imageUploadUrl").val(filename);
                return false;
            }
        }
    });

</script>