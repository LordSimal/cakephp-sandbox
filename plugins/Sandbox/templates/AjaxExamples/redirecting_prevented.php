<?php
/**
 * @var \App\View\AppView $this
 */
?>

<?php $this->append('script'); ?>
<script>
$(function() {
	$('#example-container a').removeAttr('onclick');
	$('#example-container a').click(function(e) {
		e.preventDefault();
		var form = $(this).prev();
		var url = $(form).attr("action");

		$.ajax({
			type: 'post',
			url: url,
			beforeSend: function(xhr) {
				xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				$('#example-target').html('...');
			},
			success: function(res) {
				$('#example-target').html('Redirect to: ' + res._redirect.url + ' (status code ' + res._redirect.status + ')' + "<br/><br/>Raw data:<br/>" + JSON.stringify(res));
			},
			error: function(e) {
				alert("Error");
				console.log(e);
			}
		});
	});
});
</script>
<?php $this->end(); ?>

<style>
.toggle img.icon {
	cursor: pointer;
}
#some-record {
	background-color: #eee;
	width: 40px;
}

</style>

<nav class="actions col-sm-4 col-xs-12">
	<?php echo $this->element('navigation/ajax'); ?>
</nav>
<div class="page index col-sm-8 col-xs-12">
<h2><?php echo __('Redirecting');?> and AJAX - Using Ajax Plugin</h2>

<p>
A simple AJAX POST with a normal redirect is usually resolved in the RequestHandler to avoid actual redirecting when serving AJAX.
It instead returns the redirected content as part of the response. Using the AjaxComponent you can disable that and instead return
the redirect URL and its status code to manually use it in your JS/jQuery code.
</p>

<div class="toggle">
	<div style="margin-bottom: 10px;"><?php echo $this->Form->postLink(__('A normal POST link'), []); ?></div>

	<div style="margin-bottom: 10px;" id="example-container">
		<?php echo $this->Form->postLink(__('Click me (I am AJAXified).'), []); ?>
	</div>

	<div class="alert alert-info" id="example-target">
	<small><i>The AJAX result (from the redirect) will go here</i></small>
	</div>
</div>

</div>

