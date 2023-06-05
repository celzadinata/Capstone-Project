{{-- <footer class="footer">
    <div class="container-fluid">
        <nav class="float-left">
            <p class="yokresell-2023-h98">YokResell © 2023</p> --}}
            {{-- <div class="frame">
                <img class="ig" src="/assets/img/socmed/ig.png"/>
                <img class="fb" src="/assets/img/socmed/fb.png"/>
                <img class="linkedin" src="/assets/img/socmed/linkedin.png"/>
                <img class="twitter" src="/assets/img/socmed/twitter.png"/>
                <img class="yt" src="/assets/img/socmed/yt.png"/>
            </div> --}}
            {{-- </nav> --}}
<style>
    .footer {
        background: #CE3ABD;
        color: white;
        font-weight: 500;
    }

    .footer .social-links a {
        font-size: 25px;
        transition: 0.3s;
        display: inline-block;
        margin-left: 5px;
        margin-right: 5px;
        color: white
    }

    .footer .social-links a:hover {
        -webkit-transform: scale(1.1);
    }
</style>
<footer class="footer">
    <div class="container d-md-flex justify-content-between">
        <p class="mb-0">YokResell &copy; <?php echo date('Y'); ?></p>
        <div class="social-links">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-facebook-square"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-twitter-square"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</footer>
