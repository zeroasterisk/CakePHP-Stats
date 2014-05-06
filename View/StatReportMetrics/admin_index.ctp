<?php echo $this->element('breadcrumbs'); ?>
<div class="statReportMetrics index">
	<h2><?php echo __('Stat Report Metrics'); ?></h2>
	<table class="table table-bordered table-striped">
	<tr>
			<th>
				<?php echo $this->Paginator->sort('id'); ?><br>
				<small class="muted"><?php echo $this->Paginator->sort('created'); ?></small>
			</th>
			<th>
				<strong>
				<?php echo $this->Paginator->sort('name'); ?>
				</strong><br>
				<?php echo $this->Paginator->sort('label'); ?>
				<em><?php echo $this->Paginator->sort('abbr'); ?></em>
			</th>
			<th>
				<?php echo $this->Paginator->sort('model'); ?>
				<small class="muted">-&gt;</small>
				<?php echo $this->Paginator->sort('method'); ?>
			</th>
			<th><?php echo $this->Paginator->sort('params'); ?></th>
			<th><?php echo $this->Paginator->sort('is_key_value'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($metrics as $metric): ?>
	<tr>
		<td>
			<?php echo h($metric['StatReportMetric']['id']); ?><br>
			<small class="muted"><?php echo $metric['StatReportMetric']['created']; ?></small>
			&nbsp;
		</td>
		<td>
			<strong>
			<?php echo $this->Html->link($metric['StatReportMetric']['name'],
				array('action' => 'view', $metric['StatReportMetric']['id']),
				array('escape' => false)
			); ?>
			</strong><br>
			<?php echo $metric['StatReportMetric']['label']; ?>
			<em class="muted"><?php echo $metric['StatReportMetric']['abbr']; ?></em>
		</td>
		<td>
			<?php echo $metric['StatReportMetric']['model']; ?>
			<small class="muted">-&gt;</small>
			<?php echo $metric['StatReportMetric']['method']; ?>
		</td>
		<td><?php echo h($metric['StatReportMetric']['params']); ?>&nbsp;</td>
		<td><?php echo (empty($metric['StatReportMetric']['is_key_value']) ? 'single' : 'multiple'); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $metric['StatReportMetric']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $metric['StatReportMetric']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $metric['StatReportMetric']['id']), null, __('Are you sure you want to delete # %s?', $metric['StatReportMetric']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->PaginatorExtra->main(); ?>
</div>
<div class="end-of-page-actions">
	<ul class="nav nav-pills">
		<li><?php echo $this->Html->link(__('New Stat Report Metric'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Stat Report Home'), array('controller' => 'stat_reports', 'action' => 'home')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stat Report Plans'), array('controller' => 'stat_report_values', 'action' => 'index')); ?> </li>
	</ul>
</div>
