<?php
session_start();
require("../../configs/connection.php");
    require("../../configs/protect.php");
    protegerFunc();
	
	if(isset($_GET["action"]) AND $_GET["action"] == "sair"){
		session_destroy();
		header("Location: ../../index.html");
	}
?>  

<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    <title>Login</title>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" type="text/css" href="../../css/style.css"/>
</head>
<body>
<section id="content-wrapper">
	<section id="content">
		<h1 class="title-page">Minha conta</h1>

		<div class="atualizar-dados">
            <div class="acomodar";>
                <form action="" method="POST" enctype="multipart/form-data">

                    <?php
                    $id = $_SESSION['id'];
                    $select = $mysqli->query("SELECT * FROM usuarios_prof WHERE id= '$id'");
                    $row = $select->num_rows;

                        $get = $select->fetch_array()
                    ?>
				<label for="email">Nome</label><input type="text" name="nome" class="txt bradius" value="<?php echo $get["nome"]; ?>"/> <br/>
                <label for="email">E-mail</label><input type="text" name="email" class="txt bradius" value="<?php echo $get["email"]; ?>"/> <br/>
                <label for="email">Idade</label><input type="text" name="idade" class="txt bradius" value="<?php echo $get["idade"]; ?>"/> <br/>

                <td>Estado:</td>
     			<td><select name="estado" id="estado" class="txt bradius" value="<?php echo $get["estado"];?>">
       				<option>Selecione...</option>
        			<option value="AC">AC</option>
       				<option value="AL">AL</option>
       				<option value="AP">AP</option>
        			<option value="AM">AM</option>
        			<option value="BA">BA</option>
        			<option value="CE">CE</option>
        			<option value="ES">ES</option>
        			<option value="DF">DF</option>
        			<option value="MA">MA</option>
        			<option value="MT">MT</option>
        			<option value="MS">MS</option>
        			<option value="MG">MG</option>
        			<option value="PA">PA</option>
        			<option value="PB">PB</option>
        			<option value="PR">PR</option>
        			<option value="PE">PE</option>
        			<option value="PI">PI</option>
        			<option value="RJ">RJ</option>
        			<option value="RN">RN</option>
        			<option value="RS">RS</option>
        			<option value="RO">RO</option>
        			<option value="RR">RR</option>
        			<option value="SC">SC</option>
        			<option value="SP">SP</option>
        			<option value="SE">SE</option>
        			<option value="TO">TO</option>
          		</select>

				<label for="email">Telefone</label><input type="text" name="telefone" class="txt bradius" value="<?php echo $get["telefone"]; ?>"/> <br/>
                <label for="email">Endereço</label><input type="text" name="endereco" class="txt bradius" value="<?php echo $get["endereco"]; ?>"/> <br/>
                Foto: <input type="file" required name="foto">
                <!--senha: <input type="text" name="senha" value="<?php// echo $get["senha"]; ?>"/> <br/>-->
				<input type="submit" class="sb bradius" value="alterar" id="editar_perfil" name="button"/>
			</form>
		</div>
    </div>
		
	</section>
</section>
</body>
</html>
<?php
    if(isset($_POST['button'])){

        $nome = mysqli_real_escape_string($mysqli, $_POST["nome"]);
        $email = mysqli_real_escape_string($mysqli, $_POST["email"]);
        $idade = mysqli_real_escape_string($mysqli, $_POST["idade"]);
        $estado = mysqli_real_escape_string($mysqli, $_POST["estado"]);
        $telefone = mysqli_real_escape_string($mysqli, $_POST["telefone"]);
        $end = mysqli_real_escape_string($mysqli, $_POST["endereco"]);
        if($mysqli){
            $query = mysqli_query($mysqli, "UPDATE usuarios_n SET nome='$nome', email='$email', idade='$idade', estado='$estado', telefone='$telefone', endereco='$end' WHERE id='$id'");
            if($query){
                echo "<script>alert('usuario atualizado com sucesso');</script>";
            }else{
                echo $mysqli->error;
            }

        }else{
            die("Error: ". mysqli_error($mysqli));
        }
    }
?>