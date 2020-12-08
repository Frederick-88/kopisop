<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Food</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../model/Menu_Controller.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Enter Name Food Here" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="price" class="form-control" min="0" placeholder="How Much the Price" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="category" id="category" required>
                            <option value="" disabled selected hidden>---Select The Category---</option>

                            <?php
                            require_once '../library/process.php';
                            $data = $mysqli->query("SELECT * FROM Category");

                            while ($category = $data->fetch_assoc()) :
                            ?>
                                <option value="<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?> </option>

                            <?php
                            endwhile;
                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" class="form-control-file" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" name="save" class="btn btn-danger" value="Save">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>