<?php include_once dirname(__DIR__). "/incs/header.view.php"; ?>

    <div class="exception">
        <h1 class="exception_title">404!</h1>
        <p class="exception_description">No Route Found For:  <b><?= $route; ?></b></p>

        <a href="/">Go back Home</a>
    </div>

<?php include_once dirname(__DIR__). "/incs/footer.view.php"; ?>