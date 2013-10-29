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
<form method="POST" action="/users/login" id="registerForm">

    <span class="formLabel">Email:</span>
    <input type="text" value="test@miki.com" placeholder="email@domain.com" name="email"></br>

    <span class="formLabel">Password:</span>
    <input type="password" value="abc123" name="password"></br>

    <input type="submit" value="send">
    </br>
    <a href="create">New User</a>
    <a href="/social">Login With Facebook</a>
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
                    console.dir(response);
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
