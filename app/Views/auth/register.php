<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Page d'inscription</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <style>
            body{
                display: flex;
                align-items: center;
                justify-content: center;
                font-family: Arial, sans-serif;
                line-height: 1.8;
                min-height: 100vh;
                background: #ffffff;
                flex-direction: column;
            }
            .container{
                background-color: #fff;
                border-radius: 15px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
                padding: 20px;
                transition: transform 0.2s;
                width: 600px;
            }

            form {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
            }
        </style>

    </head>
    <body>
        <div class='container'>
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Inscription</label>
                </div>
                
                <?php $errors = session()->getFlashdata('errors');?>
                <?php if($errors) :?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="mb-3">
                    <label class="form-label">Nom</label>
                    <input  class="form-control" name="last_name" value="<?= old('last_name') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Prénom</label>
                    <input  class="form-control" name="first_name" value="<?= old('first_name') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Adresse mail</label>
                    <input type="email" class="form-control" name="email" value="<?= old('email') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" name="passwordConfirm">
                </div>
                <p>Vous avez deja un compte ? <a href="<?= base_url('auth/login') ?>">Se connecter</a></p>
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </form>
        </div>
    </body>
</html>
