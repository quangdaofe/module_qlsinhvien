<!-- BEGIN: main -->
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <colgroup>
            <col class="w100">
            <col span="1">
            <col span="2" class="w150">
        </colgroup>
        <thead>
            <tr class="text-center">
                <th class="text-nowrap">id</th>
                <th class="text-nowrap">Họ và tên</th>
                <th class="text-nowrap">Giới tính</th>
                <th class="text-nowrap">Ngày sinh</th>
                <th class="text-nowrap">Số điện thoại</th>
                <th class="text-nowrap">Email</th>
                <th class="text-nowrap">Quê quán</th>
                <th class="text-nowrap">Chức năng</th>
            </tr>
        </thead>
        <tbody>
        <!-- BEGIN: loop -->
             <tr class="text-center">
                <th class="text-nowrap">{DATA.id}</th>
                <th class="text-nowrap">{DATA.fullname}</th>
                <th class="text-nowrap">{DATA.gender}</th>
                <th class="text-nowrap">{DATA.birtday}</th>
                <th class="text-nowrap">{DATA.phone_number}</th>
                <th class="text-nowrap">{DATA.email}</th>
                <th class="text-nowrap">{DATA.address}</th>
                 <td class="text-center text-nowrap">
                    <a href="{DATA.url_edit}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i> {GLANG.edit}</a>
                    <a href="{DATA.url_delete}"class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> {GLANG.delete}</a>
                </td>
            </tr>    
        <!-- END: loop -->
        </tbody>
    </table>
</div>
<!-- END: main -->