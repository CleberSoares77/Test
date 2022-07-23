<?php
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
  color: black;
}

h1 {
  color: green;
}
</style>
</head>
<body>

<h1>Site Informativo</h1>
<p>Olá aluno(a), seja bem vindo(a)</p>
<p>Diante da evasão e trancamento de curso, os discentes do curso de Análise e Desenvolvimento de Sistemas necessitam de informações prévias e específicas sobre o curso</p>
<p>Com esse propósito a intenção deste site e justamente te informar sobre o que o curso e oferecer a você programador um belo de um "Spoiler"...</p>
<p>Antes de informamos a você, inserimos um formulário para dizer sobre suas expectativas com o curso, Vamos lá?</p>

</body>
</html>


<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $sexo = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["sexo"])) {
    $genderErr = "Gender is required";
  } else {
    $sexo = test_input($_POST["sexo"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Formulario de Pesquisa</h2>
<p><span class="error">* campo obrigatório</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Nome: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  LinkedIn: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comentário: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gênero sexual:
  <input type="radio" name="sexo" <?php if (isset($sexo) && $sexo=="feminino") echo "checked";?> value="feminino">Feminino
  <input type="radio" name="sexo" <?php if (isset($sexo) && $sexo=="masculino") echo "checked";?> value="masculino">Masculino
  <input type="radio" name="sexo" <?php if (isset($sexo) && $sexo=="outra") echo "checked";?> value="outra">Outra orientação 
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="Enviar" value="Enviar informações">  
</form>

<?php
echo "<h2>Seus dados:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $sexo;
?>

</body>
</html>
