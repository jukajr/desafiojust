@if (isset($_SESSION['msg']))
<div class="alert alert-{{ $_SESSION['error'] ? 'danger' : 'success' }} alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-{{ ($_SESSION['error']) ? 'ban' : 'check' }}"></i> {{ ($_SESSION['error']) ? 'Erro' : 'Sucesso' }}!</h4>
  {{ $_SESSION['msg'] }}
</div>
@endif
<?php
unset($_SESSION['msg'])
?>
