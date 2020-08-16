<div class="menus view">
<h2><?php echo __('Menu'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Introtext'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['introtext']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Menu'), array('action' => 'edit', $menu['Menu']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Menu'), array('action' => 'delete', $menu['Menu']['id']), null, __('Are you sure you want to delete # %s?', $menu['Menu']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Menus'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menu'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Menuitems'), array('controller' => 'menuitems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menuitems'), array('controller' => 'menuitems', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Menuitems'); ?></h3>
	<?php if (!empty($menu['Menuitems'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Menus Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Counts'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($menu['Menuitems'] as $menuitems): ?>
		<tr>
			<td><?php echo $menuitems['id']; ?></td>
			<td><?php echo $menuitems['name']; ?></td>
			<td><?php echo $menuitems['url']; ?></td>
			<td><?php echo $menuitems['menus_id']; ?></td>
			<td><?php echo $menuitems['status']; ?></td>
			<td><?php echo $menuitems['counts']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'menuitems', 'action' => 'view', $menuitems['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'menuitems', 'action' => 'edit', $menuitems['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'menuitems', 'action' => 'delete', $menuitems['id']), null, __('Are you sure you want to delete # %s?', $menuitems['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Menuitems'), array('controller' => 'menuitems', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
