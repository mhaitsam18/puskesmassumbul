<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url(); ?>assets/server/assets/img/user.jpg" class="img-circle" alt="">
            </div>

            <div class="pull-left info">
                <p><?php echo $this->session->userdata('username'); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <div>
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <?php

$roleid = $this->session->userdata('role');

$this->db->select('a.menu_id, a.menu_name, a.menu_icon, a.parent_id, a.ordering, a.linkto, a.enabled, b.menu_view, b.menu_add, b.menu_edit, b.menu_del');
$this->db->join('tb_role_detail b', 'a.menu_id = b.menu_id', 'left');
$this->db->where('a.enabled', 'Y');
$this->db->where('a.parent_id', 0);
$this->db->where('b.role_id', $roleid);
$this->db->order_by('a.ordering', 'asc');
$main_menu = $this->db->get('tb_menu a');

foreach ($main_menu->result() as $main) {
    $this->db->select('a.menu_id, a.menu_name, a.menu_icon, a.parent_id, a.ordering, a.linkto, a.enabled, b.menu_view, b.menu_add, b.menu_edit, b.menu_del');
    $this->db->join('tb_role_detail b', 'a.menu_id = b.menu_id', 'left');
    $this->db->where('a.enabled', 'Y');
    $this->db->where('a.parent_id', $main->menu_id);
    $this->db->where('b.role_id', $roleid);
    $this->db->order_by('a.ordering', 'asc');
    $sub_menu = $this->db->get('tb_menu a');
    if ($sub_menu->num_rows() > 0) {
        echo "<li class='treeview'>" . anchor(base_url() . 'server/' . $main->linkto, '<i class="' . $main->menu_icon . '"></i>' . $main->menu_name .
            '<span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>');
        echo "<ul class='treeview-menu'>";
        foreach ($sub_menu->result() as $sub) {
            echo "<li>" . anchor(base_url() . 'server/' . $sub->linkto, '<i class="' . $sub->menu_icon . '"></i>' . $sub->menu_name) . "</li>";
        }
        echo "</ul></li>";
    } else {
        echo "<li>" . anchor(base_url() . 'server/' . $main->linkto, '<i class="' . $main->menu_icon . '"></i>' . $main->menu_name) . "</li>";
    }
}
?>




            </ul>
        </div>
    </section>
</aside>