<div class="modal fade" id="modalDel<?= $row['food_id'] ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete the Food</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure want to delete this food?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<<<<<<< HEAD:component/modal/modal_delete.php
                <a href="../model/action.php?delete=<?= $row['food_id']; ?>" class="btn btn-danger mr-2">Delete</a>
=======
                <a href="../controller/Cart_Controller.php?deleteAll=<?php echo $_SESSION['id']?>" class="btn btn-danger mr-2">Delete All</a>
>>>>>>> bf5b625387a5ca7780cc307c73786d1ea036bd03:component/modal/modal_cart/modal_deleteAll.php
            </div>
        </div>
    </div>
</div>