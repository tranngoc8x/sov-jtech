<!-- START Template Wrapper -->
<!-- If you want to enable the fixed header, just add `.fixed-header` class to the `#wrapper` div below -->
<div id="wrapper">
    <!-- START Template Canvas -->
    <div id="canvas">
        <!-- START Content -->
        <div class="container-fluid">
            <!-- START Row -->
            <div class="row-fluid">
                <!-- START Login Widget Form -->
                <p>&nbsp;</p>
                <?php echo $this->Form->create("User",array('action' => 'login',"class"=>"widget stacked dark widget-login"));?>
                    <section class="body">
                        <div class="body-inner">
                            <!-- START Logo -->
                            <div class="logo" align="center">
                                <!-- <span class="icon-lock"></span> -->
                                <?php echo $this->Html->image("libs/logo-login.png");?>
                            </div>
                            <!--/ END Logo -->

                                <?php
                                    $errms = $this->Session->flash();
                                if( $errms!=""){?>
                                <div class="alert alert-error"><div class="controls">
                                    <?php echo $errms; ?>
                                </div></div>
                                <?php }?>
                                 <?php //echo $this->Session->flash("auth"); ?>

                            <!-- Username -->

                            <div class="control-group">
                                <div class="controls">
                                    <?php echo $this->Form->input("username",array("class"=>"span12","label"=>false,"placeholder"=>"Username"));?>
                                    <i class="icon-user input-icon"></i>
                                </div>
                            </div><!--/ Username -->

                            <!-- Password -->
                            <div class="control-group">
                                <div class="controls">
                                    <?php echo $this->Form->input("password",array("type"=>"password","class"=>"span12","label"=>false,"placeholder"=>"Password"));?><i class="icon-lock input-icon"></i>
                                </div>
                            </div><!--/ Password -->

                            <!-- Register Link -->
                            <div class="control-group">
                                <div class="controls">
                                    <?php echo $this->Html->link('Quên mật khẩu',array('admin'=>true,'controller'=>'users','action'=>'forgot_password')) ?>
                                </div>
                            </div><!--/ Register Link -->
                        </div>
                        <!-- Form Action -->
                        <!-- Place out form `.body-inner` -->
                        <div class="form-actions">
                            <?php
                                echo $this->Form->button("Login",array("type" => "submit","class"=>"btn btn-primary","div"=>false));
                                echo "&nbsp;";
                                echo $this->Form->button("Reset", array("type" => "reset","class"=>"btn","div"=>false));
                            ?>
                        </div>
                        <!--/ Form Action -->
                    </section>
                </form>
                <!--/ END Login Widget Form -->
            </div>
            <!--/ END Row -->
        </div>
        <!--/ END Content -->

    </div>
    <!--/ END Template Canvas -->
</div>
<!--/ END Template Wrapper -->