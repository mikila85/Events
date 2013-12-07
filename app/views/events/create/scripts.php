<script>
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
                        $("[name='" + key + "']").css('border','1px solid red');
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


</script>