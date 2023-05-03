 <!-- POPUP TWEET-FORM WRAP -->
 <div class='tweet_body'>
                            <form method='post' enctype='multipart/form-data'>
                                <textarea class='status' maxlength='1000' name='status' placeholder="What's happening?" rows='3' cols='100%' style="font-size:17px;"></textarea>
                                <div class='hash-box'>
                                    <ul>
                                    </ul>
                                </div>

                                <div class='tweet_icons-wrapper'>
                                    <div class='t-fo-left tweet_icons-add'>
                                        <ul>
                                            <input type='file' name='file' id='file' />
                                            <li>
                                                <label for='file'><i class='fa fa-image' aria-hidden='true'></i></label>
                                                <i class="fa fa-bar-chart"></i>
                                                <i class="fa fa-smile-o"></i>
                                                <i class="fa fa-calendar-o"></i>
                                            </li>
                                            <span class='tweet-error'><?php if ( isset( $error ) ) {
                                                echo $error;
                                            } else if ( isset( $imgError ) ) {
                                                echo '<br>' . $imgError;
                                            }
                                            ?></span>
                                            <!--<i class="fa fa-image"></i>-->

                                        </ul>
                                    </div>
                                    <?php if (isset($_SESSION['errors_tweet'])) { 
                                        foreach($_SESSION['errors_tweet'] as $t) {?>
                                            <div class="alert alert-danger">
                                                <span class="item2-pair"> <?php echo $t; ?> </span>
                                            </div>
                                        <?php } } unset($_SESSION['errors_tweet']); ?>
                                    <div class='t-fo-right'>
                                        <span class="bioCount" id="count">140</span>
                                        <!--<input type='submit' name='tweet' value='tweet' />-->
                                        <button class="button_tweet" type="submit" name="tweet" style="outline:none;">Tweet</button>
                                    </div>
                            </form>
                        </div>
                        <!--</div>-->
                    </div>
                </div>
                <div class="space" style="height:2px; width:100%; background:rgba(230, 236, 240, 0.5);">
                </div>