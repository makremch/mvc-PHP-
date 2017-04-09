<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<br>
<h2>Ajouter Evennement : </h2>
<p>
<form class="form-horizontal" method="Post" action="">
    <!-- Nom Event -->
    <div class="form-group">
        <label class="control-label col-sm-2" for="nom_event">Nom event :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nom_event" placeholder="Entrer Nom Evennement" name="nom_event" required>
        </div>
    </div>
    <!-- Date Event -->
    <div class="form-group">
        <label class="control-label col-sm-2" for="Date_event">Date Event :</label>
        <div class="col-sm-10">
            <input type="Date" class="form-control" id="Date_event" name="Date_event" required><br>
        </div>
    </div>

    <!-- Description de l'event -->
    <div class="form-group">
        <label class="control-label col-sm-2" for="Description">Description de l'event :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control input-lg" rows="50" id="Description" placeholder="Plus de details" name="Description"/><br>
        </div>
    </div>

    <!-- Video -->
    <div class="form-group">
        <label class="control-label col-sm-2" for="Video">URL VIDEO :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control input-lg" id="Video" placeholder="URL Video" name="Video"/><br>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">

                <button type="submit" class="btn btn-success btn-block">Submit</button>
                <button type="reset" class="btn btn-danger btn-block">Annuler</button><br>

        </div>
    </div>
</form>
</p>