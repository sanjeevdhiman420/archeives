<?php
require_once __DIR__.'/../bootstrap/app.php';
require_once file_header();
require_once file_slider();
?>
<style>
    h4#rqstt {
        margin-top: 4%;
        font-size: 16px;
    }

    input#username_or_email {
        box-shadow: 0 0 0 transparent;
        border-radius: 4px;
        border: 1px solid #7e8993;
        color: #32373c;
        width: 25em;
    }

    input#submit {
        border-color: #0071a1;
        color: #0071a1;
    }

    li.all {
        list-style: none;
        /* color: black; */
    }

    hr.line {
        width: 215%;
    }
    table.wp-list {
    border: solid 1px #ccd0d4;
}
tr#lines {
    border: 1px solid #ccd0d4;
}

th {
    padding: 2px 101px 9px 113px;
}

.footertext {
    margin-top: 18%;
}

h4#rqstt {
    margin-top: 4%;
    font-size: 16px;
}

input#username_or_email {
    box-shadow: 0 0 0 transparent;
    border-radius: 4px;
    border: 1px solid #7e8993;
    color: #32373c;
    width: 25em;
}

input#submit {
    border-color: #0071a1;
    color: #0071a1;
}
</style>
<div class="dashborad">
    <div class="row dash-row">
        <div class="col-lg-12">
            <div class="heading">
                <h2>Export Personal Data</h2>
            </div>
            <h4 id="rqstt">Add Data Export Request</h4>
            <p>An email will be sent to the user at this email address asking them to verify the request.

            </p>
            <div class="wp-privacy-request-form-field">
                <label for="username">Username or email address</label>
                <div>
                    <input type="text" required="" class="regular-text" id="username_or_email" name="username_or_email">

                    <input type="submit" name="submit" id="submit" class="button" value="Send Request">
                </div>
                <hr class="line">

                <ul class="subsubsub">
                    <li class="all">
                        <a href="#" class="current" aria-current="page">All <span class="count">(0)</span></a>
                    </li>
                </ul>
                <table class="wp-list">
                    <thead>
                        <tr id="lines">
                            <td id="cb"><input id="cb" type="checkbox"></td>
                            <th ><a href=" "><span>Requester</span><span class="sorting-indicator"></span></a></th>
                            <th >Status</th>
                            <th ><a href=" "><span>Requested</span><span class="sorting-indicator"></span></a></th>
                            <th ">Next steps</th>
                        </tr>
                    </thead>

                    <tbody id="the-list" data-wp-lists="list:privacy_request">
                        <tr class="no-items">
                            <td class="colspanchange" colspan="5">No items found.</td>
                        </tr>
                    </tbody>



                    <tr id="lines">
                        <td id="cb"><input id="cb" type="checkbox"></td>
                        <th ><a href=""><span>Requester</span><span class="sorting-indicator"></span></a></th>
                        <th >Status</th>
                        <th  ><a href=""><span>Requested</span><span class="sorting-indicator"></span></a></th>
                        <th ">Next steps</th>
                    </tr>


                   
                    </tbody>



                </table>
                <div class="footertext">
                        <p style='float: left;'><i>Thank you for creating with <a>WordPress.</a>
                                <p style='float: right;'>Version 5.6</p>
                            </i></p>

                    </div>
