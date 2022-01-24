<main>

    <!-- Hero Area End-->
    <!--================login_part Area =================-->
    <section class="login_part  ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 bounce-animate">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Nouveau sur notre boutique?</h2>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                          
                            <a href="#" class="btn_3 d-none" id="login_link">Se connecter</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                   
                    <?php if(isset($_GET['code']) && !empty($_GET['code']) && $_GET['code']=="envoye") : ?>

                        <!--================Confirm code start =================-->
                        <div class="login_part_form col-12" id="login_part_form">
                            <div class="login_part_form_iner">
                                <h3 class="text-center">Code de confirmation </h3>
                                <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="forgot_code" name="forgot_code"
                                            placeholder="code de réinitialisation" maxlength="6">
                                        <span id="forgot_code_error" class="d-none"></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    
                    <?php elseif(isset($_GET['nouveau']) && !empty($_GET['nouveau']) && $_GET['nouveau']=="password") : ?>

                        <!--================reset password =================-->
                        <div class="register_part_form " id="register_part_form">
                            <div class="register_part_form_iner">
                                <h3 class="text-center">Mise à jour de mot de passe</h3>
                                <form class="row contact_form" action="#" method="post" novalidate="novalidate"
                                    enctype="multipart/form-data">


                                    
                                    <div class="col-md-12 form-group p_star">
                                        <label for="newpassword_forgot">Nouveau mot de passe</label>
                                        <input type="password" class="form-control" id="newpassword_forgot"
                                            name="newpassword_forgot" placeholder="Nouveau mot de passe">
                                        <span id="newpassword_forgot_error" class="d-none"></span>
                                    </div>

                                    <div class="col-md-12 form-group p_star">
                                        <label for="confirmnewpassword_forgot">Confirmer nouveau mot de passe</label>
                                        <input type="password" class="form-control" id="confirmnewpassword_forgot"
                                            name="confirmnewpassword_forgot" placeholder="Confirmer nouveau mot de passe">
                                        <span id="confirmnewpassword_forgot_error" class="d-none"></span>
                                    </div>

                                    <div class="col-md-12 form-group">

                                        <button type="submit" class="btn_3" id="resetpasswordbutton">
                                            Validé
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>

                    <?php else : ?>

                        <!--================login_part start =================-->
                        <div class="login_part_form " id="login_part_form">
                            <div class="login_part_form_iner">
                                <h3 class="text-center">Mot de passe oublié</h3>
                                <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                                    <div class="col-md-12 form-group p_star">
                                        <input type="email" class="form-control" id="forgot_email" name="forgot_email"
                                            placeholder="Email">
                                        <span id="forgot_email_error" class="d-none"></span>
                                    </div>

                                    <div class="col-md-12 form-group">

                                        <button type="submit" value="submit" class="btn_3" id="forgotpassword_button">
                                            Recevoir le code
                                        </button>
                                        <a class="lost_pass" href="<?=$url?>htdocs/login/">Se connecter avec mot de
                                            passe</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    <?php endif  ?>

                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->
</main>