<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/projects_config.php");
require_once(E_HEALTH_DIR . "/site_config.php");
?>

<?php
// IMPORT BEGIN
require_once(COMPONENTS_DIR . "/header.php");
// IMPORT ENDS
?>

<!-- CONTENT BEGIN -->
<?php
class Card {
    // define private property output to store card contents
    private $output = [];

    private function darkenColor($color, $percent) {
        // Convert the hex color to RGB values
        list($r, $g, $b) = sscanf($color, "#%02x%02x%02x");
        
        // Decrease the RGB value by the percentage passed to darken
        $r = max(0, min(255, $r - ($r * $percent)));
        $g = max(0, min(255, $g - ($g * $percent)));
        $b = max(0, min(255, $b - ($b * $percent)));
        
        // Re-construct the color back in hexadecimal form and return it
        return sprintf("#%02x%02x%02x", $r, $g, $b);
    }

    public function addCard($cardDetails) {
        list($cardBackgroundColor, $cardTextColor, $cardText, $cardDescription, $cardIconClass) = $cardDetails;

        // Darken the cardTextColor by 20% for the cardDescription
        $cardDescColor = $this->darkenColor($cardTextColor, 0.2);

        $cardHTML = <<<HTML
        <div class="col-xl col-md-6 col-12">
            <div class="card">
                <div class="card-body" style="background-color: {$cardBackgroundColor}; color: {$cardTextColor};">
                    <div class="align-items-center row">
                        <div class="col">
                            <h6 class="text-uppercase mb-2" style="color: {$cardDescColor};">{$cardDescription}</h6><span class="h2 mb-0">{$cardText}</span>
                        </div>
                        <div class="col-auto">
                            <i class='{$cardIconClass}'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        HTML;

        // Add the card HTML block to the output array
        array_push($this->output, $cardHTML);
    }
    
    // renderCard method
    public function renderCards() {
        $cards = implode("\n", $this->output);
        $containerHTML = <<<HTML
            <div class="container-fluid">
                <div class="row">
                    {$cards}
                </div>
            </div>
        HTML;

        // echo the HTML
        echo $containerHTML;
    }
}
?>
<!-- CONTENT ENDS -->

<?php
// Import config
require_once(COMPONENTS_DIR . "/config.php");
// Import models
require_once(COMPONENTS_DIR . "/models.php");

$dbObj = new Database();
$janjitemuModel = new JanjitemuModel($dbObj->getConnection());
$janjitemuRowsCount = $janjitemuModel->getAllJanjitemuCountWhere("status", "dibenarkan");
echo ($janjitemuRowsCount[0]["TOTAL"]);
?>