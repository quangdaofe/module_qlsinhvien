<!-- BEGIN: main -->
<div class="table-responsive">
    <form method="post" action="">
        <input type="hidden" name="id" value="{DATA.id}" />
        <tr>
            <td>Họ và tên</td>
            <td><input class="w300 required form-control" name="fullname" type="text" value="{DATA.fullname}"/></td>
            <td>&nbsp;</td>
        </tr>
         <tr>
            <td>Năm sinh</td>
            <td><input class="w300 required form-control" name="birtday" type="text" value="{DATA.birtday}"/></td>
             <td>&nbsp;</td>
        </tr>
         <tr>
            <td>Địa chỉ</td>
            <td><input class="w300 required form-control" name="address" type="text" value="{DATA.address}"/></td>
             <td>&nbsp;</td>
        </tr>
         <tr>
            <td>Giới tính</td>
            <td><input class="w300 required form-control" name="gender" type="text" value="{DATA.gender}"/></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input class="w300 required form-control" name="email" type="text" value="{DATA.email}"/></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td><input class="w300 required form-control" name="phone_number" type="text" value="{DATA.phone_number}"/></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
         <input type="submit" name="save" value="{LANG.save}" class="btn btn-primary" />
        </tr>
    </form>
</div>
<!-- END: main -->
