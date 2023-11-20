<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample title</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./js/scripts.js"></script>
    <link rel="stylesheet" href="./css/styles.css" />
</head>

<?php include './php/functions.php'; ?>

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
    </main>
    <?php include './php/elements/footer.php'; ?>
</body>

</html>