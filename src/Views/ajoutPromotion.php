<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<br>
 <h2>Ajouter Promotion : </h2>
<p>
    <form class="form-horizontal" method="Post" action="">
        <div class="form-group">
            <label class="control-label col-sm-2" for="NomPromotion">Nom Promotion :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nomPromotion" placeholder="Entrer Nom Promotion" name="nom_promotion">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="Reduction">Reduction :</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="Reduction" placeholder="Entrer Reduction" name="reduction_promotion" required><br>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <center>
                <button type="submit" class="btn btn-success btn-block">Submit</button>
                <button type="reset" class="btn btn-danger btn-block">Annuler</button><br>
                </center>
            </div>
        </div>
    </form>
</p>