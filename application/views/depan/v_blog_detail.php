<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Read the Details</p>
                    <h1><?php echo htmlspecialchars($title); ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- single article section -->
<div class="mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-article-section">
                    <div class="single-article-text">
                        <div class="single-artcile-bg" style="background-image: url('<?php echo base_url('assets/images/' . $image); ?>'); height: 400px; background-size: cover; background-position: center;"></div>
                        <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i> <?php echo htmlspecialchars($author); ?></span>
                            <span class="author"><i class="fas fa-calendar"></i> <?php echo htmlspecialchars($tanggal); ?></span>
                        </p>
                        <h2><?php echo htmlspecialchars($title); ?></h2>
                        <p><?php echo nl2br($blog); ?></p>

                    </div>

                    <!-- <div class="comments-list-wrap">
                        <h3 class="comment-count-title">3 Comments</h3>
                        <div class="comment-list">
                            <div class="single-comment-body">
                                <div class="comment-user-avater">
                                    <img src="assets/img/avaters/avatar1.png" alt="">
                                </div>
                                <div class="comment-text-body">
                                    <h4>Jenny Joe <span class="comment-date">Aprl 26, 2020</span> <a href="#">reply</a></h4>
                                    <p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna, maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus.</p>
                                </div>
                                <div class="single-comment-body child">
                                    <div class="comment-user-avater">
                                        <img src="assets/img/avaters/avatar3.png" alt="">
                                    </div>
                                    <div class="comment-text-body">
                                        <h4>Simon Soe <span class="comment-date">Aprl 27, 2020</span> <a href="#">reply</a></h4>
                                        <p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna, maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-comment-body">
                                <div class="comment-user-avater">
                                    <img src="assets/img/avaters/avatar2.png" alt="">
                                </div>
                                <div class="comment-text-body">
                                    <h4>Addy Aoe <span class="comment-date">May 12, 2020</span> <a href="#">reply</a></h4>
                                    <p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna, maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus.</p>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- 
                    <div class="comment-template">
                        <h4>Leave a comment</h4>
                        <p>If you have a comment dont feel hesitate to send us your opinion.</p>
                        <form action="index.html">
                            <p>
                                <input type="text" placeholder="Your Name">
                                <input type="email" placeholder="Your Email">
                            </p>
                            <p><textarea name="comment" id="comment" cols="30" rows="10" placeholder="Your Message"></textarea></p>
                            <p><input type="submit" value="Submit"></p>
                        </form>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-section">
                    <div class="recent-posts">
                        <h4>Recent Posts</h4>
                        <ul>
                            <?php foreach ($recent_posts as $post): ?>
                                <li>
                                    <a href="<?php echo site_url('artikel/' . $post->tulisan_slug); ?>">
                                        <?php echo htmlspecialchars($post->tulisan_judul, ENT_QUOTES, 'UTF-8'); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>


                    </div>
                    <div class="archive-posts">


                        <h4>Archive Posts</h4>
                        <ul>
                            <?php foreach ($archive_posts as $archive): ?>
                                <li>
                                    <a href="<?php echo base_url('blog/archive/' . urlencode($archive->month_year)); ?>">
                                        <?php echo htmlspecialchars($archive->month_year, ENT_QUOTES, 'UTF-8'); ?> (<?php echo htmlspecialchars($archive->count, ENT_QUOTES, 'UTF-8'); ?>)
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>


                    </div>
                    <div class="tag-section">
                        <h4>Tags</h4>
                        <ul>
                            <?php foreach ($tags as $tag): ?>
                                <li>
                                    <a href="<?php echo site_url('blog/kategori/' . str_replace(" ", "-", $tag->kategori_nama)); ?>">
                                        <?php echo htmlspecialchars($tag->kategori_nama, ENT_QUOTES, 'UTF-8'); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end single article section -->