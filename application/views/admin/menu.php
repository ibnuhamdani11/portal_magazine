            <div style="overflow: auto;">
            <div class="navbar-default sidebar" role="navigation" style="margin-top: 0px; width: 100%; ">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <?php
                        // menu_status = 1 (enabled)

                            $email = $this->session->userdata('email');
                            $menu = $this->db->query("SELECT * 
                                FROM ms_role_detail 
                                left join ms_role on ms_role_detail.role_id = ms_role.role_id
                                left join ms_menu on ms_role_detail.menu_id = ms_menu.menu_id
                                left join ms_user on ms_role.role_id = ms_user.role_id
                                where email = '$email' AND menu_status='1' ORDER BY position_number ASC
                                ")->result();
                            
                            echo "<li>
                                    <a href='".base_url()."admin/admin'><i></i> Dashboard</a>
                                </li>";

                            foreach ($menu as $row) {
                                    echo "<li><a href='".base_url().$row->link."'><i></i>".$row->name."</a></li>";
                            }   
                                                     
                        ?>
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            </div>