<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserting Product</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./Styles/styles.css">
    
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>
        tinymce.init({selector: 'textarea'});
    </script>
</head>

<body>
    <?php include("includes/db.php"); ?>

    <form action="" method="post" enctype="multipart/form-data">

        <table align="center" width="750" border="2" bgcolor="orange">
            <tr align="center">
                <td colspan="7">
                    <h2>Insert New Post Here</h2>
                </td>
            </tr>

            <tr>
                <td align="right"><b>Product Title:</b></td>
                <td><input type="text" name="food_title" size="40" required/></td>
            </tr>

            <tr>
                <td align="right"><b>Product Category:</b></td>
                <td>
                    <select name="food_categories" required>
                        <option>Select a Category</option>
                        <?php
                        $get_cats = "SELECT * FROM categories";

                        $run_cats = mysqli_query($mysqli, $get_cats);

                        while ($row_cats = mysqli_fetch_array($run_cats)) {
                            $cat_id = $row_cats['cat_id'];
                            $cat_title = $row_cats['cat_title'];

                            echo "<option value='$cat_id'>$cat_title</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td align="right"><b>Product Brand:</b></td>
                <td>
                    <select name="food_brands" required>
                        <option>Select a Brand</option>

                        <?php

                        $get_brands = "SELECT * FROM brands";

                        $run_brands = mysqli_query($mysqli, $get_brands);

                        while ($row_brands = mysqli_fetch_array($run_brands)) {
                            $brands_id = $row_brands['brands_id'];
                            $brands_title = $row_brands['brands_title'];

                            echo "<option value='$brands_id'>$brands_title</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td align="right"><b>Image:</b></td>
                <td><input type="file" name="food_image" required/></td>
            </tr>

            <tr>
                <td align="right"><b>Price:</b></td>
                <td><input type="text" name="food_price" required/></td>
            </tr>

            <tr>
                <td align="right"><b>Description:</b></td>
                <td><textarea name="food_desc" cols="25" rows="5"></textarea></td>
            </tr>

            <tr>
                <td align="right"><b>Product Keywords:</b></td>
                <td><input type="text" name="product_keywords" size="50" required/></td>
            </tr>

            <tr align="center">
                <td colspan="7"><input type="submit" class="btn btn-success" name="insert_post" value="Insert Product Now" /></td>
            </tr>

        </table>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>
<?php

    // Getting the Text Data from Fields
    if(isset($_POST['insert_post'])) {
        $food_title = $_POST['food_title'];
        $food_cat = $_POST['food_categories'];
        $food_brands = $_POST['food_brands'];
        $food_price = $_POST['food_price'];
        $food_desc = $_POST['food_desc'];
        $product_keywords = $_POST['product_keywords'];
        
        //Getting the Image from the Field
        $food_image = $_FILES['food_image']['name'];
        $food_image_tmp = $_FILES['food_image']['tmp_name'];

        move_uploaded_file($food_image_tmp, '/product_images/$food_image');

        $insert_food = "INSERT INTO food (food_title, food_categories, food_brands, food_price, food_desc, food_image, product_keywords) 
                         values ('$food_title', '$food_cat', '$food_brands', '$food_price', '$food_desc', '$food_image', '$product_keywords
                         ')";

        $insert_pro = mysqli_query($mysqli, $insert_food);
            if ($insert_pro ) {
                echo "<script>alert('Food Has Been Inserted!')</script>";
                echo "<script>window.open('insert_food.php','_self')</script>";

            }

    } else {

    }

?>