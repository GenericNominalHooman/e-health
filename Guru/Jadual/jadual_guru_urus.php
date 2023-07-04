<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health2/site_config.php");
require_once(COMPONENTS_DIR . "/config.php");

// Auth component is dependent on header and config component
require_once(COMPONENTS_DIR . "/header.php");

require_once(TEMPLATE_DIR . "/sidebar2_guru.php");

// Start the session
session_start();

// SlideshowManager class
class SlideshowManager {
    private $imageList = [];

    public function addImage($image) {
        $this->imageList[] = $image;
    }

    public function displayLatestImage() {
        if (!empty($this->imageList)) {
            $latestImage = end($this->imageList);
            echo "<div class='d-flex justify-content-center align-items-center'><img class='w-50' src=\"$latestImage\"></div>";
        } else {
            echo "No images found.";
        }
    }
}

// Create an instance of SlideshowManager
$slideshowManager = new SlideshowManager();

// Add the uploaded image to the SlideshowManager
if (isset($_SESSION["uploaded_image"])) {
    $uploadedImage = $_SESSION["uploaded_image"];
    $slideshowManager->addImage($uploadedImage);
}

// Function to display the latest uploaded image
function displayLatestImage()
{
    global $slideshowManager;
    $slideshowManager->displayLatestImage();
}

if (isset($_POST["submit"])) {
    $target_dir = UPLOADS_DIR . "/jadual" . "/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" &&
        $imageFileType != "png" &&
        $imageFileType != "jpeg" &&
        $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
            echo "<img src='uploads/jadual/" . htmlspecialchars(basename($_FILES["image"]["name"])) . "' alt='Uploaded Image'>";

            // Store the uploaded image path in a session variable
            $_SESSION["uploaded_image"] = $target_file;

            try {
                // Connect to the database
                $database = new Database();
                $conn = $database->getConnection();

                // Prepare the query to insert the image details into the jadualguru table
                $uploaded_at = date("Y-m-d H:i:s");
                $gambar = basename($_FILES["image"]["name"]);
                $sql = "INSERT INTO jadualguru (uploaded_at, gambar) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $uploaded_at, $gambar);

                // Execute the query
                if ($stmt->execute()) {
                    echo "Image details inserted into the database.";
                } else {
                    echo "Error: " . $stmt->error;
                }

                // Close the statement and the database connection
                $stmt->close();
                $conn->close();
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }

            // Redirect to another page
            echo "<script>window.location.href = 'jadual_guru_urus_print.php';</script>";
            exit();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        h1 {
            text-align: center;
            margin-top: 1em;
        }

        #preview-image {
            max-width: 200px;
            margin: 1em auto;
        }
    </style>
</head>

<body>
    <h1 class="centered-text">Jadual Urus Guru</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="image" id="image">
        <input type="submit" value="Upload Image" name="submit">
    </form>

    <div id="preview-image">
        <?php
        // Display the latest uploaded image
        displayLatestImage();
        ?>
    </div>

    <button onclick="printImage()">Print</button>

    <script>
        // Display image preview
        function previewImage() {
            const fileInput = document.getElementById('image');
            const preview = document.getElementById('preview-image');

            fileInput.addEventListener('change', function (event) {
                const file = event.target.files[0];
                const reader = new FileReader();

                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '300%';
                    preview.innerHTML = '';
                    preview.appendChild(img);
                };

                reader.readAsDataURL(file);
            });
        }

        // Print the image
        function printImage() {
            const imageElement = document.querySelector('#preview-image img');
            if (imageElement) {
                const imageUrl = imageElement.src;
                const printWindow = window.open('', '_blank');
                printWindow.document.write(`<img src="${imageUrl}">`);
                printWindow.document.close();
                printWindow.print();
            } else {
                alert("No image found.");
            }
        }

        // Call the previewImage function
        previewImage();
    </script>

</body>
</html>

<?php
require_once(COMPONENTS_DIR . "/footer.php");
?>
