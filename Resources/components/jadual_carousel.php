 <?php
 // Slideshow manager class
 class SlideshowManager {
    public function addImage($image) {
        echo "<div class='d-flex justify-content-center align-items-center'><img class='w-50' src=\"$image\"></div>";
    }

    public function clearSlideshow() {
        echo '<script>document.getElementById("jadualSlideshow").innerHTML = "";</script>';
    }
}
?>