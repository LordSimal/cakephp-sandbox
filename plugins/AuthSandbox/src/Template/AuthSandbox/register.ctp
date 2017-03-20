<h2>Auth Sandbox</h2>

<div class="row">
	<div class="col-md-6">

<h3>Demo Register</h3>
<p>You will get the role "user" assigned. We also skip 2-way auth (no register email), you are directly logged in.</p>

<?php echo $this->Form->create($user);?>
<?php
echo $this->Form->input('username');
echo $this->Form->input('pwd', ['autocomplete' => 'off']);
echo $this->Form->input('pwd_repeat', ['autocomplete' => 'off']);
?>
<?php echo $this->Form->submit(__('Register and log me in'));?>
<?php echo $this->Form->end(); ?>
</div>
<div class="col-md-6">

	<p>
		<?php echo $this->Html->link('Back', ['action' => 'index']); ?>
	</p>

</div>
</div>
