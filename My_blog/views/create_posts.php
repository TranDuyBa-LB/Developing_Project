<div id="create_posts">
    <input type="text" value=""  placeholder="Người viết..." />
    <textarea id="title_posts" name="title_posts" placeholder="Tiêu đề bài viết..." ></textarea>
    <p>Chuyên mục</p>
    <select>
        <option>Chuyên mục 1</option>
        <option>Chuyên mục 2</option>
        <option>Chuyên mục 3</option>
    </select> 
    <textarea id="content_posts" name="content"> </textarea>   
    <?php require 'js/display_ckeditor.js'; ?> 
    <a href="" id="submit" name="create">Tạo bài viết</a>            
</div>