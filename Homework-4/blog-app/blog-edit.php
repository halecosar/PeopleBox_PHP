<?php
session_start();

require "libs/vars.php";
require "libs/functions.php";

$id = $_GET["id"];
$description = $_POST["description"];
$image = $_POST["image"];
$url = $_POST["url"];
$isActive = isset($_POST["isActive"]) ? 1 : 0;
$title_err = $description_err = "";

$result = getBlogByID($id);
$selectedMovie = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_title = $_POST["title"];

    if (empty($input_title)) {
        $_SESSION['title_err'] = "<div class='alert alert-danger mb-0 text-center'>Başlık boş bırakılamaz .</div>";
    } else if (strlen($input_title) > 150) {
        $_SESSION['title_err'] = "<div class='alert alert-danger mb-0 text-center'>Başlık için istenenden fazla karakter kullandınız. Max: 150 karakter</div>";
    } else {
        $title = $input_title;
    }

    $input_description = trim($_POST["description"]);

    if (empty($input_description)) {
        $_SESSION['description_err'] = "<div class='alert alert-danger mb-0 text-center'>Açıklama boş bırakılamaz.</div>";
    } else if (strlen($input_description) < 10) {
        $_SESSION['description_err'] = "<div class='alert alert-danger mb-0 text-center'>Açıklama için istenenden az karakter kullandınız. Min: 10 karakter</div>";
    } else {
        $description = $input_description;
    }

    $image = $_POST["image"];
    $url = $_POST["url"];
    $isActive = isset($_POST["isActive"]) ? 1 : 0;

    if (empty($_SESSION['title_err']) && empty($_SESSION['description_err'])) {
        if (editBlog($id, $title, $description, $image, $url, $isActive)) {
            $_SESSION['success'] = "<div class='alert alert-success mb-0 text-center'>" . $title . "  güncellendi</div>";
            header('Location: index.php');
            exit();
        } else {
            $_SESSION['error'] = "<div class='alert alert-danger mb-0 text-center'>Güncellenirken  hata oluştu</div>";
            header('Location: blog-edit.php?id=' . $id);
            exit();
        }
    }
}



?>

<?php
if (isset($_SESSION['title_err'])) {
    echo $_SESSION['title_err'];
    unset($_SESSION['title_err']);
}
if (isset($_SESSION['description_err'])) {
    echo $_SESSION['description_err'];
    unset($_SESSION['description_err']);
}
if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
?>

<?php include "views/_header.php" ?>
<?php include "views/_navbar.php" ?>

<div class="container my-3">

    <div class="row">

        <div class="col-3">
            <?php include "views/_menu.php" ?>
        </div>
        <div class="col-9">

            <div class="card">

                <div class="card-body">
                    <form method="POST">

                        <div class="mb-3">
                            <label for="title" class="form-label">Başlık</label>
                            <input type="text" class="form-control" name="title" id="title"
                                value="<?php echo $selectedMovie["title"] ?>">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Açıklama</label>
                            <textarea name="description" id="description"
                                class="form-control"><?php echo $selectedMovie["description"] ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Resim</label>
                            <input type="text" class="form-control" name="image" id="image"
                                value="<?php echo $selectedMovie["image"] ?>">
                        </div>

                        <div class="mb-3">
                            <label for="url" class="form-label">url</label>
                            <input type="text" class="form-control" name="url" id="url"
                                value="<?php echo $selectedMovie["url"] ?>">
                        </div>
                        <div class="form-check mb-3">
                            <label for="isActive" class="form-check-label">Is Active</label>
                            <input type="checkbox" class="form-check-input" name="isActive" id="isActive" <?php if ($selectedMovie["isActive"]) {
                                echo "checked";
                            } ?>>
                        </div>

                        <input type="submit" value="Submit" class="btn btn-primary">


                    </form>
                </div>
            </div>

        </div>

    </div>

</div>

<?php include "views/_footer.php" ?>