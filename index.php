<!DOCTYPE html>
<html lang="pl">

<?php include './php/functions.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample title</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./js/scripts.js"></script>
    <link rel="stylesheet" href="./css/styles.css" />
</head>

<body>
    <?php include './php/elements/header.php'; ?>
    <main>
        <section class="example-1">
            <div class="wrapper">
                <h2>Example 1</h2>
                <p>If you click on the button green box will appear or disappear.</p>
                <div class="example-1__box"></div>
                <button id="example-1-hide-box">Hide box</button>
                <button id="example-1-show-box">Show box</button>
            </div>
        </section>
        <section class="example-2">
            <div class="wrapper">
                <h2>Example 2</h2>
                <p>Try to log in. ('user@user.com' and '1234' works)</p>
                <form id="loginform">
                    <div id="error" class="alert"></div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                    <button type="submit">
                        Sign in
                    </button>
                </form>
            </div>
        </section>
    </main>
    <?php include './php/elements/footer.php'; ?>
    <script>
        // Example 2.
        $(function () {
            $('#loginform').on('submit', function (event) {
                event.preventDefault()

                var $error = $('#error')

                /*
                data: $(this).serialize() - wraps #loginform into jquery object
                let data = JSON.parse(response) - catch resposne and parse it into json data that we can use
    
                login.php handles request after clicking on #loginform submit button
                */
                $.ajax({
                    type: 'POST',
                    url: './php/login.php',
                    data: $(this).serialize(),
                }).then(function (response) {
                    let data = JSON.parse(response)

                    /* 
                    check if there is any error that occured on server (e.g. bad password and user) with .error from data object 
                    remove class that hides an error and return something into html
                    for example data.error
                    */
                    if (data.error) {
                        $error.removeClass('display-none').html(data.error)
                        // End function execution. We can also return something, e.g. 0 or string
                        return
                    }

                    /* 
                    if there is no error we set a token into local storage inside file login.php
                    */
                    localStorage.setItem('token', data.token)
                    // if everything is ok then redirect user
                    location.href = './php/user/view.php'
                }).fail(function (reason) {
                    // if request fails for whatever reason
                    $error.removeClass('display-none').html('Error attempting to sign in.')
                })
            })
        })
    </script>
</body>

</html>