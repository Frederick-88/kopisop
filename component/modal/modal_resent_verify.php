<div class="modal fade" id="modalResentVerify" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Want to resent verification email?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Input your email below.</p>
                <form action="../../model/auth/register_controller.php" method="POST">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-0">
                                    <img class="input-icon" src="../../assets/icons/email.png" alt="email">
                                </span>
                            </div>
                            <input type="email" name="email" class="form-control " id="emailInput" placeholder="Enter your email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" name="resent_verify" class="btn btn-danger" value="Resend">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>