<?php
/*
Template Name: Announcement
*/
get_header();
?>



<section class="greybg blue">
    <h1 class="hdng">
        ASX Announcements
    </h1>
    <div class="team-a-section">
        <ul class="teamTabs" id="announceTab">   
             <li>
                <a href="javascript:void(0);">
                    Share Price Information                               
                </a>
            </li>                        
            <li>
                <a href="javascript:void(0);" class="active">
                    ASX Announcements                                      
                </a>
            </li>

            <li>
                <a href="javascript:void(0);">
                    Annual & Interim Reports                                       
                </a>
            </li>

            <li>
                <a href="javascript:void(0);">
                    Presentations                                     
                </a>
            </li>

            <li>
                <a href="javascript:void(0);">
                    Corporate Governance                                    
                </a>
            </li>

            <li>
                <a href="javascript:void(0);">
                    Analyst Coverage                                 
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    Analyst Coverage                                 
                </a>
            </li>

            <li>
                <a href="javascript:void(0);">
                    Analyst Coverage                                 
                </a>
            </li>

            <li>
                <a href="javascript:void(0);">
                    Analyst Coverage                                 
                </a>
            </li>

            <li>
                <a href="javascript:void(0);">
                    Analyst Coverage                                 
                </a>
            </li>

            <li>
                <a href="javascript:void(0);">
                    Analyst Coverage                                 
                </a>
            </li>

            <li>
                <a href="javascript:void(0);">
                    Analyst Coverage                                 
                </a>
            </li>
        </ul>
    </div>
</section>

<section class="container-fluid contentBoxOuter">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="content-box inner">
                    <div class="row" id="changableContnt">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="subHdng">Announcements</h4>
                            </div>
                            <!-- <div class="col-md-8 d-flex align-items-center justify-content-md-end">
                                <ul>
                                    <li>
                                        <span class="active">
                                            2023
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            2022
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            2021
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            2020
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            2019
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            2018
                                        </span>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                        <div class="col-12">
                            <div class="inner borderTop">
                                <?php echo do_shortcode('[sharelink f1c51525-f862-4a88-b38c-61308969bec2]')?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    body#global {
    margin: 0;
}

div#announcements-table_wrapper {
    position: relative;
}

div#announcements-table_wrapper th {
    position: relative;
    color: #141414;
    font-size: 18px;
    line-height: 1.2;
}

div#announcements-table_wrapper td {
    position: relative;
    color: #141414;
    font-size: 16px;
    line-height: 1.2;
}

div#announcements-table_wrapper 
 div#announcements-table_length {
    position: relative;
    padding: 15px 0;
}

div#announcements-table_wrapper div#announcements-table_length label {
    position: relative;
    color: #141414;
    font-size: 16px;
}

div#announcements-table_wrapper div#announcements-table_length label select {
    position: relative;
    min-width: 80px;
    padding: 5px;
    border: none;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    color: #141414;
    font-size: 16px;
    margin: 0 10px;
}

div#announcements-table_wrapper div#announcements-table_filter {
    position: relative;
    padding: 15px 0;
}

div#announcements-table_wrapper div#announcements-table_filter input[type="search"] {
    position: relative;
    font-size: 16px;
    padding: 10px;
    border: none;
    margin-left: 10px;
    min-width: 200px;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
}

div#announcements-table_wrapper div#announcements-table_filter label {
    font-size: 16px;
    color: #141414;
}
</style>

<?php
get_footer();
?>