<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Poca
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
      <!-- Comments Area -->
              <div class="comment_area mb-50 clearfix">
                <h5 class="title">03 Comments</h5>

                <ol>
                  <!-- Single Comment Area -->
                  <li class="single_comment_area">
                    <!-- Comment Content -->
                    <div class="comment-content d-flex">
                      <!-- Comment Author -->
                      <div class="comment-author">
                        <img src="img/bg-img/16.jpg" alt="author">
                      </div>
                      <!-- Comment Meta -->
                      <div class="comment-meta">
                        <a href="#" class="post-date">27 Aug 2018</a>
                        <h5>Jerome Leonard</h5>
                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetu adipisci velit, sed quia non numquam eius modi</p>
                        <a href="#" class="like">Like</a>
                        <a href="#" class="reply">Reply</a>
                      </div>
                    </div>

                    <ol class="children">
                      <li class="single_comment_area">
                        <!-- Comment Content -->
                        <div class="comment-content d-flex">
                          <!-- Comment Author -->
                          <div class="comment-author">
                            <img src="img/bg-img/17.jpg" alt="author">
                          </div>
                          <!-- Comment Meta -->
                          <div class="comment-meta">
                            <a href="#" class="post-date">27 Aug 2018</a>
                            <h5>Theodore Adkins</h5>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetu adipisci velit, sed quia non numquam eius modi</p>
                            <a href="#" class="like">Like</a>
                            <a href="#" class="reply">Reply</a>
                          </div>
                        </div>
                      </li>
                    </ol>
                  </li>

                  <!-- Single Comment Area -->
                  <li class="single_comment_area">
                    <!-- Comment Content -->
                    <div class="comment-content d-flex">
                      <!-- Comment Author -->
                      <div class="comment-author">
                        <img src="img/bg-img/18.jpg" alt="author">
                      </div>
                      <!-- Comment Meta -->
                      <div class="comment-meta">
                        <a href="#" class="post-date">27 Aug 2018</a>
                        <h5>Roger Marshall</h5>
                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetu adipisci velit, sed quia non numquam eius modi</p>
                        <a href="#" class="like">Like</a>
                        <a href="#" class="reply">Reply</a>
                      </div>
                    </div>
                  </li>
                </ol>
              </div>

              <!-- Leave A Reply -->
              <div class="contact-form">
                <h5 class="mb-30">Leave A Comment</h5>

                <!-- Form -->
                <form action="#" method="post">
                  <div class="row">
                    <div class="col-lg-6">
                      <input type="text" name="message-name" class="form-control mb-30" placeholder="Name">
                    </div>
                    <div class="col-lg-6">
                      <input type="email" name="message-email" class="form-control mb-30" placeholder="Email">
                    </div>
                    <div class="col-12">
                      <textarea name="message" class="form-control mb-30" placeholder="Comment"></textarea>
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn poca-btn mt-30">Post Comment</button>
                    </div>
                  </div>
                </form>
              </div>
              </div>
          </div>
        </div>
