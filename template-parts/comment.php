<?php do_action( 'rx-theme/comments/comment-before' ); ?>

<?php if ( ! empty( rx_theme_comment_author_avatar() ) ) : ?>
<div class="comment-author vcard">
	<?php echo rx_theme_comment_author_avatar(); ?>
</div>
<?php endif; ?>
<div class="comment-content-wrapper">
	<div class="comment-meta">
		<?php echo rx_theme_get_comment_author_link(); ?>
		<?php echo rx_theme_get_comment_date( array( 'format' => 'F j, Y \a\t g:ia' ) ); ?>
	</div>
	<div class="comment-content">
		<?php echo rx_theme_get_comment_text(); ?>
	</div>
	<div class="reply">
		<?php echo rx_theme_get_comment_reply_link( array( 'reply_text' => '<i class="fa fa-reply" aria-hidden="true"></i>reply' ) ); ?>
	</div>
</div>

<?php do_action( 'rx-theme/comments/comment-after' ); ?>
