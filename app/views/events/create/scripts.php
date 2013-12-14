<link type="text/css" rel="stylesheet" href="\js\timePicker\bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="\js\timePicker\bootstrap-timepicker.min.css"/>

<script type="text/javascript" src="/js\jQueryUI\jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="\js\jQueryUI\langs\jquery.ui.datepicker-he.js"></script>

<script type="text/javascript" src="\js\timePicker\bootstrap.min.js"></script>
<script type="text/javascript" src="\js\timePicker\bootstrap-timepicker.js"></script>


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

        if ($("#address").attr("disabled")) {
            //$("#address").val("");
            $("#address").removeAttr("disabled", "true");
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
        $("#address").val(($(obj).attr("address")));
        $("#nameOfPlace").val($(obj).text());

        $("#list").hide();
        $("#address").attr("disabled", "true");
    }

    $('html').click(function (event) {
        console.dir(event);
        if ($('#list').is(':visible') && $(event.target).parents("#nameOfPlaceCont").length===0) {
            $("#address").removeAttr("disabled", "true");
            $("#list").hide();
        }
    });

    $(function () {
        $.datepicker.setDefaults($.datepicker.regional[ "he" ]);

        $("#startDate, #endDate, #lastCampainDate").datepicker({
            changeMonth: true,
            changeYear: true
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

                    $(".formAlert").remove();
                    $.each(response, function (key, value) {
                        //  $("input[name='" + key + "']").after("<span class='formAlert'>" + value + "</span>");
                        $("[name='" + key + "']").css('border', '1px solid red');
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

    $('#createEvent').bind("keyup keypress", function(e) {
        var code = e.keyCode || e.which;
        if (code  == 13) {
            e.preventDefault();
            return false;
        }
    });

</script>