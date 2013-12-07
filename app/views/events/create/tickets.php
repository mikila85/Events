<div class="create_event_details_sidebar">
    <div class="page_title">Manage Contribute types</div>
    <div id="sideTicketsContainer">
        <div class="white_box">
            <div class="contribute_form">
                <div class="btnHolder"><a class="btnClose" onclick="removeTicket(this);">X</a></div>
                <div class="text1">Contribution name:</div>
                <div class="text2"><input name="name" type="text"></div>
                <div class="text1">Price:</div>
                <div class="text2"><input name="price" type="text"></div>
                <div class="text1">How many for sale:</div>
                <div class="text2"><input name="how_many_for_sale" type="text"></div>
                <div class="text2">Ticket deadline:</div>
                <div class="text1"><input name="deadline" type="text" value="00/00/00" size="20"> &nbsp; <a href="#"><img
                            src="/images/create-event-ico2.png" alt=""></a></div>
                <div class="text3">Description of perk:<br><textarea name="deadline" cols="" rows=""></textarea></div>
            </div>
        </div>
    </div>
    <div class="add_ticket"><a href="#">Add ticket type</a></div>
</div>

<script>
    $(".add_ticket").click(function(){
            $("#sideTicketsContainer").append($("#sideTicketsContainer").children().first().clone());
        return false;
        });
</script>