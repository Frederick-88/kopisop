<div class="modal fade" id="modalCheckOut" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Check Out</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you want to check out the orders? </p>
                <form action="../controller/Cart_Controller.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
                    <input type="hidden" name="date" value="<?php echo $dateNow ?>">
                    <input type="hidden" name="subtotal" value="<?php echo $subtotal ?>" required>
                    <input type="hidden" name="tax" value="<?php echo $tax ?>" required>
                    <input type="hidden" name="shipping" value="<?php echo $shipping ?>" required>
                    <input type="hidden" name="total" value="<?php echo $total ?>" required>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" name="checkOut" class="btn btn-danger" value="Check Out Now">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

