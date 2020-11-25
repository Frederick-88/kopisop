<?php if (isset($_SESSION['message'])) : ?>
    <div id="message">
        <div class="alert <?= $_SESSION['type']; ?> alert-dismissible fade show" role="alert">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            unset($_SESSION['type']);
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php endif; ?>