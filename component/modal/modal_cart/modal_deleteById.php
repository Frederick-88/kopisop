<div class="modal fade" id="modalDelById<?= $row['cart_id'] ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete the Food</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure want to Delete this food?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="../model/Cart_Controller.php?deleteId=<?php echo $row['cart_id']; ?>" class="btn btn-danger mr-2">Delete</a>
            </div>
        </div>
    </div>
</div>