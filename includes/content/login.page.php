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
                            <a href="#" class="btn_3" id="register_link">Creer un compte</a>
                            <a href="#" class="btn_3 d-none" id="login_link">Se connecter</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <!--================login_part start =================-->
                    <div class="login_part_form" id="login_part_form">
                        <div class="login_part_form_iner">
                            <h3 class="text-center">LOGIN</h3>
                            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Username">
                                    <span id="email_error" class="d-none"></span>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password">
                                    <span id="password_error" class="d-none"></span>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Remember me</label>
                                    </div>
                                    <button type="submit" value="submit" class="btn_3" id="login">
                                        Se connecter
                                    </button>
                                    <a class="lost_pass" href="<?=$url?>htdocs/password-forgot/">forget password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--================register_part start =================-->
                    <div class="register_part_form d-none" id="register_part_form">
                        <div class="register_part_form_iner">
                            <h3 class="text-center">REGEISTER</h3>
                            <form class="row contact_form" action="#" method="post" novalidate="novalidate" enctype="multipart/form-data">

                                <div class="row" id="part1">
                                    <h3 class="text-center  mx-auto"><span
                                            class="badge badge-success badge-rounded fs-1 px-2 text-center "
                                            style="border-radius:360px"> 1 </span></h3>
                                    <div class="col-md-12 form-group p_star">
                                        <label for="nom">Nom</label>
                                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Tata">
                                        <span id="nom_error" class="d-none"></span>
                                    </div>

                                    <div class="col-md-12 form-group p_star">
                                        <label for="prenom">Prenom</label>
                                        <input type="text" class="form-control" id="prenom" name="prenom"
                                            placeholder="Toto">
                                        <span id="prenom_error" class="d-none"></span>
                                    </div>

                                    <div class="col-md-12 form-group p_star">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="register_email" name="email"
                                            placeholder="fayamamarket23@gmail.com">
                                        <span id="register_email_error" class="d-none"></span>
                                    </div>
                                    <div
                                        class="col-md-12 form-group p_star justify-content-right content-align-right text-right">
                                        <button class="btn btn-primary btn_1" id="nextto2">Next <span
                                                class="fa fa-arrow-right"></span></button>
                                    </div>
                                </div>


                                <div id="part2" class="d-none">
                                    <h3 class="text-center justify-content-center align-content-center mx-auto"><span
                                            class="badge badge-success badge-rounded fs-1 px-2 text-center "
                                            style="border-radius:360px"> 2 </span></h3>

                                    <div class="col-md-12 form-group p_star">
                                        <label for="pays">Pays</label>
                                        <select class="form-select " name="pays" id="pays">
                                            <option value="BENIN" class="form-control">Benin</option>
                                        </select>
                                        <span id="pays_error" class="d-none"></span>


                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <label for="adresse">Adresse</label>
                                        <input type="text" class="form-control" id="adresse" name="adresse"
                                            placeholder="Toto">
                                        <span id="adresse_error" class="d-none"></span>
                                    </div>


                                    <div class="col-md-12 form-group p_star ">
                                        <div class="row">
                                            <div class="col-6">
                                                <button class="btn btn-primary btn_1" id="backto1"> <span
                                                        class="fa fa-arrow-left"></span>Back</button>
                                            </div>
                                            <div class="col-6 justify-content-right content-align-right text-right">
                                                <button class="btn btn-primary btn_1 " id="nextto3">Next <span
                                                        class="fa fa-arrow-right"></span></button>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <div id="part3" class="d-none">
                                    <h3 class="text-center justify-content-center align-content-center mx-auto"><span
                                            class="badge badge-success badge-rounded fs-1 px-2 text-center "
                                            style="border-radius:360px"> 3 </span></h3>
                                    <p>Votre Avatar</p>
                                    <div class="col-md-12 form-group bg-info  fs-1 p-5 mx-auto "
                                        style="border:1px dashed black">
                                        <div class="row  m-5">
                                            <label for="avatar" class="px-5 text-center">
                                                <img src="<?=$url?>images/gallery1.png" alt="" srcset="" class="w-75">
                                            </label>
                                            <input type="file" name="avatar" id="avatar" class="d-none" Content-Type="image/*">
                                        </div>

                                    </div>
                                    <div class="col-md-12 form-group p_star ">
                                        <button class="btn btn-primary btn_1" id="backto2"> <span
                                                class="fa fa-arrow-left"></span>Back</button>
                                    </div>
                                    <div class="col-md-12 form-group">

                                        <button type="submit" class="btn_3" id="register">
                                            S'inscrire
                                        </button>

                                    </div>
                                </div>

                                <div id="part4" class="d-none py-4">
                                    <h3 class="text-center justify-content-center align-content-center mx-auto"><span
                                            class="badge badge-success badge-rounded fs-1 px-2 text-center "> FIN
                                        </span></h3>
                                    <div class="card bg-secondary justify-content-center align-content-center ">
                                        <div
                                            class="card-body text-center justify-content-center align-content-center fs-3 bg-light border-3 bounce-animate bounceOutDown mx-lg-3">

                                            <h3>Enregistrement éffectué avec succès. Veillez controller votre mail pour
                                                valider votre compte sur FAYAMA MARKET</h3>

                                        </div>
                                    </div>
                                </div>



                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->
</main>