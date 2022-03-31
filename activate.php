<?php
if (!(isset($_GET["content"]) && isset($_GET["ID"]) && isset($_GET["pwh"]))) {
    header("location: ./index.php?content=message&alert=hacker-alert");
}
?>

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-6">
            <form action="./index.php?content=activate_script" method="post">
                <div class="mb-3">
                    <label for="InputPassord" class="form-label">Kies een nieuw wachtwoord:</label>
                    <input name="password" type="password" class="form-control" id="InputPassword"
                        aria-describedby="passwordHelp">
                    <div id="passwordHelp" class="form-text">Kies een veilig wachtwoord...</div>
                </div>
                <div class="mb-3">
                    <label for="InputPasswordCheck" class="form-label">Type het wachtwoord opnieuw...</label>
                    <input name="passwordCheck" type="password" class="form-control" id="InputPasswordCheck"
                        aria-describedby="passwordHelpCheck">
                    <div id="passwordHelpCheck" class="form-text">Ter controle voert u nogmaals uw wachtwoord in...
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $_GET["ID"]; ?>">
                <input type="hidden" name="pwh" value="<?php echo $_GET["pwh"]; ?>">
                <div class="d-grid gap-2">
                    <button class="btn btn-success btn-lg" type="submit">Button</button>
                </div>
            </form>
        </div>
        <div class="col-12 col-sm-6">
            <img src="./img/game-banner.jpg" alt="">
        </div>
    </div>
</div>