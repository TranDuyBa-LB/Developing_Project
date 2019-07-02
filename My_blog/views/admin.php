<!DOCTYPE html>
<html>
    <head>
        <title>Quản trị viên</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/admin.css" />
    </head>
    <body>
        <div id="header">

        </div>
        <div id="body_control">
            <div id="option_control">
                <ul>
                    <li class="admin">
                        <img src="images/img_designs/writer.png" /> <p>Trần Duy Bá</p>
                        <input type="button" value="Đăng xuất" />
                    </li>
                    <li>
                       <img src="images/img_designs/home.png" /> 
                       <a href="#" target="_blank">Trang chủ</a>
                    </li>
                    <li>
                        <img src="images/img_designs/add_new_posts.png" /> 
                        <a href="">Tạo bài viết</a>
                    </li>
                    <li>
                        <img src="images/img_designs/manage_posts.png" /> 
                        <a href="">Quản lý bài viết</a>
                    </li>
                    <li>
                        <img src="images/img_designs/change_password.png" /> 
                        <a href="">Đổi mật khẩu</a>
                    </li>
                </ul>
            </div>
            <div id="view_control">
                <div id="manage_posts">
                    <div id="option">
                        <input type="text" placeholder="Tìm kiếm bài viết..." />
                        <p>Sắp xếp theo tương tác</p>
                        <select name="sort_1">
                            <option>Mới nhất</option>
                            <option>Cũ nhất</option>
                            <option>Nhiều views</option>
                            <option>Nhiều share</option>
                            <option>Nhiều comment</option>
                        </select>
                        <p>Sắp xếp theo chủ đề</p>
                        <select name="sort_2">
                            <option>Đời sống</option>
                            <option>Công việc</option>
                            <option>Xã hội</option>
                            <option>Chuyên ngành</option>
                        </select>
                    </div>
                    <table id="table_posts">
                        <thead>
                            <tr class="tr_1">
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Mô tả</th>
                                <th>Chủ đề</th>
                                <th>Số views</th>
                                <th>Số share</th>
                                <th>Số comment</th>
                                <th>Người viết</th>
                                <th>Thời gian đăng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>001</td>
                                <td>Tiêu đề 1 Tiêu đề 1
                                        Tiêu đề 1 Tiêu đề 1
                                        Tiêu đề 1 Tiêu đề 1
                                        Tiêu đề 1 Tiêu đề 1
                                        Tiêu đề 1 Tiêu đề 1
                                        Tiêu đề 1 Tiêu đề 1
                                        Tiêu đề 1 Tiêu đề 1
                                        Tiêu đề 1 Tiêu đề 1
                                        Tiêu đề 1 Tiêu đề 1

                                        Tiêu đề 1 Tiêu đề 1

                                        Tiêu đề 1 Tiêu đề 1
                                </td>
                                <td>Mô tả 1</td>
                                <td>Chủ đề 1</td>
                                <td>30</td>
                                <td>30</td>
                                <td>30</td>
                                <td>Trần Duy Bá</td>
                                <td>5:00pm-2/7/2019</td>
                            </tr>
                            <tr>
                                <td>001</td>
                                <td>Tiêu đề 1</td>
                                <td>Mô tả 1</td>
                                <td>Chủ đề 1</td>
                                <td>30</td>
                                <td>30</td>
                                <td>30</td>
                                <td>Trần Duy Bá</td>
                                <td>5:00pm-2/7/2019</td>
                            </tr>
                            <tr>
                                    <td>001</td>
                                    <td>Tiêu đề 1</td>
                                    <td>Mô tả 1</td>
                                    <td>Chủ đề 1</td>
                                    <td>30</td>
                                    <td>30</td>
                                    <td>30</td>
                                    <td>Trần Duy Bá</td>
                                    <td>5:00pm-2/7/2019</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>