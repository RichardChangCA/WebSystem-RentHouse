
function pecialCharactersReplace(obj) {
    var pattern = new RegExp(/[^\u4e00-\u9fa5a-z0-9]*$/gi);
}
var value = $(obj).val();
var valueResult = "";
if(value != null && !('' == value)){
    for (var i = 0; i < value.length; i++) {
                valueResult = valueResult+value.substr(i, 1).replace(pattern, '');
            }
        }
        $(obj).empty().val(valueResult);
        return ;
    }



var name = document.getElementById('newUserForm_last_name').value;
var firstName =  document.getElementById('newUserForm_first_name').value;
var phone = document.getElementById('newUserForm_phone_number').value;
//1.判断是否输入为空
if(name==""|| name == null){
    sweetAlert("", "姓名不能为空！", "warning");
    return false;
}
if(firstName== ""||firstName==null){
    sweetAlert("", "昵称不能为空！", "warning");
    return false;
}
if(phone==""|| phone==null){
    sweetAlert("", "联系号码不能为空！", "warning");
    return false;
}
//2.判断是否输入了空格
if(name!=name.replace(/(^\s*)|(\s*$)/g,"")){
    sweetAlert("", "姓名不能包含空格！", "warning");
    return false;
}
if(firstName!=firstName.replace(/(^\s*)|(\s*$)/g,"")){
    sweetAlert("", "昵称不能包含空格！", "warning");
    return false;
}
if(phone!=phone.replace(/(^\s*)|(\s*$)/g,"")){
    sweetAlert("", "联系电话不能包含空格！", "warning");
    return false;
}



var regTelM=/(^1[34578]\d{9}$)|(^0\d{2,3}-?\d{7,8}$)/;
if(!regTelM.test(document.getElementById('newUserForm_phone_number').value)){
    sweetAlert("", "无效的联系号码！", "warning");
    return false;





<script>
    window.onload = function(){
            var oBut = document.getElementById('but');
            var oDiv2 = document.getElementById('div2');
            var aTex = oDiv2.getElementsByTagName('input');

            for(var i=0; i<aTex.length; i++){
                aTex[i].index = i;
                aTex[i].onclick = function(){
                    this.value = '';
                    this.style.color = 'black';
                }
            }

            oBut.onclick = function(){
                if(aTex[0].value.length < 6 || aTex[0].value.length >16){
                    alert("你输入的用户名有误,为6-16位");

                } else if(aTex[3].value.length != 11){
                    alert("输入的手机号有误，为11位");
                } else if(aTex[4].value.length < 6 || aTex[4].value.length >32){
                    alert("输入的邮箱有误，为6-32位");
                } else if(aTex[5].value <6 || aTex[5].value <16){
                    alert("输入的密码有误，为6-16");
                } else if(aTex[6].value.length != aTex[6].value.length){
                    alert("两次密码不一至");
                } else{
                    var name=aTex[0].value;
                    var phone = aTex[3].value;
                    var get = aTex[4].value;
                    var password = aTex[5].value;
                    var sex;
                    if(aTex[1].checked == true){
                        sex = '男';
                    } else{
                        sex = '女';
                    }
                    alert("用户名" + name + ",性别" + sex + ",手机号"+ phone + ",邮箱" + get + ",密码" +password);
                }
            }
        }
        </script>