<?php
if (isset($_POST['contact'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $name = htmlspecialchars("$name");
    $email = htmlspecialchars("$email");
    $phone = htmlspecialchars("$phone");
    $message = htmlspecialchars("$message");
    //get ip
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $myip = $_SERVER['HTTP_CLIENT_IP'];
    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $myip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $myip = $_SERVER['REMOTE_ADDR'];
    }
    $contact = "insert into contact_us (name, email, phone, message, date, ip) values ('$name','$email','$phone','$message',now(),'$myip')";
    $contactresult = mysqli_query($conn, $contact) or die(mysqli_error($conn));
    echo "<script>alert('Thank you for contact us. We will reply within 48 hours.')</script>";
    echo "<script>window.open('index.php')</script>";
}
?>
<!-- START FOOTER -->
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="footer-widgets-area with-sidebar-right">
                <div class="widget-first widget span2 widget_text">
                    <h3>About us</h3>
                    <div class="textwidget">
                        Train and hire people with autism (PWA) as interior decorator to help with the painting using an environmental friendly, non-VOC paint. </div>
                </div>

                <div class="widget span2 widget_nav_menu">
                    <h3>Menu</h3>

                    <div class="menu-widget-footer-container">
                        <ul id="menu-widget-footer" class="menu">
                            <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                <a href="about.php">About</a>
                            </li>

                            <li class="menu-item menu-item-type-post_type">
                                <a href="news.php">News</a>
                            </li>

                            <li class="menu-item menu-item-type-post_type">
                                <a href="product.php">Product</a>
                            </li>

                            <li class="menu-item menu-item-type-post_type">
                                <a href="service.php">Service</a>
                            </li>

                            <li class="menu-item menu-item-type-post_type">
                                <a href="game.php">Game</a>
                            </li>

                            <li class="menu-item menu-item-type-post_type">
                                <a href="portfolio.php">Portfolio</a>
                            </li>

                            <li class="menu-item menu-item-type-post_type">
                                <a href="contact.php">Contact us</a>
                            </li>

                            <li class="menu-item menu-item-type-custom">
                                <a href="faq.php">FAQ</a>
                            </li>

                            <li class="menu-item menu-item-type-custom">
                                <a href="support.php">Support</a>
                            </li>



                        </ul>
                    </div>
                </div>

                <div class="widget-last widget span2 widget_nav_menu">
                    <h3>Socialize</h3>

                    <div class="menu-socialize-container">
                        <ul id="menu-socialize" class="menu">

                            <li class="menu-item menu-item-type-custom">
                                <a target="_blank" href="https://www.facebook.com/WePaint-950298961684277/">Facebook</a>
                            </li>

                            <li class="menu-item menu-item-type-custom">
                                <a target="_blank" href="https://twitter.com/HK_wePaint">Twitter</a>
                            </li>

                            <li class="menu-item menu-item-type-custom">
                                <a href="https://www.instagram.com/hkwepaint/"target="_blank">Instagram</a>
                            </li>

                            <li class="menu-item menu-item-type-custom">
                                <a href="https://www.pinterest.com/hkwepaint/" target="_blank">Pinterest</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- contact form -->
            <div class="footer-widgets-sidebar with-sidebar-right">
                <div class="widget-first widget span6 yit_quick_contact">
                    <h3>Contact us</h3>
                    <form class="contact-form row" method="post" action="" >
                        <div class="usermessagea"></div>
                        <fieldset>
                            <ul>
                                <!-- name -->
                                <li class="text-field with-icon span3">
                                    <label>
                                        <span class="mainlabel">Name</span>
                                    </label>
                                    <div class="input-prepend">
                                        <span class="add-on">
                                            <img src="images/footer/author-footer.png" alt="" title=""/></span>
                                        <input type="text" name="name" value="" maxlength="20" required />
                                    </div>
                                    
                                </li>
                                <!-- email -->
                                <li class="text-field with-icon span3">
                                    <label>
                                        <span class="mainlabel">Email</span>
                                    </label>

                                    <div class="input-prepend">
                                        <span class="add-on">
                                            <img src="images/footer/envelope-footer.png" alt="" title=""/>
                                        </span>
                                        <input type="text" name="email" value="" maxlength="50" required/>
                                    </div>
                                    
                                </li>
                                <!-- Phone -->
                                <li class="text-field with-icon span3">
                                    <label>
                                        <span class="mainlabel">Phone</span>
                                    </label>

                                    <div class="input-prepend">
                                        <span class="add-on">
                                            <img width="14px" height="14px" src="images/icons/set_icons/phone-grey.png" alt="" title=""/>
                                        </span>
                                        <input required type="text" name="phone" value="" maxlength="8"  onkeypress='validate(event)' />
                                    </div>
                                    
                                </li>
                                <!-- message -->
                                <li class="textarea-field with-icon span6">
                                    <label>
                                        <span class="mainlabel">Message</span>
                                    </label>

                                    <div class="input-prepend">
                                        <span class="add-on">
                                            <img src="images/footer/pencil-footer.png" alt="" title=""/>
                                        </span>
                                        <textarea name="message" rows="8" cols="30" class="with-icon required" required></textarea>
                                    </div>
                                    
                                </li>

                                <li class="submit-button span6">
                                    <input type="submit" name="contact" value="SEND" class="sendmail alignright" />
                                    <div class="clear"></div>
                                </li>
                            </ul>
                        </fieldset>
                    </form>

                    <script>
                        function validate(evt) {
                            var theEvent = evt || window.event;
                            var key = theEvent.keyCode || theEvent.which;
                            key = String.fromCharCode(key);
                            var regex = /[0-9]/;
                            if (!regex.test(key)) {
                                theEvent.returnValue = false;
                                if (theEvent.preventDefault)
                                    theEvent.preventDefault();
                            }
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- END FOOTER -->
<?phpmysqli_close($conn);?>