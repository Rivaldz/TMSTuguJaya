<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url() ?>assets/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php 
                            if($this->session->userdata('role')==1){
                                echo $this->session->userdata('username');
                            } 
                            else {
                                echo $this->session->userdata('nama');
                            }
                        ?>
                    </div>
                    <div class="email">
                        <?php 
                            if($this->session->userdata('role')!=1){
                                echo $this->session->userdata('email');
                            }
                        ?>
                    </div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo base_url() ?>User/logout"><i class="material-icons">input</i>LogOut</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li <?php if($this->uri->segment(1)=='Dashboard'){ echo 'class="active"'; } ?>>
                        <a href="<?php echo base_url() ?>Dashboard">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <?php
                        if($this->session->userdata('role')==1){
                    ?>
                    <li <?php if($this->uri->segment(1)=='Karyawan'){ echo 'class="active"'; } ?>>
                        <a href="<?php echo base_url() ?>Karyawan">
                            <i class="material-icons">home</i>
                            <span>Data Karyawan</span>
                        </a>
                    </li>
                    <li <?php if($this->uri->segment(1)=='Task'){ echo 'class="active"'; } ?>>
                        <a href="<?php echo base_url() ?>Task">
                            <i class="material-icons">home</i>
                            <span>Data Task</span>
                        </a>
                    </li>
                    <li <?php if($this->uri->segment(1)=='Reward'){ echo 'class="active"'; } ?>>
                        <a href="<?php echo base_url() ?>Reward">
                            <i class="material-icons">home</i>
                            <span>Data Reward</span>
                        </a>
                    </li>
                    <?php
                        } else if($this->session->userdata('role')==2){
                    ?>
                    <li <?php if($this->uri->segment(1)=='Karyawan'){ echo 'class="active"'; } ?>>
                        <a href="<?php echo base_url() ?>Karyawan">
                            <i class="material-icons">home</i>
                            <span>Data Karyawan</span>
                        </a>
                    </li>
                    <li <?php if($this->uri->segment(1)=='Reward'){ echo 'class="active"'; } ?>>
                        <a href="<?php echo base_url() ?>Reward">
                            <i class="material-icons">home</i>
                            <span>Data Reward</span>
                        </a>
                    </li>
                    <?php
                        } else if($this->session->userdata('role')==3){
                    ?>
                    <li>
                        <a href="<?php echo base_url() ?>Task/taskBos">
                            <i class="material-icons">home</i>
                            <span>My Task</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>Karyawan/listKaryawan">
                            <i class="material-icons">home</i>
                            <span>Data Karyawan</span>
                        </a>
                    </li>
                    <li <?php if($this->uri->segment(1)=='Reward'){ echo 'class="active"'; } ?>>
                        <a href="<?php echo base_url() ?>Reward">
                            <i class="material-icons">home</i>
                            <span>Data Reward</span>
                        </a>
                    </li>
                    <?php
                        } else if($this->session->userdata('role')==4){
                    ?>
                    <li>
                    <a href="<?php echo base_url() ?>Task">
                            <i class="material-icons">home</i>
                            <span>Data Task</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="material-icons">home</i>
                            <span>Progress Task</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="material-icons">home</i>
                            <span>Tukar Poin</span>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2020 <a href="javascript:void(0);">Task Monitoring System</a>. </br>
                    <a href="https://goo.gl/maps/2A5rSX167tmH2A9UA"> UD.TUGU JAYA Magetan</a>
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>