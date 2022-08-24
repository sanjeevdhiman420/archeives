<?php

require_once __DIR__.'/../bootstrap/app.php';

require_once file_header();
require_once file_slider(); ?>
<style>
    .health-check-title-section {
        display: flex;
        align-items: center;
        justify-content: center;
        clear: both;
    }

    h1 {
        margin-top: 38px;
        margin-bottom: 10px;
    }

    svg {
        width: 59px;
        height: 62px;
        margin-left: 43%;
        margin-top: -2%;
    }

    .heading {
        margin-left: 48%;
        margin-top: -35px;
    }

    hr {
        border: 0;
        border-top: 1px solid #ddd;
        border-bottom: 1px solid #fafafa;
    }

    .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    .active,
    .accordion:hover {
        background-color: #ccc;
    }

    .panel {
        padding: 0 18px;
        display: none;
        background-color: white;
        overflow: hidden;
    }

    .accordian {
        width: 80%;
        margin-left: 14%;
    }

    .footertext {
        width: 85%;
        margin-left: 13%;
        margin-top: 11%;
    }
</style>

<div class="health-check-title-section">
    <h1 class="health">
        Site Health </h1>
</div>

<div class="card-body">
    <div>
        <div>
            <svg>
                <circle cx="50" cy="50" r="10" stroke="green" stroke-width="1" fill="#ffffff"></circle>
            </svg>
            <div class="heading">
                <h4>Good</h4>
            </div>

        </div>

    </div>

    <div class="accordian">

        <h2>Site health status</h2>

        <p>The site health check shows critical information about your WordPress configuration and items that require your attention.
        <h3>4 recommended improvements

        </h3>
        </p>

        <button class="accordion">You should remove inactive themes</button>
        <div class="panel">
            <p>Themes add your site’s look and feel. It’s important to keep them up to date, to stay consistent with your brand and keep your site secure.

                Your site has 2 themes waiting to be updated.

                Your site has 2 inactive themes, other than Twenty Twenty-One, your active theme. We recommend removing any unused themes to enhance your site’s security.</p>
        </div>

        <button class="accordion">The site is running an older version of the php </button>
        <div class="panel">
            <p>PHP is the programming language used to build and maintain WordPress. Newer versions of PHP are created with increased performance in mind, so you may see a positive effect on your site’s performance. The minimum recommended version of PHP is 7.4.</p>
        </div>

        <button class="accordion">One or more recommended module are missing</button>
        <div class="panel">
            <p>PHP modules perform most of the tasks on the server that make your site run. Any changes to these must be made by your server administrator.

                The WordPress Hosting Team maintains a list of those modules, both recommended and required, in the team handbook (opens in a new tab).

                Warning The optional module, exif, is not installed, or has been disabled.
                Warning The optional module, imagick, is not installed, or has been disabled.</p>
        </div>

        <button class="accordion">Your site dose notuse HTTPs</button>
        <div class="panel">
            <p>An HTTPS connection is a more secure way of browsing the web. Many services now have HTTPS as a requirement. HTTPS allows you to take advantage of new features that can increase site speed, improve search rankings, and gain the trust of your visitors by helping to protect their online privacy.</p>
        </div>

        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                    } else {
                        panel.style.display = "block";
                    }
                });
            }
        </script>
    </div>
    <div class="footertext">
        <p style='float: left;'><i>Thank you for creating with <a>WordPress.</a>
                <p style='float: right;'>Version 5.6</p>
            </i></p>

    </div>
</div>