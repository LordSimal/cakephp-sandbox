<?php
/**
 * @var \App\View\AppView $this
 */
?>
<h2>CsvView Examples</h2>
<a href="https://github.com/FriendsOfCake/cakephp-csvview" target="_blank">[CsvView Plugin]</a>

<h3>CsvView plugin examples</h3>
<ul>
	<li><?php echo $this->Html->link('Simple Export', ['action' => 'simple', '_ext' => 'csv'])?></li>
	<li><?php echo $this->Html->link('Pagination and CSV', ['action' => 'pagination'])?></li>
</ul>
