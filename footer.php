<?php
// THE FOOTER.PHP FILE
// MAY 2018 AIRWAVE CONSULTING

wp_footer();
?>
<section id="footer" class="footer">
	Copyright &copy; <?php echo date('Y'); ?> Moweaqua Golf Course. All Rights Reserved.<br>Design by <a href="https://airwave.consulting">AIRWAVE//CONSULTING</a>.<a href="/wp-admin/" style="margin-left:20px;">Admin Panel</a>.
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
function scroll_to_section(the_id){
    var the_section = $('#' + the_id);
    $('html,body').animate({scrollTop: the_section.offset().top},'slow');
}	
</script>
</body>
</html>