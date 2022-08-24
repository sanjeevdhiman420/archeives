<?php
require_once __DIR__.'/../bootstrap/app.php';
require_once file_header();
require_once file_slider();
?>
<style>
    a.page-title-action {
        border: solid 1px #337ab7;
        font-size: 14px;
        padding: 2px 5px 3px 5px;
    }

    table.wp-list {
        border: solid 1px #ccd0d4;
    }

    tr#lines {
        border: 1px solid #ccd0d4;
    }

    th {
        padding: 3px 105px 20px 170px;
    }

    .footertext {
        margin-top: 38%;
    }
</style>
<div class="dashborad">
    <div class="row dash-row">
        <div class="col-lg-12">
            <div class="heading">
                <span>
                    <h2>Plugins
                        <a href="#" class="page-title-action">Add New</a>
                </span>
            </div>

            <table class="wp-list">
                <thead>
                    <tr id="lines">
                        <td id="cb"><input id="cb" type="checkbox"></td>
                        <th>Plugin</th>
                        <th>Description</th>

                        <th>automatic updates</th>
                    </tr>
                </thead>

                <tbody id="the-list" data-wp-lists="list:privacy_request">
                    <tr class="no-items">
                        <td class="colspanchange" colspan="5">No plugins are currently available</td>
                    </tr>
                </tbody>

                <tr id="lines">
                    <td id="cb"><input id="cb" type="checkbox"></td>
                    <th>Plugin</th>
                    <th>Description</th>

                    <th>automatic updates</th>
                </tr>
                </tbody>
            </table>

            <div class="footertext">
                <p style='float: left;'><i>Thank you for creating with <a>WordPress.</a>
                        <p style='float: right;'>Version 5.6</p>
                    </i></p>

            </div>
        </div>
    </div>
</div>