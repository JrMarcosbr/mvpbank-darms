<?php
session_start();
// include "../crop.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
      <link rel="stylesheet" href="../../css/style.css">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.css" integrity="sha512-+VDbDxc9zesADd49pfvz7CgsOl2xREI/7gnzcdyA9XjuTxLXrdpuz21VVIqc5HPfZji2CypSbxx1lgD7BgBK5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" integrity="sha512-0SPWAwpC/17yYyZ/4HSllgaK7/gg9OlVozq8K7rf3J8LvCjYEEIfzzpnA2/SSjpGIunCSD18r3UhvDcu/xncWA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"></head>
<body >
  <nav class="navbar navbar-expand-lg " style="background-color: #330000bf!important;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img  src="../../img/LOGO MJ BANK WHITE.png" alt="Logo" width="60" href="index.php" class="fadeIn second d-inline-block align-text-top">
      </a>
        <div class="collapse navbar-collapse text-white" id="navbarNav">
            <ul class="navbar-nav fadeIn second">
                <li class="nav-item active">
                    <a class="nav-link text-white nav_font underlineHover" href="index.php.php">Início<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white nav_font underlineHover" href="meus_cartoes.php">Meus Cartões<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white nav_font underlineHover" href="cadastrar_cartao.php">Cadastrar Cartões</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white nav_font underlineHover" href="criar_cartao.php">Criar Cartão</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white nav_font underlineHover" href="perfil.php">Meu Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white nav_font underlineHover" href="../sair.php">Sair</a>
                </li>
            </ul>
        </div>
    </div>
  </nav>

    <div class="container mt-5">
    <div class="row perfil">
		<div class="col-md-3 mt-5">
			<div class="perfil-sidebar">
				<div class="perfil-userpic mx-auto">
                <form action="../crop" method="post" enctype="multipart/form-data">
                    <label class="picture mx-auto" for="picture__input" tabIndex="0">
                    <?php if (isset($_SESSION['foto_user'])){ echo "src='".$_SESSION['foto_user']."'";}  ?>
                        <span class="picture__image mx-auto"></span>
                    </label>
                    <input type="file" name="picture__input"  id="picture__input" required>
                    </div>
                    <div class="perfil-usertitle">
                        <div class="perfil-usertitle-name">
                            <?php  echo $_SESSION['user_nome']; ?>
                        </div>
                        <div class="perfil-usertitle-job">
                            Cliente
                        </div>
                    </div>
                    <div class="perfil-userbuttons">
                        <button type="submit" class="btn btn-success btn-sm">Trocar foto</button>
                </form>
                </div>
			</div>
		</div>
		<div class="col-md-9 mt-5">
            <div class="perfil-content text-center">
            <h2>Trocar senha</h2>
            <div class="col-md-12">
                    <form action="../mudar_senha.php" method ="post">
                        <input type="text" class="w-75" name="senha" placeholder="Senha Nova" required>
                        <button class="ml-3 btn btn-success">Mudar senha</button>
                    </form>
                </div>
                <div class="col-md-12 text-center">
                    <form action="../excluir_conta.php" method ="post">
                        <button class="w-50 btn btn-danger" style="margin-top:26%;">Apagar conta</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
            </div>
		</div>
	</div>
</div>
<script src="../js/cropper.js"></script>
  <script>
    const inputFile = document.querySelector("#picture__input");
    const pictureImage = document.querySelector(".picture__image");
    const pictureImageTxt = "Escolha uma foto";
    pictureImage.innerHTML = pictureImageTxt;

    inputFile.addEventListener("change", function (e) {
    const inputTarget = e.target;
    const file = inputTarget.files[0];

    if (file) {
        const reader = new FileReader();

        reader.addEventListener("load", function (e) {
        const readerTarget = e.target;

        const img = document.createElement("img");
        img.src = readerTarget.result;
        img.classList.add("picture__img");

        pictureImage.innerHTML = "";
        pictureImage.appendChild(img);
        });

        reader.readAsDataURL(file);
    } else {
        pictureImage.innerHTML = pictureImageTxt;
    }
    });
</script>
</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.js" integrity="sha512-ZK6m9vADamSl5fxBPtXw6ho6A4TuX89HUbcfvxa2v2NYNT/7l8yFGJ3JlXyMN4hlNbz0il4k6DvqbIW5CCwqkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js" integrity="sha512-ooSWpxJsiXe6t4+PPjCgYmVfr1NS5QXJACcR/FPpsdm6kqG1FmQ2SVyg2RXeVuCRBLr0lWHnWJP6Zs1Efvxzww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://unpkg.com/jquery@3/dist/jquery.min.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/bootstrap@4/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
