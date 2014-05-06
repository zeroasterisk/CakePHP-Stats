<?php
$this->Meta->add('title', __('Admin Edit Stat Report Metric'));
$this->Meta->add('description', 'Admin Edit Stat Report Metric');
$this->Meta->add('robots', 'NOINDEX NOFOLLOW');
?>
<?php echo $this->element('breadcrumbs'); ?>
<?php
echo $this->Form->create('StatReportMetric', array(
	'class' => 'validate form-stacked statReportMetrics',
	'url' => array('action' => $this->params['action']),
	'inputDefaults' => array(
		'div' => 'form-group',
		'label' => array('class' => 'control-label'),
		'class' => 'form-control',
	)
	));
	// and of course, we ad the ID of the thing being edited
	echo $this->Form->hidden('id');
	?>
	<fieldset>
		<h2><?php echo __('Admin Edit Stat Report Metric'); ?></h2>
		<?php
		echo $this->Form->input('name', array(
			'label' => '* Name',
			'required' => true,
		));
		echo $this->Form->input('label');
		echo $this->Form->input('abbr');
		echo $this->Form->input('model');
		echo $this->Form->input('method');
		echo $this->Form->input('params', array(
			'after' => '<span class="help-block">JSON formatted key/values to be used as passedArgs</span>',
		));
		echo $this->Form->input('is_key_value', array(
			'label' => 'Is Key Value',
			'div' => 'checkbox',
			'class' => 'checkbox-control',
			'after' => '<span class="help-block">When collected, do we get multiple values?  (name+value, name+value, etc)</span>',
		));
		?>
	</fieldset>
	<fieldset>
		<?php
		echo $this->Form->input('StatReportPlan.StatReportPlan', array(
			'label' => 'Stat Report Plans',
			'div' => 'checkbox',
			'type' => 'select',
			'multiple' => 'checkbox',
			'class' => 'checkbox-control',
			'options' => $plans,
		));
		?>
	</fieldset>
	<div class="form-actions">
		<button class="btn btn-primary btn-lg" type="submit">Submit</button>
		&nbsp;
		&nbsp;
		<?php echo $this->Html->link(__('Cancel'), array('action' => 'view', $this->Form->value('StatReportMetric.id')), array('escape' => false)); ?>
		&nbsp;
		&nbsp;
		<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('StatReportMetric.id')), array('escape' => false), 'Are you sure?'); ?>
	</div>
</form>

