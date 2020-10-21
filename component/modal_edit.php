<div class="modal fade" id="modalEdit<?= $row['id'] ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit the Food</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <input name="id" type="hidden" value="<?= $row['id'] ?>">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" value="<?= $row['name'] ?>" required>
                    </div>

                    <div class="form-group">
                        <input type="number" name="price" class="form-control" min="0" placeholder="How Much the Price" value="<?= $row['price'] ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="oldimage" value="<?= $row['food_pic'] ?>">
                        <input type="file" name="food_pic" class="custom-file">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="save_menu" name="edit_menu" class="btn btn-success" value="Edit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>