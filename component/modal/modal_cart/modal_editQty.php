<div class="modal fade" id="modalEditQty<?php echo $row['cart_id'] ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit the Food</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../model/Cart_Controller.php" method="POST">
                    <input name="id" type="hidden" value="<?php echo $row['cart_id'] ?>">
                    <div class="form-group">
                        <input type="number" name="quantity" class="form-control" min=1 value="<?php echo $row['quantity'] ?>" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" name="updateQty" class="btn btn-danger" value="Edit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>