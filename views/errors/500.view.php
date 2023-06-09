<?php include_once dirname(__DIR__) . "/incs/header.view.php"; ?>

    <div class="exception">
        <h1 class="exception_title">500!</h1>
        <p class="exception_description"><b><?= $exception->getMessage(); ?></b></p>

        <div class="exception_table">
            <h3>Trace:</h3>
            <table>
                <tr>
                    <td>Message:</td>
                    <td><?= $exception->getMessage() ?></td>
                </tr>
                <tr>
                    <td>File:</td>
                    <td><?= $exception->getFile() ?></td>
                </tr>

                <tr>
                    <td>Line:</td>
                    <td><?= $exception->getLine() ?></td>
                </tr>
            </table>
        </div>
    </div>

<?php include_once dirname(__DIR__) . "/incs/footer.view.php"; ?>