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
<form method="POST" action="/users" id="registerForm">

    <span class="formLabel">Email:</span>
    <input type="text" value="test@miki.com" placeholder="email@domain.com" name="email"></br>

    <span class="formLabel">First Name:</span>
    <input type="text" value="asdfsadf" name="firstName"></br>

    <span class="formLabel">Last Name:</span>
    <input type="text" value="sadfsagd" name="lastName"></br>

    <span class="formLabel">Password:</span>
    <input type="password" value="abc123" name="password"></br>

    <span class="formLabel">Repeat Password:</span>
    <input type="password" value="abc123" name="password_confirmation"></br>

    <input type="submit" value="send">

</form>

<script>
    $(document).ready(function () {
        var form = $('#registerForm');

        form.submit(function () {
            $.ajax({
                type: "POST",
                url: form.attr('action'),
                data: form.serialize(),
                dataType : "json",
                success: function (response) {
                    $(".formAlert").remove();
                    $.each( response, function( key, value ) {
                         $("input[name='" + key + "']").after("<span class='formAlert'>" + value + "</span>");
                    });
                }
            });
            return false;
        });
    });
</script>
