<?php
  if (post_password_required()) {
    return;
  }
 if (have_comments()) : ?>
  <section id="comments">
    <!-- h3><?php printf(_n('One Response to &ldquo;%2$s&rdquo;', '%1$s Responses to &ldquo;%2$s&rdquo;', get_comments_number(), 'roots'), number_format_i18n(get_comments_number()), get_the_title()); ?></h3 -->
    <hr class='dot' style='height:3px'>

    <ol class="media-list">
      <?php wp_list_comments(array('walker' => new Roots_Walker_Comment)); ?>
    </ol>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
    <nav>
      <ul class="pager">
        <?php if (get_previous_comments_link()) : ?>
          <li class="previous"><?php previous_comments_link(__('&larr; Older comments', 'roots')); ?></li>
        <?php endif; ?>
        <?php if (get_next_comments_link()) : ?>
          <li class="next"><?php next_comments_link(__('Newer comments &rarr;', 'roots')); ?></li>
        <?php endif; ?>
      </ul>
    </nav>
    <?php endif; ?>

    <?php if (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
    <div class="alert">
      <?php _e('Comments are closed.', 'roots'); ?>
    </div>
    <?php endif; ?>
  </section><!-- /#comments -->
<?php endif; ?>

<?php if (!have_comments() && !comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
  <section id="comments">
    <div class="alert">
      <?php _e('Comments are closed.', 'roots'); ?>
    </div>
  </section><!-- /#comments -->
<?php endif; ?>

<?php if (comments_open()) : ?>
  <section id="respond">
    <hr class='dot' style='height:3px'>

    <h4><?php comment_form_title(__('댓글 남기기', 'roots'), __('댓글 남기기', 'roots')); ?></h4>
    <p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
    <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
      <p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'roots'), wp_login_url(get_permalink())); ?></p>
    <?php else : ?>
      <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
        <?php if (is_user_logged_in()) : ?>
          <p>
            <?php printf(__('<a href="%s/wp-admin/profile.php">%s</a>로 로그인 중.', 'roots'), get_option('siteurl'), $user_identity); ?>
            <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php __('Log out of this account', 'roots'); ?>"><?php _e('로그아웃 &raquo;', 'roots'); ?></a>
          </p>
        <?php else : ?>
          <label for="author"><?php _e('이름', 'roots'); if ($req) _e(' *', 'roots'); ?></label>
          <input type="text" class="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" <?php if ($req) echo 'aria-required="true"'; ?>>
          <label for="email"><?php _e('이메일 (노출되지 않음)', 'roots'); if ($req) _e(' *', 'roots'); ?></label>
          <input type="email" class="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" <?php if ($req) echo 'aria-required="true"'; ?>>
          <label for="url"><?php _e('웹사이트', 'roots'); ?></label>
          <input type="url" class="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22">
        <?php endif; ?>
        <label for="comment"><?php _e('', 'roots'); ?></label>
        <textarea name="comment" id="comment" class="input-block-level" rows="5" aria-required="true"></textarea>
        <p><input name="submit" class="btn" type="submit" id="submit" value="<?php _e('작성 완료', 'roots'); ?>"></p>
        <?php comment_id_fields(); ?>
        <?php do_action('comment_form', $post->ID); ?>
      </form>
    <?php endif; ?>
  </section><!-- /#respond -->
<?php endif; ?>
