<?php

/**
 * NukeViet Content Management System
 * @version 5.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2025 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}
if ($nv_Request->isset_request('action', 'post,get')) {
    $id =$nv_Request->get_int('id', 'post,get', 0,250);
    $sql="DELETE FROM nv5_qlsinhvien WHERE `nv5_qlsinhvien`.`id` =".$id;
    $exe = $db->query($sql);
    if ($exe) {
        print_r( nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name));
    }
}
$page_title = $nv_Lang->getModule('list');
$array = [];
$sql = 'SELECT * FROM ' .$db_config['prefix'] . '_' . $module_data;
$result = $db->query($sql);
while ($row = $result->fetch()) {
    $array[] = $row;

}

$xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', \NukeViet\Core\Language::$lang_module);
$xtpl->assign('GLANG', \NukeViet\Core\Language::$lang_global);
//Hiện thị dữ liệu
    if(!empty($array)){
        foreach ($array as $data) {
           $data["url_edit"]= NV_BASE_ADMINURL.NV_LANG_DATA.'/'. $module_data.'/add/?'.'id='.$data["id"];
           $data["url_delete"]= NV_BASE_ADMINURL.NV_LANG_DATA.'/'. $module_data.'/?'.'id='.$data["id"].'&action=delete';
           $xtpl->assign('DATA', $data);
           $xtpl->parse('main.loop');
        }
    }
$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
