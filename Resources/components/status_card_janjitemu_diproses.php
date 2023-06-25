<style>
    .flex {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto
    }

    @media (max-width:991.98px) {
        .padding {
            padding: 1.5rem
        }
    }

    @media (max-width:767.98px) {
        .padding {
            padding: 1rem
        }
    }

    .padding {
        padding: 5rem
    }

    .card {
        background: #fff;
        border-width: 0;
        border-radius: .25rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .05);
        margin-bottom: 1.5rem
    }

    .card-header {
        background-color: transparent;
        border-color: rgba(160, 175, 185, .15);
        background-clip: padding-box
    }

    .card-body p:last-child {
        margin-bottom: 0
    }

    .card-hide-body .card-body {
        display: none
    }


    .media {
        position: relative;
        display: block;
        padding: 0;
        -ms-flex-negative: 0;
        flex-shrink: 0;
        border-radius: inherit
    }

    .media:after {
        content: '';
        display: block;
        padding-top: 100%
    }

    .media:not(:first-child):not(:last-child):not(:only-child) {
        border-radius: 0
    }

    .media-circle .media {
        border-radius: 500px
    }

    .media-circle .media .media-content:before {
        width: 50%;
        left: 25%
    }

    .media-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        padding: 1rem 1rem;
        z-index: 2;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        color: #fff
    }

    .media-overlay.overlay-top {
        bottom: auto
    }

    .media-overlay.overlay-bottom {
        top: auto
    }

    .media-action {
        position: absolute;
        z-index: 3;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        pointer-events: none;
        transition: opacity .3s;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center
    }

    .media-action.active {
        opacity: 1
    }

    .media-action.media-action-overlay {
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .2);
        color: #fff;
        padding: 0 5%;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-pack: distribute;
        justify-content: space-around;
        border-radius: inherit
    }

    .media-action.media-action-overlay .btn {
        -ms-flex-negative: 0;
        flex-shrink: 0;
        color: inherit
    }

    .active>.media .media-action,
    .list-item:active .media-action,
    .list-item:hover .media-action,
    .media:active .media-action,
    .media:hover .media-action {
        opacity: 1;
        pointer-events: initial
    }

    .media iframe,
    .media-content {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        border: 0;
        border-radius: inherit;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: 50% 50%;
        background-color: rgba(120, 120, 120, .1);
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        color: #FDF9F5;
    }

    .media-content:before {
        content: '';
        position: absolute;
        height: 10%;
        width: 90%;
        left: 5%;
        bottom: 0;
        background: inherit;
        background-position-y: 100%;
        filter: blur(10px)
    }

    .circle .media-content:before {
        width: 40%;
        left: 30%
    }

    .media-21x9:after {
        padding-top: 42.857143%
    }

    .media-16x9:after {
        padding-top: 56.25%
    }

    .media-4x3:after {
        padding-top: 75%
    }

    .media-2x3:after {
        padding-top: 150%
    }

    .media-3x4:after {
        padding-top: 133.33333%
    }

    .media-1x2:after {
        padding-top: 200%
    }

    .media-2x1:after {
        padding-top: 50%
    }

    .media-3x1:after {
        padding-top: 33%
    }

    .media-4x1:after {
        padding-top: 25%
    }

    .media-1-4:after {
        padding-top: 25vh;
        min-height: 10rem
    }

    .media-1-3:after {
        padding-top: 33vh;
        min-height: 12.5rem
    }

    .gd-primary {
        color: #FDF9F5;
        border: none;
        background: #F8693B;
    }
</style>
<div class="col-xl-6" id="page-content">
    <div class="padding">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="media media-2x1 gd-primary h1"><a class="media-content" style="background-image:url()" data-abc="true"><strong class="text-fade"><i class='bx bx-book-content'></i></strong></a></div>
                    <div class="card-body text-center">
                        <h5 class="card-title h5">Janjitemu Diproses(Hari Ini)</h5>
                        <hr>
                        <p class="card-text h6">
                            <?php
                                // Import config
                                require_once(COMPONENTS_DIR."/config.php");
                                // Import models
                                require_once(COMPONENTS_DIR."/models.php");
                                
                                $dbObj = new Database();
                                $janjitemuModel = new JanjitemuModel($dbObj->getConnection());
                                $janjitemuRowsCount = $janjitemuModel->getAllJanjitemuCountWhere("status", "diproses");
                                echo($janjitemuRowsCount[0]["TOTAL"]);
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>