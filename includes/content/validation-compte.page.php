<?php if(isset($_GET['email']) && !empty($_GET['email']) && filter_input(INPUT_GET,"email",FILTER_VALIDATE_EMAIL)) : ?>

<?php  if(isset($_GET['token']) && !empty($_GET['token'])) : ?>

<?php
        include("../../includes/incfiles/url.inc.php");
        require_once("../../includes/incfiles/connexion.inc.php");
        $email= filter_input(INPUT_GET,"email",FILTER_SANITIZE_EMAIL);
        $token= filter_input(INPUT_GET,"token",FILTER_SANITIZE_SPECIAL_CHARS);

        

        $select = $bdd->PREPARE("SELECT * from clients WHERE email=? AND token=?");
        $select->EXECUTE(array($email,$token)); ?>

<?php if($select->rowcount()==1) :?>

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

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <!--================login_part start =================-->
                    <div class="login_part_form" id="login_part_form">
                        <div class="login_part_form_iner">
                            <h3 class="text-center">Définir mot de passe</h3>
                            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                                <input type="hidden" value="<?=$email?>" id="client_mail">
                                <input type="hidden" value="<?=$token?>" id="client_token">
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password_set" name="password_set"
                                        placeholder="Mot de passe">
                                    <span id="password_set_error" class="d-none"></span>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password_set_confirm"
                                        name="password_set_confirm" placeholder="Cinfimer mot de passe">
                                    <span id="password_set_confirm_error" class="d-none"></span>
                                </div>
                                <div class="col-md-12 form-group">

                                    <button type="submit" class="btn_3" id="set_pass">
                                        Valider
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                    <!--================register_part start =================-->

                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->
</main>


<?php else : ?>

<script>
window.location.href = "<?=$url?>htdocs/home/";
</script>

<?php endif  ?>

<?php else : ?>

<script>
window.location.href = "<?=$url?>htdocs/home/";
</script>

<?php endif  ?>

<?php else : ?>

<script>
window.location.href = "<?=$url?>htdocs/home/";
</script>

<?php endif ?>