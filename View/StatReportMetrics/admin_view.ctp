<?php echo $this->element('breadcrumbs'); ?>
<div class="statReportMetrics view">
<h2><?php  echo __('Stat Report Metric'); ?></h2>
	<dl class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($metric['StatReportMetric']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($metric['StatReportMetric']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($metric['StatReportMetric']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Label'); ?></dt>
		<dd>
			<?php echo h($metric['StatReportMetric']['label']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Abbr'); ?></dt>
		<dd>
			<?php echo h($metric['StatReportMetric']['abbr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Model'); ?></dt>
		<dd>
			<?php echo h($metric['StatReportMetric']['model']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Method'); ?></dt>
		<dd>
			<?php echo h($metric['StatReportMetric']['method']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Params'); ?></dt>
		<dd>
			<?php echo h($metric['StatReportMetric']['params']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Key Value'); ?></dt>
		<dd>
			<?php echo h($metric['StatReportMetric']['is_key_value']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="">
	<ul class="nav nav-pills">
		<li><?php echo $this->Html->link(__('Edit Stat Report Metric'), array('action' => 'edit', $metric['StatReportMetric']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Stat Report Metric'), array('action' => 'delete', $metric['StatReportMetric']['id']), null, __('Are you sure you want to delete # %s?', $metric['StatReportMetric']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Stat Report Metric'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Stat Report Home'), array('controller' => 'stat_reports', 'action' => 'home')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stat Report Plans'), array('controller' => 'stat_report_values', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Stat Report Plans with this Metric'); ?></h3>
	<?php if (!empty($metric['StatReportPlan'])): ?>
	<table class="table table-bordered table-striped">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Label'); ?></th>
		<th><?php echo __('Ranges'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($metric['StatReportPlan'] as $plan): ?>
		<tr>
			<td><?php echo $plan['id']; ?></td>
			<td><?php echo $this->Html->link($plan['name'],
				array('controller' => 'stat_report_plans', 'action' => 'view', $plan['id']),
				array('escape' => false)); ?></td>
			<td><?php echo $plan['label']; ?></td>
			<td><?php echo $plan['ranges']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'stat_report_plans', 'action' => 'view', $plan['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'stat_report_plans', 'action' => 'edit', $plan['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'stat_report_plans', 'action' => 'delete', $plan['id']), null, __('Are you sure you want to delete # %s?', $plan['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div><!--/.related-->
