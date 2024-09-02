<?php 
/*
Template Name: Login
*/

if($_POST) {
 
 global $wpdb;
 
 //Перевіряємо всі поля введення перед запитом SQL
 $username = $wpdb->escape($_REQUEST['username']);
 $password = $wpdb->escape($_REQUEST['password']);
 $remember = $wpdb->escape($_REQUEST['rememberme']);
 
 if($remember) $remember = "true";
 else $remember = "false";
 
 $login_data = array();
 $login_data['user_login'] = $username;
 $login_data['user_password'] = $password;
 $login_data['remember'] = $remember;
 
 $user_verify = wp_signon( $login_data, false ); 
 
 if ( is_wp_error($user_verify) ){
    //Передаємо параметр error для використання його потім у скрипті
    header("Location: " . home_url() . "/login?error=true");        
  } else { 
    echo "<script>window.location='". home_url() ."'</script>";
    exit();
  }
 
}
get_header();
?>
<p id="message">Введіть дані для входу на сайт</p>
<form id="login" name="form" action="<?php echo home_url(); ?>/login/" method="post">
    <p>
     <input id="username" type="text" placeholder="Логін" name="username">
    </p>
    <p>
     <input id="password" type="password" placeholder="Пароль" name="password">
    </p>
    <input id="submit" type="submit" name="submit" value="Відправити">
</form>
<p><a href="<?= home_url(); ?>/lost-password/">Забули пароль</a></p>
<script>
  let message = document.getElementById('message');
  if(location.search.indexOf('error')>-1){ 
 message.innerHTML='Неправильні облікові дані';
 message.innerHTML+='<br>Введіть знову або перейдіть на сторінку <a href="<?php echo home_url(); ?>/register">реєстрації</a>';
  }
</script>
<?php
get_footer();
?>