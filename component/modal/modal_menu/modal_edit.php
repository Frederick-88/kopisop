<div class="modal fade" id="modalEdit<?php echo $row['food_id'] ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit the Food</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../controller/Menu_Controller.php" method="POST" enctype="multipart/form-data">
                    <input name="id" type="hidden" value="<?php echo $row['food_id'] ?>">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Enter Name Food Here" value="<?php echo $row['name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="price" class="form-control" min="0" placeholder="How Much the Price" value="<?php echo $row['price'] ?>" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="category" id="category" required>
                            <option value="" disabled selected hidden>---Select The Category---</option>

                            <?php
                            $row2=$foodAll->getAllCategory();
                            while ($category = $row2->fetch_assoc()):
                            ?>
                                <option value="<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?> </option>

                            <?php
                            endwhile;
                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="oldimage" value="<?php echo $row['food_pic'] ?>">
                        <input type="file" name="image" class="form-control-file" accept="image/*">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" name="update" class="btn btn-danger" value="Edit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>