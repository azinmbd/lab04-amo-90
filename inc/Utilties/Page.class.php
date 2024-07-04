<?php

class Page{
    private static string $title = "Lab04 - Azin Mobedmehdiabadi ";

    static function header(){ ?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title><?php echo self::$title; ?></title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        </head>
        <body class="p-5">
            <h1><?php echo self::$title; ?></h1>
    <?php }

    static function form($formData, $index){ ?>
    <!-- <?php echo var_dump($formData)?> -->
        <div class="Container pt-2">
            <form action="" method="post" method="POST">
                <div class="row pt-5">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleInputfirstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="firstname" value="<?php echo $formData->getFirstName() ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail" class="form-label">E-mail address</label>
                            <input type="text" class="form-control" name="email" value="<?php echo $formData->getEmail() ?>">
                            </div>
                        <div class="mb-3">
                            <label for="floatingTextarea2">Street Address</label>
                            <textarea class="form-control" placeholder="Write the address ..." style="height: 100px" name="address"><?php echo $formData->getAddress() ?></textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleInputlastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lastname" value="<?php echo $formData->getLastName() ?>">
                        </div>
                        <div class="mb-1">
                        <label for="exampleInputgender" class="form-label">Gender</label>
                            <select class="form-select" aria-label="Default select example" name="gender">
                                <option  value="male"  <?php if ($formData->getGender() == "male") echo "selected"; ?>>Male</option>
                                <option value="female"  <?php if ($formData->getGender() == "female") echo "selected"; ?>>Female</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="exampleInputCity" class="form-label">City</label>
                            <input type="text" class="form-control" name="city" value="<?php echo $formData->getCity() ?>">
                        </div>
                        <div class="mb-1">
                            <label for="exampleInputCountry" class="form-label">Country</label>
                            <input type="text" class="form-control" name="country" value="<?php echo $formData->getCountry() ?>">
                        </div>                         
                    </div>
                </div>
                <input type="hidden" name="Index" value="<?php echo $index; ?>">

                <button type="submit" name="previous" class="btn btn-outline-secondary">PREVIOUS</button>
                <button type="submit" name="save"  class="btn btn-info">SAVE</button>
                <button type="submit" name="delete"  class="btn btn-danger">DELETE</button>
                <button type="submit" name="next"  class="btn btn-outline-secondary">NEXT</button>
            </form>
        </div>
    <?php }

    static function showError($errors)   {
        if (is_array($errors))   {
            echo '<div class="alert alert-danger"><ul>';
            foreach ($errors as $error)  {
                echo "<li>".$error."</li>";
            }
            echo '</ul></div>';
            
        } else {
            echo '<div class="alert alert-danger">'.$errors.'</div>';
        }
    }
    static function showSuccess($succsess)   {
        if (is_array($succsess))   {
            echo '<div class="alert alert-success"><ul>';
            foreach ($succsess as $info)  {
                echo "<li>".$info."</li>";
            }
            echo '</ul></div>';
            
        } else {
            echo '<div class="alert alert-success">'.$info.'</div>';
        }
    }

    static function footer() { ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
    </html>
    <?php }

}

?>