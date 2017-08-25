<div class="form-group">
<?php
  $this->load->helper('form');
  $data = array('method' => 'post');
  echo form_open('', $data);
  $usernameData = array(
        'name'  => 'username',
        'id'    => 'username',
        'class' => 'form-control',
        'value' => set_value('username')
);
if(isset($register_errors)){
  echo
  '<div class="alert alert-danger">'
    .$register_errors.
  '</div>';
}
echo '<label for="username">username</label>';
echo form_input($usernameData);
echo '<label for="mail">adres email</label>';
$mailData = array(
              'name'    => 'mail',
              'id'      => 'mail',
              'class'   => 'form-control',
               'value'  => set_value('mail'));
echo form_input($mailData);

echo '<label for="pass">Hasło</label>';
$passData = array(
              'name'    => 'pass',
              'type'    => 'password',
              'id'      => 'pass',
              'class'   => 'form-control');
echo form_input($passData);
echo '<label for="repass">Powtórz hasło</label>';
$repassData = array(
              'name'    => 'repass',
              'type'    => 'password',
              'id'      => 'repass',
              'class'   => 'form-control');
echo form_input($repassData);
$submitData = array(
            'value'     => 'zarejestruj',
             'class'    => 'btn btn-outline-info my-2 my-sm-0"');
echo form_submit($submitData);

?>
</div>
