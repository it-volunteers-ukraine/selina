<?php
/*
Template Name: Register
*/
 
require_once(ABSPATH . WPINC . '/registration.php');
global $wpdb, $user_ID;
//Перевіряємо, чи вже користувач увійшов до системи
if ($user_ID) {
 
   //Залогіненого користувача перенаправляємо на головну сторінку.
   header( 'Location:' . home_url() );
 
} else {
 $errors = array();
 
 if( $_POST ) {
 
 //Переконайтеся, що ім'я користувача є і ще не використовується
 $username = $wpdb->escape($_REQUEST['username']);
 if ( strpos($username, ' ') !== false ) { 
     $errors['username'] = get_field('username-errors');
 }
                //якщо поле з ім'ям користувача порожнє
 if(empty($username)) { 
 $errors['username'] = get_field('username-empty');
 } elseif( username_exists( $username ) ) {
                 //якщо такий користувач уже зареєстровано
 $errors['username'] = get_field('username-exists');
 }
 
 // Перевіряємо, чи є email і чи дійсний він
 $email = $wpdb->escape($_REQUEST['email']);
 if( !is_email( $email ) ) { 
 $errors['email'] = "Будь ласка, введіть дійсний email";
 } elseif( email_exists( $email ) ) {
 $errors['email'] = "Такий email вже зареєстрований";
 }
 
 // Перевірка пароля на валідність
 if(0 === preg_match("/.{6,}/", $_POST['password'])){
   $errors['password'] = "Пароль повинен складатися не менше ніж із шести символів.";
 }
 
 // Перевірка повторного введення пароля
 if(0 !== strcmp($_POST['password'], $_POST['password_confirmation'])){
   $errors['password_confirmation'] = "Паролі не збігаються";
 }
 
 // Перевірити згоду з умовами обслуговування
 if($_POST['terms'] != "Yes"){
 $errors['terms'] = "Ви повинні погодитись з Умовами використання";
 }
               // якщо помилок немає
 if(0 === count($errors)) {
 
 $password = $_POST['password'];
 
 $new_user_id = wp_create_user( $username, $password, $email );
 
 // Тут ви можете робити все, що завгодно, наприклад, надсилати електронний лист користувачеві і т.д.
 
 $success = 1;
 
 header( 'Location:' . get_bloginfo('url') . '/login/?success=1&u=' . $username );
 
 } else {
 $message = 'Є помилки у заповненні форми';
 }
 }
}
?>
 
<?php get_header(); ?>
<main>
    <section class="section register-page-section">
        <style>
            @media screen and (min-width: 1439px) {
                .register-page-section {
                    background-image: url("<?php the_field('upper-section__background', 'option') ?>");
                }
            }
        </style>
        <div class="container">
            <h3 class="section_heading register-page-section__heading">
                <?php the_field('page_heading'); ?>
            </h3>
            <p id="message"><?= isset( $message ) ? $message  : '' ?></p>
<form id="wp_signup_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" style="max-width: 500px">
 
        <p>
         <label for="username">Ім'я користувача</label>
         <input type="text" name="username" id="username" value="<?= isset( $_REQUEST['username'] ) ? $_REQUEST['username']  : '' ?>">
         <span class="error"><?= isset( $errors['username'] ) ? $errors['username']  : '' ?></span>
        </p>
        <p>
         <label for="email">Email</label>
         <input type="text" name="email" id="email" value="<?= isset( $_REQUEST['email'] ) ? $_REQUEST['email']  : '' ?>">
         <span class="error"><?= isset( $errors['email'] ) ? $errors['email']  : '' ?></span>
        </p>
        <p>
         <label for="password">Пароль</label>
         <input type="password" name="password" id="password" value="<?= isset( $_REQUEST['password'] ) ? $_REQUEST['password']  : '' ?>">
         <span class="error"><?= isset( $errors['password'] ) ? $errors['password']  : '' ?></span>
        </p>
       <p>
         <label for="password_confirmation">Повторіть пароль</label>
         <input type="password" name="password_confirmation" id="password_confirmation" value="<?= isset( $_REQUEST['password_confirmation'] ) ? $_REQUEST['password_confirmation']  : '' ?>">
         <span class="error"><?= isset( $errors['password_confirmation'] ) ? $errors['password_confirmation']  : '' ?></span>
        </p>
 
       <p> <input name="terms" id="terms" type="checkbox" value="Yes">
         <label for="terms">Я погоджуюсь з умовами надання послуг</label><br>
         <span class="error"><?= isset( $errors['terms'] ) ? $errors['terms']  : '' ?></span> 
        </p>
        <input type="submit" id="submitbtn" name="submit" value="Зареєструватись" />
 
</form>
        </div>

    </section>



<?php get_template_part('template-parts/join-us'); ?>
     </main>
<?php
 get_footer();
?>