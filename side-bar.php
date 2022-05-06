<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="dashboard.php">
                            <!-- <img src="assets/images/logo.png" alt="" /> --><span>Kisan Seva</span></a></div>
                    <li><a href="dashboard.php"><i class="ti-home"></i> Dashboard</a></li>
                    <li><a href="profile.php"><i class="ti-user"></i> Profile</a></li>
        <!--===============================================================================================-->
                    <?php if($_SESSION['role'] == "Admin"){ ?>
                    <li><a href="agricultureofficer.php"><i class="fa fa-users"></i> Agriculture Officer</a></li>
                    <li><a href="technicalstaff.php"><i class="fa fa-users"></i> Technical Staff</a></li>
                    <li><a href="notificationmanagement.php"><i class="fa fa-bell-o"></i> Notifications</a></li>
                    <li><a href="feedbacks.php"><i class="fa fa-commenting-o"></i> Feedbacks </a></li>
                    <li><a href="complaints.php"><i class="fa fa-comments-o"></i> Complaints </a></li>
                    <?php }
                     elseif ($_SESSION['role'] == "Agriculture_Officer") {
                    ?>
                    <li><a href="stock.php"><i class="fa fa-houzz"></i> Stocks</a></li>
                    <li><a href="requests.php"><i class="fa fa-rocket"></i> Requests </a></li>
                    <li><a href="crops.php"><i class="fa fa-pagelines"></i></i> Crops </a></li>
                    <li><a href="fertilizer.php"><i class="fa fa-leaf"></i> Fertilizer </a></li>
                    <li><a href="pesticides.php"><i class="fa fa-bug"></i> Pesticide </a></li>
                    <?php } 
                    elseif ($_SESSION['role'] == "Technical_Staff") {
                    ?>
                    <li><a href="agricultureofficer.php"><i class="fa fa-question"></i> Doubts </a></li>
                    <li><a href="technicalstaff.php"><i class="fa fa-lightbulb-o"></i> Ideas </a></li>
                    <?php } ?>
        <!--===============================================================================================-->
                    <li><a href="logout.php"><i class="ti-close"></i> Logout</a></li>
        <!--===============================================================================================-->
        <!--===============================================================================================-->
        <!--===============================================================================================-->
        <!--===============================================================================================-->
        <!--===============================================================================================-->
        <!--===============================================================================================-->
        <!--===============================================================================================-->
                    <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Charts </a>
                    </li>
                    <li><a href="app-event-calender.html"><i class="ti-calendar"></i> Calender </a></li>
                    <li><a href="app-email.html"><i class="ti-email"></i> Email</a></li>
                    <li><a href="app-widget-card.html"><i class="ti-layout-grid2-alt"></i> Widget</a></li>
                    <li class="label">Features</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-layout"></i> UI Elements <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="ui-typography.html">Typography</a></li>
                            <li><a href="ui-alerts.html">Alerts</a></li>

                            <li><a href="ui-button.html">Button</a></li>
                            <li><a href="ui-dropdown.html">Dropdown</a></li>

                            <li><a href="ui-list-group.html">List Group</a></li>

                            <li><a href="ui-progressbar.html">Progressbar</a></li>
                            <li><a href="ui-tab.html">Tab</a></li>

                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-panel"></i> Components <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="uc-calendar.html">Calendar</a></li>
                            <li><a href="uc-carousel.html">Carousel</a></li>
                            <li><a href="uc-weather.html">Weather</a></li>
                            <li><a href="uc-datamap.html">Datamap</a></li>
                            <li><a href="uc-todo-list.html">To do</a></li>
                            <li><a href="uc-scrollable.html">Scrollable</a></li>
                            <li><a href="uc-sweetalert.html">Sweet Alert</a></li>
                            <li><a href="uc-toastr.html">Toastr</a></li>
                            <li><a href="uc-range-slider-basic.html">Basic Range Slider</a></li>
                            <li><a href="uc-range-slider-advance.html">Advance Range Slider</a></li>
                            <li><a href="uc-nestable.html">Nestable</a></li>

                            <li><a href="uc-rating-bar-rating.html">Bar Rating</a></li>
                            <li><a href="uc-rating-jRate.html">jRate</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i> Table <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="table-basic.html">Basic</a></li>

                            <li><a href="table-export.html">Datatable Export</a></li>
                            <li><a href="table-row-select.html">Datatable Row Select</a></li>
                            <li><a href="table-jsgrid.html">Editable </a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-heart"></i> Icons <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="font-themify.html">Themify</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-map"></i> Maps <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="gmaps.html">Basic</a></li>
                            <li><a href="vector-map.html">Vector Map</a></li>
                        </ul>
                    </li>
                    <li class="label">Form</li>
                    <li><a href="form-basic.html"><i class="ti-view-list-alt"></i> Basic Form </a></li>
                    <li class="label">Extra</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-files"></i> Invoice <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="invoice.html">Basic</a></li>
                            <li><a href="invoice-editable.html">Editable</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-target"></i> Pages <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="page-login.html">Login</a></li>
                            <li><a href="page-register.html">Register</a></li>
                            <li><a href="page-reset-password.html">Forgot password</a></li>
                        </ul>
                    </li>
                    <li><a href="../documentation/index.html"><i class="ti-file"></i> Documentation</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->