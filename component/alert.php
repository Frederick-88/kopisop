<?php if (isset($_SESSION['notif_auth'])) : ?>
    <div id="message">
        <div class="alert <?= $_SESSION['type']; ?> alert-dismissible fade show" role="alert">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['notif_auth']);
            unset($_SESSION['message']);
            unset($_SESSION['type']);
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['notif_menu'])) : ?>
    <div id="top-message" class="container">
        <div class="alert <?= $_SESSION['type']; ?> alert-dismissible fade show" role="alert">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['notif_menu']);
            unset($_SESSION['message']);
            unset($_SESSION['type']);
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php endif; ?>