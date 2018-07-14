        <footer class="footer-area"><!--====== FOOTER AREA START ======-->
            <div class="container ">
                <div class="row">
                    <div class="col-md-12">
                        <p class="footer-text text-center">Made with <i class="glyphicon glyphicon-heart"></i> Copyright By Project Team 2018. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </footer><!--====== FOOTER AREA END ======-->


        <!--==================================================================-->
        <script type="text/javascript" src="assets/js/jquery-3.2.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <!--=== All Plugin ===-->
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script tyoe="text/javascript" src="assets/plugins/tinymce/tinymce.min.js"></script>
        <script tyoe="text/javascript" src="assets/plugins/tinymce/init-tinymce.js"></script>
        <script type="text/javascript" src="assets/js/prism.js"></script>

        <!--=== All Active ===-->
        <script type="text/javascript" src="assets/js/main.js"></script>



        <script>
            $(function() {
                $('#profile-image2').on('click', function() {
                    $('#profile-image-upload').click();
                });
            });

            function submit (){
               document.getElementById("textForm").submit();
               document.getElementById("imageForm").submit();
            }
        </script>

    </body>
</html>