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
if(!empty($_GET["id"])){
    $sql1 = 'SELECT * FROM ' .$db_config['prefix'] . '_' . $module_data. ' WHERE id='.$_GET['id'];
    $result = $db->query($sql1);
    $data = $result->fetch();
}

$page_title = $nv_Lang->getModule('list');
$row = [];
if ($nv_Request->isset_request('save', 'post')) {
    $error=[];
    if(empty($_POST["fullname"])||empty($_POST["birtday"])||empty($_POST["address"])||empty($_POST["phone_number"])||
        empty($_POST["email"])||empty($_POST["gender"])){
        $error[]="Chưa nhập";
    }
    $table =$db_config['prefix'];
    if(isset($_GET["id"])){
        $sql1 = 'SELECT * FROM ' .$db_config['prefix'] . '_' . $module_data.' WHERE id='.$_GET['id'];
        $result = $db->query($sql1);
        $data = $result->fetch();
        $row['fullname'] = $data["fullname"];
        $row['birtday'] = $data["birtday"];
        $row['address'] = $data["address"];
        $row['phone_number'] = $data["phone_number"];
        $row['email'] = $data["email"];
        $row['gender'] = $data["gender"];
        $sql = "UPDATE".$table.'_'. $module_data.
        "SET fullname=:fullname,birtday=:birtday,address=:address,phone_number=:phone_number,email=:email,gender=:gender
        WHERE `nv5_qlsinhvien`.`id` = 2";
        
        if ($exe) {
            print_r( nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name));
        }
       
    }else{
        $row['fullname'] = nv_substr($nv_Request->get_title('fullname', 'post', ""), 0, 250);
        $row['birtday'] = $nv_Request->get_int('birtday', 'post', 0,250);
        $row['address'] = nv_substr($nv_Request->get_title('address', 'post', ""), 0, 250);
        $row['phone_number'] = $nv_Request->get_int('phone_number', 'post', 0,250);
        $row['email'] = nv_substr($nv_Request->get_title('email', 'post', ""), 0, 250);
        $row['gender'] = nv_substr($nv_Request->get_title('gender', 'post', ""), 0, 250);
        $sql ='INSERT INTO ' . $table .'_'. $module_data.'(fullname,birtday,address,phone_number,email,gender)'.
        "VALUES (:fullname,:birtday,:address,:phone_number,:email,:gender)";
        $sth = $db->prepare($sql);
        $sth->bindParam(':fullname', $row['fullname'], PDO::PARAM_STR);
        $sth->bindParam(':birtday', $row['birtday'], PDO::PARAM_INT);
        $sth->bindParam(':address', $row['address'], PDO::PARAM_STR);
        $sth->bindParam(':phone_number', $row['phone_number'], PDO::PARAM_INT);
        $sth->bindParam(':email', $row['email'], PDO::PARAM_STR);
        $sth->bindParam(':gender', $row['gender'], PDO::PARAM_STR);
        $exe = $sth->execute();
        if ($exe) {
            print_r( nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name));
        }
    }
   
}
$xtpl = new XTemplate('add.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', \NukeViet\Core\Language::$lang_module);
$xtpl->assign('GLANG', \NukeViet\Core\Language::$lang_global);
//Hiện thị dữ liệu
if(!empty($data)){
       $xtpl->assign('DATA', $data);
       $xtpl->parse('main.loop');
}
$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
