<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package materialwp
 */
?>

	</div><!-- #content -->
	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="site-info" style="color:#fff;">
						<p><a href="https://mp.weixin.qq.com/mp/homepage?__biz=MjM5NDgxMjM5Ng==&hid=5&sn=8d7a7cd5285659085acd7694b46af2ac&scene=18&pass_ticket=bViwsGkLjY7BNG12Muar6G8%2B25g2jhEiiieZteOErlb27LyJXb%2BO6Q8LKAi2zWf4">官方微信</a> | <a href="#">官方微博</a> | <a href="<?php echo get_page_link(get_page_by_path('my-page-slug')->ID); ?>">联系我们</a></p>
						<!-- <span>电话: 010-00000000</span><br/>
						<span>邮编: 524000</span><br/>
						<span>地址: 广东省湛江市麻章区广东海洋大学体育楼</span> -->
					</div><!-- .site-info -->
				</div> <!-- col-lg-12 -->
			</div><!-- .row -->
		</div><!-- .containr -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js" charset="utf-8"></script>
<?php wp_footer(); ?>
</body>
</html>
