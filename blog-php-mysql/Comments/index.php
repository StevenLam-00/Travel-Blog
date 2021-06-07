<?php
session_start();
include('includes/header.php');
include('includes/navbar.php'); ?>

<?php
if (isset($_SESSION['status'])) { ?>
    <div class="alert">
        <?= $_SESSION['status']; ?>
    </div>
<?php
    unset($_SESSION['status']);
} ?>


<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header"> 
                        <h4> <?php echo $post['title'];?> </h4>                 <!-- Mày để cái title chỗ này -->          
                    </div>
                    <div class="card-body">
                        Trường Đại học Quốc Tế - Đại học Quốc gia Thành phố Hồ Chí Minh là một      <!-- Mày kéo cái nộp dung bài post chỗ nào -->
                        trong bảy trường đại học thành viên trực thuộc 
                        Đại học Quốc gia Thành phố Hồ Chí Minh, được thành
                         lập vào tháng 12 năm 2003. Đây là trường đại học 
                         công lập đa ngành đầu tiên và duy nhất hiện nay 
                         tại Việt Nam giảng dạy hoàn toàn tiếng Anh.

                         <hr>

                         <div class="main-comment">
                             <div id="error_status"></div>
                            <textarea name="" class ="comment_textbox form-control mb-1" id="" cols="30" rows="10"></textarea>
                            <button type="button"class="btn btn-primary add_comment_btn">Comment</button>
                         </div>
                         <hr>

                        <div class="comment-container">
                           
                        </div>

                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>