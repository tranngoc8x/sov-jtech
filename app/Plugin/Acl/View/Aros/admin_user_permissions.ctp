<?php
echo $this->Html->script('/acl/js/acl_plugin');
?>
<?php
if(isset($users))
{
?>
<div class="row-fluid">
    <!-- START Datatable 2 -->
    <div class="span12 widget dark">
        <header>
            <h4 class="title pull-left"><span class="icon icone-list"></span> Danh sách người dùng</h4>
        </header>
        <section class="body">
            <div class="body-inner no-padding">
                <table class="table table-bordered table-striped table-hover datatable">
                    <thead class="sorting">
                        <tr>
                            <th><?php echo $this->Paginator->sort('username','Tên đăng nhập'); ?></th>
                            <th width="20%"><?php echo $this->Paginator->sort('User.name','Họ tên'); ?></th>
                            <th><?php echo $this->Paginator->sort('Groups.name','Nhóm người dùng'); ?></th>
                            <th width="15%">Phân quyền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user) :?>
                        <?php
                            $title = __d('acl', 'Quản lý quyền của người dùng này');
                            $link = '/admin/acl/aros/user_permissions/' . $user[$user_model_name][$user_pk_name];
                            if(Configure :: read('acl.gui.users_permissions.ajax') === true)
                            {
                                 $link .= '/ajax:true';
                            }
                        ?>
                        <tr>
                        <td><?php echo $this->Html->link($user[$user_model_name][$user_display_field],$link);?></td>
                        <td><?php echo $this->Html->link($user[$user_model_name]['name'],$link);?></td>
                        <td><?php echo $user[$role_model_name.'s']["name"];?></td>
                        <td><div class='toolbar'>
                            <?php
                                //echo  $this->Html->link($this->Html->image('/acl/img/design/lock.png'), $link, array('alt' => $title, 'title' => $title, 'escape' => false)) ;
                                echo $this->Html->link("<span class='icone-pencil'></span>",$link,array("escape"=>false,"class"=>"btn btn-small",'alt' => $title, 'title' => $title));?>
                        </div></td>
                        </tr>
                        <?php endforeach;?>

                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

