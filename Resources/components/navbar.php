<?php
    // Import site config
    require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
?>
<?php
    require_once(COMPONENTS_DIR."/header.php");
?>
<style>
.mt-50{

    margin-top: 50px;
}

.mb-50{

    margin-bottom: 50px;
}


a{
  text-decoration: none !important;
}


.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .1875rem;
}

.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
}

.nav-sidebar .nav-link {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: start;
    align-items: flex-start;
    padding: .75rem 1.25rem;
    transition: background-color ease-in-out .15s,color ease-in-out .15s;
}

.header-elements-inline {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-wrap: nowrap;
    flex-wrap: nowrap;
}

.nav-sidebar {
    -ms-flex-direction: column;
    flex-direction: column;
}

.bg-teal {
    background-color: #007bff;
    color: #fff;
    border-radius: 1px;
}


.bg-teal:hover{
    color:#fff;
    background-color: #007bffb5;
}

.sidebar-light .nav-sidebar .nav-link {
    color: rgba(51,51,51,.85);
}

.badge {
    display: inline-block;
    padding: .3125rem .375rem;
    font-size: 75%;
    font-weight: 500;
    color: #fff;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .125rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

.nav-sidebar .nav-link i {
    margin-right: 1.25rem;
    margin-top: .12502rem;
    margin-bottom: .12502rem;
    top: 0;
}

.nav-link {
    color: rgba(51,51,51,.85);
}
.nav-link:not(.disabled):hover {
    color: #333;
    background-color: #f5f5f5;
}


[class^=fa] {
   
    font-style: normal;
    font-weight: 400;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    min-width: 1em;
    display: inline-block;
    text-align: center;
    font-size: 1rem;
    vertical-align: middle;
    position: relative;
    top: -1px;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.nav-sidebar .nav-link {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: start; 
    align-items: flex-start;
    padding: .75rem 1.25rem;
    transition: background-color ease-in-out .15s,color ease-in-out .15s;
}

.nav-sidebar .nav-item-header {
    padding: .75rem 1.25rem;
    margin-top: .5rem;
}

.nav-link {
    display: block;
    padding: .75rem 1.25rem;
}
</style>
<script>
    class NavbarManager {

        constructor() {
            this._output = [];
        }

        addTitle(title) {
            let template = `
        <div class="card-header bg-transparent header-elements-inline">
            <span class="card-title mt-3 font-weight-normal">${title}</span>
        </div>
    `;
            this._output.push(template);
        }

        addListHeader(header) {
            let template = `
        <li class="nav-item-header">${header}</li>
    `;
            this._output.push(template);
        }

        addListItem(iconClass, url, text) {
            let template = `
        <li class="nav-item">
            <a href="${url}" class="nav-link" data-abc="true">
                <i class='${iconClass}'></i>
                ${text}
            </a>
        </li>
    `;
            this._output.push(template);
        }

        render(elementId) {
            let targetElement = document.getElementById(elementId);

            if (targetElement) {
                targetElement.innerHTML = "<div class='card w-100'>"+this._output.join('')+'</div>';
            }
        }
    }
</script>