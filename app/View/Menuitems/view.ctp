<div class="menuitems view">
<h2><?php echo __('Menuitem'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($menuitem['Menuitem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($menuitem['Menuitem']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($menuitem['Menuitem']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Menu'); ?></dt>
		<dd>
			<?php echo $this->Html->link($menuitem['Menu']['name'], array('controller' => 'menus', 'action' => 'view', $menuitem['Menu']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($menuitem['Menuitem']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Counts'); ?></dt>
		<dd>
			<?php echo h($menuitem['Menuitem']['counts']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Menuitem'), array('action' => 'edit', $menuitem['Menuitem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Menuitem'), array('action' => 'delete', $menuitem['Menuitem']['id']), null, __('Are you sure you want to delete # %s?', $menuitem['Menuitem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Menuitems'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menuitem'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Menus'), array('controller' => 'menus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menu'), array('controller' => 'menus', 'action' => 'add')); ?> </li>
	</ul>
</div>
