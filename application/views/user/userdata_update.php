<div class="form-group">
<?php
  echo 'Zmień dane użytkownika <b>' . $username . '</b>';
  $this->load->helper('form');
  $data = array('method' => 'post');
  echo form_open('', $data);
  $usernameData = array(
        'name'  => 'username',
        'id'    => 'username',
        'class' => 'form-control',
        'value' => set_value('username')
);
if(isset($update_errors)){
  echo
  '<div class="alert alert-danger">'
    .$update_errors.
  '</div>';
}
echo '<label for="username">Stare hasło</label>';
$oldpassData = array(
              'name'    => 'oldpass',
              'type'    => 'password',
              'id'      => 'oldpass',
              'class'   => 'form-control');
echo form_input($oldpassData);
echo '<label for="pass">Nowe hasło</label>';
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
            'value'     => 'zaloguj',
             'class'    => 'btn btn-outline-info my-2 my-sm-0"');
echo form_submit($submitData);

?>
</div>
