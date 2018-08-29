<?php
// THE FOOTER.PHP FILE
// MAY 2018 AIRWAVE CONSULTING

wp_footer();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
function scroll_to_section(the_id){
    var the_section = $('#' + the_id);
    $('html,body').animate({scrollTop: the_section.offset().top},'slow');
}	
</script>
</body>
</html>