</table>
<?php
}
else
{
?>
    <?php
echo $this->Html->script('/acl/js/acl_plugin');
?>

    <table border="0">
    <tr>
        <?php
        foreach($roles as $role)
        {
            echo '<td><h1>';

            echo $role[$role_model_name][$role_display_field];
            if($role[$role_model_name][$role_pk_name] == $user[$user_model_name][$role_fk_name])
            {
               // echo $this->Html->image('/acl/img/design/tick.png');
                echo "<span class=\"icone-ok green\"></span>";
            }
            else
            {
                $title = __d('acl', 'Chuyển người dùng sang nhóm này.');
                echo $this->Html->link("<span class=\"icone-remove red pointer\"></span>&nbsp;&nbsp;&nbsp;", array('plugin' => 'acl', 'controller' => 'aros', 'action' => 'update_user_role', 'user' => $user[$user_model_name][$user_pk_name], 'role' => $role[$role_model_name][$role_pk_name]), array('title' => $title, 'alt' => $title, 'escape' => false));
            }
            echo '</h1></td>';
        }
        ?>
    </tr>
    </table>
    <?php
    if($user_has_specific_permissions)
    {
        echo '<div class="separator"></div>';
        //echo $this->Html->image('/acl/img/design/bulb24.png') . __d('acl', 'This user has specific permissions');
        // icone-lightbulb
        echo "<span class=\"icone-lightbulb yealow pointer\"></span>&nbsp;";
        echo ' (';
        echo $this->Html->link("<span class=\"icone-trash red pointer\"></span> " . __d('acl', ' Xóa bảng phân quyền của người này'), '/admin/acl/aros/clear_user_specific_permissions/' . $user[$user_model_name][$user_pk_name], array('confirm' => __d('acl', 'Are you sure you want to clear the permissions specific to this user ?'), 'escape' => false));
        echo ')';
        echo '<div class="separator"></div>';
    }
    ?>
    <div class="widget dark stacked">
        <header><h4 class="title"><?php echo  __d('acl', 'User') . ' : ' . $user[$user_model_name][$user_display_field]; ?></h4></header>
        <section class="body">
            <div class="body-inner">
                <div class="accordion" id="accordion">
    <?php
    $js_init_done = array();
    $previous_ctrl_name = '';
    $i=0;

    if(isset($actions['app']) && is_array($actions['app']))     {


    foreach($actions['app'] as $controller_name =>  $ctrl_infos){$i++;?>
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseChild<?php echo $i;?>"><?php echo $controller_name;?></a>
        </div>

            <div id="collapseChild<?php echo $i;?>" class="accordion-body collapse">
                <div class="accordion-inner">
                <table class="table table-bordered table-striped table-hover dataTable" >
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                    <tr><th>Chức năng</th>
                    <th>Phân quyền</th></tr>
            <?php
            $row = 0;
            foreach($ctrl_infos as $ctrl_info)
            {
                $row++;
                $class = $row%2==0?"odd":"even";
            ?>
            <tr class="<?php echo $class;?>">
                <td>
                    <?php
                        echo  $ctrl_info['name'] ;
                    ?>
                </td>
                <td style='width: 20%;'>
                    <?php
                        echo '<span id="right__' . $user[$user_model_name][$user_pk_name] . '_' . $controller_name . '_' . $ctrl_info['name'] . '">';
                        echo "<span class=\"icone-spinner green pointer\"></span>";
                        if(!in_array($controller_name . '_' . $user[$user_model_name][$user_pk_name], $js_init_done))
                        {
                            $js_init_done[] = $controller_name . '_' . $user[$user_model_name][$user_pk_name];
                            $this->Js->buffer('init_register_user_controller_toggle_right("' . $this->Html->url('/', true) . '", "' . $user[$user_model_name][$user_pk_name] . '", "", "' . $controller_name . '", "' . __d('acl', 'The ACO node is probably missing. Please try to rebuild the ACOs first.') . '");');
                        }
                        echo '</span>';
                        echo "<span id='right__". $user[$user_model_name][$user_pk_name] . "_" . $controller_name . "_" . $ctrl_info['name'] . "_spinner' class=\"icone-spinner green\" style= 'display:none;'></span>";
                    ?>
                </td>
            </tr>


            <?php
            }
            echo "</tbody></table>";
            echo "</div></div></div>";
        }
    }
    ?>


    <?php
    if(isset($actions['plugin']) && is_array($actions['plugin']))
    {
        foreach($actions['plugin'] as $plugin_name => $plugin_ctrler_infos)
        { $i++;
    ?>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseChild<?php echo $i;?>"><?php echo $plugin_name;?></a>
                </div>
                <div id="collapseChild<?php echo $i;?>" class="accordion-body collapse">
                    <div class="accordion-inner">
                    <table class="table table-bordered table-striped table-hover dataTable" >
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    <tr><th>Chức năng</th>
                    <th>Phân quyền</th></tr>
            <?php

            foreach($plugin_ctrler_infos as $plugin_ctrler_name => $plugin_methods)
            {
                $row1 = 0;
                foreach($plugin_methods as $method)
                {
                    $row1++;
                    $class1 = $row1%2==0?"odd":"even";
                    echo "<tr class=\"<?php echo $class1;?>\"><td>";
                    echo  $method['name'];
                    echo "</td><td style='width: 20%;'>";
                    echo '<span id="right_' . $plugin_name . '_' . $user[$user_model_name][$user_pk_name] . '_' . $plugin_ctrler_name . '_' . $method['name'] . '">';
                    echo "<span class=\"icone-spinner green pointer\" title=\"loading\"></span>";
                    if(!in_array($plugin_name . "_" . $plugin_ctrler_name . '_' . $user[$user_model_name][$user_pk_name], $js_init_done))
                    {
                        $js_init_done[] = $plugin_name . "_" . $plugin_ctrler_name . '_' . $user[$user_model_name][$user_pk_name];
                        $this->Js->buffer('init_register_user_controller_toggle_right("' . $this->Html->url('/', true) . '", "' . $user[$user_model_name][$user_pk_name] . '", "' . $plugin_name . '", "' . $plugin_ctrler_name . '", "' . __d('acl', 'The ACO node is probably missing. Please try to rebuild the ACOs first.') . '");');
                    }

                    echo '</span>';
                    echo "<span id='right_".$plugin_name ."_". $user[$user_model_name][$user_pk_name] . "_" . $plugin_ctrler_name . "_" . $method['name'] . "_spinner' class=\"icone-spinner green\" style= 'display:none;'></span>";
                    echo "</td></tr>";
                }

            }
            echo "</tbody></table>";
            echo "</div></div></div>";
        }
    }
    ?>
    </div>
    </div>
    </section>
</div>
<div class="widget">
    <?php
    echo "<span class=\"icone-ok green\"></span>". ' ' . __d('acl', 'được phép truy cập');
    //echo $this->Html->image('/acl/img/design/tick.png') ;
    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    echo "<span class=\"icone-remove red\"></span>". ' ' . __d('acl', 'khóa quyền truy cập');
    //echo $this->Html->image('/acl/img/design/cross.png') . ' ' . __d('acl', 'blocked');
    ?>
</div>
<?php
}
?>
<?php
echo $this->element('design/footer');
?>