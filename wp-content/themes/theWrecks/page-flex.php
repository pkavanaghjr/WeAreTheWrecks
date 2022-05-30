<?php
/*
Template Name: Flex-Template
*/
?>
<?php get_header(); ?>
    <div class="mainContent page-content home normal-flex">        

        <div class="fma">
            <?php 
                $blackImageLoader = get_field('black_image_loader','option');
                $whiteImageLoader = get_field('white_image_loader','option');
            ?>
            <div class="pre-loader">
                <div class="loading-image loading-black" style="background-image:url(<?php echo $blackImageLoader['url']; ?>);"></div>
                <div class="loading-image loading-white" style="background-image:url(<?php echo $whiteImageLoader['url']; ?>)"></div>
                <div class="loading-bar"></div>
            </div>
            <div class="logo-wrap">
                <div class="flex-wrap">
                    <?php 
                        $wrecksLogo = get_field('header_main_logo');
                    ?>
                    <div class="audio-logo" style="background:url(<?php echo $wrecksLogo; ?>) no-repeat center center; background-size:contain;"></div>
                    <?php if( have_rows('header_social_media') ): ?>
                        <ul class="sm-list">
                        <?php while ( have_rows('header_social_media') ) : the_row(); 
                            $iconLink = get_sub_field('icon_link');
                            $socialTitle = get_sub_field('social_title');
                        ?>
                            <li class="social-icon"><a class="hvr-underline-from-middle-small-white" href="<?php echo $iconLink; ?>" target="_blank"><?php echo $socialTitle; ?></a></li>
                        <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="scroll-animation">
                <div class="scroll-dot"></div>
            </div>
        </div>


        <?php if( have_rows('page_sections') ):  $pageSectionCount = 0; ?>
            <?php while ( have_rows('page_sections') ) : the_row();  ++$pageSectionCount; ?>

                <?php if(get_row_layout() == 'blog_section'):
                    $midnightTypeBlog = get_sub_field('midnight_type_blog'); 
                    $instaFeedDesk = get_sub_field('instagram_feed'); 
                    $instaFeedMobile = get_sub_field('instagram_feed_mobile');
                ?>
                    <section id="section-<?php echo $pageSectionCount; ?>" class="section-<?php echo $pageSectionCount; ?> <?php echo $midnightTypeBlog; ?> blog-section" data-midnight="blog">
                        <div class="container">
                            <div class="insta-feed desktop"><?php echo $instaFeedDesk; ?></div>
                            <div class="insta-feed mobile"><?php echo $instaFeedMobile; ?></div>
                        </div>
                    </section> 



                <?php elseif(get_row_layout() == 'about_section'):
                    $midnightTypeAbout = get_sub_field('midnight_type_about'); 
                    $aboutImage = get_sub_field('about_image');
                ?>
                    <section id="section-<?php echo $pageSectionCount; ?>" class="section-<?php echo $pageSectionCount; ?> <?php echo $midnightTypeAbout; ?> about-section" data-midnight="about" style="background-image:url(<?php echo $aboutImage['url']; ?>); background-size:cover;">
                        <?php if( have_rows('hometown_names') ): ?>
                            <div class="name-wrapper">
                            <?php while ( have_rows('hometown_names') ) : the_row(); 
                                $memberName = get_sub_field('member_name');
                                $hometown = get_sub_field('hometown');

                                $slugName = seoUrl($memberName); // replace spaces with -
                                $memberName = strtoupper($memberName); // uppercase
                                $hometown = strtoupper($hometown); // uppercase
                            ?>
                                <h2 class="location-text hvr-underline-from-middle-about <?php echo $slugName; ?>"><?php echo $memberName; ?></h2><br/>
                                <script>
                                  if (document.documentElement.clientWidth >= 450) {
                                    $(".location-text.<?php echo $slugName; ?>").mouseover(function(){
                                        TweenLite.to(".location-text.<?php echo $slugName; ?>", 0.6, {text:"<?php echo $hometown; ?>", ease:Linear.easeNone});
                                    }).mouseout(function(){
                                        TweenLite.to(".location-text.<?php echo $slugName; ?>", 0.6, {text:"<?php echo $memberName; ?>", ease:Linear.easeNone});
                                    });
                                  }
                                </script>
                            <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </section> 



                <?php elseif(get_row_layout() == 'single_section'):
                    $midnightTypeSingle = get_sub_field('midnight_type_single');
                    $singleCoverArt = get_sub_field('single_cover_art');
                    $singleTitle = get_sub_field('single_title');

                    $slugSingleTitle = seoUrl($singleTitle); // replace spaces with -
                    $singleTitle = strtoupper($singleTitle); // uppercase
                ?>
                    <section id="section-<?php echo $pageSectionCount; ?>" class="section-<?php echo $pageSectionCount; ?> <?php echo $midnightTypeSingle; ?> single-section audio-bars" data-midnight="<?php echo $slugSingleTitle; ?>">
                        
                        <div class="single-video">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/_kHjDNHEU5o?modestbranding=1&autohide=1&showinfo=0&controls=1" frameborder="0" allowfullscreen>" frameborder="0" allowfullscreen></iframe>
                            <div class="button-border white-button-border close-video"><a class="button white-button watch-video hvr-underline-from-middle-small-white">CLOSE</a></div>
                        </div>

                        <div class="container">
                            <div class="single <?php echo $slugSingleTitle; ?>">                                
                                <div class="right">
                                    <div class="single-album social-album-cover" style="background:url(<?php echo $singleCoverArt['url']; ?>) no-repeat center; background-size:cover;">
                                        <?php if( have_rows('single_social_media') ): ?>
                                            <div>
                                                <ul>
                                                <?php while ( have_rows('single_social_media') ) : the_row(); 
                                                    $singleSocialLink = get_sub_field('social_media_link');
                                                    $singleSocialTitle = get_sub_field('social_media_title'); 
                                                ?>
                                                    <li><a class="hvr-underline-from-middle-small-white" href="<?php echo $singleSocialLink; ?>" target="_blank"><?php echo $singleSocialTitle; ?></a></li>
                                                <?php endwhile; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="left">
                                    <h3><?php echo $singleTitle; ?></h3>
                                    <div class="button-box">
                                        <div class="button-border black-button-border"><a class="button black-button watch-video hvr-underline-from-middle-small-black">WATCH VIDEO</a></div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>                
                            <div class="clear"></div>
                        </div>
                    </section> 



                <?php elseif(get_row_layout() == 'record_section'):
                    $midnightTypeRecord = get_sub_field('midnight_type_album');
                    $albumCover = get_sub_field('album_cover'); 
                ?>
                    <section id="section-<?php echo $pageSectionCount; ?>" class="section-<?php echo $pageSectionCount; ?> <?php echo $midnightTypeRecord; ?> record-section audio-bars" data-midnight="records">
                        <div class="container">
                            <div class="left">
                                <div class="single-album social-album-cover" style="background:url(<?php echo $albumCover['url']; ?>) no-repeat center; background-size:cover;">
                                    <?php if( have_rows('record_social_media') ): ?>
                                        <div>
                                            <ul>
                                            <?php while ( have_rows('record_social_media') ) : the_row(); 
                                                $singleSocialLink = get_sub_field('social_media_link');
                                                $singleSocialTitle = get_sub_field('social_media_title'); 
                                            ?>
                                                <li><a class="hvr-underline-from-middle-small-white" href="<?php echo $singleSocialLink; ?>" target="_blank"><?php echo $singleSocialTitle; ?></a></li>
                                            <?php endwhile; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="right">
                                <div class="album-title">WE ARE<br/>THE WRECKS</div>                    
                                <?php if( have_rows('album_tracks') ): 
                                    $trackCounter = 0;
                                ?>
                                    <ol class="tracklist">
                                    <?php while ( have_rows('album_tracks') ) : the_row(); 
                                        $trackTitle = get_sub_field('track_title');
                                        $trackMedia = get_sub_field('track_media');
                                        ++$trackCounter;
                                    ?>
                                        <li><a class="track track-<?php echo $trackCounter; ?> hvr-underline-from-middle-small-white" data-track="<?php echo $trackCounter; ?>" href="<?php $trackMedia; ?>"><?php echo $trackTitle; ?> - <span class="track-number">0<?php echo $trackCounter; ?></span></a></li>
                                    <?php endwhile; ?>
                                    </ol>
                                <?php endif; ?>
                                <div class="download-album button-border white-button-border"><a class="button white-button hvr-underline-from-middle-small-white" href="https://itunes.apple.com/us/album/we-are-the-wrecks-single/id1105932300" target="_blank">DOWNLOAD</a></div>
                                <!-- <iframe src="https://embed.spotify.com/?uri=spotify:album:6erK5SKLmAcF78KQFh1zIA&theme=white" width="330" height="80" frameborder="0" allowtransparency="true"></iframe> -->                    
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="audio-player">
                            <?php if( have_rows('album_tracks') ): $trackMediaCounter = 0; ?>
                                <?php while ( have_rows('album_tracks') ) : the_row(); 
                                    $trackMedia = get_sub_field('track_media');
                                    ++$trackMediaCounter;
                                ?>
                                    <div class="controls controls-<?php echo $trackMediaCounter; ?>"><?php echo $trackMedia; ?></div>
                                <?php endwhile; ?>
                            <?php endif; ?>                
                        </div>
                    </section>


                <?php elseif(get_row_layout() == 'tour_section'):
                    $midnightTypeTour = get_sub_field('midnight_type_tour');
                ?>
                    <section id="section-<?php echo $pageSectionCount; ?>" class="section-<?php echo $pageSectionCount; ?> <?php echo $midnightTypeTour; ?> tour-section" data-midnight="tour">
                        <div class="container">
                            <div class="tour-featured">
                                <div class="tour-box tour-box-1">
                                    <div class="tour-details">
                                        <div class="date"></div>
                                        <div class="location"></div>
                                        <div class="venue"></div>                            
                                    </div>
                                    <a class="tickets" href="" target="_blank"><div class="hvr-underline-from-middle-small-white">GET TICKETS</div></a>
                                </div>
                                <div class="tour-box tour-box-2">
                                    <div class="tour-details">
                                        <div class="date"></div>
                                        <div class="location"></div>
                                        <div class="venue"></div>                            
                                    </div>
                                    <a class="tickets" href="" target="_blank"><div class="hvr-underline-from-middle-small-white">GET TICKETS</div></a>
                                </div>
                                <div class="tour-box tour-box-3">
                                    <div class="tour-details">
                                        <div class="date"></div>
                                        <div class="location"></div>
                                        <div class="venue"></div>                            
                                    </div>
                                    <a class="tickets" href="" target="_blank"><div class="hvr-underline-from-middle-small-white">GET TICKETS</div></a>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php 
                                $tourDates = get_sub_field('tour_calendar');
                                echo $tourDates; 
                            ?>
                        </div>
                    </section>



                <?php elseif(get_row_layout() == 'contact_section'):
                    $midnightTypeContact = get_sub_field('midnight_type_contact');
                ?>
                    <section id="section-<?php echo $pageSectionCount; ?>" class="section-<?php echo $pageSectionCount; ?> <?php echo $midnightTypeContact; ?> contact-section" data-midnight="contact">
                        <div class="container">
                            <?php 
                                $contactForm = get_sub_field('contact_form');
                            ?>
                            <div class="contact-form"><?php echo $contactForm; ?></div>
                            
                            <div class="clear"></div>
                        </div>
                    </section>


                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
 

    </div> <!-- END .MAINTCONTENT -->
 

<?php get_footer(); ?>    

<?php /****************************** END ******************************/ ?>               


