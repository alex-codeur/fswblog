
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset("assets/public/asset")}}/style.css">
    <title>Mon blog</title>
</head>
<body>

    <!-- HEADER -->

    

    <!-- FIN DU HEADER -->

    <!-- CONTENU -->

    <div id="app">
        <home-main></home-main>
    </div>

    <!-- FIN DU CONTENU -->

    <footer class="footer">
        <div class="footer-top">
            <div class="footer-top-1">
                <div id="site-title">
                    <span class="site-title"><em class="color-title">Afrocode</em>.com</span>
                    <p>Après avoir appris sur internet quoi de plus normal que de partger à son tou ? Passioné par le web un peu plus de 2 ans maintenant j'aime partager mes compétences et mes découvertes avec les personnes qui ont cette même passion pour le web.</p>
                    <div class="social">
                        <p><strong><em>Restons Connectés</em></strong></p>
                        <a href="#"><span class="facebook"><img src="{{asset("assets/public/asset/img")}}/facebook-f.svg" width="20" height="20" alt="facebook"></span></a>
                        <a href="#"><span class="twitter"><img src="{{asset("assets/public/asset/img")}}/twitter.svg" width="20" height="20" alt="facebook"></span></a>
                        <a href="#"><span class="linkedin"><img src="{{asset("assets/public/asset/img")}}/linkedin-in.svg" width="20" height="20" alt="facebook"></span></a>
                        <a href="#"><span class="github"><img src="{{asset("assets/public/asset/img")}}/github.svg" width="20" height="20" alt="facebook"></span></a>
                        <a href="#"><span class="youtube"><img src="{{asset("assets/public/asset/img")}}/youtube.svg" width="20" height="20" alt="facebook"></span></a>
                    </div>
                </div>
            </div>
            <div class="footer-top-2">
                <p><em><strong>Newsletter</strong></em></p>
                <form action="">
                    <input type="text"><button class="button">Envoyer</button>
                </form>
                <div class="me-suivre">
                    <p><em class="me-contacter"><strong>Me Contacter</strong></em></p>
                    <div class="contact-center">
                        <span><a href="#"><img src="img/envelope.svg" width="20" height="20" alt=""><em>Par email</em></a></span>
                        <span><a href="#"><img src="img/comment.svg" width="20" height="20" alt=""><em>Tchat</em></a></span>
                        <span><a href="#"><img src="img/youtube.svg" width="20" height="20" alt=""><em>Chaine youtube</em></a></span>
                        <span><a href="#"><img src="img/exclamation.svg" width="20" height="20" alt=""><em>A propos</em></a></span>
                        <span><a href="#"><img src="img/user.svg" width="20" height="20" alt=""><em>Politique de confidentialité</em></a></span>
                    </div>
                </div>
            </div>
            <div class="footer-top-3">
                <p><em class="tweets"><strong>Mes Derniers tweets</strong></em></p>
                <div id="tweet">
                    <span class="quote"><img src="img/quote-left.svg" width="20" height="20" alt=""></span>
                    <span class="tweet">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus accusamus quis...</span>
                </div>
                <div id="tweet">
                    <span class="quote"><img src="img/quote-left.svg" width="20" height="20" alt=""></span>
                    <span class="tweet">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus accusamus quis..</span>
                </div>
                <div id="tweet">
                    <span class="quote"><img src="img/quote-left.svg" width="20" height="20" alt=""></span>
                    <span class="tweet">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus accusamus quis...</span>
                </div>
                <br>
                <em class="tweets"><strong>Slogan</strong></em>
                <span class="slogan"><br>
                <em>Responsivité et sécurité avant tout .</em></span>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="copyright">
                <strong>Copyright &copy; <em>Alex Esaki 2020</em></strong>
            </div>
        </div>
    </footer>
    <script src="{{asset("js/app.js")}}"></script>
</body>
</html>