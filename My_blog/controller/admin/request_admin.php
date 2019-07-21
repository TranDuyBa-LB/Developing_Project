<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    require '../../model/database.php';

    $_db = new database();

    //Tạo mới một bài viết
    function create_posts($_posts){
        GLOBAL $_db;
        
        $_date = date('h:ia-d/m/y');
        $_writer = htmlentities($_posts['writer']);
        $_title = htmlentities($_posts['title']);
        $_demo = htmlentities($_posts['demo']);
        $_list = htmlentities($_posts['list']);
        $_content = $_posts['content'];

        $_column = 'p_title,p_demo,p_writer,p_content,p_views,p_share,p_list,p_date';
        $_table = 'posts';
        $_values = "'$_title','$_demo','$_writer','$_content',0,0,'$_list','$_date'";

        $_query = $_db->INSERT($_column,$_table,$_values);
        $_obj_statement = $_db->execute_query($_query);
        if($_obj_statement != false)
            header ('Location:../../views/admin/admin.php?error=Tạo bài viết thành công !');
        else {
            $_error = $_db->_error;
            header ("Location:../../views/admin/admin.php?error=$_error");
        }

    }

    //Chỉnh sửa bài viết
    function change_posts($_post){
        GLOBAL $_db;

        $_id_posts = (int)$_post['id_posts'];
        $_title = $_post['title'];
        $_list = $_post['list'];
        $_demo = $_post['demo'];
        $_content = $_post['content'];
        $_date_ChangePost = date('h:ia-d/m/y');

        $_table = 'posts';
        $_set = "p_title='$_title',p_list='$_list',p_demo='$_demo',p_content='$_content',p_date_changePosts='$_date_ChangePost'";
        $_where = "p_id=$_id_posts";

        $_query = $_db->UPDATE($_table,$_set,$_where);
        $_obj_statement = $_db->execute_query($_query);

        if($_obj_statement!=false)
            header('Location:../../views/admin/admin.php?request=tableManage_posts&error=Chỉnh sửa bài viết thành công !');
        else 
            header('Location:../../views/admin/admin.php?request=tableManage_posts&error=Chỉnh sửa bài viết không thành công !');
    }

    //Tạo mới một tài khoản Admin
    function create_admin($_post){
        GLOBAL $_db;

        require '../../controller/check/function_check.php';

        $_user_name = $_post['user_name'];
        $_nickname = $_post['nickname'];
        $_password = md5($_post['password']);
        $_date = date('h:ia-d/m/y');
        $_id_user = md5($_user_name);

        if(check_create_admin($_user_name,$_nickname)){
            $_column = 'a_id,a_nickname,a_name,a_password,a_date';
            $_table = 'admin';
            $_values = "'$_id_user','$_nickname','$_user_name','$_password','$_date'";
            $_query=$_db->INSERT($_column,$_table,$_values);
            $_obj_statement = $_db->execute_query($_query);
            if($_obj_statement!=false)
                header ('Location:../../views/admin/admin.php?error=Tạo tài khoản Admin thành công !');
            else
                header ('Location:../../views/admin/admin.php?error=Tạo tài khoản Admin không công !');
        }
    }
    
    //Đổi mật khẩu
    function change_password($_post){
        GLOBAL $_db;
        if(empty($_SESSION)) { 
            session_start(); 
        }
        $_a_id=$_SESSION['user'];
        if($_post['pass_new']===$_post['repeat_pass_new']){
            $_date_changePass = date('h:ia-d/m/y');
            $_a_password = md5($_post['password']);
            $_table="admin";
            $_column = 'a_id';
            $_where = "a_id='$_a_id' AND a_password='$_a_password'";
            $_query = $_db->SELECT($_column,$_table,$_where);
            $_obj_statement = $_db->execute_query($_query);
            $_product = $_obj_statement->fetch();
            if(!empty($_product)) {
                $_pass_new = md5($_post['pass_new']);
                $_set = "a_password='$_pass_new', a_date_changePass='$_date_changePass'";
                $_query = $_db->UPDATE($_table,$_set,$_where);
                $_obj_statement = $_db->execute_query($_query);
                if($_obj_statement!=false)
                    header ('Location:../../views/admin/admin.php?request=tableManage_posts&error=Đổi password thành công !');
                else
                    header ('Location:../../views/admin/admin.php?request=tableManage_posts&error=Đổi password không thành công !');
            } else
                header ('Location:../../views/admin/admin.php?request=tableManage_posts&error=Mật khẩu cũ không đúng');
        }
        else 
            logout();
    }


    //Xóa một bài viết
    function delete_posts($_id_posts) {
        GLOBAL $_db;

        $_id = $_id_posts;
        $_table = 'posts';
        $_where = "p_id='$_id'";

        $_query= $_db->DELETE($_table,$_where);
        $_obj_statement = $_db->execute_query($_query);
        if($_obj_statement!=false){
            header ('Location:../../views/admin/admin.php?request=tableManage_posts&error=Xóa bài viết thành công !');
        } else {
            header ('Location:../../views/admin/admin.php?request=tableManage_posts&error=Xóa bài viết không thành công !');
        }
    }

    //Đăng xuất khỏi admin
    function logout() {
        if(empty($_SESSION)) { 
            session_start(); 
        }
        $_SESSION['user']=NULL;
        header ('Location:../../index.php');
    }

    //Thay đổi giao diện web
    function change_interface($_post,$_files){
        GLOBAL $_db;
        if(!empty($_post)){

            $_date_changeInterFace = date('h:ia-d/m/y');
            $_column=[];
            $_values=[];

            if(!empty($_files['file_logo']['name'])){
                if($_files['file_logo']['error']>0)
                    header ('Location:../../views/admin/admin.php?error=File up load bị lỗi !');
                else {
                    move_uploaded_file($_files['file_logo']['tmp_name'], '../../views/images/img_designs/'.$_files['file_logo']['name']);
                    $_link_logo = 'views/images/img_designs/'.$_files['file_logo']['name'];
                    $_values[]="'$_link_logo'";
                    $_column[]='i_link_logo';
                }
            }
            if(!empty($_post['title_web'])){
                $_title_web = $_post['title_web'];
                $_column[]='i_title';
                $_values[]="'$_title_web'";
            }
            if(!empty($_post['email'])){
                $_email = $_post['email'];
                $_column[]='i_email';
                $_values[]="'$_email'";
            }
            if(!empty($_post['slogan'])){
                $_slogan = $_post['slogan'];
                $_column[]='i_slogan';
                $_values[]="'$_slogan'";
            }

            $_column[] = 'i_date_change';
            $_values[] = "'$_date_changeInterFace'";
            $_table = 'interface';

            //Select kiểm tra xem đã có dữ liệu chưa
            $_query = $_db->SELECT('*',$_table,1);
            $_product = ($_db->execute_query($_query))->fetch();

            if(empty($_product)) {
            
                $_column_ = implode(',',$_column); //Nối mảng cột thành một chuỗi gồm các cột cần INSERT
                $_values_ = implode(',',$_values); //Nối mảng vlue thành một chuỗi gồm các giá trị cần INSERT

                $_query = $_db->INSERT($_column_, $_table, $_values_);
                $_obj_statement=$_db->execute_query($_query);
                
                if($_obj_statement!=false)
                    header ("Location:../../views/admin/admin.php?error=Thêm giao diện thành công !");
                else 
                    header ('Location:../../views/admin/admin.php?error=Thêm giao diện không thành công !');
            } else {
                $_set=[];
                foreach ($_column as $key => $_cl)
                    $_set[]="$_cl=$_values[$key]";
                $_set_ = implode(',',$_set);

                $_query = $_db->UPDATE($_table,$_set_,"i_email<>'1'");
                $_obj_statement=$_db->execute_query($_query);
                if($_obj_statement!=false)
                    header ('Location:../../views/admin/admin.php?error=Thay đổi giao diện không thành công !');
                else
                    header ('Location:../../views/admin/admin.php?error=Thay đổi giao diện thành công !');
            }       

        }
    }

    function add_list($_get){
        if(!empty($_get)){
            if(!empty($_get['new_list'])){
                GLOBAL $_db;
                $_new_list = $_get['new_list'];
                $_new_list = "'$_new_list'";
                $_query = $_db->INSERT('l_name','list',$_new_list);
                $_obj_statement = $_db->execute_query($_query);
                if($_obj_statement!=false)
                    header('Location:../../views/admin/admin.php?error=Tạo chuyên mục mới thành công !');
                else
                    header('Location:../../views/admin/admin.php?error=Tạochuyên mục mới không thành công !');
            } else
                header('Location:../../views/admin/admin.php?error=Bạn chưa điền tên chuyên mục mới !');
        } else  
            header('Location:../../views/admin/admin.php?error=Lỗi yêu cầu !');
    }

    require '../check/function_check.php';
    if(check_session()==true){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if($_POST['request']=='create_admin')
                create_admin($_POST);
            else if ($_POST['request']=='create_posts')
                create_posts($_POST);
            else if ($_POST['request']=='change_interface_website')
                change_interface($_POST,$_FILES);
            else if ($_POST['request']=='change_password')
                change_password($_POST);
            else if ($_POST['request']=='change_Posts')
                change_posts($_POST);
        } else if($_SERVER['REQUEST_METHOD']=='GET'){
            if($_GET['action']=='delete_posts')
                delete_posts($_GET['id_posts']);
            else if($_GET['action']=='add_list')
                add_list($_GET);
            else if($_GET['action']=='logout')
                logout();
        }
    } else
        header ('Location:../../index.php');

 ?>