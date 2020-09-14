<!DOCTYPE html>
<html>

<head>
   <?= $this->insert('head') ?>
</head>

<header>
   <?= $this->insert('header') ?>
</header>
<nav>

   <?
if (isset($_SESSION['admin'])){

   $this->insert('admin_navigation');
}
else{
$this->insert('navigation');}?>
</nav>

<body>
   <?echo $content;?>

</body>

</html>